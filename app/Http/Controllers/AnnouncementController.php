<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Carbon;

use Image;
use Auth;

class AnnouncementController extends Controller
{

    public function index()
    {
        $announcements=Announcement::orderBy('id','asc')->paginate(5);
        return view('admin.Announcement.index',compact('announcements'));
        
    }
    public function create()
    {
        return view('admin.Announcement.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,1088)->save('image/announcement/'.$name_gen);
        $last_img =  'image/announcement/'.$name_gen;

        Announcement::insert([
       'title' => $request->title,
       'description' => $request->description,
       'image' => $last_img,
       'created_at' => Carbon::now()
        ]);
        return redirect('/home/announcement')->with('success','Announcement Added successfully');

    }
    public function edit($id) 
    {

        $announcements= Announcement::find($id);
        return view('admin.notices.edit',compact('announcements'));
            
    }
    public function update(Request $request ,$id) 
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    
        $image = $request->file('image');

      
        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen. '.' .$img_ext;
            $up_location = 'image/announcement/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);

           


        Announcement::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' =>  $last_img,
        'updated_at' => Carbon::now()

            ]);

        }else{

         Announcement::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'updated_at' => Carbon::now()
        
                    ]);
        
        }
        $notify = ['message'=>'Announcements successfully Updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
    public function delete(Request $request ,$id)
    {

        $image = Announcement::find($request->id);
                        
                    
        Announcement::where("id", $image->id)->delete();
                    
        $notification = array(
        'message' => 'Announcement deleted successfully',
        'alert-type' => 'error'
                        
                );
        return Redirect('/home/announcement')->with($notification);
                    
    }
    public function show()
    {

          $announcements=Announcement::orderBy('created_at','asc')->get();
        return view('announcement_home',compact('announcements'));

    }
    
    
}
