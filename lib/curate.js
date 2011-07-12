$(document).ready(function() {
  
  // FaceBox initialization
  //$('a[rel*=facebox]').facebox();
  
  // event handler for LHS filters
  /*$('.sidefilter').click(function() {
    $('.sidehover').removeClass('sidehover').addClass('sidemenu');
    $(this).removeClass('sidemenu').addClass('sidehover');
    
    filter_all();
  });*/

});

function filter_all() {
  // find out which one's selected
  var filter = $('.sidehover').attr('id');
  
  // hide all entries temporarily
  $('.entry').hide();
  
  switch (filter) {
    case 'sideall':
      $('.entry').show();
      break;
    case 'sideverified':
      $('.verified1').show();
      break;
    case 'sidenotyet':
      $('.verified0').show();
      break;
    case 'sidereject':
      $('.verified2').show();
      break;
  }
  
}

function export_seeds() {
  var start = $('#startseed').val();
  var end = $('#endseed').val();
  
  start = parseInt(start);
  end = parseInt(end);
  
  start = isNaN(start) ? 0 : start;
  end = isNaN(end) ? 0 : end;
  
  $('#exportlink').attr('href', '/export.php?start=' + start.toString() + '&end=' + end.toString());
  $('#exportlinkall').attr('href', '/export.php?all=true&start=' + start.toString() + '&end=' + end.toString());  
  
  return true;
}

