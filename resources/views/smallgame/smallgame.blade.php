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
function hide(){document.getElementById("myCanvas").style.display="none",document.getElementById("leaderboard").style.display="block"}function display(){document.getElementById("myCanvas").style.display="block",document.getElementById("leaderboard").style.display="none"}function keyDownHandler(b){39==b.keyCode?(rightPressed=!0,YourAnswer=2):37==b.keyCode&&(leftPressed=!0,YourAnswer=1)}function keyUpHandler(b){39==b.keyCode?(rightPressed=!1,YourAnswer=0):37==b.keyCode&&(leftPressed=!1,YourAnswer=0)}function mouseMoveHandler(d){var c=canvas.getBoundingClientRect();msg="Mouse position: "+d.clientX+","+d.clientY+";canvas position:"+(d.clientX-c.left)+","+(d.clientY-c.top)+";heart"+character_heart+";"+score,gameState===MENU?gameState_menu_state=d.clientX>c.left+254&&d.clientX<c.left+254+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77?1:d.clientX>c.left+436&&d.clientX<c.left+436+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77?2:d.clientX>c.left+637&&d.clientX<c.left+637+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77?3:0:gameState===GAMEOVER&&(gameState_over_state=d.clientX>c.left+441&&d.clientX<c.left+441+148&&d.clientY>c.top+275&&d.clientY<c.top+275+43?1:0)}function mouseDownHandler(d){var c=canvas.getBoundingClientRect();msg=c.left+" "+c.top+" "+gameState+" "+character_heart,gameState===MENU?d.clientX>c.left+254&&d.clientX<c.left+254+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77?gameState++:d.clientX>c.left+436&&d.clientX<c.left+436+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77?gameState=GAME_1:d.clientX>c.left+637&&d.clientX<c.left+637+133&&d.clientY>c.top+248&&d.clientY<c.top+248+77&&hide():gameState===README?d.clientX>c.left+736&&d.clientX<c.left+736+100&&d.clientY>c.top+424&&d.clientY<c.top+424+27&&(gameState=0):gameState===GAME_1?d.clientX>c.left+722&&d.clientX<c.left+722+58&&d.clientY>c.top+282&&d.clientY<c.top+282+31?gameState=GAME_2:d.clientX>c.left+731&&d.clientX<c.left+731+54&&d.clientY>c.top+117&&d.clientY<c.top+117+31&&(gameState=GAME_4):gameState===GAME_2?d.clientX>c.left+722&&d.clientX<c.left+722+58&&d.clientY>c.top+282&&d.clientY<c.top+282+31?gameState=GAME_3:d.clientX>c.left+731&&d.clientX<c.left+731+54&&d.clientY>c.top+117&&d.clientY<c.top+117+31&&(gameState=GAME_4):gameState===GAME_3?d.clientX>c.left+623&&d.clientX<c.left+623+156&&d.clientY>c.top+277&&d.clientY<c.top+277+40?gameState=GAME_4:d.clientX>c.left+214&&d.clientX<c.left+214+113&&d.clientY>c.top+336&&d.clientY<c.top+336+28&&(gameState=README):gameState===GAMEOVER&&d.clientX>c.left+441&&d.clientX<c.left+441+148&&d.clientY>c.top+275&&d.clientY<c.top+275+43&&document.location.reload()}function btn_1(f,e,h,g){context.beginPath(),context.lineWidth="6",context.strokeStyle="black",context.rect(f,e,h,g),context.stroke(),context.fillStyle="#000000",context.fillText("遊戲說明",f+35,e+g-15),context.closePath()}function btn_2(f,e,h,g){context.beginPath(),context.lineWidth="6",context.strokeStyle="black",context.rect(f,e,h,g),context.stroke(),context.fillStyle="#000000",context.fillText("返回主頁",f+35,e+g-15),context.closePath()}function btn_3(f,e,h,g){context.beginPath(),context.lineWidth="6",context.strokeStyle="black",context.rect(f,e,h,g),context.stroke(),context.fillStyle="#000000",context.fillText("開始遊戲！",f+35,e+g-15),context.closePath()}function show(b){context.font="20px Tahoma",context.fillStyle="#1569C7",context.textAlign="left",context.textBaseline="bottom",context.fillText(b,100,150)}function component(h,g,m,l,k,j){this.type=j,"image"==j&&(this.image=new Image,this.image.src=m),this.width=h,this.height=g,this.speedX=0,this.speedY=0,this.x=l,this.y=k,this.draw=function(){context.drawImage(this.image,this.x,this.y,this.width,this.height)}}function player_animation(h,g,m,l,k,j){this.type=j,this.images=m,this.width=h,this.height=g,this.dx=0,this.dy=0,this.x=l,this.y=k,this.update=function(){"image"==j?context.drawImage(this.image,this.x,this.y,this.width,this.height):(context.fillStyle=color,context.fillRect(this.x,this.y,this.width,this.height))},this.newPos=function(){this.x+=this.dx,this.y+=this.dy},this.draw=function(){context.drawImage(this.images[character_state],this.x,this.y,this.width,this.height)},this.move=function(){YourAnswer===questions_temp[id_question].answer&&(jumping=!0,rightanswer=!0)},this.movement=function(){jumping&&!falling&&(this.dy=jumpStart,falling=!0,jumping=!1),this.y+this.height<480&&(this.dy+=fallSpeed,this.dy>0&&(jumping=!1),this.dy>maxFallSpeed&&(this.dy=maxFallSpeed)),falling&&(this.dy+=fallSpeed,this.dy>0&&(jumping=!1),this.dy>maxFallSpeed&&(this.dy=maxFallSpeed)),this.y+this.height>480&&(this.dy=0,this.y=500-this.height-20,falling=!1),this.y<0&&(this.dy=0,this.y=0)},this.getHurt=function(){for(var b=0;b<worms.length;b++){(worms[b].x<=character.x+c_width-hurt_deviation&&worms[b].x>=character.x+hurt_deviation&&worms[b].y<=character.y+c_height&&worms[b].y>=character.y||worms[b].x+worms[b].width<=character.x+c_width-hurt_deviation&&worms[b].x+worms[b].width>=character.x+hurt_deviation&&worms[b].y<=character.y+c_height&&worms[b].y>=character.y||worms[b].x<=character.x+c_width-hurt_deviation&&worms[b].x>=character.x+hurt_deviation&&worms[b].y+worms[b].height<=character.y+c_height&&worms[b].y+worms[b].height>=character.y||worms[b].x+worms[b].width<=character.x+c_width-hurt_deviation&&worms[b].x+worms[b].width>=character.x+hurt_deviation&&worms[b].y+worms[b].height<=character.y+c_height&&worms[b].y+worms[b].height>=character.y)&&character_heart_bool===!1&&(character_heart>0&&delete heart[character_heart-1],blow_music.play(),character_heart--,character_heart_bool=!0,reboot_heart_bool())}}}function character_state_control(){gameState===GAME_4&&(character_state++,character_state>=character_images.length&&(character_state=0)),character_heart_bool?dontDraw===!1?dontDraw=!0:dontDraw===!0&&(dontDraw=!1):character_heart_bool||(dontDraw=!1)}function reboot_heart_bool(){setTimeout("character_heart_bool=false",1000)}function getScore_bool(){setTimeout("score_bool=false",1000)}function getScore(){score_bool===!1&&(score++,score_bool=!0,getScore_bool())}function draw_background_onTheCanvas(){background.draw()}function draw_Q_onTheCanvas(){Q_frame.draw()}function draw_score_onTheCanvas(){context.font="20px Tahoma",context.fillStyle="#FFFFFF",context.textAlign="left",context.textBaseline="bottom",context.fillText("分數："+score,0,60)}function draw_score_onTheCanvas_gameover(){context.font="30px Tahoma",context.fillStyle="#000000",context.textAlign="center",context.textBaseline="bottom",score=Math.round((gameFinishTime-gameStartTime)/1000),context.fillText("分數："+score,500,185)}function draw_theBricks_onTheCanvas(){for(var b=0;b<brickXs.length;b++){background_bricks[b].draw()}for(var b=0;b<brickXs.length;b++){bricks[b].draw(),bricks[b].x-=runSpeed,bricks[b].x<=-100&&(bricks[b].x=1000)}}function draw_theWorms_onTheCanvas(){for(var b=0;b<wormXs.length;b++){worms[b].draw(),worms[b].x-=runSpeed,worms[b].x<=0&&(worms[b].x=8500)}}function draw_theHeart_onTheCanvas(){for(var b=0;b<character_heart;b++){heart[b].draw()}}function draw_theCharacter_onTheCanvas(){character.move(),character.movement(),character.newPos(),dontDraw||character.draw(),character.getHurt()}function draw_question_onTheCanvas(){context.font="20px Tahoma",context.fillStyle="#000000",context.textAlign="center",context.textBaseline="bottom",choose(),context.fillText(questions_temp[id_question].question,500,75),context.font="20px Tahoma",context.fillStyle="#000000",context.textAlign="center",context.textBaseline="bottom",context.fillText(questions_temp[id_question].selection_1,330,175),context.font="20px Tahoma",context.fillStyle="#000000",context.textAlign="center",context.textBaseline="bottom",context.fillText(questions_temp[id_question].selection_2,670,175)}function choose(){(rightPressed||leftPressed)&&choose_bool===!1&&jumping===!0?(jump_music.play(),id_question++,rightanswer=!0,reboot_rightanswer(),choose_bool=!0,reboot_choose_bool(),id_question===questions.length&&(questions_temp.sort(function(){return Math.random()>0.5?-1:1}),id_question=0)):YourAnswer!=questions[id_question].answer&&0!=YourAnswer&&rightanswer===!1&&character_heart_bool===!1&&(character_heart>0&&delete heart[character_heart-1],blow_music.play(),character_heart--,character_heart_bool=!0,reboot_heart_bool())}function reboot_choose_bool(){setTimeout("choose_bool=false",700)}function reboot_rightanswer(){setTimeout("rightanswer=false",700)}function draw_MENU(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[0][gameState_menu_state].draw()}function draw_README(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[README].draw()}function draw_GAME_1(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[GAME_1].draw()}function draw_GAME_2(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[GAME_2].draw()}function draw_GAME_3(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[GAME_3].draw()}function draw_GAME_4(){if(gameStartTime_bool&&($(document).ready(function(){var f=new Date;gameStartTime=f.getTime();var e={time:f.getTime()},g="gameStart_time";console.log(e),$.ajax({type:"POST",url:g,data:e,dataType:"json",headers:{"X-CSRF-Token":$('meta[name="token"]').attr("content")},success:function(b){console.log(b)},error:function(b){console.log("Error:",b)}})}),gameStartTime_bool=!1),context.clearRect(0,0,canvas.width,canvas.height),runSpeedUp=!0,draw_background_onTheCanvas(),draw_Q_onTheCanvas(),draw_score_onTheCanvas(),draw_theBricks_onTheCanvas(),draw_theWorms_onTheCanvas(),draw_theHeart_onTheCanvas(),draw_theCharacter_onTheCanvas(),draw_question_onTheCanvas(),character_heart<=0){var d=!0,c="{{ Auth::user()->name }}";runSpeed=0,character_heart_bool=!0,d&&($(document).ready(function(){var b=new Date;gameFinishTime=b.getTime();var g={name:c,score:score,time:b.getTime()},f="/smallgame_post";console.log(g),$.ajax({type:"POST",url:f,data:g,dataType:"json",headers:{"X-CSRF-Token":$('meta[name="token"]').attr("content")},success:function(e){console.log(e)},error:function(e){console.log("Error:",e)}})}),d=!1),gameState=GAMEOVER}else{getScore()}}function drawGameOver(){context.clearRect(0,0,canvas.width,canvas.height),gameStateManager[5][gameState_over_state].draw(),draw_score_onTheCanvas_gameover()}function draw(){gameState===MENU?draw_MENU():gameState===README?draw_README():gameState===GAME_1?draw_GAME_1():gameState===GAME_2?draw_GAME_2():gameState===GAME_3?draw_GAME_3():gameState===GAME_4?(draw_GAME_4(),bgm_music.pause(),game_4_music.play()):gameState===GAMEOVER&&(game_4_music.pause(),gameover_music_bool&&(gameover_music.play(),gameover_music_bool=!1),drawGameOver()),requestAnimationFrame(draw)}function addRunSpeed(){gameState===GAME_4&&(runSpeed+=1.2,fallSpeed+=0.2,jumpStart-=2.5)}var bgm_music=document.getElementById("bgm"),jump_music=document.getElementById("jump"),gameover_music=document.getElementById("gameover"),blow_music=document.getElementById("Blow1"),game_4_music=document.getElementById("game_4");bgm_music.play();var score_records=[];$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}});var b="/getScores";$.get(b,function(c){console.log(c),score_records=c})});var questions=[],questions_temp=[];$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}});var b="/smallgame_get";$.get(b+"/1",function(c){console.log(c),questions=c,questions_temp=questions,questions_temp.sort(function(){return Math.random()>0.5?-1:1})})});var question,id_question=0,choose_bool=!1,YourAnswer=0,rightanswer=!1,canvas,context,msg,gameState=0,gameState_menu=new Array,gameState_menu_state=0,gameState_over_state=0,gameReadme,gamePlay_1,gamePlay_2,gamePlay_3,btn_1_X=230,btn_1_y=240,btn_1_width=150,btn_1_height=50,btn_2_X=80,btn_2_y=370,btn_2_width=150,btn_2_height=50,btn_3_X=620,btn_3_y=240,btn_3_width=150,btn_3_height=50,character,character_heart=3,character_heart_bool=!1,c_x=24,c_y=350,c_height=160,c_width=145,character_images=[],character_image,character_state=0,character_animation;character_image=new Image,character_image.src="/img/game/bird_01.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_02.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_03.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_04.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_05.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_06.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_07.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_08.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_09.png",character_images.push(character_image),character_image=new Image,character_image.src="/img/game/bird_10.png",character_images.push(character_image),character=new player_animation(c_width,c_height,character_images,c_x,c_y,"image");for(var dontDraw=!1,rightPressed=!1,leftPressed=!1,falling=!1,jumping=!1,fallSpeed=0.7,maxFallSpeed=25,jumpStart=-30,background=new component(1000,500,"/img/game/BG_sky.jpg",0,0,"image"),Q_frame=new component(690,176,"/img/game/Q.png",150,20,"image"),brickXs=[],brickX_height=60,brickX_width=100,i=0;i<12;i++){brickXs.push(i*brickX_width-100)}for(var bricks=[],i=0;i<brickXs.length;i++){bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"))}for(var background_bricks=[],i=0;i<brickXs.length;i++){background_bricks.push(new component(brickX_width,brickX_height,"/img/game/floor.png",brickXs[i],500-brickX_height,"image"))}for(var wormXs=[],worms=[],worms_height=50,worms_width=36,i=0;i<5;i++){wormXs.push(1700*i)}for(var i=0;i<5;i++){worms.push(new component(worms_width,worms_height,"/img/game/worm.png",wormXs[i],480-worms_height,"image"))}for(var runSpeed=5,runSpeedUp=!1,heart_width=40,heart_height=40,heartX=[],heart=[],i=0;i<character_heart;i++){heartX.push(i*heart_width+10*i)}for(var i=0;i<character_heart;i++){heart.push(new component(heart_width,heart_height,"/img/game/heart.png",heartX[i],0,"image"))}var hurt_deviation=50,hurt_deviation_height,score=0,score_bool=!1,gameStateManager=new Array;gameStateManager[0]=new Array,gameStateManager[5]=new Array;var gamePlay_over=new Array;const MENU=0,README=1,GAME_1=2,GAME_2=3,GAME_3=4,GAME_4=5,GAMEOVER=6;gameState_menu[0]=new component(1000,500,"/img/game/Main.jpg",0,0,"image"),gameState_menu[1]=new component(1000,500,"/img/game/Main_1.jpg",0,0,"image"),gameState_menu[2]=new component(1000,500,"/img/game/Main_2.jpg",0,0,"image"),gameState_menu[3]=new component(1000,500,"/img/game/Main_3.jpg",0,0,"image"),gameStateManager[0][0]=gameState_menu[0],gameStateManager[0][1]=gameState_menu[1],gameStateManager[0][2]=gameState_menu[2],gameStateManager[0][3]=gameState_menu[3],gameReadme=new component(1000,500,"/img/game/Rules.jpg",0,0,"image"),gamePlay_1=new component(1000,500,"/img/game/story_1.jpg",0,0,"image"),gamePlay_2=new component(1000,500,"/img/game/story_2.jpg",0,0,"image"),gamePlay_3=new component(1000,500,"/img/game/story_3.jpg",0,0,"image"),gamePlay_over[0]=new component(1000,500,"/img/game/gameover_1.jpg",0,0,"image"),gamePlay_over[1]=new component(1000,500,"/img/game/gameover_2.jpg",0,0,"image"),gameStateManager[1]=gameReadme,gameStateManager[2]=gamePlay_1,gameStateManager[3]=gamePlay_2,gameStateManager[4]=gamePlay_3,gameStateManager[5][0]=gamePlay_over[0],gameStateManager[5][1]=gamePlay_over[1],canvas=document.getElementById("myCanvas"),context=canvas.getContext("2d"),canvas.addEventListener("mousemove",mouseMoveHandler,!1),canvas.addEventListener("mousedown",mouseDownHandler,!1),document.addEventListener("keydown",keyDownHandler,!1),document.addEventListener("keyup",keyUpHandler,!1);var gameStartTime_bool=!0,gameStartTime,gameFinishTime,gameover_music_bool=!0;setInterval(character_state_control,50),setInterval(addRunSpeed,9000),draw();
</script>
@endsection
<!-- (2)小遊戲讓手機使用者也能玩  >> 難以做到,  
<!-- 防url改變js變數 -->
