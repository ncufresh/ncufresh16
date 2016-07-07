<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>小遊戲</title>
    <link rel="stylesheet" href="css/style.css" charset="utf-8"><!-- 連上css -->
    <style>
      *{ 
        padding: 0; margin: 0; 
      }
      canvas{ 
        background: #eee; display: block; margin: 0 auto; 
        margin-top:5%;
      }
    </style>
</head>
<body>

<canvas id="myCanvas" width="1000" height="500"></canvas>

<script>

var canvas, context,msg;
var gameState=0;
var gameState_menu;//選單頁面
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
var character_heart=3;
var character_heart_bool=false;
var c_x=24;
var c_y=350;
var c_height=82;
var c_width=71;
character= new player(c_width,c_height,"img/game/mainCharacter.png",c_x,c_y,"image");


var rightPressed=false;
var leftPressed=false;

var falling=false;
var jumping=false;
var fallSpeed=0.5;
var maxFallSpeed = 15;
var jumpStart=-20;

var brickXs = [];//the bricks' X 
var brickX_height=20;
var brickX_width=100;
for (var i = 0; i < 11; i++) {
    brickXs.push(i*brickX_width);
}
var bricks=[];
for(var i=0;i<brickXs.length;i++){
    bricks.push(new component(brickX_width,brickX_height,"img/game/land_tileset_2.png",brickXs[i],500-brickX_height,"image"));
}

var wormXs=[];//the worms' X
var worms=[];//the worms objects
var worms_height=20;
var worms_width=10;
for(var i=0 ; i<5 ; i++){
  wormXs.push(i*400);
}
for(var i=0 ; i<5 ; i++){
  worms.push(new component(worms_width,worms_height,"img/game/bugs.png",wormXs[i],500-brickX_height-worms_height,"image"));
}
var runSpeed=2.5;//跑速

var heart_width=20;
var heart_height=20;
var heartX=[];
var heart=[];
for(var i=0;i<character_heart;i++){
  heartX.push(i*heart_width);
}
for(var i=0;i<character_heart;i++){
  heart.push(new component(heart_width,heart_height,"img/game/heart.png",heartX[i],0,"image"));
}

var hurt_deviation=14;//讓角色比較不容易受傷，讓傷害偵測變窄
var score=0;//分數，以企畫的角度，等於秒數
var score_bool=false;
////////遊戲主體的變數 END



var gameStateManager= new Array();//gamestate的總管，所有葉面的陣列


const MENU=0;//選單頁面
const README=1;//說明頁面
const GAME_1=2;//第一個遊戲畫面
const GAME_2=3;//第二個遊戲畫面
const GAME_3=4;//第三個遊戲畫面
const GAME_4=5;//開始遊戲的畫面


gameState_menu=new component(1000,500,"img/game/gameState_menu.png",0,0,"image");//第一頁的背景
gameReadme=new component(1000,500,"img/game/gameReadme.png",0,0,"image");//說明頁面物件
gamePlay_1=new component(1000,500,"img/game/gamePlay_1.png",0,0,"image");
gamePlay_2=new component(1000,500,"img/game/gamePlay_2.png",0,0,"image");
gamePlay_3=new component(1000,500,"img/game/gamePlay_3.png",0,0,"image");

gameStateManager.push(gameState_menu);
gameStateManager.push(gameReadme);
gameStateManager.push(gamePlay_1);
gameStateManager.push(gamePlay_2);
gameStateManager.push(gamePlay_3);

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
        }
        else if(e.keyCode == 37) {
            leftPressed = true;
        }
}
function keyUpHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = false;
        }
        else if(e.keyCode == 37) {
            leftPressed = false;
        }
}
function mouseMoveHandler(event) {//不用實作，只要按鍵按下，就會自動執行
   msg = "Mouse position: " + (event.clientX) + "," + (event.clientY) + ";canvas position:" + (event.clientX-canvas.offsetLeft) +","+(event.clientY-canvas.offsetTop)+";heart"+character_heart+";"+score;
}
function mouseDownHandler(event){
   msg = canvas.offsetLeft  + " " + canvas.offsetTop + " " + gameState + " " + character_heart;
/////////the action of every listener
  //偵測按鈕的位置，該怎麼隨著gamestate改變而更動?
   if(event.clientX>(canvas.offsetLeft+btn_1_X) && event.clientX<(canvas.offsetLeft+btn_1_X+btn_1_width) &&   
    event.clientY>(canvas.offsetTop+btn_1_y) &&  event.clientY<(canvas.offsetTop+btn_1_y+btn_1_height) && gameState===MENU
    ){
      gameState++;
   }
   else if(event.clientX>(canvas.offsetLeft+btn_2_X) && event.clientX<(canvas.offsetLeft+btn_2_X+btn_2_width) &&   
    event.clientY>(canvas.offsetTop+btn_2_y) &&  event.clientY<(canvas.offsetTop+btn_2_y+btn_2_height) && gameState===README
    ){
      gameState=0;
   }
   else if(event.clientX>(canvas.offsetLeft+btn_3_X) && event.clientX<(canvas.offsetLeft+btn_3_X+btn_3_width) &&   
    event.clientY>(canvas.offsetTop+btn_3_y) &&  event.clientY<(canvas.offsetTop+btn_3_y+btn_3_height) && gameState===MENU
    ){
      gameState=GAME_1;
   }
   else if(event.clientX>(canvas.offsetLeft+775) && event.clientX<(canvas.offsetLeft+775+55) &&   
    event.clientY>(canvas.offsetTop+218) &&  event.clientY<(canvas.offsetTop+218+32) && gameState===GAME_1
    ){
      gameState=GAME_2;
   }
   else if(event.clientX>(canvas.offsetLeft+775) && event.clientX<(canvas.offsetLeft+775+55) &&   
    event.clientY>(canvas.offsetTop+218) &&  event.clientY<(canvas.offsetTop+218+32) && gameState===GAME_2
    ){
      gameState=GAME_3;
   }
   else if(event.clientX>(canvas.offsetLeft+775) && event.clientX<(canvas.offsetLeft+775+55) &&   
    event.clientY>(canvas.offsetTop+218) &&  event.clientY<(canvas.offsetTop+218+32) && gameState===GAME_3
    ){
      gameState=GAME_4;
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
function player(width, height, color, x, y, type) {//主角constructor
        this.type = type;
        if (type == "image") {
            this.image = new Image();
            this.image.src = color;//圖片的檔案路徑
        }
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
        this.draw = function(){
          context.drawImage(this.image, 
                    this.x, 
                    this.y,
                    this.width, this.height);
        }
        this.move = function(){
            if(rightPressed){
              jumping=true;
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
            if(this.y+this.height>500-20){
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
                    character_heart--;
                    character_heart_bool=true;
                    reboot_heart_bool();//讓角色有無敵時間
                }
            } 
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
      if(worms[i].x<=-100){
          worms[i].x=1000;
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
    character.draw();
    character.getHurt();//傷害偵測要在蟲蟲的位置更新後再開始
}

function draw_MENU(){
  context.clearRect(0, 0, canvas.width, canvas.height);
    gameState_menu.draw();


    btn_1(btn_1_X, btn_1_y, btn_1_width, btn_1_height);//跳轉到說明的按鈕
    btn_3(btn_3_X, btn_3_y, btn_3_width, btn_3_height);//跳轉到第一遊戲頁面的按鈕


    show(msg);
}
function draw_README(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[README].draw();
    btn_2(btn_2_X, btn_2_y, btn_2_width, btn_2_height);
    show(msg);
}
function draw_GAME_1(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_1].draw();
    show(msg);
}
function draw_GAME_2(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_2].draw();
    show(msg);
}
function draw_GAME_3(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_3].draw();
    show(msg);
}
function draw_GAME_4(){
    context.clearRect(0, 0, canvas.width, canvas.height);//清空版面

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
    
    
    if(!character_heart) {//陣亡，若要免除死亡功能，則將此區塊註解
      alert("GAME OVER");
      document.location.reload();// restarting the game by reloading the page.
    }
    else{
      getScore();//若沒死亡，則持續得分  
    }
    show(msg);
}

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
  } 
  requestAnimationFrame(draw);
}
draw();


//模組化
//得分部分要跟秒數同步
//
</script>


</body>
</html>