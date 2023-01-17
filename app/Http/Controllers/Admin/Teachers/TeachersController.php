<?php

namespace App\Http\Controllers\Admin\Teachers;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;



class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = DB::table('teachers')->get();

        return view('admin.teachers.index', compact('teacher'));
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
            'name' => 'required',
            'index' => 'required',
            'position' => 'required',
            'department' => 'required',
            'subject' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'index' => $request->index,
            'position' => $request->position,
            'department' => $request->department,
            'subject' => $request->subject,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/teachers');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);

            $data['photo'] = $input['photo'];
        }

       

       

        DB::table('teachers')->insert($data);

        $notify = ['message' => 'New teacher successfully added!', 'alert-type' => 'success'];
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
        $teacher = DB::table('teachers')->where('id', $id)->first();

        return view('admin.teachers.profile', compact('teacher'));
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
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'index' => $request->index,
            'position' => $request->position,
            'department' => $request->department,
            'subject' => $request->subject,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        if ($request->photo) {

            if(File::exists(public_path('images/teachers/'). $request->old_photo)) {
                File::delete(public_path('images/teachers/'). $request->old_photo);
            }
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/teachers');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);
            $data['photo'] = $input['photo'];
        }
        else {
            $data['photo'] = $request->old_photo;
        }

        

        DB::table('teachers')->where('id', $id)->update($data);

        $notify = ['message' => 'Teacher information successfully updated!', 'alert-type' => 'success'];
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
        $teacher = DB::table('teachers')->where('id', $id)->first();

        if(File::exists(public_path('images/teachers/'). $teacher->photo)) {
            File::delete(public_path('images/teachers/'). $teacher->photo);
        }
     

        DB::table('teachers')->where('id', $id)->delete();

        $notify = ['message'=>'Teacher successfully removed!', 'alert-type'=>'success'];
        return redirect()->route('teachers.index')->with($notify);
    }

    // public function import() 
    // {
    //     Excel::import(new TeachersImport, request()->file('file'));
        
       
    //     $notify = ['message' => 'New Students information successfully Inserted!', 'alert-type' => 'success'];
    //     return redirect()->back()->with($notify);
        
    // }

    public function import() 
    {
        Excel::import(new TeachersImport, request()->file('file'));
        
       
        $notify = ['message' => 'New Students information successfully Inserted!', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
        
    }

   
}
