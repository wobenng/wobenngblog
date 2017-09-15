<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twohtmlarticle;
use App\Cssarticle;
use App\Jsarticle;
use App\Otherarticle;
Use App\Comment;
use App\User;

class ArticlesController extends Controller
{

    public function showHtml(){
        $html = Twohtmlarticle::all();
        return view('articles.showhtml',compact('html'));
    }

    public function showCss(){
        $css = Cssarticle::all();
        return view('articles.showcss',compact('css'));
    }

    public function showJs(){
        $js = Jsarticle::all();
        return view('articles.showjs',compact('js'));
    }

    public function showOther(){
        $other = Otherarticle::all();
        return view('articles.showother',compact('other'));
    }

    public function showHtmlArticle($htmlid){
        $article=Twohtmlarticle::find($htmlid);
        $allcomments=$article->comments()->where('commentable_type', 'App\Twohtmlarticle')->where('commentable_id', $htmlid)->get();
        if($allcomments){
            foreach($allcomments as $val){
                $val['user']=User::find($val->user_id);
            }
            return view('htmlarticles.showhtmlarticle'.$htmlid,compact('article','allcomments'));
        }else{
            return view('htmlarticles.showhtmlarticle'.$htmlid,compact('article'));
        } 
    }

    public function showCssArticle($cssid){
        $article=Cssarticle::find($cssid);
        $allcomments=$article->comments()->where('commentable_type', 'App\Cssarticle')->where('commentable_id', $cssid)->get();
        if($allcomments){
            foreach($allcomments as $val){
                $val['user']=User::find($val->user_id);
            }
            return view('cssarticles.showcssarticle'.$cssid,compact('article','allcomments'));
        }else{
            return view('cssarticles.showcssarticle'.$cssid,compact('article'));
        } 
    }

    public function showJsArticle($jsid){
        $article=Jsarticle::find($jsid);
        $allcomments=$article->comments()->where('commentable_type', 'App\Jsarticle')->where('commentable_id', $jsid)->get();
        if($allcomments){
            foreach($allcomments as $val){
                $val['user']=User::find($val->user_id);
            }
            return view('jsarticles.showjsarticle'.$jsid,compact('article','allcomments'));
        }else{
            return view('jsarticles.showjsarticle'.$jsid,compact('article'));
        } 
    }

    public function showOtherArticle($otherid){
        $article=Otherarticle::find($otherid);
        $allcomments=$article->comments()->where('commentable_type', 'App\Jsarticle')->where('commentable_id', $jsid)->get();
        if($allcomments){
            foreach($allcomments as $val){
                $val['user']=User::find($val->user_id);
            }
            return view('otherarticles.showotherarticle'.$otherid,compact('article','allcomments'));
        }else{
            return view('otherarticles.showotherarticle'.$otherid,compact('article'));
        } 
    }
}