jQuery('.list-group-item').click(function(){
  jQuery('.list-group-item').removeClass('active');
  jQuery(this).addClass('active');
});

$('.button-collapse').sideNav();

$('.collapsible').collapsible();

$('select').material_select();