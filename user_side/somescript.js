// $(document).ready(function(){
//     $("a").on('click', function(event) {
  
//       if (this.hash !== "") {
//         event.preventDefault();
  
//         var hash = this.hash;
  
//         $('html, body').animate({
//           scrollTop: $(hash).offset().top
//         }, 1700, function(){

//           window.location.hash = hash;
//         });
//       }
//     });
//   });


// ==================================================================


firstname= document.getElementById("firstname");
lastname= document.getElementById("lastname");
fullnamemsg= document.getElementById("fullnamemsg");
const OnlyLetters = /^[A-Za-z]*$/;

firstname.addEventListener('input', () => {
  const firstname = firstname.value.trim();
  const lastname = lastname.value.trim();
  if(firstname.value.length < 3 ){
    fullnamemsg.innerHTML="invalid name" ;
    firstname.style.borderColor="red";
    fullnamemsg.style.color="red";
  }else{
    fullnamemsg.innerHTML="Valid name" ;
    firstname.style.borderColor="green";
    fullnamemsg.style.color="green";
  }

  if  (!firstname.value.match(OnlyLetters)){
    fullnamemsg.innerHTML="invalid name" ;
    firstname.style.borderColor="red";
    fullnamemsg.style.color="red";
  }
})

lastname.addEventListener('input', () => {
  const firstname = firstname.value.trim();
  const lastname = lastname.value.trim();
  if(lastname.value.length < 3 ){
    fullnamemsg.innerHTML="invalid name" ;
    lastname.style.borderColor="red";
    fullnamemsg.style.color="red";
  }else{
    fullnamemsg.innerHTML="Valid name" ;
    lastname.style.borderColor="green";
    fullnamemsg.style.color="green";
  }

  if  (!firstname.value.match(OnlyLetters)){
    fullnamemsg.innerHTML="invalid name" ;
    lastname.style.borderColor="red";
    fullnamemsg.style.color="red";
  }
})







// =================================================================

// password verificition
pass= document.getElementById("pwnd");
message= document.getElementById("messageee");
// strength= document.getElementById("strength");


pass.addEventListener('input', () => {
  // if (pass.value.length > 0){
  //   message.style.display="block";
  // }else if (pass.value.length <= 0) {
  //   message.style.display="none";
  // }
  if(pass.value.length < 4){
    message.innerHTML="Password is too weak " ;
    // strength.innerHTML="";
    pass.style.borderColor="red";
    message.style.color="red";
  }else if(pass.value.length > 4 && pass.value.length <= 8 ){
    message.innerHTML="Password is acceptable" ;
    // strength.innerHTML="";
    pass.style.borderColor="yellow";
    message.style.color="yellow";
  }else if (pass.value.length > 8){
    message.innerHTML="Password is strong" ;
    // strength.innerHTML="";
    pass.style.borderColor="green";
    message.style.color="green";
  }


// =============================================================
// confpwnd= document.getElementById("confpwnd");
// matchornot= document.getElementById("matchornot");

// matchornot.addEventListener('input', () => {
// if (confpwnd.value === pass.value ){
//   matchornot.innerHTML = "Passwords match successfully";
//   confpwnd.style.borderColor="green";
//   matchornot.style.color="red";
// }
// })



})