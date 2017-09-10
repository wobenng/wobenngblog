<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Htmlarticle;
Use App\Comment;
use App\User;

class ArticlesController extends Controller
{

    public function showHtml(){
        $html = Htmlarticle::all();
        return view('articles.showhtml',compact('html'));
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

    public function showHtmlArticle($htmlid){
        $article=Htmlarticle::find($htmlid);
        $allcomments=$article->comments;
        if($allcomments){
            foreach($allcomments as $val){
                $val['user']=User::find($val->user_id);
            }
            return view('htmlarticles.showhtmlarticle'.$htmlid,compact('article','allcomments'));
        }else{
            return view('htmlarticles.showhtmlarticle'.$htmlid,compact('article'));
        } 
    }
}