$(document).ready(function(){var audio=document.getElementById("rs-off");audio.volume="0.5";$(".radiocontrols .ico-stop").click(function(){audio.pause();audio.currentTime=0;});$(".radiocontrols .ico-play").click(function(){audio.play();});var barra=document.getElementById("volumen");barra.addEventListener("change",function(ev){var v=document.getElementById("rs-off");v.volume=ev.target.value;mute.checked=false;},true);var oldvolume=1;});