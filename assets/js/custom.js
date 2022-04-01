    $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if(scroll < 100){
        $('.fixed-top').css('background', 'rgba(255, 255, 255, 0.8)');
        $('.fixed-top1').css('transition', '0.4s');
        $('.nav-padding').css('padding-bottom', '1rem');

    } else{
        $('.fixed-top').css('background', 'rgba(255, 255, 255, 0.4)');
        $('.fixed-top1').css('transition', '0.4s');
        $('.nav-padding').css('padding-bottom', '0.5rem');
    }
});

// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000);    
}
(function($){
  $(document).on('contextmenu', 'img', function() {
      return false;
  })
})(jQuery);

$('#top20').dataTable( {
  "searching": false,
  "paging": false,
  "info": false
} );

$('#tguilds').dataTable( {
  "searching": false,
  "paging": false,
  "info": false
} );

$(document).ready( function () {
    $('#top20').DataTable();
} );
$(document).ready( function () {
    $('#tmaps').DataTable();
} );
$(document).ready( function () {
    $('#tguilds').DataTable();
} );