<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [            
            'except' => [ 'create', 'store','confirmEmail']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create(){
         //返回HTML格式
          /*$returnhtml=View()->make('users.create')->render();
          return $returnhtml;这个方法也可以*/
          return  view('users.create');
    }

    public function store(Request $request){
        
        //验证表单
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);
        
        //将验证过的表单值存入数据库
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        
        //一经注册，指定该用户激活
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');

        //返回$user_create_flag,在表单提交成功后，作为判断依据，利用Ajax在conten中插入返回的内容
        /*$user_create_request='<div id="welcome">欢迎来到wobenng的博客</div>';
        return $user_create_request;*/

    }

    protected function sendEmailConfirmationTo($user){
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢注册 wobenng 网站！请确认你的邮箱。";    
        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token){
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function edit(User $user){
        /*$returnhtml=View()->make('users.edit')->render();
        return $returnhtml;*/
        $this->authorize('update', $user);
        return  view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        
        $this->validate($request, [
            'name' => 'required|max:32',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $this->authorize('update', $user);

        //用户不想修改密码，则提交的为原来的密码
        $data = [];
        $data['name'] = $request->name;
        //防止提交空白密码
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }
}   