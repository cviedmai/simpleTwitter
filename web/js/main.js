$(document).ready(function(){

    $(".email").each(function(i){
      var url = 'http://www.gravatar.com/avatar/' + this.getAttribute("hash") + '.jpg';
      var avatar = $("<img src='"+url+"'/>");
      $(this).prevAll(".id").children("a").text("").append(avatar); 
    });

});
