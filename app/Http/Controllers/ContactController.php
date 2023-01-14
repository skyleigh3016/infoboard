<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;
use Mail;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contacts')
                ->orderBy('id', 'DESC')->paginate(10);
                

        //$stories = Story::latest()->get(); //$stories is a variable name
        return view('admin.mailbox.index', compact('contacts')); //compact ay variable name para mapasa sa viewpage
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'created_at' => Carbon::now()
        ]);
        $input = $request->all();

        Contact::create($input);
        $notification=array(
            'message'=>'Your message was sent!',
            'alert-type'=>'success');
            return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        DB::table('contacts')->where('id', $id)->delete();

        $notify = ['message'=>'Message successfully deleted!', 'alert-type'=>'success'];
        return redirect()->route('mailbox.index')->with($notify);
    }
}
