<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bio;

class PagesController extends Controller
{
    public function index($englishName) {
        $bio = Bio::where('english_name', $englishName)->get()->first();
        return view('pages.index', ['bio' => $bio]);
    }
}
