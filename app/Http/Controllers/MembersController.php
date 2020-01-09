<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Storage;
class MembersController extends Controller
{
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name', 'desc')->paginate(10);
         return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'phone' => 'required',
          'adress' => 'required',
          'Husband_Or_Wife' => 'required',
          'children' => 'required',
          'image' =>'image|nullable|max:1999'

      ]);

      //File Uploading
      if ($request->hasFile('image')) {
        //get file name with extension
        $fileNameWithEx = $request->file('image')->getClientOriginalName();

        // Get file name
        $filename = pathinfo($fileNameWithEx, PATHINFO_FILENAME);

        //Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();

        //file to store
        $fileNameToStrore = $filename.'_'.time().'.'.$extension;

        //upload images
        $path = $request->file('image')->storeAs('public/image',$fileNameToStrore);

      } else {
          $fileNameToStrore = 'noimage.jpg';
      }


      // add new member useing Tinker
      $member = new Member;
      $member->user_id = auth()->user()->id;
      $member->name = $request->input('name');
      $member->phone = $request->input('phone');
      $member->adress = $request->input('adress');
      $member->Husband_Or_Wife = $request->input('Husband_Or_Wife');
      $member->children = $request->input('children');
      $member->image = $fileNameToStrore;
      $member->save();

      return redirect('/members')->with('success', 'New Member Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'Husband_Or_Wife' => 'required',
            'children' => 'required'

        ]);


      //File Uploading
      if ($request->hasFile('image')) {
        //get file name with extension
        $fileNameWithEx = $request->file('image')->getClientOriginalName();

        // Get file name
        $filename = pathinfo($fileNameWithEx, PATHINFO_FILENAME);

        //Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();

        //file to store
        $fileNameToStrore = $filename.'_'.time().'.'.$extension;

        //upload images
        $path = $request->file('image')->storeAs('public/image',$fileNameToStrore);

      }


        // add new member useing Tinker
        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->phone = $request->input('phone');
        $member->adress = $request->input('adress');
        $member->Husband_Or_Wife = $request->input('Husband_Or_Wife');
        $member->children = $request->input('children');
        if ($request->hasFile('image')) {
            $member->image = $fileNameToStrore;
        }
        $member->save();

        return redirect('/members')->with('success', 'Member Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('success', 'Member Deleted');

        if($member->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/image/'.$member);
                }
    }


}
