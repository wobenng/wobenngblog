
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

var body=document.getElementsByTagName('body');
var content=document.getElementById('content');
var ul=document.getElementsByTagName('ul');
var ulHeight=ul[0].offsetHeight;
var requestcontent=document.getElementById('requestcontent');
var leftside=document.getElementById('leftside');
var bodyHeight=window.innerHeight;
var bodyWidth=window.innerWidth;
var blurryH=0;
var blurryW=0;
var animationTime=1;

/**********************************************首页部分js*********************************************/

 // 根据不同屏幕的大小，设置不同的高度，填充背景色而不出现滚动条
function itemHeight(){
    body[0].style.width=bodyWidth+'px';
    content.style.left=bodyWidth*0.3+'px';
    content.style.width=bodyWidth*0.7+'px';
    content.style.height=(bodyHeight-ulHeight)+'px';
    leftside.style.width=bodyWidth*0.3+'px';
    leftside.style.height=(bodyHeight-ulHeight)+'px';
    requestcontent.style.height=(bodyHeight-ulHeight-20)+'px';
    requestcontent.style.width=bodyWidth*0.7+'px';
    //以下内容根据场景出现，防止js报错
    if(document.getElementById('rotation')){
    //以下变量是为了防止其他页面没有该元素报错，以下变量只适用于首页
    var rotation=document.getElementById('rotation');
    var homeItem=document.getElementById('homeItem');
    rotation.style.height=(bodyHeight-ulHeight-20)+'px';//20是footer的高度
    rotation.style.width=bodyWidth*0.7+'px';
    homeItem.style.height=(bodyHeight-ulHeight)+'px';
    blurryBorderMove();
    }
}
 itemHeight();



//blurry动画
function blurryBorderMove(){
    var blurryTopBorder=document.getElementById('blurryTop');
    var blurryRightborder=document.getElementById('blurryRight');
    var blurryBottomborder=document.getElementById('blurryBottom');
    var blurryLeftborder=document.getElementById('blurryLeft');
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

//首页字体的渐现
function wordGradient(){
    var myname=document.getElementById('myname');
    var signature=document.getElementById('signature');
    myname.style.opacity="1"; 
    signature.style.opacity="1";
};

//首页字体渐现以后，首页宽度和背景色变化动画
function homeAnimation(){
    var homeItem=document.getElementById('homeItem');
    var blurryTopBorder=document.getElementById('blurryTop');
    var blurryRightborder=document.getElementById('blurryRight');
    var blurryBottomborder=document.getElementById('blurryBottom');
    var blurryLeftborder=document.getElementById('blurryLeft');
    var myname=document.getElementById('myname');
    var signature=document.getElementById('signature');
    homeItem.style.opacity=0;
    homeItem.style.zIndex=0;
    blurryTopBorder.style.opacity=0;
    blurryBottomborder.style.opacity=0;
    blurryLeftborder.style.opacity=0;
    blurryRightborder.style.opacity=0;
    myname.style.opacity=0; 
    signature.style.opacity=0;       
    //因为页面的动态加载元素，所以将出现的元素加载放在这里，防止js报错
    /*if(document.getElementById('signup')){
    var signup=document.getElementById('signup');
    signup.onclick=Signup;
    }
    if(document.getElementById('user_edit')){
    var user_edit=document.getElementById('user_edit');
    user_edit.onclick=userEdit;
    }*/
}

//轮播图
/*用两个setInterval,外面的setInterval控制每张图片轮播的周期，里面的setInterval控制每张图片的移动，
外面的setInterval的周期要比里面的周期长，以此体现每次轮播的暂停效果*/
function rotationAnimation(){
    var blurry=document.getElementById('blurry');  
    var htmllogo=document.getElementById('htmllogo');
    var csslogo=document.getElementById('csslogo');
    var jslogo=document.getElementById('jslogo');
    var description=document.getElementById('description');
    var rotation=document.getElementById('rotation');
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


 /********************************用户注册，登录，编辑，退出部分js******************************************/


/************START利用Ajax返回注册页面**********/
/* var request;
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
            requestcontent.innerHTML=request.responseText;
        }
    }
 }
*/
/************END利用Ajax返回注册页面************/

/*****START利用Ajax返回用户编辑个人信息的页面*****/
 /*function userEdit(){
     var user_id=$('#user_edit').attr('class');
     $.ajax({
         type: 'GET',
         url: '/users/'+user_id+'/edit',
         async: true,
         success: function(data){
             $('#requestcontent').html(data);
         },
         error: function(data){
             var errors = data.reponseJSON;
             console.log(errors);
         }
     });
     var  user_update=document.getElementById('user_update');
     user_update.onclick=userUpdate;
     alert('fff');
 }*/
/******END利用Ajax返回成功注册或者登录的页面******/

/*******START利用Ajax更新用户个人信息的页面*******/
/*    function userUpdate(){
        var update_user_id=$('#update_user_id').attr('id');
        var data = $('#form_update').serializeArray();
        $.ajax({
         type: 'POST',
         data: data,
         url: '/users/'+update_user_id,
         async: true,
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function(data){
             $('#requestcontent').html(data);
         },
         error: function(data){
             var errors = data.reponseJSON;
             console.log(errors);
         }
     });
    }*/
/********END利用Ajax更新用户个人信息的页面********/