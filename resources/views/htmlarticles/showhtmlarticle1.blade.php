@extends('layouts.default')

@section('content')
    <div id="article_comment">
        <div id="article_content">
            <h1>初识HTML</h1>
            <hr>
            <p>
                HTML(超文本标记语言)，它描述和定义了网页的内容(如网页中的文本，图片，视频，音频，表格，页眉，页脚，边栏等)，
                而网页的内容以什么样的外观呈现在网页上则由CSS来描述(如背景颜色，字体大小，图片大小，各个构成内容的位置等)。
                HTML就像柱梁板搭成了房屋的框架，CSS则来装饰这个房屋。
            </p>
            <hr>
            <p>
                HTML用不同的<strong>标记</strong>来定义网页的内容，如<code>&lt;head&gt;</code><code>&lt;title&gt;</code>
                <code>&lt;body&gt;</code><code>&lt;article&gt;</code><code>&lt;p&gt;</code><code>&lt;img&gt;</code>由英文的
                语义来看，不同语义的标记体现不同的网页内容，能够让人看到标记脑海就能呈现网页的结构，非常的直观。除了上述所列标记
                HTML还有其他标记可以在<a href="http://www.w3school.com.cn/" target="_blank">W3school</a>或者<a href="#" target="_blank">mozilla</a>上查找。
            </p>
            <hr>
            <p>
                由上述所列标记可以看出，大部分标记是"首尾呼应的"，即每个<strong>元素</strong>都有一个开始标签和结束标签，区别在于结束标签带有"/"。
                但是也有部分标签是没有结束标签的，如<code>&lt;img&gt;</code>。
            </p>
            <hr>
            <p>
                <strong>元素=开始标签+内容+结束标签</strong>。元素是可以嵌套元素的,如<code>&lt;p&gt;我是一个&lt;strong&gt;嵌套元素&lt;/strong&gt;&lt;p&gt;</code>,其中的<code>&lt;strong&gt;</code>标记
                是对文本加粗，起到强调效果。没有内容的元素称为<strong>空元素</strong>,只是嵌入到网页中，如<code>&lt;img&gt;</code>。
            </p>
            <hr>
<pre>
    &lt;!DOCTYPE html&gt;
        &lt;html&gt;
            &lt;head&gt;
                &lt;meta charset="utf-8"&gt;
                &lt;title&gt;My test page&lt;/title&gt;
            &lt;/head&gt;
            &lt;body&gt;
                &lt;img src="images/***.png" alt="My test image"&gt;
            &lt;/body&gt;
        &lt;/html&gt;
</pre>
            <hr>
            <p>
                <code>&lt;!DOCTYPE html&gt;</code>:告诉浏览器一个信息，即HTML是什么版本编写的<br>
                <code>&lt;html&gt;</code>:被称为根元素，将网页的所有内容都包括在其中<br>
                <code>&lt;head&gt;</code>:所包含的内容不显示在网页上，其中的嵌套元素<code>&lt;title&gt;My test page&lt;/title&gt;</code>,是这个网页的名称，
                浏览器标签中显示的标题，它被收藏时，作为标题显示在收藏夹中用来描述该页面。而嵌套元素<code>&lt;meta charset="utf-8"&gt;</code>是一个字符集
                明，如果网页中有中文，没有这个声明，中文会变成乱码。<br>
                与<code>&lt;head&gt;</code>标记对应的是<code>&lt;body&gt;</code>标记，所包含的内容是显示在网页上的。<br>
                可以看到<code>&lt;img&gt;</code>标记中还有一个链接，这个链接是相对于网页的存放路径。元素的构成还可以包括属性，其中的<code>alt</code>属性
                是为了图片加载错误的时候，将和图片有关的文字说明显示在网页上。   
                <code>&lt;meta&gt;</code>元素包括<code>name</code>和<code>content</code>这两个属性。比如为网页指定作者和网页描述。如:<br><code>&lt;meta name="author" content="wobenng"&gt;</code>
                和<code>&lt;meta name="description" content="This is  my  blog"&gt;</code>,在搜索引擎中搜索时，content中的内容能够与关键字关联，使网页能够出现在搜索结果中。<br>
                <code>&lt;link rel="shortcut icon" href="***.ico" size="16*16" type="image/x-icon"&gt;</code>可以为网站提供自定义图标。<br>
                <code><html lang="en-US"></code>可以为网页指定语言。如果是只将部分内容设置为不同的语言可以如下使用<code>&lt;p&gt;Japanese example: &gt;span lang="jp"&gt;ご飯が熱い。&lt;/span&gt;.&lt;/p&gt;</code>
                除此之外还有<code>mas</code>是马赛语言，<code>zh-Hans</code>表示中文简体，<code>fr-CA</code>表示
                法语在加拿大使用。详细可见<a href="https://en.wikipedia.org/wiki/ISO_639-1">ISO 639-1</a>.
            </p>
            <hr>
            <p>
                <code>&lt;i&gt;</code>斜体，用来表达外来词，技术术语，思想...<br>
                <code>&lt;b&gt;</code>粗体，用来表达关键词，产品名称...<br>
                <code>&lt;u&gt;</code>下划线，用来表达正确的名称，拼写错误...<br>
            </p>
            <hr>
            <p>
                如果想点击链接跳转到网页的某个位置:<code>&lt;a href="#跳转位置的id"&gt;***&lt;a&gt;</code><br>
                如果想点击链接跳转到其他网页的某个位置:<code>&lt;a href="网页名#跳转位置的id"&gt;***&lt;/a&gt;</code></br>
                如果点击链接后可以下载:<code>&lt;a href="***.jpg" download&gt;***&lt;/a&gt;</code></br>
                当然也可以指定所下载图片的名字:<code>&lt;a href="***.jpg" download="照片的名字.jpg"&gt;***&lt;/a&gt;</code>可以参考<a href="http://www.zhangxinxu.com/wordpress/2016/04/know-about-html-download-attribute/">张鑫旭的文章</a>
            </p>
            <hr>
            <p>
                描述列表：<code>&lt;dl&gt;</code>囊括整个列表，<code>&lt;dt&gt;</code>用来定义列表中的项目，<code>&lt;dd&gt;</code>用来描述列表中的项目。
            </p>
            <hr>
            <p>
                <code>&lt;blockquote&gt;</code>用来包含引用的内容，<code>&lt;blockquote&gt;</code>有一个<code>cite</code>属性，
                用来指明这段引用的URL，那么被<code>&lt;bloakquote&gt;</code>所包含的所有内容变成了一个块引用(但不是<code>
                &lt;a&gt;</code>元素那样产生一个链接)，显示在浏览器上时<code>&lt;i&gt;<会换行以及块周围产生外边距&lt;/i&gt;</code>如果想要在段落内有一个引用，
                要使用<code>&lt;q&gt;</code>标记。显示在浏览器上会在内容两端产生引号。
            </p>
            <hr>
            <p>
                <code>&lt;abbr&gt;</code>包围缩略词，其中的title属性在鼠标悬浮时显示缩略词的解释。
            </p>
            <hr>
            <p>
                <code>&lt;address&gt;</code>包含地址信息。在里面也可以嵌套元素，如：<code>&lt;address&gt; Written by</code> <a href="mailto:username@example.com">wobenng</a></code><br> 
                <code>******市***街道**号&lt;/address&gt;</code>
            </p>
            <hr>
            <p>
                <code>&lt;sup&gt;</code>和<code>&lt;sub&gt;</code>表示上标和下标，比如数学中的平方或者化学中元素的下表。
            </p>
            <hr>
            <p>
                <code>&lt;kbd&gt;</code>用来表示键盘输出。<br>
                <code>&lt;samp&gt;</code>用来表示计算机程序的输出。</br>
                <code>&lt;var&gt;</code>用来标记变量名。<br>
            </p>
            <hr>
            <p>
                <code>&lt;hr&gt;</code>在网页上可以显示空一行的效果。
            </p>
            <hr>
<pre>
    &lt;video src="rabbit320.webm" controls&gt;&lt;p&gt;这是在没有视频时的提示，可额外提供视频连接&lt;/p&gt;&lt;video&gt;<br>
    //controls 使用户可以控制该视频。<br>
    //webM,MP3,MP4都是音频格式，webM格式在Firefox和Chrome中支持，MP4或者MP3在Internet Explorer和Safari中支持。可以用下面的方法在不同网页中放不同的视频。<br>
    //autoplay 表示自动播放，loop 使视频重复播放，muted 是视频播放时默认为无声，poster 视频加载未播放时显示的图像。<br>
    &lt;video controls width="400" height="400" autoplay loop muted poster="***.png"&gt;
        &lt;source src="***.mp4" type="video/mp4"&gt;
        &lt;source src="***.webm" type="video/webm"&gt;
        &lt;p&gt;这是音频没有时显示的文本内容&lt;/p&gt;
    &lt;/video&gt;
</pre>
            <p>为视频指定字幕的时候可以使用<code>&lt;track&gt;</code>标签，<strong>但是目前只有IE10，chrom和Opero支持该标签</strong></p>
<pre>
    //其中***.vtt就是插入的字幕，如下
    WEBVTT

    1
    00:00:22.230 --> 00:00:24.606
    This is the first subtitle.
    
    2
    00:00:30.739 --> 00:00:34.074
    This is the second.
    ...
    详细可见<a href="https://developer.mozilla.org/en-US/docs/Learn/HTML/Multimedia_and_embedding/Video_and_audio_content">在视频中插入字幕</a>
    &lt;video controls&gt;
        &lt;source src="***.mp4" type="video/mp4"&gt;
        &lt;source src="***.webm" type="video/webm"&gt;
        &lt;track kind="subtitles" ***.vtt" srclang="en"&gt;
    &lt;/video&gt;
</pre>
            <hr>
            <p>
                <code>&lt;audio&gt;</code>是音频元素，和视频元素区别在于，<code>&lt;audio&gt;</code>没有<code>width</code>和<code>height</code>以及<code>poster</code>属性。
            </p>
            <hr>
            <p>
                <code>&lt;iframe&gt;</code>可以在视频网站找到分享按钮，将里面<code>&lt;iframe&gt;</code>s所包围的代码复制，黏贴在网页中。如：<br>
<pre>
    // allowfullscreen表示可以放置在全屏模式，frameborder设置边框；还可以在标签之间设置内容，在浏览器不支持的时候显示文字
    &lt;iframe height='498' width='510' src='http://player.***.com/embed/XMzAyMDQ2NTQ1Ng==' frameborder='0' allowfullscreen&gt;&lt;/iframe&gt;
</pre>
            <code>sandbox</code>属性有几个属性值，当属性值为<code>"allow-scripts"</code>时，就是允许在其中运行脚本，那么插入、
            的<code>src</code>可以是网站文件中的某个HTML文件，里面可以展示脚本运行的结果。相当于嵌入了一个HTML网页。<br>
            <code>allow-forms</code>属性允许其中的表单提交。更深入的介绍还可以看<a src="https://segmentfault.com/a/1190000004502619">iframe</a>
            </p>
            <hr>
            <p>
                <code>&lt;img&gt;</code>的两个新属性<code>srcset</code>和<code>sizes</code>可以为不同宽度的屏幕设置不同的图片和图片大小。如：<br>
<pre>
    //有了这些属性后，浏览器是这样执行的：1、先查看设备的大小，选择后面所跟的显示大小。2、选择与显示大小最接近的图片源.比如440px
    最接近的就是480w，那么就会选择b照片。
    &lt;img srcset="a.jpg 320w, b.jpg 480w,c.jpg 800w" sizes="(max-width: 320px) 280px,(max-width: 480px) 440px,800px"
     src="elva-fairy-800w.jpg" alt="Elva dressed as a fairy"&gt;
</pre>
            </p>
            <hr>
            <p>
                如果一张图片中间有一个物品，那么当这张照片在大的显示屏上时，我们不用当心看不清，但是在小的显示屏上时，我们会
                当心图片缩小时，中间的物品也跟着缩小，导致物品不清楚，那么需要用<code>&lt;picture&gt;</code>标签，如：
<pre>
    &lt;picture&gt;
        &lt;source media="(max-width: 799px)" srcset="elva-480w-close-portrait.jpg"&gt;
        &lt;source media="(min-width: 800px)" srcset="elva-800w.jpg"&gt;
        &lt;img src="elva-800w.jpg" alt="Chris standing up holding his daughter Elva"&gt;
    &lt;/picture&gt;
</pre>
            </p>
            <hr>
            <p>
                <code>&lt;colgroup&gt;</code>和<code>&lt;col&gt;</code>用来统一指定列样式。<br>
<pre>
   //第一种情况
    &lt;colgroup&gt;
        &lt;col&gt;
        &lt;col style="background-color: yellow"&gt;
    &lt;/colgroup&gt;
   //第二种情况,指定第几列的样式
    &lt;colgroup&gt;
        &lt;col style="background-color: yellow" span="2"&gt;
    &lt;/colgroup&gt;
</pre>
            </p>
            <hr>
        </div>
        <div id="show_comments">
            @if(!empty($allcomments))
            @foreach($allcomments as $val)
            <img src="{{$val->user->gravatar('40')}}" alt="{{$val->user->name}}" class="gravatar"/>
            <div id="userAndtime">
                <div>{{$val->user->name}}</div>
                <div>{{ $val->created_at->diffForHumans() }}</div>
            </div>
            <article>{{ $val->content }}</article>
            @endforeach
            @endif
        </div>
        @if(Auth::check())
        <div id="comment">
            <form method="POST" action="{{route('comments.store', $article->id)}}">
                @include('shared._errors')
                {{ csrf_field() }}
                <textarea  rows="4" placeholder="说说你的想法..." name="content">{{ old('content') }}</textarea>
                <button type="submit" class="btn btn-primary pull-right">发布</button>
            </form>
        </div>
        @endif
    </div>
@stop