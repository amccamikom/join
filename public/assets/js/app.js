$(window).resize(function(e){
  if (768 < $(window).width()) {
    $('.header').height($(document).height());
  } else {
    $('.header').height($('.header-inner').height());
  }
}).resize();

(function($) {
  var validator = $('#register-form').parsley();

  $('#nim').mask('99.99.9999', {
    completed: function() {
      $('#fullname').val('');
      $('.user-image .icon').addClass('ion-load-c');

      $.get('http://amikom-dispatch.rizqy.me/mahasiswa/' + $('#nim').val())
        .done(function(response) {
          $('.user-image').css('background-image', 'url('+response.image+')');
          $('.user-image .icon').hide();
          $('#fullname').val(response.name);
        })
        .always(function() {
          $('.user-image .icon').removeClass('ion-load-c');
          validator.validate({group: 'nim'});
        })
    }
  });

  $('#register-form').on('reset', function() {
    $('.user-image').css('background-image', '');
    $('.user-image .icon').show();
    validator.reset();
  });
})(jQuery);
