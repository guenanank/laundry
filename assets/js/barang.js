(function($) {

  $("#dataTable").DataTable({
    language: dtLang,
    serverSide: true,
    ajax: {
      url: baseUrl + 'barang/dt_source',
      type: 'post',
    },
    columns: [
      { data: 'nama' }
    ],
  });
})(jQuery);
