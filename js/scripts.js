$(document).ready(function(){
    var menuHeight = $("#target").height();
    var startPos = 0;
    $(window).scroll(function(){
    var currentPos = $(this).scrollTop();
    if (currentPos > startPos) {
        if($(window).scrollTop() >= 200) {
        $("#target").css("top", "-" + menuHeight + "px");
        }
    } else {
        $("#target").css("top", 0 + "px");
    }
    startPos = currentPos;
  });
  
});

window.onload = ajax_search; 

function ajax_search(){ 
  $(".main").show(); 
  $.post("./find.php", function(data){
   if (data.length>0){ 
     $(".main").html(data); 
   } 
  }) 
} 
