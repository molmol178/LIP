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


$(function() {
  $('.article').click(function() {
    document.getElementById('article_modal').showModal();
  });
});
$(function() {
  $('#search_botton').click(function() {
    console.log(document.forms.searchform.search_text.value);
  });
});
$('.close_modal').on('click', function () {
    console.log("close modal");
  $('#search_modal').fadeOut();
});