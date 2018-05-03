var modal_connexion = document.getElementById('divConnexionPopup');
var animatedElems = document.querySelectorAll('.animate');

var conn = document.getElementById("sub");
var conn2 = document.getElementById("psw");

conn.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("subConnection").click();
    }
});

conn2.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("subConnection").click();
    }
});


window.onclick = function (event) {
    if(event.target == modal_connexion){
        modal_connexion.style.display = "none";
        setAnimationBack();
    }
}

function displayPopup(){
    document.getElementById('divConnexionPopup').style.display='block';
    swapToSigninForm();
}

function preventAnimation(){
    for (var i = 0; i < animatedElems.length; i++){
        animatedElems[i].style.animation = "animatezoom 0.0s";
    }
}

function setAnimationBack() {
    for (var i = 0; i < animatedElems.length; i++){
        animatedElems[i].style.animation = "animatezoom 0.6s";
    }
}

function swapToLoginForm(){
    preventAnimation();
    document.getElementById('form-signin').style.display = "none";
    document.getElementById('form-login').style.display = "block";
}

function swapToSigninForm(){
    preventAnimation();
    document.getElementById('form-login').style.display = "none";
    document.getElementById('form-signin').style.display = "block";
}

function wrongPasswordStyle(){
    var pswInput = document.getElementById('psw');
    pswInput.style.backgroundColor = "red";
}

function wrongEmailStyle(){
    var emailInput = document.getElementById('email');
    emailInput.style.backgroundColor = "red";
}