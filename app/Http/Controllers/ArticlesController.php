<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function showHtml(){
        $html = Htmlarticle::all();

    }

    public function showCss(){
        $css = Cssarticle::all();
    }

    public function showJs(){
        $js = Jsarticle::all();
    }

    public function showOther(){
        $other = Otherarticle::all();
    }
}
