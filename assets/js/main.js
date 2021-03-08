window.onscroll = function() {scrollFunction()};
function scrollFunction() {

    if(170<document.body.scrollTop||150<document.documentElement.scrollTop){
        document.querySelector(".menu-bg").style.backgroundColor="#000";
        document.querySelector(".menu-bg").style.boxShadow="0 0 10px rgba(0,0,0,.8)";

    }else{
        document.querySelector(".menu-bg").style.backgroundColor="transparent";
        document.querySelector(".menu-bg").style.boxShadow="none";
    }

}