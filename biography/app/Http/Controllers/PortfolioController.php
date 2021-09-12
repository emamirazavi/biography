<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Helper\Validator;
use App\Helper\FileSaver;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = Portfolio::orderBy('id', 'desc')->get();
        return view('portfolio.index', ['ports' => $ports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $port = new Portfolio();
        return view('portfolio.create', ['port' => $port]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::portfolioCreateValidate($request);

        // save model
        $port = new Portfolio();
        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = FileSaver::savePortfolio($request);
        }
        Portfolio::create($data);
        return redirect(route('portfolio.index'))->with('flash_message', ['Operation done!', 'success']);
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
        $model = Portfolio::find($id);
        return view('portfolio.create', ['port' => $model]);
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
        Validator::portfolioCreateValidate($request, false);

        // save model
        $port = Portfolio::find($id);
        $data = $request->all();
        $oldFile = $port->img;
        if ($request->hasFile('img')) {
            $data['img'] = FileSaver::savePortfolio($request);
        }
        $port->update($data);

        // deletes old avatar after saving new data
        if ($request->hasFile('img')) {
            FileSaver::deleteFile($oldFile);
        }

        return redirect(route('portfolio.index'))->with('flash_message', ['Operation done!', 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Portfolio::find($id);
        $title = $model->title;
        $model->delete();
        return redirect(route('portfolio.index'))->with('flash_message', [
            sprintf('Portfolio "%s" deleted!', $title), 'success']);
    }
}
