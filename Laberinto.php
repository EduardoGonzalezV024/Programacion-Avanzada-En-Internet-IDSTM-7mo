
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Canvas
    </title>
    <style type="text/css">
        body{
            background-image: url('img/castle.jpg');
        } 

        <audio src="img/fondo.mp3" autoplay="true" loop="100" volume="80">

        canvas{
            background-color: "AntiqueWhite";
        }
    </style>
    <img id="imagen" src="icon-game.png" style="display:none">
</head>
<body>
    <canvas id="mycanvas" width="700" height="650">
        Mensaje
    </canvas>

    <script type="text/javascript">

        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');
        var press = false;
        var player_1 = null;
        var player_2 = null;
        var direction = 'none';
        var score = 0;
        var speed = 1;
        var pause = false;
        var imgp1 = new Image();
        var imgp2 = new Image();
        var background = new Image();

        imgp1.src = "img/principe.jpg";
        imgp2.src = "img/princesa.jpg";
        background.src = "img/floor.jpg";

        

        var pared = [[new Cuadro(30, 0, 3, 130, "black")], [new Cuadro(90, 0, 3, 65, "black")],
        [new Cuadro(329, 0, 3, 65, "black")], [new Cuadro(60, 31, 30, 3, "black")],
        [new Cuadro(0, 161, 120, 3, "black")], [new Cuadro(0, 291, 60, 3, "black")],
        [new Cuadro(30, 388, 150, 3, "black")], [new Cuadro(0, 518, 60, 3, "black")],
        [new Cuadro(30, 128, 30, 3, "black")], [new Cuadro(30, 193, 30, 3, "black")],
        [new Cuadro(30, 323, 60, 3, "black")], [new Cuadro(30, 421, 60, 3, "black")],
        [new Cuadro(30, 453, 120, 3, "black")], [new Cuadro(30, 486, 60, 3, "black")],
        [new Cuadro(30, 616, 90, 3, "black")], [new Cuadro(60, 96, 120, 3, "black")],
        [new Cuadro(60, 258, 60, 3, "black")], [new Cuadro(60, 551, 90, 3, "black")],
        [new Cuadro(90, 128, 60, 3, "black")], [new Cuadro(90, 193, 30, 3, "black")],
        [new Cuadro(90, 226, 60, 3, "black")], [new Cuadro(90, 356, 30, 3, "black")],
        [new Cuadro(120, 291, 120, 3, "black")], [new Cuadro(120, 323, 90, 3, "black")],
        [new Cuadro(120, 518, 60, 3, "black")], [new Cuadro(30, 583, 60, 3, "black")],
        [new Cuadro(120, 583, 30, 3, "black")], [new Cuadro(150, 31, 150, 3, "black")],
        [new Cuadro(150, 161, 60, 3, "black")], [new Cuadro(150, 193, 120, 3, "black")],
        [new Cuadro(150, 258, 30, 3, "black")], [new Cuadro(150, 486, 60, 3, "black")],
        [new Cuadro(150, 616, 30, 3, "black")], [new Cuadro(180, 226, 60, 3, "black")],
        [new Cuadro(180, 356, 60, 3, "black")], [new Cuadro(180, 551, 30, 3, "black")],
        [new Cuadro(210, 128, 30, 3, "black")], [new Cuadro(210, 453, 30, 3, "black")],
        [new Cuadro(210, 518, 60, 3, "black")], [new Cuadro(210, 583, 90, 3, "black")],
        [new Cuadro(210, 616, 90, 3, "black")], [new Cuadro(240, 63, 30, 3, "black")],
        [new Cuadro(240, 161, 30, 3, "black")], [new Cuadro(240, 258, 90, 3, "black")],
        [new Cuadro(240, 323, 30, 3, "black")], [new Cuadro(270, 128, 90, 3, "black")],
        [new Cuadro(270, 226, 90, 3, "black")], [new Cuadro(270, 291, 30, 3, "black")],
        [new Cuadro(270, 356, 120, 3, "black")], [new Cuadro(270, 453, 30, 3, "black")],
        [new Cuadro(300, 63, 30, 3, "black")], [new Cuadro(300, 96, 30, 3, "black")],
        [new Cuadro(300, 161, 30, 3, "black")], [new Cuadro(300, 388, 60, 3, "black")],
        [new Cuadro(300, 421, 30, 3, "black")], [new Cuadro(300, 551, 60, 3, "black")],
        [new Cuadro(300, 486, 30, 3, "black")], [new Cuadro(330, 31, 90, 3, "black")],
        [new Cuadro(330, 291, 90, 3, "black")], [new Cuadro(330, 323, 30, 3, "black")],
        [new Cuadro(330, 616, 60, 3, "black")], [new Cuadro(360, 63, 30, 3, "black")],
        [new Cuadro(360, 161, 30, 3, "black")], [new Cuadro(360, 421, 60, 3, "black")],
        [new Cuadro(360, 583, 60, 3, "black")], [new Cuadro(390, 96, 30, 3, "black")],
        [new Cuadro(390, 193, 30, 3, "black")], [new Cuadro(390, 323, 60, 3, "black")],
        [new Cuadro(390, 388, 120, 3, "black")], [new Cuadro(390, 518, 60, 3, "black")],
        [new Cuadro(420, 63, 30, 3, "black")], [new Cuadro(420, 128, 60, 3, "black")],
        [new Cuadro(420, 258, 30, 3, "black")], [new Cuadro(448, 291, 3, 66, "black")],
        [new Cuadro(450, 193, 120, 3, "black")], [new Cuadro(450, 291, 30, 3, "black")],
        [new Cuadro(450, 356, 30, 3, "black")], [new Cuadro(450, 486, 60, 3, "black")],
        [new Cuadro(450, 551, 30, 3, "black")], [new Cuadro(480, 31, 90, 3, "black")],
        [new Cuadro(480, 96, 30, 3, "black")], [new Cuadro(480, 161, 60, 3, "black")],
        [new Cuadro(480, 323, 90, 3, "black")], [new Cuadro(480, 421, 60, 3, "black")],
        [new Cuadro(480, 453, 30, 3, "black")], [new Cuadro(480, 583, 30, 3, "black")],
        [new Cuadro(480, 616, 30, 3, "black")], [new Cuadro(510, 63, 60, 3, "black")],
        [new Cuadro(510, 128, 60, 3, "black")], [new Cuadro(510, 226, 30, 3, "black")],
        [new Cuadro(510, 258, 60, 3, "black")], [new Cuadro(510, 518, 30, 3, "black")],
        [new Cuadro(510, 551, 60, 3, "black")], [new Cuadro(540, 96, 60, 3, "black")],
        [new Cuadro(540, 291, 60, 3, "black")], [new Cuadro(540, 453, 60, 3, "black")],
        [new Cuadro(540, 486, 30, 3, "black")], [new Cuadro(540, 583, 30, 3, "black")],
        [new Cuadro(570, 518, 30, 3, "black")],
        [new Cuadro(120, 31, 3, 65, "black")], [new Cuadro(150, 31, 3, 33, "black")],
        [new Cuadro(210, 31, 3, 133, "black")], [new Cuadro(270, 31, 3, 99, "black")],
        [new Cuadro(419, 31, 3, 33, "black")], [new Cuadro(448, 31, 3, 99, "black")],
        [new Cuadro(480, 31, 3, 65, "black")], [new Cuadro(567, 31, 3, 33, "black")],
        [new Cuadro(298, 63, 3, 36, "black")], [new Cuadro(360, 63, 3, 68, "black")],
        [new Cuadro(388, 63, 3, 101, "black")], [new Cuadro(238, 97, 3, 33, "black")],
        [new Cuadro(58, 65, 3, 66, "black")], [new Cuadro(178, 65, 3, 66, "black")],
        [new Cuadro(508, 97, 3, 33, "black")], [new Cuadro(88, 129, 3, 33, "black")],
        [new Cuadro(148, 129, 3, 35, "black")], [new Cuadro(298, 129, 3, 65, "black")],
        [new Cuadro(418, 129, 3, 97, "black")], [new Cuadro(478, 129, 3, 35, "black")],
        [new Cuadro(567, 129, 3, 129, "black")], [new Cuadro(567, 323, 3, 99, "black")],
        [new Cuadro(238, 161, 3, 33, "black")], [new Cuadro(448, 161, 3, 33, "black")],
        [new Cuadro(358, 161, 3, 99, "black")], [new Cuadro(30, 193, 3, 66, "black")],
        [new Cuadro(58, 193, 3, 66, "black")], [new Cuadro(88, 193, 3, 35, "black")],
        [new Cuadro(148, 193, 3, 66, "black")], [new Cuadro(268, 193, 3, 35, "black")],
        [new Cuadro(328, 193, 3, 35, "black")], [new Cuadro(388, 193, 3, 99, "black")],
        [new Cuadro(208, 226, 3, 66, "black")], [new Cuadro(238, 226, 3, 35, "black")],
        [new Cuadro(448, 226, 3, 35, "black")], [new Cuadro(508, 226, 3, 163, "black")],
        [new Cuadro(88, 258, 3, 99, "black")], [new Cuadro(118, 258, 3, 35, "black")],
        [new Cuadro(328, 258, 3, 66, "black")], [new Cuadro(418, 258, 3, 35, "black")],
        [new Cuadro(238, 291, 3, 66, "black")], [new Cuadro(268, 291, 3, 35, "black")],
        [new Cuadro(30, 323, 3, 35, "black")], [new Cuadro(148, 323, 3, 66, "black")],
        [new Cuadro(298, 324, 3, 35, "black")], [new Cuadro(388, 323, 3, 35, "black")],
        [new Cuadro(58, 356, 3, 35, "black")], [new Cuadro(208, 356, 3, 99, "black")],
        [new Cuadro(268, 356, 3, 195, "black")], [new Cuadro(208, 356, 3, 99, "black")],
        [new Cuadro(418, 356, 3, 35, "black")], [new Cuadro(538, 356, 3, 163, "black")],
        [new Cuadro(118, 388, 3, 35, "black")], [new Cuadro(178, 388, 3, 99, "black")],
        [new Cuadro(238, 388, 3, 99, "black")], [new Cuadro(298, 388, 3, 35, "black")],
        [new Cuadro(358, 388, 3, 163, "black")], [new Cuadro(448, 388, 3, 99, "black")],
        [new Cuadro(30, 421, 3, 35, "black")], [new Cuadro(148, 421, 3, 35, "black")],
        [new Cuadro(328, 421, 3, 35, "black")], [new Cuadro(418, 421, 3, 66, "black")],
        [new Cuadro(478, 421, 3, 35, "black")], [new Cuadro(118, 453, 3, 66, "black")],
        [new Cuadro(298, 453, 3, 35, "black")], [new Cuadro(388, 453, 3, 129, "black")],
        [new Cuadro(88, 486, 3, 66, "black")], [new Cuadro(208, 486, 3, 66, "black")],
        [new Cuadro(328, 486, 3, 35, "black")], [new Cuadro(478, 486, 3, 66, "black")],
        [new Cuadro(30, 518, 3, 66, "black")], [new Cuadro(178, 518, 3, 99, "black")],
        [new Cuadro(298, 518, 3, 66, "black")], [new Cuadro(418, 518, 3, 35, "black")],
        [new Cuadro(508, 518, 3, 66, "black")], [new Cuadro(148, 551, 3, 35, "black")],
        [new Cuadro(238, 551, 3, 35, "black")], [new Cuadro(328, 551, 3, 66, "black")],
        [new Cuadro(448, 551, 3, 67, "black")], [new Cuadro(118, 583, 3, 66, "black")],
        [new Cuadro(208, 583, 3, 35, "black")], [new Cuadro(418, 583, 3, 35, "black")],
        [new Cuadro(478, 583, 3, 35, "black")], [new Cuadro(538, 583, 3, 66, "black")],
        [new Cuadro(567, 583, 3, 35, "black")], [new Cuadro(388, 616, 3, 35, "black")],
        [new Cuadro(478, 193, 3, 99, "black")],
        [new Cuadro(30,0, 570, 3, "black")], [new Cuadro(600, 0, 3, 615, "black")],
        [new Cuadro(0, 647, 570, 3, "black")], [new Cuadro(0, 0, 3, 650, "black")]
        ];

        var no_paredes = pared.length;

        function run()
        {
            
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');

            player_1 = new Cuadro(570, 615, 32, 32, "red");
            player_2 = new Cuadro(7, 3, 18, 20, "blue");

            

            paint();
        }

        function paint(){

            window.requestAnimationFrame(paint);

            ctx.drawImage(background,0,0);   

            //player 1
            player_1.pintarimg(imgp1);

            //player 2
            player_2.pintarimg(imgp2);

            for(var i = 0; i < no_paredes; i++){
                pared[i][0].pintar(ctx);
            }

            if(pause == true)
            {
                ctx.fillStyle = "rgba(100, 100, 100, 0.5)";
                ctx.fillRect(0,0, 600, 650);

                ctx.font = "30px Arial";
                ctx.fillStyle = "white";
                ctx.fillText("P A U S E", 180, 230);

            }else{
                update();
            }
            

        }

        function update()
        {
            if (direction == 'up'){
                player_2.y-=speed;
                if (player_2.y<0){
                    player_2.y = 650;
                }
            }
            if (direction == 'down'){
                player_2.y+=speed;
                if (player_2.y>650){
                    player_2.y = 0;
                }
            }
            if (direction == 'left'){
                player_2.x-=speed;
                if (player_2.x<0){
                    player_2.x = 600;
                }
            }
            if (direction == 'right'){
                player_2.x+=speed;
                if (player_2.x>600){
                    player_2.x = 0;
                }
            }    

            if (player_1.se_tocan(player_2)){
                ctx.fillStyle = "rgba(200, 200, 200, 0.5)";
                ctx.fillRect(0,0, 600, 650);

                ctx.font = "35px Arial";
                ctx.fillStyle = "white";
                ctx.fillText("G A N A S T E", 180, 280);
            }

            pared_tocar(no_paredes);
        }
        
        function pared_tocar(x)
        {
            for(var i = 0; i < x; i++){

                if(pared[i][0].se_tocan(player_2)){
                    if(direction == 'up'){
                        player_2.y += speed;
                    }

                    if(direction == 'down'){
                        player_2.y -= speed;
                    }

                    if(direction == 'left'){
                        player_2.x += speed;
                    }

                    if(direction == 'right'){
                        player_2.x -= speed;
                    }

                    if(direction == 'none'){
                        player_2.x = 0;
                    }
                }
            }
        }

        function Cuadro(x,y,w,h,c)
        {
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;
            this.c = c;

            this.pintar = function(ctx){
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
                ctx.strokeRect(this.x, this.y, this.w, this.h);
            }

            this.pintarimg = function(img){
                ctx.drawImage(img, this.x, this.y);
            }

            this.se_tocan = function (target) { 
                if(this.x < target.x + target.w && this.x + this.w > target.x && 
                   this.y < target.y + target.h && this.y + this.h > target.y){
                    return true;    
                }else{
                    return false;
                }
            }

            this.borrar = function (){
                this.x = Math.floor(Math.random() * (600 - 0) + 1);
                this.y = Math.floor(Math.random() * (650 - 0) + 1);
            }
        }

        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function (callback) {
                window.setTimeout(callback, 17);
        }

        }());

        window.addEventListener('load',run,false);

        document.addEventListener('keydown', function(e){
            console.log(e);

            if (e.key == "ArrowUp"){
                direction = 'up';
            }
            if (e.key == "ArrowDown"){
                direction = 'down';
            }
            if (e.key == "ArrowLeft"){
                direction = 'left';
            }
            if (e.key == "ArrowRight"){
                direction = 'right';
            }    

            if (e.key == " "){
                if(pause == true){ 
                    pause = false;
                    console.log("aaaa");
                }else{
                    pause = true;
                }
            }             
        })

        document.addEventListener('keyup', function(e){
            direction = 'none';
        })

    </script>
</body>
</html>