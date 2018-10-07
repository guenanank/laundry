(function($) {

  // var base_url = $('base').attr('href');
  var data, i = $('table#daftar tbody').find('tr').length;
  var tunai = [],
    cicil = [];
  var total = function(arr) {
    var t = 0;
    for (var i = 0; i < arr.length; i++)
      t += arr[i] << 0;

    return parseInt(t, 10);
  };

  var clear = function() {
    $('select[name="_barang"], select[name="_cuci"]').empty().selectpicker('refresh');
    $('input[name="_banyaknya"]').val(null).blur();
    $('span.jumlah_tunai').text(null);
    $('span.jumlah_cicil').text(null);
    $('input[name="jumlah_tunai"]').val(0);
    $('input[name="jumlah_cicil"]').val(0);

    $('table#daftar tbody > tr').hide(function() {
      $(this).remove();
    });
  };

  if ($('input[name=id_pelanggan]')[0]) {
    $.getJSON(base_url + '/harga/' + $('input[name=id_pelanggan]').val() + '/cek', function(data) {
      harga(data);
    });

    $.each($('table#daftar tbody > tr > td > button'), function() {
      tunai.push($(this).data('tunai'));
      cicil.push($(this).data('cicil'));
    });

  } else {
    $('select[name="id_pelanggan"]').on('change', function() {
      $('.loading').fadeIn();
      clear();
      $.getJSON(base_url + '/harga/' + $(this).val() + '/cek', function(data) {
        harga(data);
      }).done(function() {
        $('.loading').fadeOut();
      });
    });
  }

  var harga = function(data) {
    if (data.length === 0)
      return;

    $.each(data.barang, function(k, v) {
      $('select[name="_barang"]').append('<option value="' + k + '">' + v + '</option>');
    });

    $('select[name="_barang"]').on('change', function() {
      $('select[name="_cuci"]').empty().selectpicker('refresh');
      var barang = $(this).find(':selected').val();
      $.each(data.cuci[barang], function(index, row) {
        $('select[name="_cuci"]').append('<option data-tunai="' + row.tunai + '" data-cicil="' + row.cicil + '" value="' + index + '">' + row.nama + '</option>');
        $('select[name="_cuci"]').selectpicker('refresh');
      });
    });

    $('.selectpicker').selectpicker('refresh');
  };

  $('div.detil').on('click', 'button#tambah', function() {
    var obj = {};
    $(this).parents('div.detil').find(':input').each(function() {
      var nama = $(this).attr('name');
      if (typeof nama !== 'undefined') {
        if ($(this).val().length === 0) {
          $('#' + nama).parents('div.barang').find('div.form-group').addClass('has-warning');
          $('#' + nama).text('The ' + nama + ' field is required');
        } else {
          obj[nama] = $(this).val();
          obj['_nama_barang'] = $('select[name="_barang"]').find(':selected').text();
          obj['_nama_cuci'] = $('select[name="_cuci"]').find(':selected').text();
          if (nama == '_cuci') {
            obj['_tunai'] = $(this).find(':selected').data('tunai');
            obj['_cicil'] = $(this).find(':selected').data('cicil');
          }
        }
      }
    });

    if ($.isEmptyObject(obj) == false)
      data = $.makeArray(obj);

    if (data.length !== 0) {
      $('div.form-group').removeClass('has-warning');
      $('small.help-block').text(null);
    }

    tbody(data);
    tunai.push($('input[name="_banyaknya"]').val() * $('select[name="_cuci"]').find(':selected').data('tunai'));
    cicil.push($('input[name="_banyaknya"]').val() * $('select[name="_cuci"]').find(':selected').data('cicil'));
    $('span.jumlah_tunai').text(price_format(total(tunai)));
    $('span.jumlah_cicil').text(price_format(total(cicil)));
    $('input[name="jumlah_tunai"]').val(total(tunai));
    $('input[name="jumlah_cicil"]').val(total(cicil));
    $('select[name="_barang"], select[name="_cuci"]').selectpicker('val', null);
    $('input[name="_banyaknya"]').val(null).blur();
  });

  var tbody = function(data) {
    var tbody;
    $.each(data, function(k, v) {
      var jumlah_tunai = v._banyaknya * v._tunai;
      var jumlah_cicil = v._banyaknya * v._cicil;
      i += 1;
      tbody += '<tr>';

      tbody += '<td>' + v._nama_barang;
      tbody += '<input type="hidden" name="order_lengkap[' + i + '][id_barang]" value="' + v._barang + '" />';
      tbody += '</td>';

      tbody += '<td>' + v._nama_cuci;
      tbody += '<input type="hidden" name="order_lengkap[' + i + '][id_cuci]" value="' + v._cuci + '" />';
      tbody += '</td>';

      tbody += '<td class="text-center">' + v._banyaknya;
      tbody += '<input type="hidden" name="order_lengkap[' + i + '][banyaknya]" value="' + v._banyaknya + '" />';
      tbody += '</td>';

      tbody += '<td class="text-right">' + price_format(jumlah_tunai);
      tbody += '<input type="hidden" name="order_lengkap[' + i + '][harga_tunai]" value="' + v._tunai + '" />';
      tbody += '</td>';

      tbody += '<td class="text-right">' + price_format(jumlah_cicil);
      tbody += '<input type="hidden" name="order_lengkap[' + i + '][harga_cicil]" value="' + v._cicil + '" />';
      tbody += '</td>';

      tbody += '<td class="text-center">';
      tbody += '<button type="button" class="btn btn-danger hapus" data-tunai="' + jumlah_tunai + '" data-cicil="' + jumlah_cicil + '">';
      tbody += '<i class="fa fa-close"></i></button>';
      tbody += '</td>';
      tbody += '</tr>';
      $('table#daftar tbody').append(tbody);
    });
  };

  $('table#daftar').on('click', '.hapus', function() {
    $(this).parents('tr').hide(function() {
      $(this).remove();
    });

    tunai.splice($.inArray($(this).data('tunai'), tunai), 1);
    cicil.splice($.inArray($(this).data('cicil'), cicil), 1);
    $('span.jumlah_tunai').text(price_format(total(tunai)));
    $('span.jumlah_cicil').text(price_format(total(cicil)));
    $('input[name="jumlah_tunai"]').val(total(tunai));
    $('input[name="jumlah_cicil"]').val(total(cicil));
  });

})(jQuery);
