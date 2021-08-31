<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bio;
use Illuminate\Support\Facades\Auth;
use App\Helper\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Storage;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bios = Bio::all();
        return view('bio.index', ['bios' => $bios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // views/bio/create.blade.php
        $bio = new Bio();
        return view('bio.create', ['bio' => $bio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::bioCreateValidate($request);

        // save model
        $bio = new Bio();
        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('avatar')) {
            $extension = $request->avatar->extension();
            $name = Str::orderedUuid();
            $request->avatar->storeAs('/public', $name . "." . $extension);
            $data['avatar'] = $name . "." . $extension;
        } else {
            $data['avatar'] = '';
        }

        $data['email_subject'] = 'Biography Contact';
        
        $data['smtp_user'] = $data['smtp_pass'] = 
        $data['domain'] = '';

        Bio::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bio = Bio::find($id);
        return view('bio.create', ['bio' => $bio]);
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
        Validator::bioCreateValidate($request);

        $bio = Bio::find($id);
        $all = $request->all();
        $bio->update($all);

        // redirect to edit action

        return redirect()->back()->with('flash_message', ['salam!', 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
