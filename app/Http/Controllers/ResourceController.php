<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Program;
use App\imagetable;
use App\Banner;
use DB;
use View;
use App\Resources;
use Auth;
use Session;
use App\Http\Traits\HelperTrait;



class ResourceController extends Controller
{
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;

    public function __construct()
    {
		// $this->middleware('guest');
        $this->middleware('auth');
        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();

		$favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();

        View()->share('logo',$logo);
		View()->share('favicon',$favicon);
        //View()->share('config',$config);
    }


	public function resourcesListing()
    {
		$_getResources = DB::table('resources')->where('user_id', Auth::user()->id)->get();
		return view('account.resources-listing',['_getResources'=>$_getResources]);

	}
	public function createResource(Request $request)
    {
		return view('account.create-resource');

	}
	public function deleteResource($id)
    {
		DB::table('users')->where('id', $id)->delete();
		Session::flash('message', 'Resource Deleted Successfully');
        Session::flash('alert-class', 'alert-success');
		return view('account.resources-listing');
	}
	public function storeResource(Request $request)
    {
		$resources = new Resources;
        $resources->resource_name = $request->resource_name;
        $resources->description = $request->description;
		$resources->user_id = Auth::user()->id;
		if ($file = $request->file('resource_img')) {
            $extension = $file->extension()?: 'jpg|png';
            $destinationPath = public_path() . '/uploads/resources/';
            $safeName = '/uploads/resources/'.str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $resources->resource_img = $safeName;
        }
        $resources->save();
        Session::flash('message', 'Resource Create Successfully');
        Session::flash('alert-class', 'alert-success');
		return view('account.create-resource');

	}
	public function editResource($id)
    {
		$_getResource = DB::table('resources')->where('id', $id)->first();
		return view('account.edit-resource',['_getResource'=>$_getResource]);
	}
	public function updateResource(Request $request)
    {
		$resources = resources::find($request['resource_id']);
		$resources->resource_name = $request->resource_name;
        $resources->description = $request->description;
		$resources->user_id = Auth::user()->id;
		if ($file = $request->file('resource_img')) {
            $extension = $file->extension()?: 'jpg|png';
            $destinationPath = public_path() . '/uploads/resources/';
            $safeName = '/uploads/resources/'.str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $resources->resource_img = $safeName;
        }
        $resources->save();
		Session::flash('message', 'Resource Updated Successfully');
		Session::flash('alert-class', 'alert-success');
		return view('account.resources-listing');
	}
}
