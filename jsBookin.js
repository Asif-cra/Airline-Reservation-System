//Baggage div
const bradio= document.querySelector("#baggageRadio");
const bform= document.querySelector(".baggage-form");
bradio.addEventListener("change",(e)=>{
    if(e.target.checked)
     bform.style.display="block";
})
