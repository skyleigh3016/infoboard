<?php

namespace App\Http\Controllers\Admin\Admission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;
use Mail;
use App\Mail\AdmissionConfirmMail;
use App\Models\Learning;
use Illuminate\Support\Carbon;

class AdmissionController extends Controller
{
    public function verify(Request $request)
    {
        $security_code = $request->security_code;
        $payment_transection = $request->payment_transection;

        $verify = DB::table('admission_security_code')
                ->where('security_code','=', $security_code)
                ->where('payment_transection','=', $payment_transection)
                ->first();

        if($verify) {
            $notify = ['message'=>'You are verified!', 'alert-type'=>'success'];
            return view('admission.admission_form', compact('verify'))->with($notify);
        }
        else {
            $notify = ['message'=>'You are not verified!', 'alert-type'=>'error'];
            return redirect()->back()->with($notify);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learnings = DB::table('learnings')
        ->orderBy('id', 'DESC')
        ->get();


        return view('admin.admission.index', compact('learnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admission.create');
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
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'birth_reg_nid' => 'required',
            'ssc_res' => 'required',
            'ssc_year' => 'required'
        ]);
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'security_code' => $request->security_code,
            'name' => $request->name,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'birth_reg_nid' => $request->birth_reg_nid,
            'ssc_year' => $request->ssc_year,
            'ssc_res' => $request->ssc_res,
            'ssc_board' => $request->ssc_board,
            'ssc_dept' => $request->ssc_dept,
            'appl_dept' => $request->appl_dept,
            'ssc_school' => $request->ssc_school,
            'payment_transection' => $request->payment_transection,
            'admission_date' => now('6.0').date(''),
        ];

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/students');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);

            $data['photo'] = $input['photo'];
        }

        if ($request->file('ssc_testimonial')) {
            $image = $request->file('ssc_testimonial');
            $input['ssc_testimonial'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/testimonials/ssc');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1650, 1275)->save($destinationPath . '/' . $input['ssc_testimonial']);

            $data['ssc_testimonial'] = $input['ssc_testimonial'];
        }

        if ($request->file('ssc_marksheet')) {
            $image = $request->file('ssc_marksheet');
            $input['ssc_marksheet'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/marksheets');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1275, 1650)->save($destinationPath . '/' . $input['ssc_marksheet']);

            $data['ssc_marksheet'] = $input['ssc_marksheet'];
        }
        // dd($data);
        DB::table('new_admitted_students')->insert($data);

        // $notify = ['message' => 'Congratulations!!! You are successfully admitted', 'alert-type' => 'success'];
        $notify = ['message' => 'Your form successfully submitted, wait for confirmation email', 'alert-type' => 'success'];
        return redirect()->route('welcome')->with($notify);
    }



    //__Confirmation
    public function confirmation($id)
    {
        $info = DB::table('new_admitted_students')->where('id', $id)->first();
        $last_entry = DB::table('students')->where('session', '2022-2023')->orderBy('id', 'desc')->first();

        $roll = substr($last_entry->st_id, -4);

        $data = [
            'st_id' => sprintf("%d-%04d", date('Y'), ++$roll),
            'name' => $info->name,
            'session' => date('Y').'-'.date('Y')+1,
            'department' => $info->appl_dept,
            'c_class' => 'XI',
            'fathers_name' => $info->fathers_name,
            'mothers_name' => $info->mothers_name,
            'dob' => $info->dob,
            'gender' => $info->gender,
            'phone' => $info->phone,
            'email' => $info->email,
            'present_address' => $info->present_address,
            'permanent_address' => $info->permanent_address,
            'birth_reg_nid' => $info->birth_reg_nid,
            'ssc_res' => $info->ssc_res,
            'ssc_board' => $info->ssc_board,
            'ssc_dept' => $info->ssc_dept,
            'ssc_school' => $info->ssc_school,
            'ssc_year' => $info->ssc_year,
            'photo' => $info->photo,
            'ssc_testimonial' => $info->ssc_testimonial,
            'ssc_marksheet' => $info->ssc_marksheet,
        ];

        DB::table('students')->insert($data);

        DB::table('new_admitted_students')->where('id', $id)->delete();
        DB::table('admission_security_code')->where('security_code', $info->security_code)->delete();

        Mail::send('admin.admission.email', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Congratulations! Your admission has been confirmed.');
        });

        $notify = ['message' => 'Admission confirmed and confirmation email sent', 'alert-type' => 'success'];
        return redirect()->route('admission.index')->with($notify);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::table('new_admitted_students')->where('id', $id)->first();

        return view('admin.admission.profile', compact('student'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('learnings')->where('id', $id)->delete();

        $notify = ['message'=>'Learning Video deleted successfully!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
    public function insert(Request $request)
    {
       $request->validate([
            'title'=>'required',
            'description'=>'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
       ]);

       
       
    
       $video = $request->file('video');
        
       $name_gen = hexdec(uniqid());
       $img_ext = strtolower($video->getClientOriginalExtension());
       $img_name = $name_gen. '.' .$img_ext;
       $up_location = 'learning';
       $last_vid = 'learning/'.$img_name;
       $video->move($up_location,$img_name);

       Learning::insert([
        'title' => $request->title,
        'description' => $request->description,
        'video' => $last_vid,
        'created_at' => Carbon::now()
                       ]);
  $notify = ['message'=>'Learnings successfully Inserted!', 'alert-type'=>'success'];
                       return redirect()->back()->with($notify);

      
    }

    public function UpdateLearning(Request $request) 
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

            $update = [
                'title' => $request->title,
        'description' => $request->description,
        'video' =>  $last_vid,
        'updated_at' => Carbon::now()
    
            ];
            DB:: table('learnings')->where('id',$request->id)->update($update);
           

        

        }else{

            $update = [
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
    
            ];
            DB:: table('learnings')->where('id',$request->id)->update($update);

      
        
        }
        $notify = ['message'=>'Learning successfully updated!', 'alert-type'=>'success'];
        return redirect()->route('home.learning')->with($notify);
    }


}
