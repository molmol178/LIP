function search(){
  //EnterキーならSubmit
  if(window.event.keyCode==13)document.searchform.submit();
}

// window.onload = ajax_search; 

// function ajax_search(){ 
//   $(".main").show(); 
//   $.post("./find.php", function(data){
//    if (data.length>0){ 
//      $(".main").html(data); 
//    } 
//   }) 
// } 
