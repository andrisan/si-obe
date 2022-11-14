<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassPortofolioController extends Controller
{
    public function index($courseclass)
    {
        return view('class-portofolio.index', [
            'cc' => $courseclass
        ]);
    }
}
