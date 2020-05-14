// $('h6.transtext').hide();
$(document).ready(function() {
  $('p.translate').on('click', function(){
    $(this).next().show('normal');
  });  
});