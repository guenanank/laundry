</div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Hak Cipta &copy; Kiki Laundry <?php echo date('Y') ?></span>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="loading">Loading</div>
</div>
<?php
// Bootstrap core JavaScript
echo script_tag('assets/js/jquery-3.3.1.js');
echo script_tag('assets/js/bootstrap.bundle.min.js');
// Core plugin JavaScript
echo script_tag('assets/js/jquery.easing.min.js');
echo script_tag('assets/js/jquery.dataTables.js');
echo script_tag('assets/js/dataTables.bootstrap4.js');
echo script_tag('assets/js/sweetalert.min.js');
echo script_tag('assets/js/bootstrap-datepicker.id.min.js');
echo script_tag('assets/js/bootstrap-datepicker.min.js');

echo script_tag('assets/js/bootstrap-select.bundle.min.js');
echo script_tag('assets/js/jquery.mask.min.js');
echo script_tag('assets/js/ajaxform.js');
?>
<script type="text/javascript">
  var baseUrl = $('base').attr('href');
  var price_format = function(number) {
    var regex = parseFloat(number, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    return 'Rp. ' + regex.slice(0, -3);
  };
  var dtLang = {
    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    "sProcessing": "Sedang memproses...",
    "sLengthMenu": "Tampilkan _MENU_ entri",
    "sZeroRecords": "Tidak ditemukan data yang sesuai",
    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    "sInfoPostFix": "",
    "sSearch": "Cari:",
    "sUrl": "",
    "oPaginate": {
      "sFirst": "Pertama",
      "sPrevious": "Sebelumnya",
      "sNext": "Selanjutnya",
      "sLast": "Terakhir"
    }
  };
</script>
<?php echo script_tag('assets/js/ajaxform.js') ?>
<script type="text/javascript">
  $(document).ready(function() {


    // $("#dataTable").DataTable({
    //   language: {
    //     "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //     "sProcessing": "Sedang memproses...",
    //     "sLengthMenu": "Tampilkan _MENU_ entri",
    //     "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //     "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //     "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //     "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //     "sInfoPostFix": "",
    //     "sSearch": "Cari:",
    //     "sUrl": "",
    //     "oPaginate": {
    //       "sFirst": "Pertama",
    //       "sPrevious": "Sebelumnya",
    //       "sNext": "Selanjutnya",
    //       "sLast": "Terakhir"
    //     }
    //   }
    // });

    $('form.ajaxform').submit(function(e) {
      e.preventDefault();
      $(this).ajaxform();
    });

    $('.selectpicker').selectpicker();

    $('.datepicker').datepicker({
      format: 'yyyy-dd-mm',
      uiLibrary: 'bootstrap4'
    });

    $('body').on('click', 'a.delete', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      swal({
          title: 'Anda Yakin?',
          text: 'Anda tidak dapat mengembalikan data ini',
          type: "warning",
          showCancelButton: true,
          cancelButtonText: 'Batalkan!',
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Ya, Hapus',
          closeOnConfirm: false
        },
        function(isConfirm) {
          if (isConfirm) {
            $.get(url, function() {
              swal({
                title: 'Terhapus!',
                text: 'Data anda sudah terhapus.',
                type: 'success',
                showConfirmButton: false,
                timer: 2000
              }, function() {
                location.reload();
              });
            });
          }
        });

    });
  });

  (function($) {
    $('body').on('click', 'a#lunas, a#detil', function(e) {
      e.preventDefault();
      // console.log($(this).attr('href'));
      $.get($(this).attr('href'), function(data) {
        // console.log(data);
        $(data).modal().on('shown.bs.modal', function(e) {
          $('select.selectpicker').selectpicker();
          $('.datepicker').datepicker({
            format: 'yyyy-dd-mm',
            uiLibrary: 'bootstrap4'
          });
          $('.data_table').DataTable();
          $('form.ajax_form').submit(function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).ajax_form();
          });
        }).on('hidden.bs.modal', function() {
          $(this).remove();
        });
      });
    });

  })(jQuery);
</script>
<?php
   echo script_tag('assets/js/sb-admin.min.js');
   if(!empty($scripts)) {
     foreach($scripts as $script) {
       echo script_tag(sprintf('assets/js/%s.js', $script));
     }
   }
   ?>
</body>

</html>
