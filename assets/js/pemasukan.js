(function($) {
  $('select[name="jenis"').on('change', function() {
    if ($(this).val() == 'penambahanBiaya') {
      $('div.pelanggan').fadeOut();
    } else {
      $('div.pelanggan').fadeIn();
    }
  });
})(jQuery)
