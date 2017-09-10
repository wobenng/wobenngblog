<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Htmlarticle;
use Auth;

class CommentsController extends Controller
{
   public function _construct(){
       $this->middleware('auth');
   }

    public function store(Htmlarticle $htmlid,Request $request)
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
}
