
          
let  slideNavWidth = document.querySelector('#containerN').getBoundingClientRect().right;
var navCon= document.querySelectorAll('#containerN > li');

 
/*for(let i=navCon.length-1 ;i>=0;i--){
     if (slideNavWidth < navCon[i].getBoundingClientRect().right){
         navCon[i].style.color='green';
 }
 

 }
 window.onresize = function(){
     let  slideNavWidth = document.querySelector('#containerN').getBoundingClientRect().right;
var navCon= document.querySelectorAll('#containerN > li');

 
for(let i=navCon.length-1 ;i>=0;i--){
     if (slideNavWidth < navCon[i].getBoundingClientRect().right){
    navCon[i].style.color='green';
 }else{
    if(navCon[i].style.color=='green') {
     navCon[i].style.color='';

    };
 }

 }
 }*/

function myFunction(e) {
let x = e.clientX;
document.querySelector('#containerN').scrollBy(20, 0);

}

function clearCoor(e){
var x = e.clientX;
}

function myFunctionRev(e) {
var x = e.clientX;
let i=-5;
   document.querySelector('#containerN').scrollBy(-20, 0);

}


