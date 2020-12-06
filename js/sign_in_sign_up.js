let connectLink = document.getElementById("showSignIn");
let  subscribeLink= document.getElementById("showSignUp");

let connect = document.getElementById("connectForm");
let subscribe = document.getElementById("subscribeForm");

function showConnectForm(){
	event.preventDefault();
  if(getComputedStyle(connect).display == "none"){
  	subscribe.style.display ="none";
    connect.style.display = "block";
  } 
};

function showSubscribeForm(){
	event.preventDefault();
  if(getComputedStyle(subscribe).display == "none"){
  	connect.style.display ="none";
    subscribe.style.display = "block";
  } 
};

connectLink.onclick = showConnectForm;
subscribeLink.onclick = showSubscribeForm;

