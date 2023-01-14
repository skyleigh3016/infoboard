<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class DeptTeachersController extends Controller
{
    public function science()
    {
        $teacher = DB::table('teachers')->where('department', 'Faculty')->get();
        $dept = 'Faculty';
        return view('admin.teachers.teachers_dept', compact('teacher', 'dept'));
    }

    public function humanities()
    {
        $teacher = DB::table('teachers')->where('department', 'OSAS')->get();
        $dept = 'OSAS';
        return view('admin.teachers.teachers_dept', compact('teacher', 'dept'));
    }

    public function business()
    {
        $teacher = DB::table('teachers')->where('department', 'Registrar')->get();
        $dept = 'Registrar';
        return view('admin.teachers.teachers_dept', compact('teacher', 'dept'));
    }
}
