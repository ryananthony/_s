$(document).ready(function() {
  $('#covers-table').tablesorter( {sortList: [[0,0], [1,0]]} );

  var embed = '.soundcloud-container';

  $('.soundcloud-label').click(function() {
    var embed_id = $(this).closest('.soundcloud').attr('id');
    $(embed).hide();
    $(".covers-list").find('[data-cover-id="' + embed_id + '"]').show();
  });

  $('.soundcloud-embed > button').click(function() {
    $(embed).hide();
  });
});
