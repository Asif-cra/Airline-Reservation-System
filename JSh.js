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
let secondinp= document.getElementById('dplace');
let card=document.querySelector('.box-container')
secondinp.addEventListener('keyup',function(){
    card.classList.add('bigger-card');
})

document.getElementById("cardSubmit").onclick=function(){
    // let originlPlace=document.getElementById("oplace").value;
    // let destplace=document.getElementById("dplace").value;
    // console.log(originlPlace);
    // document.getElementById("show").innerHTML=originlPlace;
     location.href="Booking.html";
};



/*login dropdown */
var sub= document.querySelector("#signIn");
var drp= document.querySelector("#dropIt");
var lgn= document.querySelector("#logIn");
sub.addEventListener("click",()=>{
    lgn.style.display="none";
     drp.style.display="block";
})

/*ticket print */
function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}
