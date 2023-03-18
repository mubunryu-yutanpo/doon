// MENUボタンtoggle
$(function(){
  $('.js-nav-open-btn').on('click', function(){
    $('.header').addClass('none');
    $('.js-menu-container').addClass('open');
  });

  $(document).on('click', '.js-nuv-close-btn', function(){
    $('.header').removeClass('none');
    $('.js-menu-container').removeClass('open');
  });

});

// フッターをページ最下部に固定
$(function(){
  var $ftr = $('.footer');
  if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
    $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;' });
  }
});
