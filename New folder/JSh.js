//scroll nav
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-120px";
  }
  prevScrollpos = currentScrollPos;
}

//search card
// let secondinp= document.getElementById('dplace');
// let card=document.querySelector('.box-container')
// secondinp.addEventListener('change',function(){
//   alert("enter");
//     card.classList.add('bigger-card');
// })




/*reg modal */

 
/*login dropdown */
// var sub= document.querySelector("#signIn");
// var drp= document.querySelector("#dropIt");
// var lgn= document.querySelector("#logIn");
// sub.addEventListener("click",()=>{
//     lgn.style.display="none";
//      drp.style.display="block";
// })

/*ticket print */

