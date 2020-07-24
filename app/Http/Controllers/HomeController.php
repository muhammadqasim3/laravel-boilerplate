<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\requests;
use App\post;
use App\banner;
use App\editor_content;
use App\imagetable;
use App\i_can_help_with;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;


class HomeController extends Controller
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
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 

        // $getip = UserSystemInfoHelper::get_ip();
           if(!Session::has('is_select_dropdown')) {   
                UserSystemInfoHelper::ip_visitor_country();
           }
        
        //$countryArr = array('United Arab Emirates','Saudi Arabia','Kuwait','Bahrain','Qatar','Oman','Jordan','Egypt');
       
        
        // dd($getip);
        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $banner = DB::table('banners')->where('id', '1')->first();
        $_getServices = DB::table('services')->limit(2)->get();
        $_getFaqs = DB::table('faqs')->get();
        $products = DB::table('products')->get()->take(10);
        $_getProblems = DB::table('i_can_help_withs')->get();
        $_cmsAbout = DB::table('editor_content')->where('id', '1')->where('editor_key','about')->first();
        return view('welcome', ['banner'=>$banner, 'category'=>$category, 'blogs'=>$blogs, '_getFaqs'=>$_getFaqs, '_getProblems'=>$_getProblems, '_cmsAbout'=>$_cmsAbout,'_getServices'=>$_getServices]);
    }

    public function search()
    {
        $products = new Product; 
        $blogs = new Blog; 
        if(isset($_GET['q']) && $_GET['q'] != '') {
            $keyword = $_GET['q'];
            $products = $products->where(function($query)  use ($keyword) {
                            $query->where('product_title', 'like', $keyword);
                         });
            $blogs = $blogs->where(function($query)  use ($keyword) {
                            $query->where('name', 'like', $keyword);
                         });
        }       
        $services = $services->orderBy('id','asc')->get();
        $blogs = $blogs->orderBy('id','asc')->get();
        return view('search',['services'=>$services,'blogs'=>$blogs])->with('title','Search');
        
    }
    public function news()
    {
        $blog = DB::table('blogs')
                ->orderBy('id' , 'desc')
                ->get()->toArray();
        $blogs = array_chunk($blog, 3);
        return view('news', ['blogs'=> $blogs]);
    }

    public function newsDetail($id)
    {
        $blogs = DB::table('blogs')->orderBy('id' , 'desc')->get()->take(5);
        $blog = DB::table('blogs')->where('id', $id)->first();
        return view('news-detail', ['blog'=> $blog,'blogs'=> $blogs]);
    }

    public function contact()
    {
        $cms_contact = DB::table('pages')->where('id', 2)->first();
        return view('contact', ['cms_contact'=> $cms_contact]);
    }


    public function about()
    {
        $teams = DB::table('teams')
                ->orderBy('id' , 'desc')
                ->get()->toArray();
		
		$aboutbanner = DB::table('banners')->where('id', '3')->first();
		$_cmsAbout = DB::table('editor_content')->where('id', '1')->where('editor_key','about')->first();
        return view('about', ['teams'=> $teams, 'aboutbanner'=> $aboutbanner, '_cmsAbout'=> $_cmsAbout])->with('title','About Us');
    }

    public function faqs()
    {
        $_getFaqs = DB::table('faqs')->get();
        return view('faqs')->with('_getFaqs',$_getFaqs)->with('title','FAQS');
    }
    public function actTherapy()
    {
        $_cmsactTherapy = DB::table('editor_content')->where('editor_id', '4')->where('editor_key','act-therapy')->first();
        $_cmsactTherapy2 = DB::table('editor_content')->where('editor_id', '6')->where('editor_key','act-therapy')->first();
        $_cmsactTherapy3 = DB::table('editor_content')->where('editor_id', '7')->where('editor_key','act-therapy')->first();
        $_cmsactTherapy4 = DB::table('editor_content')->where('editor_id', '8')->where('editor_key','act-therapy')->first();
        return view('act-therapy', ['_cmsactTherapy'=>$_cmsactTherapy ,'_cmsactTherapy2'=>$_cmsactTherapy2, '_cmsactTherapy3'=>$_cmsactTherapy3, '_cmsactTherapy4'=>$_cmsactTherapy4])->with('title','Act Therapy');
    }
    public function angerManagement()
    {
        return view('anger-management')->with('title','Anger Management');
    }
    public function articlesDetail()
    {
        return view('articles-detail')->with('title','Actical Detail');
    }
    public function iCanHelpWith()
    {
        $_getProblems = DB::table('i_can_help_withs')->get();
		
        return view('i-can-help-with')->with('_getProblems',$_getProblems)->with('title','I Can Help With');
    }
    public function articles()
    {
        return view('articles')->with('title','Acrticles');
    }
    public function attachmentFocused()
    {
        return view('attachment-focused')->with('title','Attachment Focused');
    }
    public function audioResources()
    {

        return view('audio-resources')->with('title','Audio Resources');
    }
    public function depression()
    {
        return view('depression')->with('title','Depression');
    }
    public function cognitiveBehavioural()
    {
        $_getCbtTherapy = DB::table('services')->where('id',2)->first();
        $_cmsAbout = DB::table('editor_content')->where('id', '1')->where('editor_key','about')->first();
		//dd($_getCbtTherapy,$_cmsAbout);
        return view('cognitive-behavioural')->with('title','Cognitive Behavioural')->with(['_getCbtTherapy'=>$_getCbtTherapy,'_cmsAbout'=>$_cmsAbout]);
    }
    public function emdrTherapy()
    {
        
        $_getEmdrTherapy = DB::table('services')->where('id',1)->first();
        return view('emdr-therapy')->with(['_getEmdrTherapy'=>$_getEmdrTherapy])->with('title','EMDR Therapy');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function generalised()
    {
        return view('generalised')->with('title','Generalised');
    }
    public function materials()
    {
        return view('materials')->with('title','Materials');
    }
    public function medicoLegal()
    {
        return view('medico-legal')->with('title','Medico Legal');
    }
    public function onlineEmdrTherapy()
    {
        return view('online-emdr-therapy')->with('title','Online EMDR Therapy');
    }
    public function panicDisorder()
    {
        return view('panic-disorder')->with('title','Panic Disorder');
    }
    public function postTraumatic()
    {
        return view('post-traumatic')->with('title','Post Traumatic');
    }
    public function presonalTherap()
    {
        return view('presonal-therap')->with('title','Personal Therapy');
    }
    public function resorce()
    {
		
        return view('resources')->with('title','Resources');
    }
    public function obsessiveCompulsive()
    {
        return view('obsessive-compulsive');
    }   
    public function conatctFromInquiry(Request $request)
    {
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->fname;
        $inquiry->inquiries_lname = $request->lname;
        $inquiry->inquiries_email = $request->email;
        $inquiry->inquiries_phone = $request->phone;
        $inquiry->inquiries_subject = $request->subject;
        $inquiry->extra_content = $request->message;
        $inquiry->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
    }
	public function requestSubmit(Request $request)
    {
        $requests = new requests;
        $requests->name = $request->name;
        $requests->email = $request->email;
        $requests->phone = $request->phone;
        $requests->message = $request->message;
        $requests->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
    }

    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $inquiry = new newsletter;
        $inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        $inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
        
    }
    public function frontEditorSubmit(Request $request){
        //dd($_POST);
        $_id= $_POST['editor_id'];
        //dd($_id);
        if(empty($_id)){  
            //dd('id');
            $editor= new editor_content;
            $editor->editor_key = $request->editor_key;
            $editor->editor_content = $request->editor_content;
            $editor->save();
            Session::flash('message', 'SuccessFully'); 
            Session::flash('alert-class', 'alert-success');
            return back();
        }else{
            //dd('not empty');
            DB::table('editor_content')
            ->where('id',$_id)
            ->update(array('editor_id' => $request->editor_id ,'editor_key' => $request->editor_key ,'editor_content' => $request->editor_content ));
            Session::flash('message', ' SuccessFully'); 
            Session::flash('alert-class', 'alert-success');
            return back();
        }
        Session::flash('flash_message', 'Unable To Add'); 
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
