<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
      $title = 'UKOO WA KIMARO';
      return view('pages.index')->with('title', $title);
  }

  public function about(){
    $title = 'HISTORIA YA UKOO WA KIMARO';
    return view('pages.about')->with('title', $title);
}
}
