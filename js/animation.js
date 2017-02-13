
/* =====================- ANIMACION INTRO TITULO -===================== */


var animacionA= document.getElementById("introA");
var animacionB=document.getElementById('introB');



var left = new TweenLite.to(animacionA, 2, {x:950, y:0, ease:Bounce.easeOut});

function onAnimationUpdate(event){
  console.log(left.ratio);
}

function onCompleteAnimation(){

  ;
};


var right = new TweenLite.to(animacionB, 2, {x:-650, y:0, ease:Bounce.easeOut});

function onAnimationUpdate(event){
  console.log(right.ratio);
}

function onCompleteAnimation(){

  ;
};


var agenda= document.getElementById("introC");
var animation = new TweenLite(agenda, 1.5, {skewX:"20deg",  ease:Power2.easeInOut, onUpdate:onAnimationUpdate, onComplete:onCompleteAnimation});

function onAnimationUpdate(event){
  console.log(animation.ratio);
}

function onCompleteAnimation(){


};

/* ==========================- BOTON REGISTRO -================== */

function show(){
  // alert("cheked the button - worked");
  document.getElementById("formularioRegistro").style.visibility= 'visible' ;
};

function D (){
  document.getElementById('formularioRegistro').style.visibility='hidden';

};


/* ========================- ANIMACION SCROLL DOWN ARROW -================= */
$(function() {
   $('.scroll-down').click (function() {
     $('html, body').animate({scrollTop: $('section.ok').offset().top }, 'slow');
     return false;
   });
 });
