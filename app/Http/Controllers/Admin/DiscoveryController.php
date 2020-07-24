<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Discovery;
use Illuminate\Http\Request;
use Image;
use File;

class DiscoveryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $discovery = Discovery::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slogan', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('sign', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $discovery = Discovery::paginate($perPage);
            }

            return view('admin.discovery.index', compact('discovery'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.discovery.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'slogan' => 'required',
			'detail' => 'required',
			'sign' => 'required',
			'image' => 'required'
		]);

            if ($request->hasFile('image')) {
                $discovery = new discovery;

                $discovery->name = $request->input('name');   
                $discovery->slogan = $request->input('slogan');     
                $discovery->detail = $request->input('detail');
                $sign = $request->file('sign');
                $file = $request->file('image');
                

                //make sure yo have image folder inside your public
                $destination_path = 'uploads/discoverys/';
                $fileName = $sign->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$sign->getClientOriginalExtension();

                Image::make($sign)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

                $discovery->sign = $destination_path.$profileImage;
                
                //make sure yo have image folder inside your public
                $destination_path = 'uploads/discoverys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

                $discovery->image = $destination_path.$profileImage;
                $discovery->save();
            }
            
            return redirect('admin/discovery')->with('flash_message', 'Discovery added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $discovery = Discovery::findOrFail($id);
            return view('admin.discovery.show', compact('discovery'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $discovery = Discovery::findOrFail($id);
            return view('admin.discovery.edit', compact('discovery'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'slogan' => 'required',
			'detail' => 'required',
			'sign' => 'required',
			'image' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $discovery = discovery::where('id', $id)->first();
            $image_path = public_path($discovery->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/discoverys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/discoverys/'.$fileNameToStore;               
        }


            $discovery = Discovery::findOrFail($id);
             $discovery->update($requestData);

             return redirect('admin/discovery')->with('flash_message', 'Discovery updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('discovery','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Discovery::destroy($id);

            return redirect('admin/discovery')->with('flash_message', 'Discovery deleted!');
        }
        return response(view('403'), 403);

    }
}
