<!doctype html>
<html>
    <head>
        <meta charset='utf-8' name="csrf-token" content="{{ csrf_token()  }}"/>
        <title>wobenng的博客</title>
        <link type="text/css" rel="stylesheet" href="/css/app.css"/>
        
    </head>
    <body>
        <ul id="navigation">
            <li id="home"><a href="/" >Home</a></li
            ><li id="html"><a href="{{route('Htmlarticles')}}" >HTML</a></li
            ><li id="css"><a href="{{route('Cssarticles')}}" >CSS</a></li
            ><li id="js"><a href="{{route('Jsarticles')}}" >javaScript</a></li
            ><li id="auxiliary"><a href="{{route('Otherarticles')}}" >Other</a></li>
        </ul>
        
        <div id="homeItem">
            <div id="blurry"></div>
            <div id="blurryTop"></div>
            <div id="blurryRight"></div>
            <div id="blurryBottom"></div>
            <div id="blurryLeft"></div>
            <p id="myname">wobenng</p>
            <p id="signature" >临渊羡鱼，不如退而结网</p>
        </div>

        <div id="leftside">
            <p id="link">友情链接</p>
            <ul>
                <li><a href="https://segmentfault.com/" target="_blank">SegmentFault</a></li
                ><li><a href="https://stackoverflow.com/" target="_blank">Stack Overflow</a></li
                ><li><a href="https://developer.mozilla.org/en-US/" target="_blank">MDN web docs</a></li
                ><li><a href="https://juejin.im/" target="_blank">掘金</a></li
                ><li><a href="https://www.zhihu.com/" target="_blank">知乎</a></li
                ><li><a href="http://www.runoob.com/" target="_blank">菜鸟教程</a></li
                ><li><a href="http://www.w3school.com.cn/" target="_blank">W3school</a></li
                ><li><a href="http://www.zhangxinxu.com/" target="_blank">张鑫旭的网站</a></li
                ><li><a href="http://www.liaoxuefeng.com/" target="_blank">廖雪峰的网站</a></li>
            </ul>
            <div id="loginANDlorout">
                @if(Auth::check())
                    <a id="user_edit"  href="{{ route('users.edit', Auth::user()->id) }}">{{Auth::user()->name}}</a>
                    <a href="#">
                        <form action="{{route('logout')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-lg btn-danger" type="submit" name="button">退出</button>
                        </form>
                    </a>
                @else
                    <a class="btn btn-block btn-primary" href="{{ route('signup') }}" role="button">注册</a>
                    <a class="btn btn-block btn-success" href="{{ route('login') }}" role="button">登录</a>
                @endif
            </div>
        </div>
        <div id="content">
            <div id="requestcontent">
                @yield('content')
            </div>
            <div id="footer">
                <p>&copy;2017 wobenng</p>
            </div>
        </div>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/app.js" ></script>
    </body>
</html>
