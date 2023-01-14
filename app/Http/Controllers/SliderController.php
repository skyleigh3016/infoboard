<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use Image;
use Auth;
use DB;

class SliderController extends Controller
{
    public function index(){

        $sliders=slider::orderBy('id','desc')->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){

        return view('admin.slider.create' );
    }

    public function StoreSlider(request $request){
            
        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img =  'image/slider/'.$name_gen;
       
       Slider::insert([
       'image' => $last_img,
       'created_at' => Carbon::now()
       
                   ]);

        $notify = ['message'=>'Slider successfully added!', 'alert-type'=>'success'];
        
        return redirect()->route('home.slider')->with($notify);
    }

    public function Edit($id) {
            /*
            $sliders= Slider::find($id);
            return view('admin.slider.edit',compact('sliders'));
            */        
    }

   
    public function Update(Request $request ,$id) {
        /*
        $validate = $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:1024'
        ]);

            $slider_image = $request->file('image');
        if($slider_image){
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img =  'image/slider/'.$name_gen;

        Slider::find($id)->update([
        'image' =>  $last_img,
        'created_at' => Carbon::now()

            ]);
            $notify = ['message'=>'Story successfully updated!', 'alert-type'=>'success'];
        
            return redirect()->route('home.slider')->with($notify);
        }else{

        Slider::find($id)->update([
        'created_at' => Carbon::now()
        
                    ]);
                    $notify = ['message'=>'Story successfully updated!', 'alert-type'=>'success'];
        
                    return redirect()->route('home.slider')->with($notify);
                }
                */
    }

    public function Destroy($id) {

        DB::table('sliders')->where('id', $id)->delete();

        $notify = ['message'=>'Slider successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
        
                         
    }

    public function archive($id){  
        $sliders=Slider::where('id', $id)->delete();

        $notify = ['message'=>'Slider Archived!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);                    
    }

    public function trash(){
        $sliders=Slider::onlyTrashed()->get();

        return view('admin.slider.trash', compact('sliders'));
    }

    public function restoreTrash($id){
        $sliders=Slider::where('id', $id)->restore();

        $notify = ['message'=>'Slider Restored!', 'alert-type'=>'success'];
            
        return redirect()->back()->with($notify);
    }
        
}
