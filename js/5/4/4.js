function drawToCanvas() {
    var canvas  = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    ctx.fillStyle="#000000";
    ctx.font="30px Arial";
    ctx.fillText("Canvas-harjotus: Ruotsin ja Guyanan liput",10,40);
    ctx.moveTo(0,50);  // from
	ctx.lineTo(600,50); // to
	ctx.stroke(); //line
	ctx.fillStyle="blue";
    ctx.fillRect(0,50,600,300);
    ctx.fillStyle="yellow";
    ctx.fillRect(150,50,100,100);
    ctx.fillRect(0,150,600,100);
    ctx.fillRect(150,250,100,100);
    ctx.fillStyle="#000000";
    ctx.moveTo(0,350);  // from
	ctx.lineTo(600,350); // to
	ctx.stroke(); //line
    ctx.moveTo(0,400);  // from
	ctx.lineTo(600,400); // to
	ctx.stroke(); //line
    ctx.fillStyle="#228B22";
    ctx.fillRect(0,400,600,300);
    //triangle
    ctx.fillStyle = "white";
    ctx.beginPath();
    ctx.moveTo(0,400);
    ctx.lineTo(600,550);
    ctx.lineTo(0,700);
    ctx.lineTo(0,400);
    ctx.closePath();
    ctx.fill();
    //triangle
    ctx.fillStyle = "#FFD700";
    ctx.beginPath();
    ctx.moveTo(0,410);
    ctx.lineTo(580,550);
    ctx.lineTo(0,690);
    ctx.lineTo(0,410);
    ctx.closePath();
    ctx.fill();
    //triangle
    ctx.fillStyle = "black";
    ctx.beginPath();
    ctx.moveTo(0,400);
    ctx.lineTo(300,550);
    ctx.lineTo(0,700);
    ctx.lineTo(0,400);
    ctx.closePath();
    ctx.fill();
    //triangle
    ctx.fillStyle = "#DC143C";
    ctx.beginPath();
    ctx.moveTo(0,410);
    ctx.lineTo(280,550);
    ctx.lineTo(0,690);
    ctx.lineTo(0,410);
    ctx.closePath();
    ctx.fill();
}