<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Helper\Validator;
use App\Helper\FileSaver;
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
        $bios = Bio::where('user_id', Auth::id())->get();
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
            $data['avatar'] = FileSaver::saveAvatar($request);
        } else {
            $data['avatar'] = '';
        }

        $data['email_subject'] = 'Biography Contact';

        $data['smtp_user'] = $data['smtp_pass'] = '';

        Bio::create($data);
        return redirect(route('bio.index'))->with('flash_message', ['Operation done!', 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bio = Bio::find($id);
        return view('bio.show', ['bio' => $bio]);
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
        $data = $request->all();
        $oldAvatar = $bio->avatar;
        if ($request->hasFile('avatar')) {
            $data['avatar'] = FileSaver::saveAvatar($request, $bio);
        }
        $bio->update($data);

        // deletes old avatar after saving new data
        if ($request->hasFile('avatar')) {
            FileSaver::deleteFile($oldAvatar);
        }

        // redirect to edit action
        return redirect(route('bio.index'))->with('flash_message', ['Operation done!', 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // https://stackoverflow.com/questions/14174070/automatically-deleting-related-rows-in-laravel-eloquent-orm
        $model = Bio::find($id);
        $name = $model->name;
        $model->delete();
        return redirect(route('bio.index'))->with('flash_message', [
            sprintf('Bio "%s" deleted!', $name), 'success']);
    }
}
