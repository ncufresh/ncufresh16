@extends('layouts.layout')
@section('title','小遊戲')
  @section('css')
    <style>


    .background{
        top:3%;
        left:0%;
        width: 100%;
        height:100%;
        z-index: -1;
        opacity:0.4;
        position:fixed; 
      }

      .title{
        font-size:40px;

      }
      .scores{
        font-size: 30px;
      }

      #totleBoard{

        background-color: rgba(242, 242, 242,0.7);
        border-radius: 20px;
        margin: 0px auto;
        margin-top: 5%;
        margin-left:8%;
        
        padding: 10px;

        height:400px;
        width: 40%;

        display:table; 
              float: left;

              text-align:center;
          
      }
      #personalBoard{

        background-color: rgba(242, 242, 242,0.7);
        border-radius: 20px;
        margin: 0px auto;
        margin-top: 5%;
        margin-left:5%; 
        
        padding: 10px;

        height:400px;
        width: 40%;

        display:table; 
              float: left;

              text-align:center;
      }
      #goback{
        margin: 0px auto;
        margin-top: 5%;
        margin-left:30px; 

        height:50px;
        width:50px;

      }
      #leaderboard{
        display:none;
      }
      #backToGame{
        margin-left:46%;
      }






      *{ 
        padding: 0; margin: 0; 
      }
      #myCanvas{ 
        background: #eee; display: block; margin: 0 auto; 
        margin-top:5%;


      }
      button{

        margin-top:5%;
      }



    </style>
    @endsection
@section('content')
    <div id="leaderboard">

      <img class="background" src="/img/game/BG_sky.jpg">
      <div class="container" id="totleBoard">
        <!--  這裡可以參考laravel ajax教學的結構 改為table，名次用排序演算法算出後再附上，不要用列表  -->

        <p class="title">總得分排行</p>
        <table class="table">
          <thead>
            <tr>
              <th>名次</th>
                          <th>username</th>
                          <th>score</th>
            </tr>
          </thead>
          <tbody id="tasks-list" name="tasks-list">
            <?php $number=1; ?>
            @foreach($total_scores as $total_score)
              <tr>
              <?php if($number>10){break;}  ?>
              <th>{{$number}}</th>
              <?php $number+=1; ?>
                  <th>{{$total_score->name}}</th>
                  <th>{{$total_score->score}}</th>
              </tr>
            @endforeach
            
          </tbody>
        </table>



      </div>

      <div class="container" id="personalBoard" >
        <p class="title">個人得分排行</p>
        <table class="table">
          <thead>
            <tr>
              <th>名次</th>
                  <th>username</th>
                  <th>score</th>
            </tr>
          </thead>
          <tbody id="tasks-list" name="tasks-list">
            <?php $number=1; ?>
            @foreach($personal_scores as $personal_score)
              <tr>
              <?php if($number>10){break;}  ?>
              <th>{{$number}}</th>
              <?php $number+=1; ?>
                  <th>{{$personal_score->name}}</th>
                  <th>{{$personal_score->score}}</th>
              </tr>
            @endforeach
<!-- 可以從資料庫提取資料，現在要進行對分數的排序，只顯示十組，若分數不到十組，則顯示全部 -->
            
            
            
          </tbody>
        </table>
      </div>
      <a  onclick="display()" id="backToGame"  href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-circle-arrow-left"></span> 回到遊戲</a>
    </div>


<!-- /////////////////////////////////////////////////////  以上是排行榜  /////////////////////////////////////////////////////  -->
      <canvas id="myCanvas" width="1000" height="500"></canvas>

      <audio id="bgm" loop="loop"><source src="/img/game/bgm.mp3" type="audio/mpeg"></audio>
      <audio id="game_4" loop="loop"><source src="/img/game/Game_4.mp3" type="audio/mpeg"></audio>
      <audio id="jump"><source src="/img/game/jump.mp3" type="audio/mpeg"></audio>
      <audio id="Blow1"><source src="/img/game/Blow1.mp3" type="audio/mpeg"></audio>
      <audio id="gameover"><source src="/img/game/gameover.mp3" type="audio/mpeg"></audio>
     

@endsection
@section('js')
<script>
/////////the leaderboard page and the game page exchange
function hide(){
  document.getElementById("myCanvas").style.display="none";
  document.getElementById("leaderboard").style.display="block";
  
}
function display(){

  document.getElementById("myCanvas").style.display="block"; 
  document.getElementById("leaderboard").style.display="none";

  
}
/////////////




var bgm_music = document.getElementById("bgm");
var jump_music = document.getElementById("jump");
var gameover_music = document.getElementById("gameover");
var blow_music =document.getElementById("Blow1");
var game_4_music=document.getElementById("game_4");
bgm_music.play();
//////////////音樂



/////////////////
var score_records=[];

$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')//csrf token
    }
  });
  var url = "/getScores";
  var a=2;

  $.get(url, function (data) {//retrieve data from database
    //success data
    console.log(data);
    score_records=data;//若要從資料庫提取複數列的資料，則以陣列表示，真是佛心來的
  }) 
  //create new task / update existing task
  //傳送資料開始
});

function test(){
  console.log("Hello console");//
  console.log(score_records[0].name);//
}
setTimeout("test()",3000);




/////////////////get the score









//////////////////get the question
var questions=[];//題目
var questions_temp=[];//題目亂序化

$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')//csrf token
    }
  });
  var url = "/smallgame_get";
  var a=2;

  $.get(url + '/' + 1, function (data) {//retrieve data from database
    //success data
    console.log(data);
    questions=data;//若要從資料庫提取複數列的資料，則以陣列表示，真是佛心來的
    questions_temp=questions;
    questions_temp.sort(function(){return Math.random()>0.5?-1:1;});
  }) 
  //create new task / update existing task
  //傳送資料開始
});
var question;
var id_question=0;



var choose_bool=false;
var YourAnswer=0;
var rightanswer=false; 
//////////////////get the question end
//readme:從剛進入遊戲的時候，就把所有的題目都輸入進陣列
//這樣遊戲進行中，就不需要重複進行資料庫操作
//在前端隨機抽取題目



var canvas, context,msg;
var gameState=0;
var gameState_menu=new Array();//選單頁面
var gameState_menu_state=0;//選單頁面的變換
var gameState_over_state=0;
var gameReadme;//說明頁面
var gamePlay_1;
var gamePlay_2;
var gamePlay_3;
////btn 第一個按鈕
var btn_1_X=230;
var btn_1_y=240;
var btn_1_width=150;
var btn_1_height=50;
////btn 第二個按鈕
var btn_2_X=80;
var btn_2_y=370;
var btn_2_width=150;
var btn_2_height=50;
////btn 第三個按鈕
var btn_3_X=620;
var btn_3_y=240;
var btn_3_width=150;
var btn_3_height=50;


////////遊戲主體的變數

var character;
var character_heart=3;//生命值
var character_heart_bool=false;
var c_x=24;
var c_y=350;
var c_height=160;
var c_width=145;
//角色
var character_images=[];
var character_image;
var character_state=0;
var character_animation;


character_image=new Image();
character_image.src ="/img/game/bird_01.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_02.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_03.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_04.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_05.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_06.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_07.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_08.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_09.png";//圖片的檔案路徑
character_images.push(character_image);
character_image=new Image();
character_image.src ="/img/game/bird_10.png";//圖片的檔案路徑
character_images.push(character_image);

character=new player_animation(c_width,c_height,character_images,c_x,c_y,"image");

var dontDraw=false;//受傷時要讓該變數在true and false 中跳動
//角色end


var rightPressed=false;
var leftPressed=false;

var falling=false;
var jumping=false;
var fallSpeed=0.7;
var maxFallSpeed = 25;
var jumpStart=-28;

var background=new component(1000,500,"/img/game/BG_sky.jpg",0,0,"image");

var Q_frame=new component(690,176,"/img/game/Q.png",150,20,"image");//問題的邊框


var brickXs = [];//the bricks' X 
var brickX_height=60;
var brickX_width=100;
for (var i = 0; i < 12; i++) {
    brickXs.push(i*brickX_width-100);
}
var bricks=[];
for(var i=0;i<brickXs.length;i++){
    bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"));
}
var background_bricks=[];//背景磚塊
for(var i=0;i<brickXs.length;i++){
    background_bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"));
}

var wormXs=[];//the worms' X
var worms=[];//the worms objects
var worms_height=50;
var worms_width=36;
for(var i=0 ; i<5 ; i++){
  wormXs.push(i*700);
}
for(var i=0 ; i<5 ; i++){
  worms.push(new component(worms_width,worms_height,"/img/game/worm.png",wormXs[i],500-20-worms_height,"image"));//20為地板高度，可視情況調整
}


var runSpeed=4;//跑速
var runSpeedUp=false;//是否開始加速(gameState===4才開始加速)


var heart_width=20;
var heart_height=20;
var heartX=[];
var heart=[];
for(var i=0;i<character_heart;i++){
  heartX.push(i*heart_width);
}
for(var i=0;i<character_heart;i++){
  heart.push(new component(heart_width,heart_height,"/img/game/heart.png",heartX[i],0,"image"));
}

var hurt_deviation=50;//讓角色比較不容易受傷，讓傷害偵測變窄
var hurt_deviation_height;//讓角色比較不容易受傷，讓傷害偵測變矮


var score=0;//分數，以企畫的角度，等於秒數
var score_bool=false;



////////遊戲主體的變數 END



var gameStateManager= new Array();//gamestate的總管，所有葉面的陣列
gameStateManager[0]=new Array();
gameStateManager[5]=new Array();
var gamePlay_over=new Array();

const MENU=0;//選單頁面
const README=1;//說明頁面
const GAME_1=2;//第一個遊戲畫面
const GAME_2=3;//第二個遊戲畫面
const GAME_3=4;//第三個遊戲畫面
const GAME_4=5;//開始遊戲的畫面
const GAMEOVER=6//測試用結束畫面

//menu
gameState_menu[0]=new component(1000,500,"/img/game/Main.jpg",0,0,"image");//選單列
gameState_menu[1]=new component(1000,500,"/img/game/Main_1.jpg",0,0,"image");//選單列
gameState_menu[2]=new component(1000,500,"/img/game/Main_2.jpg",0,0,"image");//選單列
gameState_menu[3]=new component(1000,500,"/img/game/Main_3.jpg",0,0,"image");//選單列
////
//menu
gameStateManager[0][0]=gameState_menu[0];
gameStateManager[0][1]=gameState_menu[1];
gameStateManager[0][2]=gameState_menu[2];
gameStateManager[0][3]=gameState_menu[3];
////

gameReadme=new component(1000,500,"/img/game/Rules.jpg",0,0,"image");//說明頁面物件
gamePlay_1=new component(1000,500,"/img/game/story_1.jpg",0,0,"image");
gamePlay_2=new component(1000,500,"/img/game/story_2.jpg",0,0,"image");
gamePlay_3=new component(1000,500,"/img/game/story_3.jpg",0,0,"image");
gamePlay_over[0]=new component(1000,500,"/img/game/gameover_1.jpg",0,0,"image");
gamePlay_over[1]=new component(1000,500,"/img/game/gameover_2.jpg",0,0,"image");


gameStateManager[1]=gameReadme;
gameStateManager[2]=gamePlay_1;
gameStateManager[3]=gamePlay_2;
gameStateManager[4]=gamePlay_3;
gameStateManager[5][0]=gamePlay_over[0];//gameStateManager[5]
gameStateManager[5][1]=gamePlay_over[1];


////////canvas and keyAndMouseListener
canvas = document.getElementById('myCanvas');
context = canvas.getContext('2d');
   //加入事件偵聽
canvas.addEventListener('mousemove', mouseMoveHandler, false);
canvas.addEventListener('mousedown', mouseDownHandler, false);
document.addEventListener("keydown", keyDownHandler, false); //add keylistener
document.addEventListener("keyup", keyUpHandler, false);

/////////
/////////the action of every listener
function keyDownHandler(e) {//the action of the key listener
        if(e.keyCode == 39) {
            rightPressed = true;
            YourAnswer=2;
        }
        else if(e.keyCode == 37) {
            leftPressed = true;
            YourAnswer=1;

        }
}
function keyUpHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = false;
            YourAnswer=0;
        }
        else if(e.keyCode == 37) {
            leftPressed = false;
            YourAnswer=0;
        }
}
function mouseMoveHandler(event) {//不用實作，只要按鍵按下，就會自動執行
  var rect = canvas.getBoundingClientRect();


   msg = "Mouse position: " + (event.clientX) + "," + (event.clientY) + ";canvas position:" + (event.clientX-rect.left) +","+(event.clientY-rect.top)+";heart"+character_heart+";"+score;
   if(gameState===MENU){
     if(event.clientX>(rect.left+254) && event.clientX<(rect.left+254+133) &&     //new start button
        event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
        gameState_menu_state=1;
      }
      else if(event.clientX>(rect.left+436) && event.clientX<(rect.left+436+133) &&   
      event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
        gameState_menu_state=2;
      }
      else if(event.clientX>(rect.left+637) && event.clientX<(rect.left+637+133) &&   
      event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
        gameState_menu_state=3;
      }
      else{
        gameState_menu_state=0;
      }
    }
    else if(gameState===GAMEOVER){
      if(event.clientX>(rect.left+441) && event.clientX<(rect.left+441+148) &&     //new start button
        event.clientY>(rect.top+275) &&  event.clientY<(rect.top+275+43)){
        gameState_over_state=1;
      }
      else{
        gameState_over_state=0;
      }



    }
}
function mouseDownHandler(event){
   var rect = canvas.getBoundingClientRect();
   msg = rect.left  + " " + rect.top + " " + gameState + " " + character_heart;
/////////the action of every listener
  //偵測按鈕的位置，該怎麼隨著gamestate改變而更動?
  if(gameState===MENU){
    if(event.clientX>(rect.left+254) && event.clientX<(rect.left+254+133) &&     //new start button
        event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
      gameState++;
    }
    else if(event.clientX>(rect.left+436) && event.clientX<(rect.left+436+133) &&   
      event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
      gameState=GAME_1;
    }
    else if(event.clientX>(rect.left+637) && event.clientX<(rect.left+637+133) &&   
      event.clientY>(rect.top+248) &&  event.clientY<(rect.top+248+77)){
      //location.assign("/leaderboard");
      hide();
    }
  }
  else if(gameState===README){
    if(event.clientX>(rect.left+736) && event.clientX<(rect.left+736+100) &&   
    event.clientY>(rect.top+424) &&  event.clientY<(rect.top+424+27)){
      gameState=0;
    }
  }
  else if(gameState===GAME_1){
    if(event.clientX>(rect.left+722) && event.clientX<(rect.left+722+58) &&   //arrow to game_2
    event.clientY>(rect.top+282) &&  event.clientY<(rect.top+282+31)){
      gameState=GAME_2;
    }
    else if(event.clientX>(rect.left+731) && event.clientX<(rect.left+731+54) &&   
    event.clientY>(rect.top+117) &&  event.clientY<(rect.top+117+31)){//skip
      gameState=GAME_4;
    }
  }
  else if(gameState===GAME_2){
    if(event.clientX>(rect.left+722) && event.clientX<(rect.left+722+58) &&   //arrow to game_3
    event.clientY>(rect.top+282) &&  event.clientY<(rect.top+282+31)){
      gameState=GAME_3;
    }
    else if(event.clientX>(rect.left+731) && event.clientX<(rect.left+731+54) &&   //skip
    event.clientY>(rect.top+117) &&  event.clientY<(rect.top+117+31)){
      gameState=GAME_4;
    }
  }
  else if(gameState===GAME_3){
    if(event.clientX>(rect.left+623) && event.clientX<(rect.left+623+156) &&   //arrow to game_4
    event.clientY>(rect.top+277) &&  event.clientY<(rect.top+277+40)){
      gameState=GAME_4;
    }
    else if(event.clientX>(rect.left+214) && event.clientX<(rect.left+214+113) &&   //arrow to Readme
    event.clientY>(rect.top+336) &&  event.clientY<(rect.top+336+28)){
      gameState=README;
    }
  }
  else if(gameState===GAMEOVER){
    if(event.clientX>(rect.left+441) && event.clientX<(rect.left+441+148) &&     //new start button
        event.clientY>(rect.top+275) &&  event.clientY<(rect.top+275+43)){
      document.location.reload();
    }
  }
}

////按鈕物件的constructor  
function btn_1(x,y,width,height) {
      context.beginPath();
      context.lineWidth="6";
    context.strokeStyle="black";
      context.rect(x, y, width, height);
      context.stroke();
      context.fillStyle = "#000000";
      context.fillText("遊戲說明", x+35, y+height-15);
      context.closePath();
}
function btn_2(x,y,width,height) {
      context.beginPath();
      context.lineWidth="6";
    context.strokeStyle="black";
      context.rect(x, y, width, height);
      context.stroke();
      context.fillStyle = "#000000";
      context.fillText("返回主頁", x+35, y+height-15);
      context.closePath();
}
function btn_3(x,y,width,height) {
      context.beginPath();
      context.lineWidth="6";
    context.strokeStyle="black";
      context.rect(x, y, width, height);
      context.stroke();
      context.fillStyle = "#000000";
      context.fillText("開始遊戲！", x+35, y+height-15);
      context.closePath();
}
//可以考慮把按鈕模組化



function show(msg) {

   context.font = '20px Tahoma';
   context.fillStyle = "#1569C7";
   context.textAlign = "left";
   context.textBaseline = "bottom";
   context.fillText(msg, 100, 150);
}
function component(width, height, color, x, y, type) {//主角constructor
        this.type = type;
        if (type == "image") {
            this.image = new Image();
            this.image.src = color;//圖片的檔案路徑
        }
        this.width = width;
        this.height = height;
        this.speedX = 0;
        this.speedY = 0;    
        this.x = x;
        this.y = y;    
        this.draw = function(){
          context.drawImage(this.image, 
                    this.x, 
                    this.y,
                    this.width, this.height);
        }
}
function player_animation(width, height,images, x, y, type) {//主角constructor
        this.type = type;
        this.images=images;//所有動作圖片
        this.width = width;
        this.height = height;
        this.dx = 0;
        this.dy = 0;    
        this.x = x;
        this.y = y;    
        this.update = function() {
         
            if (type == "image") {
                context.drawImage(this.image, 
                    this.x, 
                    this.y,
                    this.width, this.height);
            } else {
                context.fillStyle = color;
                context.fillRect(this.x, this.y, this.width, this.height);
            }
        }
        this.newPos = function() {
            this.x += this.dx;
            this.y += this.dy;
        }
        this.draw = function(){//動畫
          context.drawImage(this.images[character_state], 
                    this.x, 
                    this.y,
                    this.width, this.height);
        }
        this.move = function(){
            if(YourAnswer===questions_temp[id_question].answer ){//這裡也設另外一個無敵時間，以免答對了還被下一題的答錯影響
              jumping=true;
              rightanswer=true;
              //reboot_rightanswer();//bug答對時會因為下一題而受傷
            }
        }
        this.movement =function(){//動作控制
            if(jumping && !falling){//跳躍
                this.dy=jumpStart;
                falling=true;
                jumping=false;
            }
            if((this.y+this.height)<500-20){
              this.dy+=fallSpeed;
                if(this.dy>0){
                  jumping=false;
                }
                if(this.dy>maxFallSpeed){
                  this.dy=maxFallSpeed;
                }
            }
            if(falling){//掉落
                this.dy+=fallSpeed;
                if(this.dy>0){
                  jumping=false;
                }
                if(this.dy>maxFallSpeed){
                  this.dy=maxFallSpeed;
                }
            }
            if(this.y+this.height>500-20){//20為地板的高度，可試情況調整
                this.dy=0;
                this.y=500-this.height-20;
                falling=false;
            }
            if(this.y<0){
                this.dy=0;
                this.y=0;
            }
        }
        this.getHurt = function(){//受傷偵測
            for(var i=0;i<worms.length;i++){//演算法解說:只要四個角有一個點在腳色面積內，則認為該腳色碰到蟲。若要改成角色"沒有"無敵時間，而是碰到一隻一定要損一次血的話，則更改此處演算法，把每隻蟲上面多加一個flag。同一隻蟲碰過後就不會再次損血，該flag會在幾秒後重新刷新。
                if( ((( (worms[i].x<=(character.x+c_width-hurt_deviation)) && (worms[i].x)>=(character.x+hurt_deviation) ) &&
                    ( (worms[i].y<=(character.y+c_height))&&  worms[i].y>=character.y  ))/*完成左上角的偵測*/||
                    (( ((worms[i].x+worms[i].width)<=(character.x+c_width-hurt_deviation)) && (worms[i].x+worms[i].width)>=(character.x+hurt_deviation )) &&
                    ( (worms[i].y<=(character.y+c_height))&&  worms[i].y>=character.y  ))/*完成右上角的偵測*/||
                    (( (worms[i].x<=(character.x+c_width-hurt_deviation)) && (worms[i].x)>=(character.x+hurt_deviation ) ) &&
                    ( ((worms[i].y+worms[i].height)<=(character.y+c_height))&&  (worms[i].y+worms[i].height)>=character.y  ))/*完成左下角的偵測*/||
                    (( ((worms[i].x+worms[i].width)<=(character.x+c_width-hurt_deviation)) && ((worms[i].x+worms[i].width))>=(character.x+hurt_deviation ) ) &&
                    ( ((worms[i].y+worms[i].height)<=(character.y+c_height))&&  (worms[i].y+worms[i].height)>=character.y )) ) /*完成右下角的偵測*/
                    && character_heart_bool===false /*讓角色有無敵時間*/
                ){
                    if(character_heart>0){
                      delete heart[character_heart-1];
                    }

                    blow_music.play();//打擊音效

                    character_heart--;
                    character_heart_bool=true;
                    reboot_heart_bool();//讓角色有無敵時間
                }
            } 
        }
}
function character_state_control(){
  if(gameState===GAME_4){
    character_state++;
    if(character_state>=character_images.length){
      character_state=0;
    }
  }

  if(character_heart_bool){
    if(dontDraw===false){
      dontDraw=true;
    }
    else if(dontDraw===true){
      dontDraw=false;
    }
  }
  else if(!character_heart_bool){
    dontDraw=false;
  }

}
function reboot_heart_bool(){//讓角色有無敵時間
  var t=setTimeout("character_heart_bool=false",1000);
}
function getScore_bool(){//獲得分數
  var t=setTimeout("score_bool=false",1000);
}
function getScore(){
  if(score_bool===false){
    score++;
    score_bool=true;
    getScore_bool();
  }
}
function draw_background_onTheCanvas(){
  background.draw();
}
function draw_Q_onTheCanvas(){
  Q_frame.draw();
}
function draw_score_onTheCanvas(){//in the state game_4
  //繪製分數
    context.font = '20px Tahoma';
    context.fillStyle = "#1569C7";
    context.textAlign = "left";
    context.textBaseline = "bottom";
    context.fillText(score, 80, 20);
}
function draw_theBricks_onTheCanvas(){//in the state game_4
  for(var i=0;i<brickXs.length;i++){
      background_bricks[i].draw();
  }
  for(var i=0;i<brickXs.length;i++){
      bricks[i].draw();
      bricks[i].x-=runSpeed;//磚塊移動的速度
      if(bricks[i].x<=-100){
          bricks[i].x=1000;
      }
  }

}
function draw_theWorms_onTheCanvas(){//in the state game_4
  for(var i=0;i<wormXs.length;i++){

      worms[i].draw();
      worms[i].x-=runSpeed;//蟲蟲移動的速度
      if(worms[i].x<=0){
          worms[i].x=3500;
      }
    }
}
function draw_theHeart_onTheCanvas(){//in the state game_4
  for(var i=0;i<character_heart;i++){

      heart[i].draw();
  }
}
function draw_theCharacter_onTheCanvas(){//in the state game_4
    character.move();
    character.movement();
    character.newPos();
    

    if(!dontDraw){
      character.draw();
    }
    

    character.getHurt();//傷害偵測要在蟲蟲的位置更新後再開始
}
function draw_question_onTheCanvas(){//in the state game_4
    context.font = '20px Tahoma';
    context.fillStyle = "#000000";
    context.textAlign = "center";
    context.textBaseline = "bottom";
    choose();//抽題
    context.fillText(questions_temp[id_question].question, 500, 75);

    context.font = '20px Tahoma';
    context.fillStyle = "#000000";
    context.textAlign = "center";
    context.textBaseline = "bottom";
    context.fillText(questions_temp[id_question].selection_1, 330, 175);

    context.font = '20px Tahoma';
    context.fillStyle = "#000000";
    context.textAlign = "center";
    context.textBaseline = "bottom";
    context.fillText(questions_temp[id_question].selection_2, 670, 175);

}
function choose(){
  if((rightPressed || leftPressed )&& choose_bool===false &&jumping===true){//製作類似無敵時間的東西，以防玩家不停輸入


    /*//抽出問題
    var maxNum = questions.length;//陣列的長度  
    var minNum = 0;  
    id_question = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;  
    //抽出問題end*/

    jump_music.play();

    id_question++;


    rightanswer=true;
    reboot_rightanswer();
    choose_bool=true;
    reboot_choose_bool();
    if(id_question===questions.length){
      questions_temp.sort(function(){return Math.random()>0.5?-1:1;});

      id_question=0;
    }
  }else if(YourAnswer!=questions[id_question].answer && YourAnswer!=0 && rightanswer===false) 
  {
    if(character_heart_bool===false){
      if(character_heart>0){
        delete heart[character_heart-1];
      }
      blow_music.play();//打擊音效
      character_heart--;
      character_heart_bool=true;
      reboot_heart_bool();
    }
  }
}
function reboot_choose_bool(){//讓角色有無敵時間
  var t=setTimeout("choose_bool=false",500);
}
function reboot_rightanswer(){//讓角色有無敵時間
  var a=setTimeout("rightanswer=false",200);
}


function draw_MENU(){
  context.clearRect(0, 0, canvas.width, canvas.height);
  gameStateManager[0][gameState_menu_state].draw();
  //show(msg);
}
function draw_README(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[README].draw();
    //show(msg);
}
function draw_GAME_1(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_1].draw();
    //show(msg);
}
function draw_GAME_2(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_2].draw();
   // show(msg);
}
function draw_GAME_3(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_3].draw();
    //show(msg);
}

function draw_GAME_4(){
    context.clearRect(0, 0, canvas.width, canvas.height);//清空版面

    runSpeedUp=true;

    //draw back ground
    draw_background_onTheCanvas();
    //draw Q_frame
    draw_Q_onTheCanvas();
    //score
    draw_score_onTheCanvas();
    //bricks
    draw_theBricks_onTheCanvas();
    //worms
    draw_theWorms_onTheCanvas();
    //heart
    draw_theHeart_onTheCanvas()
    //draw the character
    draw_theCharacter_onTheCanvas();
    //draw the question
    draw_question_onTheCanvas();
    //

    

    if(!character_heart) {//陣亡，若要免除死亡功能，則將此區塊註解

      //upload the scores 
      //傳送資料開始
      var upload=true;
      var username="{{ Auth::user()->name }}";
      if(upload){//因為資料會重複傳送(不知道原因)，為了解決此問題，而多設一到匣門
       $(document).ready(function(){
          var formData = {
                name:username ,
                score: score,
            };

            //used to determine the http verb to use [add=POST], [update=PUT]
            var type = "POST"; //for creating new resource
            //var task_id = $('#task_id').val();;
            var my_url = "/smallgame_post";
            console.log(formData);

            $.ajax({

                  type: "POST",    
                  url: my_url,
                  data: formData,//傳送的資料
                  dataType: "json",//以json格式傳送
                  headers: {
                    'X-CSRF-Token': $('meta[name="token"]').attr('content')
                  },
                  success: function (data) {
                      console.log(data);
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
              //傳送資料結束
        });
        upload=false;
      }
        //傳送資料結束
        //upload the scores end


      gameState=GAMEOVER;//GAMEOVER===6
      /*alert("GAME OVER");
      document.location.reload();// restarting the game by reloading the page.*/
    }
    else{
      getScore();//若沒死亡，則持續得分  
    }
    //show(msg);
}
function drawGameOver(){

  context.clearRect(0, 0, canvas.width, canvas.height);
  gameStateManager[5][gameState_over_state].draw();
  //show(msg);
}


//讓gameover_music只播放一次
var gameover_music_bool=true;

function draw(){
  ////////////////////////gameState manager////////////////////////
  if(gameState===MENU){
    draw_MENU();
  }
  else if(gameState===README){
    draw_README();
  }
  else if(gameState===GAME_1){
    draw_GAME_1();
  }
  else if(gameState===GAME_2){
    draw_GAME_2();
  } 
  else if(gameState===GAME_3){
    draw_GAME_3();
  } 
  else if(gameState===GAME_4){//開始遊戲!
    //game play!!
    draw_GAME_4();
    bgm_music.pause();

    game_4_music.play();

    

  }
  else if(gameState===GAMEOVER){
    game_4_music.pause();

    //讓gameover_music只播放一次
    if(gameover_music_bool){
      gameover_music.play();  
      gameover_music_bool=false;
    }
    
    drawGameOver();
  }
  ////////////////////////gameState manager////////////////////////
  requestAnimationFrame(draw);
}

//背景執行
function addRunSpeed(){
  if(gameState===GAME_4){
    runSpeed+=0.8;
    fallSpeed+=0.2;
    jumpStart-=2.5;
  }
}


//背景執行
setInterval(character_state_control,50);//動畫楨數控制
setInterval(addRunSpeed,5000);//每過五秒跑速加快
//fallSpeed
//maxFallSpeed
draw();
/*//
  進度
    排行榜
    動畫式題目出現
    遊戲規則
    資料庫
*/
</script>
@endsection
<!-- (2)小遊戲讓手機使用者也能玩  ,  (1)美化分數欄位 ，  (3)寫好seed -->