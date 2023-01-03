<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Learning;
use Illuminate\Support\Carbon;

use video;
use Auth;

class LearningController extends Controller
{

    public function index()
    {
        $Learnings=Learning::orderBy('id','asc')->paginate(5);
        return view('admin.Learning.index',compact('Learnings'));
        
    }
    public function create()
    {
        return view('admin.Learning.create');
    }
    public function insert(Request $request)
    {
       $request->validate([
            'title'=>'required',
            'description'=>'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
       ]);

       $file=$request->file('video');
       $file->move('learning',$file->getClientOriginalName());
       $file_name=$file->getClientOriginalName();
       $last_vid =  'learning/'.$file_name;

       Learning::insert([
        'title' => $request->title,
        'description' => $request->description,
        'video' => $last_vid,
        'created_at' => Carbon::now()
         ]);
       return redirect('/home/learning')->with('success','Learning Added successfully');
    }
    public function edit($id) 
    {

        $learnings= Learning::find($id);
        return view('admin.Learning.edit',compact('learnings'));
            
    }
    public function update(Request $request ,$id) 
    {

        $validate = $request->validate([
          'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        

        $video = $request->file('video');
        if($video){
        $file=$request->file('video');
        $file->move('learning',$file->getClientOriginalName());
        $file_name=$file->getClientOriginalName();
        $last_vid =  'learning/'.$file_name;



        Learning::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'video' =>  $last_vid,
        'updated_at' => Carbon::now()

            ]);

        }else{

         Learning::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'updated_at' => Carbon::now()
        
                    ]);
        
        }
        return Redirect('/home/learning')->with('success','Learning updated Successfully');
    }
    public function delete(Request $request ,$id)
    {

        $video = Learning::find($request->id);
                        
                    
        Learning::where("id", $video->id)->delete();
                    
        $notification = array(
        'message' => 'Learning deleted successfully',
        'alert-type' => 'error'
                        
                );
        return Redirect('/home/learning')->with($notification);
                    
    }
    public function show()
    {

        $learnings=Learning::orderBy('created_at','asc')->get();
        return view('learning_videos',compact('learnings'));

    }
}
