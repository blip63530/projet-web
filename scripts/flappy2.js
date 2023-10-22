
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const img = new Image();
img.src = "https://i.ibb.co/Q9yv5Jk/flappy-bird-set.png";

// general settings
let gamePlaying = false;
const gravity = .5;
const speed = 6.2;
const size = [51, 36];
const jump = -11.5;
const cTenth = (canvas.width / 10);

let index = 0,
    bestScore = 0,
    flight,
    flyHeight,
    currentScore,
    pipe;

const getFPS = () =>
    new Promise(resolve =>
        requestAnimationFrame(t1 =>
            requestAnimationFrame(t2 => resolve(1000 / (t2 - t1)))
        )
    )
/*
if (getFPS()>30){
    speed=3.1;
}
else
    speed=6.2;
*/

// pipe settings
const pipeWidth = 78;
const pipeGap = 270;
const pipeLoc = () => (Math.random() * ((canvas.height - (pipeGap + pipeWidth)) - pipeWidth)) + pipeWidth;

//cookies score
function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++)
    {
        var c = ca[i].trim();
        if (c.indexOf(name)==0) return c.substring(name.length,c.length);
    }
    return "";
}

function setCookie(cname,cvalue,exdays)
{
    var d = new Date();
    d.setTime(d.getTime()+(exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
var savedscore = getCookie("highscore");
if(savedscore != "")
    bestScore = parseInt(savedscore);

//prevent space scroll
window.addEventListener('keydown', function(e) {
    if(e.keyCode == 32 && e.target == document.body) {
        e.preventDefault();
    }
});



const setup = () => {
    currentScore = 0;
    flight = jump;

    // set initial flyHeight (middle of screen - size of the bird)
    flyHeight = (canvas.height / 2) - (size[1] / 2);

    // setup first 3 pipes
    pipes = Array(3).fill().map((a, i) => [canvas.width + (i * (pipeGap + pipeWidth)), pipeLoc()]);
}

const render = () => {
    // make the pipe and bird moving
    index++;

    // ctx.clearRect(0, 0, canvas.width, canvas.height);

    // background first part
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height, -((index * (speed / 2)) % canvas.width) + canvas.width, 0, canvas.width, canvas.height);
    // background second part
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height, -(index * (speed / 2)) % canvas.width, 0, canvas.width, canvas.height);

    // pipe display
    if (gamePlaying){
        pipes.map(pipe => {
            // pipe moving
            pipe[0] -= speed;

            // top pipe
            ctx.drawImage(img, 432, 588 - pipe[1], pipeWidth, pipe[1], pipe[0], 0, pipeWidth, pipe[1]);
            // bottom pipe
            ctx.drawImage(img, 432 + pipeWidth, 108, pipeWidth, canvas.height - pipe[1] + pipeGap, pipe[0], pipe[1] + pipeGap, pipeWidth, canvas.height - pipe[1] + pipeGap);

            // give 1 point & create new pipe
            if(pipe[0] <= -pipeWidth){
                currentScore++;
                // check if it's the best score
                bestScore = Math.max(bestScore, currentScore);
                setCookie("highscore", bestScore, 999);
                //set high score in database
                jQuery.ajax({
                    type: "POST",
                    url: "./Controllers/Toolkit/ConnectionDB.php",
                    dataType: 'json',
                    data: {functionname: 'set_gamescore', arguments: [1,bestScore]},

                    success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            yourVariable = obj.result;
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
                });



                // remove & create new pipe
                pipes = [...pipes.slice(1), [pipes[pipes.length-1][0] + pipeGap + pipeWidth, pipeLoc()]];
                console.log(pipes);
            }

            // if hit the pipe, end
            if ([
                pipe[0] <= cTenth + size[0],
                pipe[0] + pipeWidth >= cTenth,
                pipe[1] > flyHeight || pipe[1] + pipeGap < flyHeight + size[1]
            ].every(elem => elem)) {
                gamePlaying = false;
                setup();
            }
        })
    }
    // draw bird
    if (gamePlaying) {
        ctx.drawImage(img, 432, Math.floor((index % 9) / 3) * size[1], ...size, cTenth, flyHeight, ...size);
        flight += gravity;
        flyHeight = Math.min(flyHeight + flight, canvas.height - size[1]);
    } else {
        ctx.drawImage(img, 432, Math.floor((index % 9) / 3) * size[1], ...size, ((canvas.width / 2) - size[0] / 2), flyHeight, ...size);
        flyHeight = (canvas.height / 2) - (size[1] / 2);
        // text accueil
        ctx.fillText(`Best score : ${bestScore}`, 85, 245);
        ctx.fillText('Click to play', 90, 535);
        ctx.font = "bold 30px courier";
    }

    document.getElementById('bestScore').innerHTML = `Best : ${bestScore}`;
    document.getElementById('currentScore').innerHTML = `Current : ${currentScore}`;

    // tell the browser to perform anim
    window.requestAnimationFrame(render);
}

// launch setup
setup();
img.onload = render;

// start game
document.addEventListener('click', () => gamePlaying = true);
document.addEventListener('space', () => gamePlaying = true);
window.onclick = () => flight = jump;
window.oninput = () => flight = jump;
/*window.onclick = () => { var data = { action: 'setscore', score: '1' };
$.ajax({
    url:"./views/flappy2.php",    //the page containing php script
    type: "post",    //request type,
    dataType: 'json',
    data: {registration: "success", name: "xyz", email: "abc@gmail.com"},
    success:function(result){
        console.log(result.abc);
    }
});

}; // Debug. */

window.onkeypress = () => flight = jump;

