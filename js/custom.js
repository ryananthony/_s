$(document).ready(function() {
  $('#covers-table').tablesorter( {sortList: [[0,0], [1,0]]} );


  var embed = '.soundcloud-container';

  $('.soundcloud').click(function() {
    var embed_id = $(this).attr('id');
    $(embed).hide();
    $(".covers-list").find('[data-cover-id="' + embed_id + '"]').show();
  });

  $('.soundcloud-embed > button').click(function() {
    $(embed).hide();
  });
});