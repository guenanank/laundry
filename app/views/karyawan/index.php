<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('#') ?>"
        class="btn btn-warning"
        data-toggle="tooltip"
        data-placement="left"
        title="Absensi  <?php echo $title ?>">
        <i class="fa fa-address-book"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('karyawan/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Tambah <?php echo $title ?>">
        <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Kontak</th>
            <th scope="col">Bagian</th>
            <th scope="col">Mulai Bekerja</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Bagian</th>
            <th>Mulai Bekerja</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($karyawan as $kry) {
              ?>
          <tr>
            <td>
              <?php echo $kry->nama ?>
            </td>
            <td>
              <?php echo $kry->kontak ?>
            </td>
            <td>
              <?php echo $kry->bagian ?>
            </td>
            <td class="text-center">
              <?php echo $kry->mulai_kerja ?>
            </td>
            <td class="text-center">
              <a href="<?php echo base_url('karyawan/edit/' . $kry->id) ?>"
                  class="btn btn-info btn-sm"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Ubah <?php echo $kry->nama ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('karyawan/delete/' . $kry->id) ?>"
                  class="btn btn-danger btn-sm delete"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Hapus <?php echo $kry->nama ?>?">
                  <i class="fa fa-trash"></i>
                </a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
