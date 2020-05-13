$(document).ready(function(){
    
  var show = 1;
  
  $('.lnr-menu').on('click', function(){
      console.log("hecho");
      if(show == 1){
          $('.content-menu').addClass("content-menu2");
          show = 0;
      }else{
          $('.content-menu').removeClass("content-menu2");
          show = 1;
      }
      
      
  })
  
})