<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        return view('exhibition.index');
    }
}
