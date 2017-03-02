
/* =====================- ANIMACION INTRO TITULO -===================== */


var animacionA= document.getElementById("introA");
var animacionB=document.getElementById('introB');
var agenda= document.getElementById("introC");


var left = new TweenLite.to(animacionA, 1.50 , {x:1100, y:200, ease:Bounce.easeOut});

function onAnimationUpdate(event){
  console.log(left.ratio);
}

function onCompleteAnimation(){

  ;
};


var right = new TweenLite.to(animacionB, 1.50  , {x:-1100, y:200, ease:Bounce.easeOut});

function onAnimationUpdate(event){
  console.log(right.ratio);
}

function onCompleteAnimation(){

  ;
};



var animation = new TweenLite(agenda, 1.5, {skewX:"20deg",  ease:Power2.easeInOut, onUpdate:onAnimationUpdate, onComplete:onCompleteAnimation});

function onAnimationUpdate(event){
  console.log(animation.ratio);
}

function onCompleteAnimation(){


};

/* ===================== MAPA ================== */

// When the window has finished loading create our google map below
