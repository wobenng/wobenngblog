
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
/*****************************************************************************************/
/*********************************personal javascript*************************************/
/*****************************************************************************************/

var homeItem=document.getElementById('homeItem');
var body=document.getElementsByTagName('body');
var content=document.getElementById('content');
var ul=document.getElementsByTagName('ul');
var ulHeight=ul[0].offsetHeight;
var blurry=document.getElementById('blurry');
var myname=document.getElementById('myname');
var signature=document.getElementById('signature');
var blurryTopBorder=document.getElementById('blurryTop');
var blurryRightborder=document.getElementById('blurryRight');
var blurryBottomborder=document.getElementById('blurryBottom');
var blurryLeftborder=document.getElementById('blurryLeft');
var htmllogo=document.getElementById('htmllogo');
var csslogo=document.getElementById('csslogo');
var jslogo=document.getElementById('jslogo');
var description=document.getElementById('description');
var leftside=document.getElementById('leftside');
var frame=document.getElementById('frame');
var bodyHeight=window.innerHeight;
var bodyWidth=window.innerWidth;
var blurryH=0;
var blurryW=0;
var animationTime=1;

var signup=document.getElementById('signup');


/**********************************************首页部分js*********************************************/

 //首页字体的渐现
function wordGradient(){
    myname.style.opacity="1"; 
    signature.style.opacity="1";
};

//首页字体渐现以后，首页宽度和背景色变化动画
function homeAnimation(){
    homeItem.style.width=bodyWidth*0.3+"px";
    homeItem.style.backgroundColor="#b3caeb";
    homeItem.style.left=0+"px";
    blurryTopBorder.style.opacity=0;
    blurryBottomborder.style.opacity=0;
    blurryLeftborder.style.opacity=0;
    blurryRightborder.style.opacity=0;
    myname.style.opacity=0; 
    signature.style.opacity=0;
    myname.style.fontSize=0;
    signature.style.fontSize=0;
    myname.style.transition="opacity 1s"+","+"font-size 1s";
    signature.style.transition="opacity 1s"+","+"font-size 1s";
    homeItem.style.transition="width 5s"+","+"background-color 5s";
    setTimeout(function(){
        leftside.style.opacity=1;
        leftside.style.transition="opacity 3s"         
    },5000)
}

//轮播图
/*用两个setInterval,外面的setInterval控制每张图片轮播的周期，里面的setInterval控制每张图片的移动，
外面的setInterval的周期要比里面的周期长，以此体现每次轮播的暂停效果*/
function rotationAnimation(){
    var frameWidth=frame.offsetWidth;
    setInterval(function(){
    var addtime=0;
    var timer=setInterval(function(){
        /*图片的移动速度是frameWidth/10，也就是说用了10次，就能移走一张图片展现另一张图片，那么就用addtime来存储移动次数
          使得到达一定次数以后，取消移动，暂停展现logo框中的图片,而不是让图片一直移动，所以为了能有暂停看图片的效果，完全展示
          一张图片必须要杆在外面的setInterval再次进行之前，也就是说外面的setInterval的一个周期=图片移动时间+图片暂停时间*/
        addtime=addtime+1; 
        if(addtime>10){
            clearInterval(timer);
            addtime=0;
        }else{
            htmllogo.style.left=(htmllogo.offsetLeft-frameWidth/10)+"px";
            csslogo.style.left=(csslogo.offsetLeft-frameWidth/10)+"px";
            jslogo.style.left=(jslogo.offsetLeft-frameWidth/10)+"px";
            if(jslogo.offsetLeft==0){
                htmllogo.style.left=frameWidth+"px";
                csslogo.style.left=2*frameWidth+"px"; 
            }
            if(htmllogo.offsetLeft==0){
                jslogo.style.left=2*frameWidth+"px"; 
            }
        }
    },100)
    },5000);
}

//blurry动画
function blurryBorderMove(){
    //为了是动画准确的在blurry边界处停止，和计算blurryBorder的宽高一样，也利用所占百分比来计算没词前进的像素
    var addPixelsY=homeItem.offsetHeight*0.02;
    var addPixelsX=homeItem.offsetWidth*0.02;
    //用blurry的高度除以每次动画前进的宽度，得出动画的次数，用动画的次数来控制动画合适结束，避免用blurryborder的宽高控制而产生的精度丢失问题，否则会导致blurryborder在动画停止时，宽高不一致
    var finalAnimationTimeY=(homeItem.offsetHeight*0.8)/addPixelsY; 
    var finalAnimationTimeX=(homeItem.offsetWidth*0.6)/addPixelsX;
    if(animationTime<=finalAnimationTimeY){   
        blurryLeftborder.style.height=blurryH+addPixelsY+"px";
        blurryRightborder.style.height=blurryH+addPixelsY+"px";
        animationTime=animationTime+1;
        blurryH=blurryH+addPixelsY;
        requestAnimationFrame(blurryBorderMove);
    }else if(animationTime>finalAnimationTimeY && animationTime<=finalAnimationTimeY+finalAnimationTimeX){
        blurryBottomborder.style.width=blurryW+addPixelsX+"px";
        blurryTopBorder.style.width=blurryW+addPixelsX+"px";
        blurryW=blurryW+addPixelsX;
        animationTime=animationTime+1;
        requestAnimationFrame(blurryBorderMove);
    }else{
            cancelAnimationFrame(blurryBorderMove);
            animationTime=0;
            wordGradient();
            setTimeout(homeAnimation,5000);
            rotationAnimation();
        } 
    }

 // 根据不同屏幕的大小，设置不同的高度，填充背景色而不出现滚动条
function itemHeight(){
    body[0].style.width=bodyWidth+'px';
    content.style.left=bodyWidth*0.3+'px';
    content.style.width=bodyWidth*0.7+'px';
    content.style.height=(bodyHeight-ulHeight)+'px';
    leftside.style.width=bodyWidth*0.3+'px';
    homeItem.style.height=(bodyHeight-ulHeight)+'px';
    rotation.style.height=(bodyHeight-ulHeight)+'px';
    rotation.style.width=bodyWidth*0.7+'px';
    blurryBorderMove();
}
 itemHeight();



 /********************************用户注册，登录，编辑，退出部分js******************************************/
signup.onclick=Signup;
var request;
function Signup(){

    if (window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
        request=new XMLHttpRequest();
    }else{
        // code for IE6, IE5
        request=new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (request == null) {
        alert("Unable to create request");
        return;
    }
    request.open('GET','/signup',true);
    request.onreadystatechange=showSignup;
    request.send(); 

}

function showSignup(){
    if(request.readyState==4){
        if(request.status==200){
            
            content.innerHTML=request.responseText;
            alert('ssssss');
        }
    }
}

