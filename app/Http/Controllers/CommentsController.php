<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Twohtmlarticle;
use App\Cssarticle;
use App\Jsarticle;
use App\Otherarticle;
use Auth;

class CommentsController extends Controller
{
   public function _construct(){
       $this->middleware('auth');
   }

    public function store(Twohtmlarticle $htmlid,Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        
        $htmlid->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);
        
        return redirect()->route('showHtmlArticle', $htmlid->id);
        
    }

    public function store_css(Cssarticle $cssid,Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        
        $cssid->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);
        
        return redirect()->route('showCssArticle', $cssid->id);
        
    }

    public function store_js(Jsarticle $jsid,Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        
        $jsid->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);
        
        return redirect()->route('showJsArticle', $jsid->id);
        
    }

    public function store_other(Otherarticle $otherid,Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        
        $otherid->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);
        
        return redirect()->route('showOtherArticle', $otherid->id);
        
    }
}
