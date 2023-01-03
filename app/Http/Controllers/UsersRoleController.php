<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Image;
use File;
use DB;


class UsersRoleController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
                ->orderBy('id', 'DESC')
                ->get();

        return view('admin.Users.index', compact('users'));
    }

    public function role()
    {
        // $roles = DB::table('roles')
        //         ->orderBy('id', 'DESC')
        //         ->get();

        // return view('admin.Users.role', compact('roles'));
        return view('admin.Users.role');
    }
    public function admin()
    {
        $admins = DB::table('admins')
                ->orderBy('id', 'DESC')
                ->get();

        return view('admin.Users.admin', compact('admins'));
    }

    public function AdminInsert(Request $request)
    {
     


        

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
            
                        ]);
    
    
        $notify = ['message'=>'New Admin successfully Added!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
}

public function EditAdmin($id){
    $admins = Admin::find($id);
    return view('admin.Users.editadmin', compact('admins'));
}
public function UpdateAdmin(Request $request){

    $id = $request->input('id');
   
    Admin::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role
        
    ]);
    
    $notify = ['message'=>'Admin Info successfully updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
}
public function UserInsert(Request $request)
{
    $name_slug = Str::of($request->name)->slug('-');
 
    $image = $request->file('user_image');
    $input['user_image'] = time().'-'.$name_slug.'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('images/users');
    $imgFile = Image::make($image->getRealPath());
    $imgFile->resize(300, 300)->save($destinationPath.'/'.$input['user_image']);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'user_image' => $input['user_image'],
    ]);

    $notify = ['message'=>'New Users successfully Added!', 'alert-type'=>'success'];
    return redirect()->back()->with($notify);
    
}
public function EditUser($id){
    $users = User::find($id);
    return view('admin.Users.edituser', compact('users'));
}
public function UpdateUser(Request $request){

    $id = $request->input('id');
    
     $name_slug = Str::of($request->name)->slug('-');

    $image = $request->file('user_image');
    $input['user_image'] = time().'-'.$name_slug.'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('images/users');
    $imgFile = Image::make($image->getRealPath());
    $imgFile->resize(300, 300)->save($destinationPath.'/'.$input['user_image']);

   
    User::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'user_image' => $input['user_image']
        
    ]);
    
    $notify = ['message'=>'User Info successfully updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
}

}