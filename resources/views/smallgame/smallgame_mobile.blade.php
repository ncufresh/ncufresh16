@extends('layouts.layout')
@section('title','小遊戲_mobile')
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
        margin-top:10%;
        width:540px;
        height:320px;
      }
      #word_under_canvas{
        text-align: center;
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
    <div>
      <canvas id="myCanvas" width="1000" height="500"></canvas>
      <p id="word_under_canvas">請橫置手機，獲得最佳遊戲體驗</br>please use landscape mode</p>
    </div>

      <audio id="bgm" loop="loop"><source src="/img/game/bgm.mp3" type="audio/mpeg"></audio>
      <audio id="game_4" loop="loop"><source src="/img/game/Game_4.mp3" type="audio/mpeg"></audio>
      <audio id="jump"><source src="/img/game/jump.mp3" type="audio/mpeg"></audio>
      <audio id="Blow1"><source src="/img/game/Blow1.mp3" type="audio/mpeg"></audio>
      <audio id="gameover"><source src="/img/game/gameover.mp3" type="audio/mpeg"></audio>
     

@endsection
@section('js')
<script>
function hide(){document.getElementById("myCanvas").style.display="none";document.getElementById("leaderboard").style.display="block"}function display(){document.getElementById("myCanvas").style.display="block";document.getElementById("leaderboard").style.display="none"}var bgm_music=document.getElementById("bgm");var jump_music=document.getElementById("jump");var gameover_music=document.getElementById("gameover");var blow_music=document.getElementById("Blow1");var game_4_music=document.getElementById("game_4");bgm_music.play();var score_records=[];$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}});var c="/getScores";var b=2;$.get(c,function(a){console.log(a);score_records=a})});var questions=[];var questions_temp=[];$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}});var c="/smallgame_get";var b=2;$.get(c+"/"+1,function(a){console.log(a);questions=a;questions_temp=questions;questions_temp.sort(function(){return Math.random()>0.5?-1:1})})});var question;var id_question=0;var choose_bool=false;var YourAnswer=0;var rightanswer=false;var canvas,context,msg;var gameState=0;var gameState_menu=new Array();var gameState_menu_state=0;var gameState_over_state=0;var gameReadme;var gamePlay_1;var gamePlay_2;var gamePlay_3;var btn_1_X=230;var btn_1_y=240;var btn_1_width=150;var btn_1_height=50;var btn_2_X=80;var btn_2_y=370;var btn_2_width=150;var btn_2_height=50;var btn_3_X=620;var btn_3_y=240;var btn_3_width=150;var btn_3_height=50;var character;var character_heart=3;var character_heart_bool=false;var c_x=24;var c_y=350;var c_height=160;var c_width=145;var character_images=[];var character_image;var character_state=0;var character_animation;character_image=new Image();character_image.src="/img/game/bird_01.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_02.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_03.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_04.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_05.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_06.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_07.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_08.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_09.png";character_images.push(character_image);character_image=new Image();character_image.src="/img/game/bird_10.png";character_images.push(character_image);character=new player_animation(c_width,c_height,character_images,c_x,c_y,"image");var dontDraw=false;var rightPressed=false;var leftPressed=false;var falling=false;var jumping=false;var fallSpeed=0.7;var maxFallSpeed=25;var jumpStart=-30;var background=new component(1000,500,"/img/game/BG_sky.jpg",0,0,"image");var Q_frame=new component(690,176,"/img/game/Q.png",150,20,"image");var brickXs=[];var brickX_height=60;var brickX_width=100;for(var i=0;i<12;i++){brickXs.push(i*brickX_width-100)}var bricks=[];for(var i=0;i<brickXs.length;i++){bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"))}var background_bricks=[];for(var i=0;i<brickXs.length;i++){background_bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"))}var wormXs=[];var worms=[];var worms_height=50;var worms_width=36;for(var i=0;i<5;i++){wormXs.push(i*1700)}for(var i=0;i<5;i++){worms.push(new component(worms_width,worms_height,"/img/game/worm.png",wormXs[i],500-20-worms_height,"image"))}var runSpeed=5;var runSpeedUp=false;var heart_width=40;var heart_height=40;var heartX=[];var heart=[];for(var i=0;i<character_heart;i++){heartX.push(i*heart_width+i*10)}for(var i=0;i<character_heart;i++){heart.push(new component(heart_width,heart_height,"/img/game/heart.png",heartX[i],0,"image"))}var hurt_deviation=50;var hurt_deviation_height;var score=0;var score_bool=false;var gameStateManager=new Array();gameStateManager[0]=new Array();gameStateManager[5]=new Array();var gamePlay_over=new Array();const MENU=0;const README=1;const GAME_1=2;const GAME_2=3;const GAME_3=4;const GAME_4=5;const GAMEOVER=6;gameState_menu[0]=new component(1000,500,"/img/game/Main.jpg",0,0,"image");gameState_menu[1]=new component(1000,500,"/img/game/Main_1.jpg",0,0,"image");gameState_menu[2]=new component(1000,500,"/img/game/Main_2.jpg",0,0,"image");gameState_menu[3]=new component(1000,500,"/img/game/Main_3.jpg",0,0,"image");gameStateManager[0][0]=gameState_menu[0];gameStateManager[0][1]=gameState_menu[1];gameStateManager[0][2]=gameState_menu[2];gameStateManager[0][3]=gameState_menu[3];gameReadme=new component(1000,500,"/img/game/Rules_mobile.jpg",0,0,"image");gamePlay_1=new component(1000,500,"/img/game/story_1.jpg",0,0,"image");gamePlay_2=new component(1000,500,"/img/game/story_2.jpg",0,0,"image");gamePlay_3=new component(1000,500,"/img/game/story_3.jpg",0,0,"image");gamePlay_over[0]=new component(1000,500,"/img/game/gameover_1.jpg",0,0,"image");gamePlay_over[1]=new component(1000,500,"/img/game/gameover_2.jpg",0,0,"image");gameStateManager[1]=gameReadme;gameStateManager[2]=gamePlay_1;gameStateManager[3]=gamePlay_2;gameStateManager[4]=gamePlay_3;gameStateManager[5][0]=gamePlay_over[0];gameStateManager[5][1]=gamePlay_over[1];canvas=document.getElementById("myCanvas");context=canvas.getContext("2d");canvas.addEventListener("mousemove",mouseMoveHandler,false);canvas.addEventListener("mousedown",mouseDownHandler,false);document.addEventListener("keydown",keyDownHandler,false);document.addEventListener("keyup",keyUpHandler,false);function keyDownHandler(a){if(a.keyCode==39){rightPressed=true;YourAnswer=2}else{if(a.keyCode==37){leftPressed=true;YourAnswer=1}}}function keyUpHandler(a){if(a.keyCode==39){rightPressed=false;YourAnswer=0}else{if(a.keyCode==37){leftPressed=false;YourAnswer=0}}}function mouseMoveHandler(b){var a=canvas.getBoundingClientRect();msg="Mouse position: "+(b.clientX)+","+(b.clientY)+";canvas position:"+(b.clientX-a.left)+","+(b.clientY-a.top)+";heart"+character_heart+";"+score;if(gameState===MENU){if(b.clientX>(a.left+136)&&b.clientX<(a.left+136+71)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){gameState_menu_state=1}else{if(b.clientX>(a.left+239)&&b.clientX<(a.left+239+71)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){gameState_menu_state=2}else{if(b.clientX>(a.left+346)&&b.clientX<(a.left+346+54)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){gameState_menu_state=3}else{gameState_menu_state=0}}}}else{if(gameState===GAMEOVER){if(b.clientX>(a.left+240)&&b.clientX<(a.left+240+76)&&b.clientY>(a.top+181)&&b.clientY<(a.top+181+28)){gameState_over_state=1}else{gameState_over_state=0}}}}function mouseDownHandler(b){var a=canvas.getBoundingClientRect();msg=a.left+" "+a.top+" "+gameState+" "+character_heart;if(gameState===MENU){if(b.clientX>(a.left+136)&&b.clientX<(a.left+136+71)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){gameState++}else{if(b.clientX>(a.left+239)&&b.clientX<(a.left+239+71)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){gameState=GAME_1}else{if(b.clientX>(a.left+346)&&b.clientX<(a.left+346+54)&&b.clientY>(a.top+159)&&b.clientY<(a.top+159+46)){hide()}}}}else{if(gameState===README){if(b.clientX>(a.left+396)&&b.clientX<(a.left+396+51)&&b.clientY>(a.top+270)&&b.clientY<(a.top+270+19)){gameState=0}}else{if(gameState===GAME_1){if(b.clientX>(a.left+387)&&b.clientX<(a.left+387+33)&&b.clientY>(a.top+185)&&b.clientY<(a.top+185+21)){gameState=GAME_2}else{if(b.clientX>(a.left+394)&&b.clientX<(a.left+394+29)&&b.clientY>(a.top+81)&&b.clientY<(a.top+81+19)){gameState=GAME_4}}}else{if(gameState===GAME_2){if(b.clientX>(a.left+387)&&b.clientX<(a.left+387+33)&&b.clientY>(a.top+185)&&b.clientY<(a.top+185+21)){gameState=GAME_3}else{if(b.clientX>(a.left+394)&&b.clientX<(a.left+394+29)&&b.clientY>(a.top+81)&&b.clientY<(a.top+81+19)){gameState=GAME_4}}}else{if(gameState===GAME_3){if(b.clientX>(a.left+338)&&b.clientX<(a.left+338+80)&&b.clientY>(a.top+182)&&b.clientY<(a.top+182+25)){gameState=GAME_4}else{if(b.clientX>(a.left+116)&&b.clientX<(a.left+116+60)&&b.clientY>(a.top+221)&&b.clientY<(a.top+221+18)){gameState=README}}}else{if(gameState===GAME_4){if(b.clientX>(a.left+92)&&b.clientX<(a.left+92+157)&&b.clientY>(a.top+83)&&b.clientY<(a.top+83+41)){leftPressed=true;YourAnswer=1;after_click_mouse()}else{if(b.clientX>(a.left+285)&&b.clientX<(a.left+285+157)&&b.clientY>(a.top+83)&&b.clientY<(a.top+83+41)){rightPressed=true;YourAnswer=2;after_click_mouse()}}}else{if(gameState===GAMEOVER){if(b.clientX>(a.left+240)&&b.clientX<(a.left+240+76)&&b.clientY>(a.top+181)&&b.clientY<(a.top+181+28)){document.location.reload()}}}}}}}}}function after_click_mouse(){setTimeout("YourAnswer=0",300);setTimeout("rightPressed=false",300);setTimeout("leftPressed=fasle",300)}function btn_1(b,d,c,a){context.beginPath();context.lineWidth="6";context.strokeStyle="black";context.rect(b,d,c,a);context.stroke();context.fillStyle="#000000";context.fillText("遊戲說明",b+35,d+a-15);context.closePath()}function btn_2(b,d,c,a){context.beginPath();context.lineWidth="6";context.strokeStyle="black";context.rect(b,d,c,a);context.stroke();context.fillStyle="#000000";context.fillText("返回主頁",b+35,d+a-15);context.closePath()}function btn_3(b,d,c,a){context.beginPath();context.lineWidth="6";context.strokeStyle="black";context.rect(b,d,c,a);context.stroke();context.fillStyle="#000000";context.fillText("開始遊戲！",b+35,d+a-15);context.closePath()}function show(a){context.font="20px Tahoma";context.fillStyle="#1569C7";context.textAlign="left";context.textBaseline="bottom";context.fillText(a,100,150)}function component(e,b,c,a,f,d){this.type=d;if(d=="image"){this.image=new Image();this.image.src=c}this.width=e;this.height=b;this.speedX=0;this.speedY=0;this.x=a;this.y=f;this.draw=function(){context.drawImage(this.image,this.x,this.y,this.width,this.height)}}function player_animation(e,c,b,a,f,d){this.type=d;this.images=b;this.width=e;this.height=c;this.dx=0;this.dy=0;this.x=a;this.y=f;this.update=function(){if(d=="image"){context.drawImage(this.image,this.x,this.y,this.width,this.height)}else{context.fillStyle=color;context.fillRect(this.x,this.y,this.width,this.height)}};this.newPos=function(){this.x+=this.dx;this.y+=this.dy};this.draw=function(){context.drawImage(this.images[character_state],this.x,this.y,this.width,this.height)};this.move=function(){if(YourAnswer===questions_temp[id_question].answer){jumping=true;rightanswer=true}};this.movement=function(){if(jumping&&!falling){this.dy=jumpStart;falling=true;jumping=false}if((this.y+this.height)<500-20){this.dy+=fallSpeed;if(this.dy>0){jumping=false}if(this.dy>maxFallSpeed){this.dy=maxFallSpeed}}if(falling){this.dy+=fallSpeed;if(this.dy>0){jumping=false}if(this.dy>maxFallSpeed){this.dy=maxFallSpeed}}if(this.y+this.height>500-20){this.dy=0;this.y=500-this.height-20;falling=false}if(this.y<0){this.dy=0;this.y=0}};this.getHurt=function(){for(var g=0;g<worms.length;g++){if(((((worms[g].x<=(character.x+c_width-hurt_deviation))&&(worms[g].x)>=(character.x+hurt_deviation))&&((worms[g].y<=(character.y+c_height))&&worms[g].y>=character.y))||((((worms[g].x+worms[g].width)<=(character.x+c_width-hurt_deviation))&&(worms[g].x+worms[g].width)>=(character.x+hurt_deviation))&&((worms[g].y<=(character.y+c_height))&&worms[g].y>=character.y))||(((worms[g].x<=(character.x+c_width-hurt_deviation))&&(worms[g].x)>=(character.x+hurt_deviation))&&(((worms[g].y+worms[g].height)<=(character.y+c_height))&&(worms[g].y+worms[g].height)>=character.y))||((((worms[g].x+worms[g].width)<=(character.x+c_width-hurt_deviation))&&((worms[g].x+worms[g].width))>=(character.x+hurt_deviation))&&(((worms[g].y+worms[g].height)<=(character.y+c_height))&&(worms[g].y+worms[g].height)>=character.y)))&&character_heart_bool===false){if(character_heart>0){delete heart[character_heart-1]}blow_music.play();character_heart--;character_heart_bool=true;reboot_heart_bool()}}}}function character_state_control(){if(gameState===GAME_4){character_state++;if(character_state>=character_images.length){character_state=0}}if(character_heart_bool){if(dontDraw===false){dontDraw=true}else{if(dontDraw===true){dontDraw=false}}}else{if(!character_heart_bool){dontDraw=false}}}function reboot_heart_bool(){var a=setTimeout("character_heart_bool=false",1000)}function getScore_bool(){var a=setTimeout("score_bool=false",1000)}function getScore(){if(score_bool===false){score++;score_bool=true;getScore_bool()}}function draw_background_onTheCanvas(){background.draw()}function draw_Q_onTheCanvas(){Q_frame.draw()}function draw_score_onTheCanvas(){context.font="20px Tahoma";context.fillStyle="#FFFFFF";context.textAlign="left";context.textBaseline="bottom";context.fillText("分數："+score,0,60)}function draw_score_onTheCanvas_gameover(){context.font="30px Tahoma";context.fillStyle="#000000";context.textAlign="center";context.textBaseline="bottom";context.fillText("分數："+score,500,185)}function draw_theBricks_onTheCanvas(){for(var a=0;a<brickXs.length;a++){background_bricks[a].draw()}for(var a=0;a<brickXs.length;a++){bricks[a].draw();bricks[a].x-=runSpeed;if(bricks[a].x<=-100){bricks[a].x=1000}}}function draw_theWorms_onTheCanvas(){for(var a=0;a<wormXs.length;a++){worms[a].draw();worms[a].x-=runSpeed;if(worms[a].x<=0){worms[a].x=8500}}}function draw_theHeart_onTheCanvas(){for(var a=0;a<character_heart;a++){heart[a].draw()}}function draw_theCharacter_onTheCanvas(){character.move();character.movement();character.newPos();if(!dontDraw){character.draw()}character.getHurt()}function draw_question_onTheCanvas(){context.font="20px Tahoma";context.fillStyle="#000000";context.textAlign="center";context.textBaseline="bottom";choose();context.fillText(questions_temp[id_question].question,500,75);context.font="20px Tahoma";context.fillStyle="#000000";context.textAlign="center";context.textBaseline="bottom";context.fillText(questions_temp[id_question].selection_1,330,175);context.font="20px Tahoma";context.fillStyle="#000000";context.textAlign="center";context.textBaseline="bottom";context.fillText(questions_temp[id_question].selection_2,670,175)}function choose(){if((rightPressed||leftPressed)&&choose_bool===false&&jumping===true){jump_music.play();id_question++;rightanswer=true;reboot_rightanswer();choose_bool=true;reboot_choose_bool();if(id_question===questions.length){questions_temp.sort(function(){return Math.random()>0.5?-1:1});id_question=0}}else{if(YourAnswer!=questions[id_question].answer&&YourAnswer!=0&&rightanswer===false){if(character_heart_bool===false){if(character_heart>0){delete heart[character_heart-1]}blow_music.play();character_heart--;character_heart_bool=true;reboot_heart_bool()}}}}function reboot_choose_bool(){var a=setTimeout("choose_bool=false",700)}function reboot_rightanswer(){var b=setTimeout("rightanswer=false",700)}function draw_MENU(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[0][gameState_menu_state].draw()}function draw_README(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[README].draw()}function draw_GAME_1(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[GAME_1].draw()}function draw_GAME_2(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[GAME_2].draw()}function draw_GAME_3(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[GAME_3].draw()}var gameStartTime_bool=true;var gameStartTime;var gameFinishTime;function draw_GAME_4(){if(gameStartTime_bool){$(document).ready(function(){var g=new Date();gameStartTime=g.getTime();var f={time:g.getTime()};var c="POST";var e="gameStart_time";console.log(f);$.ajax({type:"POST",url:e,data:f,dataType:"json",headers:{"X-CSRF-Token":$('meta[name="token"]').attr("content")},success:function(d){console.log(d)},error:function(d){console.log("Error:",d)}})});gameStartTime_bool=false}context.clearRect(0,0,canvas.width,canvas.height);runSpeedUp=true;draw_background_onTheCanvas();draw_Q_onTheCanvas();draw_score_onTheCanvas();draw_theBricks_onTheCanvas();draw_theWorms_onTheCanvas();draw_theHeart_onTheCanvas();draw_theCharacter_onTheCanvas();draw_question_onTheCanvas();if(character_heart<=0){var a=true;var b="{{ Auth::user()->name }}";runSpeed=0;character_heart_bool=true;if(a){$(document).ready(function(){var g=new Date();gameFinishTime=g.getTime();var f={name:b,score:score,time:g.getTime()};var c="POST";var e="/smallgame_post";console.log(f);$.ajax({type:"POST",url:e,data:f,dataType:"json",headers:{"X-CSRF-Token":$('meta[name="token"]').attr("content")},success:function(d){console.log(d)},error:function(d){console.log("Error:",d)}})});a=false}gameState=GAMEOVER}else{getScore()}}function drawGameOver(){context.clearRect(0,0,canvas.width,canvas.height);gameStateManager[5][gameState_over_state].draw();draw_score_onTheCanvas_gameover()}var gameover_music_bool=true;function draw(){if(gameState===MENU){draw_MENU()}else{if(gameState===README){draw_README()}else{if(gameState===GAME_1){draw_GAME_1()}else{if(gameState===GAME_2){draw_GAME_2()}else{if(gameState===GAME_3){draw_GAME_3()}else{if(gameState===GAME_4){draw_GAME_4();bgm_music.pause();game_4_music.play()}else{if(gameState===GAMEOVER){game_4_music.pause();if(gameover_music_bool){gameover_music.play();gameover_music_bool=false}drawGameOver()}}}}}}}requestAnimationFrame(draw)}function addRunSpeed(){if(gameState===GAME_4){runSpeed+=1.2;fallSpeed+=0.2;jumpStart-=2.5}}setInterval(character_state_control,50);setInterval(addRunSpeed,9000);draw();
</script>
@endsection
<!-- (2)小遊戲讓手機使用者也能玩  >> 難以做到,  
<!-- 防url改變js變數 -->
