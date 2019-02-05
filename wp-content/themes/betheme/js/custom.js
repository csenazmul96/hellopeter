<script type="text/javascript">
$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});


$('.dropdown-toggle').dropdown();
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
</script>