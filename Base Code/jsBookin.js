//Baggage div
const bradio= document.querySelector("#baggageRadio");
const bform= document.querySelector(".baggage-form");
const bsub= document.querySelector("#bookSubmit");
bradio.addEventListener("change",(e)=>{
    if(e.target.checked){
     bform.style.display="block";
     bsub.style.display="none";
    
    }
})
