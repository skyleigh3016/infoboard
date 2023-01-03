<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Announcement;
use Illuminate\Support\Carbon;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = DB::table('announcements')
                ->orderBy('id', 'DESC')
                ->get();

        return view('admin.notices.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'author' => 'required',
            'author_designation' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'author' => $request->author,
            'author_designation' => $request->author_designation,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'description' => $request->description,
            'post_date' => now('6.0').date('')
        ];

        DB::table('notices')->insert($data);

        $notify = ['message'=>'Notice successfully added!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = DB::table('notices')
                ->where('id', $id)
                ->first();

        return view('admin.notices.print', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'author' => 'required',
            'author_designation' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'author' => $request->author,
            'author_designation' => $request->author_designation,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'description' => $request->description,
            'update_date' => now('6.0').date(''),
        ];

        DB::table('notices')->where('id', $id)->update($data);

        $notify = ['message'=>'Notice successfully updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }



    public function UpdateAnnouncement(Request $request) 
    {

       

        
        $image = $request->file('image');

        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen. '.' .$img_ext;
            $up_location = 'image/announcement/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);

            $update = [
                'title' => $request->title,
        'description' => $request->description,
        'image' =>  $last_img,
        'updated_at' => Carbon::now()
    
            ];
            DB:: table('announcements')->where('id',$request->id)->update($update);
           

        

        }else{

            $update = [
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
    
            ];
            DB:: table('announcements')->where('id',$request->id)->update($update);

      
        
        }
        $notify = ['message'=>'Announcements successfully Updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function destroy($id)
    {
        DB::table('bookings')->where('id', $id)->delete();

        $notify = ['message'=>'Event deleted successfully!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    public function ilagay(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen. '.' .$img_ext;
        $up_location = 'image/announcement/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        Announcement::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
            
                        ]);
   $notify = ['message'=>'Event successfully Inserted!', 'alert-type'=>'success'];
                        return redirect()->back()->with($notify);
                     }
    
   

   
}


 

