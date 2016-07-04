<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>小遊戲</title>
    <link rel="stylesheet" href="css/style.css" charset="utf-8"><!-- 連上css -->
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



var gameStateManager= new Array();//gamestate的總管，所有葉面的陣列

const MENU=0;//選單頁面
const README=1;//說明頁面
const GAME_1=2;//第一個遊戲畫面
const GAME_2=3;//第二個遊戲畫面
const GAME_3=4;//第三個遊戲畫面


gameState_menu=new component(1000,500,"pictures/gameState_menu.png",0,0,"image");//第一頁的背景
gameReadme=new component(1000,500,"pictures/gameReadme.png",0,0,"image");//說明頁面物件
gamePlay_1=new component(1000,500,"pictures/gamePlay_1.png",0,0,"image");
gamePlay_2=new component(1000,500,"pictures/gamePlay_2.png",0,0,"image");
gamePlay_3=new component(1000,500,"pictures/gamePlay_3.png",0,0,"image");
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
/////////

/////////the action of every listener
function mouseMoveHandler(event) {//不用實作，只要按鍵按下，就會自動執行
   msg = "Mouse position: " + (event.clientX) + "," + (event.clientY) + ";canvas position:" + (event.clientX-183) +","+(event.clientY-68);
}
function mouseDownHandler(event){
   msg = canvas.offsetLeft  + " " + canvas.offsetTop + " " + gameState;
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
}
///////////


function btnManager(gameState){//根據輸入的gameState不同，改變按鈕的位置



	return newGamestate;
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
function draw(){
	////////////////////////gameState manager////////////////////////
	if(gameState===MENU){
		context.clearRect(0, 0, canvas.width, canvas.height);
		gameStateManager[MENU].draw();


		btn_1(btn_1_X, btn_1_y, btn_1_width, btn_1_height);//跳轉到說明的按鈕
		btn_3(btn_3_X, btn_3_y, btn_3_width, btn_3_height);//跳轉到第一遊戲頁面的按鈕


		show(msg);
		
	}
	else if(gameState===README){
		context.clearRect(0, 0, canvas.width, canvas.height);
		gameStateManager[README].draw();
		btn_2(btn_2_X, btn_2_y, btn_2_width, btn_2_height);
		show(msg);
		
	}
	else if(gameState===GAME_1){
		context.clearRect(0, 0, canvas.width, canvas.height);
		gameStateManager[GAME_1].draw();
		show(msg);
		
	}
  else if(gameState===GAME_2){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_2].draw();
    show(msg);
  } 
  else if(gameState===GAME_3){
    context.clearRect(0, 0, canvas.width, canvas.height);
    gameStateManager[GAME_3].draw();
    show(msg);
  } 
  else if(gameState===GAME_4){//開始遊戲!
    context.clearRect(0, 0, canvas.width, canvas.height);
    
    show(msg);
  } 
  requestAnimationFrame(draw);
}
////////////////////////gameState manager  END////////////////////////
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
            this.x += this.speedX;
            this.y += this.speedY;        
        }
        this.draw = function(){
        	context.drawImage(this.image, 
                    this.x, 
                    this.y,
                    this.width, this.height);
        }
}

draw();

</script>

</body>
</html>