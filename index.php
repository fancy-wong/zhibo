<?php

$conn=mysqli_connect("58.83.135.229","pingji","RW3Gkhq93fwu4lez","chcoin");

if(isset($_COOKIE['chcoin_auth'])){
$chcoin_auth=$_COOKIE['chcoin_auth'];
$key='c5wcuWvHmmt4ZjMQ';
$auth = decrypt($chcoin_auth,$key);
$arr = explode(chr(9),$auth);
$id = $arr[0];
$sql = "select * from users where uid=".$id;
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$username = $res['username'];
}else{
    $username = '游客';
}
function decrypt($content, $key){
    $key = md5($key);
    $content = base64_decode($content);
    $len = strlen($content);

    $decrypt = '';
    for($i = 0; $i < $len; $i++){
        $k = $i >= 32 ? 0 : $i;
        $decrypt .= $content[$i] ^ $key[$k];
    }
    $len = strlen($decrypt);
    $content = '';
    for($i = 0; $i < $len; $i++){
        $key = $decrypt[$i];
        $i++;
        $content .= $decrypt[$i] ^ $key;
    }
    return $content;
}


?>
<!DOCTYPE HTML>
<html>
   <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <script src="jquery.min.js"></script>
    <script src="//imgcache.qq.com/open/qcloud/video/vcplayer/TcPlayer-2.3.2.js" charset="utf-8"></script>
   <title>古泉园地直播间</title>
    
      <script type="text/javascript">
      var mo=function(e){e.preventDefault();};
function stop(){
             
        document.addEventListener("touchmove",mo,{passive:false});//禁止页面滑动
}


var tm=0;

function sendmsg(){
    let now=new Date().getTime();
    var msgs = document.getElementById("msg").value;
    ws.send('{"msg":"'+msgs+'","name":"<?php echo $username; ?>"}');
        //tm=new Date().getTime();
  document.getElementById("msg").value='';
//     if (msgs!=''&&now-tm>5000) {
   
// }else{
//     alert('5秒内只能发送一次');
//     }
}
         
         //setInterval(function(){ ws.send(name+':发送消息。。。丰盛的第三方的上升到，范德萨是的发'); }, 10000);

      </script>
        <style type="text/css">
li, ul {
    list-style: none;
}
html{height: 100%;}
body{
    margin:0;background-color:#f0f0f0;height: 100%;
}
li img{
    display: inline-block;
    
    border-radius: 50%;
    vertical-align: middle;
    
}
.flex{
    display: flex;margin-top: 5px;
    display: -webkit-flex;
    display: -o-flex;
    display: -moz-flex;
}
.nickname{
    color: #999;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 200px;
    display: block;
    padding-left: 0.3rem;
}
.content{
    margin-top: .3rem;
    
    background-color: #fff;
    border-radius: .3rem;
    padding: .3rem;
    position: relative;
    margin-right: 2rem;
    font-size: 1rem;
    word-break: break-word;
    display: inline-block;
}
.msg{
    width: 100%;height: 10%;
    background-color: #ffffff;
    display: flex;
    -webkit-align-items: stretch;
    align-items: stretch;
    justify-content: center;
    bottom: 0;
    position: absolute;
     box-sizing: border-box;
    padding: 10px;
}
.msg input{
    border-color: #e6e6e6;
-webkit-appearance: none;
    line-height: 1;
    border-width: 1px;
    border-style: solid;
    background-color: #fff;
    border-radius: 2px;
    width: 70%;font-size: 1rem;
    margin-right: 0.5rem;
}
.msg button{
        display: inline-block;
    height: 100%;
    line-height: 38px;
    
    background-color: #2196F3;
    color: #fff;
    white-space: nowrap;
    text-align: center;
    font-size: 14px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
        width: 20%;
}
#text{
    width: 100%; height: 55%;background-color:#f0f0f0;overflow: scroll;box-sizing: border-box;padding: 10px;
  -webkit-overflow-scrolling: touch;
}
.msg div{
margin: 10px;
}
.r_msg{
  margin-left: 5px;
}
#nums{
    position: absolute;color:#ffffff;display: block;z-index: 999;top: 1.5rem;
    background-color: rgba(0,0,0,.4);
    border-radius: 0.8rem;font-size: 0.8rem;
    padding: .1rem .5rem;right: 1rem;text-shadow: 0 0 0.1rem #000;height: 1.2rem;
}
#nums img{
  height: 100%;vertical-align: middle;
}
#nums span{
  display: inline-block;
    vertical-align: middle;
}
.qrcode{
  position: absolute;
    left: 50%;
    top: 30%;text-align: center; 
    transform: translate(-50%);
    background-color: #ffffff;
    border-radius: 1rem;
    width: 70%;padding: 5px 0;z-index: 999;
}
.qrcode span{
  display: block;margin: 5px 0;
}
.qrcode img{
  margin: 5px 0;
}
.tips{
  font-size: 12px;color: #646363;
}
hr{
  height: 0px;
    margin: 0;
}
.title{
  font-size: 0.9rem;
    font-weight: 800;
}
.close{
  color: #858585;
}
.coverd{
      background: #000;
    position: absolute;
    left: 0px;
    top: 0px;
    height: 100%;
    width: 100%;
    opacity: 0.3;
    z-index: 2;
}
.vcp-poster-pic.cover {
    opacity:0.5;
}
.banners{
  color: #6a6868;
    line-height: 2rem;
    font-size: 1rem;
    display: block;
    padding-left: 1rem;
    width: 100%;
    height: 5%;
    background-color: #ffffff;
}
        </style>
   </head>
   <body>
   <div id="nums"><img src="see.png" /><span class="person">3212</span></div>
   <div id="id_test_video" style="width:100%; height:30%;"></div>
    <div class="banners">围观人数：<span class="person">3212</span></div>
      <div id="text" >
         
      </div>
      <form onsubmit="return false" action="##" method="post">
      <div class="msg">
    <input type="text" name="text" maxlength="30" id="msg"><button id="btn" onclick="sendmsg()">发送</button>
      </div></form>
      <div class="qrcode">
      <span class="title">古泉园地</span><img src="webcode.png" width="100" /><span class="tips">- 长按关注公众号接收最新动态 -</span><hr><span class="close" onclick="close_qr()">关闭</span>
      </div>
      <div class="coverd"></div>
      <script type="text/javascript">
  function close_qr(){
    $('.qrcode').hide();
    $('.coverd').hide();
  }
      var player = new TcPlayer('id_test_video', {
"m3u8": "http://qlive1.chcoin.com/live/live_video.m3u8", //请替换成实际可用的播放地址
"flv": "http://qlive1.chcoin.com/live/live_video.flv",
"autoplay" : true,      //iOS 下 safari 浏览器，以及大部分移动端浏览器是不开放视频自动播放这个能力的
"poster" : {"style":"cover", "src":"live.jpg"},
"controls":"default",
"live":true,
"flash":false,
"systemFullscreen":true,
"pausePosterEnabled":false,
"width" :  '100%',//视频的显示宽度，请尽量使用视频分辨率宽度
"height" : '100%',
"wording": {
    2032: "请求视频失败，请检查网络",
    2048: "请求m3u8文件失败，可能是网络错误或者跨域问题",
    1:"直播未开始，请稍后进入1",
    2:"直播未开始，请稍后进入2",
    3:"直播未开始，请稍后进入3",
    4:"直播未开始，请稍后进入4"
},
listener: function (msg) {
                //console.log('listener',msg);
                if(msg.type == 'error'){
                    window.setTimeout(function(){
                       player.load();
                    },15000);
                }
            }
});
      var ua = navigator.userAgent.toLocaleLowerCase();
        //x5内核
      if (ua.match(/tencenttraveler/) != null || ua.match(/qqbrowse/) != null) {
        
          $('body').find('video').attr('x-webkit-airplay',true).attr('x5-playsinline',true).attr('webkit-playsinline',true).attr('playsinline',true)
      }else{
        //ios端
          $('body').find('video').attr('webkit-playsinline',"true").attr('playsinline',"true") 
      
      }
$.ajax({url:"get_count.php",success:function(result){
        $(".person").html(result);
    }});
var count=0;
if ("WebSocket" in window)
            {
               
               
            
               var ws = new WebSocket("ws://liveroom.chcoin.com:9501");
                
               ws.onopen = function()
               {
                  ws.send('{"msg":"<?php echo $username; ?> 进入房间","name":"<?php echo $username; ?>"}');
                 
                  
               };
                
               ws.onmessage = function (evt) 
               { 
                 var text = evt.data;
           
        var obj = JSON.parse(text);
                  
                   
                   // var addtext = '<li class="flex"><img src="logo.png" /><div><span class="nickname">'+name+'</span><div class="content">'+received_msg+'</div></div></li>';
                   var addtext = '<li class="flex"><span style="width:42px;"><img width="42" height="42" src="header.png" /></span><div class="r_msg"><span class="nickname">'+obj.name+'</span><div class="content">'+obj.msg+'</div></div></li>';
                   var div = $("#text");
                   div.append(addtext);
                  div.scrollTop(div.prop("scrollHeight"));
               };
                
               ws.onclose = function()
               { 
                   
               };
            }
            
            else
            {
               // 浏览器不支持 WebSocket
               alert("您的浏览器不支持 WebSocket!");
            }
$("#msg").blur(function(){
    document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
</script>
   </body>
</html>