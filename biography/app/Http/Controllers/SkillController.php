<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Helper\Validator;
use App\Helper\FileSaver;
use Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Skill::orderBy('id', 'desc')
            ->join('bio', 'skills.bio_id', '=', 'bio.id')
            ->where('bio.user_id', Auth::id())
            ->select('skills.*')
            ->get();
        return view('skill.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Skill();
        return view('skill.create', ['model' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::skillCreateValidate($request);

        // save model
        $model = new Skill();
        $data = $request->all();
        Skill::create($data);
        return redirect(route('skill.index'))->with('flash_message', ['Operation done!', 'success']);
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
        $model = Skill::find($id);
        if ($model->bio->user_id != Auth::id()) {
            abort(403);
        }
        return view('skill.create', ['model' => $model]);
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
        Validator::skillCreateValidate($request);

        // save model
        $model = Skill::find($id);
        if ($model->bio->user_id != Auth::id()) {
            abort(403);
        }
        $data = $request->all();
        $model->update($data);
        return redirect(route('skill.index'))->with('flash_message', ['Operation done!', 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Skill::find($id);
        $title = $model->title;
        $model->delete();
        return redirect(route('skill.index'))->with('flash_message', [
            sprintf('Skill "%s" deleted!', $title), 'success'
        ]);
    }
}
