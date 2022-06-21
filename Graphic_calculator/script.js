let canvas
let ctx
let pixSize = 30

function setup(){
  canvas = document.getElementById('graph')
  ctx = canvas.getContext('2d')

  ctx.translate(canvas.width/2,canvas.height/2)

  drawAxis()
  draw_graph((x)=>x)
}

function drawAxis(){
  ctx.lineWidth = 3

  ctx.beginPath();

  ctx.moveTo(0, -canvas.height/2);   
  ctx.lineTo(0, canvas.height/2); 

  ctx.stroke();

  ctx.beginPath();

  ctx.moveTo(-canvas.width/2, 0);   
  ctx.lineTo(canvas.width/2, 0); 

  ctx.stroke();
}


function draw_graph(f){
  ctx.lineWidth = 3
  ctx.beginPath();
  
  let x1 = -canvas.width/2
  let x = x1/pixSize
  let y = -eval(f)*pixSize

  ctx.moveTo(x1,y)

  while(x1<canvas.width/2){
    x1+=1
    x = x1/pixSize
    y = -eval(f)*pixSize
    ctx.lineTo(x1,y)
  }
  ctx.stroke()
}


function plot(){
  let func = document.getElementById("func").value

  ctx.clearRect(-canvas.width/2,-canvas.height/2,canvas.width,canvas.height)
  drawAxis()
  draw_graph(func)
}