<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Story;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $stories=Story::orderBy('id','desc')->paginate(5);
        return view('admin.topstoryslider.index', compact('stories')); //compact ay variable name para mapasa sa viewpage
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return view('admin.topstoryslider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Story::create($input);

        $notify = ['message'=>'Story successfully added!', 'alert-type'=>'success'];
        
        return redirect()->route('topstoryslider.index')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Story $story){
        return view('admin.topstoryslider.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $stories= Story::find($id);
        return view('admin.topstoryslider.edit',compact('stories'));
        // return view('admin.topstoryslider.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        $image = $request->file('image');

        if($image){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

            $update = [
                'title' => $request->title,
        'description' => $request->description,
        'image' =>  $profileImage,
        'updated_at' => Carbon::now()
    
            ];
            DB:: table('stories')->where('id',$request->id)->update($update);
           

        

        }else{

            $update = [
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
    
            ];
            DB:: table('stories')->where('id',$request->id)->update($update);

      
        
        }
        
        $notify = ['message'=>'Story successfully updated!', 'alert-type'=>'success'];
        
        return redirect()->route('topstoryslider.index')->with($notify);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::table('stories')->where('id', $id)->delete();

        $notify = ['message'=>'Story successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    public function archive($id){  
        $stories=Story::where('id', $id)->delete();

        $notify = ['message'=>'Story Archived!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);                    
    }

    public function trash(){
        $stories=Story::onlyTrashed()->get();

        return view('admin.topstoryslider.trash', compact('stories'));
    }

    public function restoreTrash($id){
        $stories=Story::where('id', $id)->restore();

        $notify = ['message'=>'Story Restored!', 'alert-type'=>'success'];
            
        return redirect()->back()->with($notify);
    }
}
