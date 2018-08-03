<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('karyawan/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Tambah <?php echo $title ?>">
        <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar <?php echo $title ?></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Kontak</th>
            <th class="text-center">Bagian</th>
            <th class="text-center">Mulai Bekerja</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Kontak</th>
            <th class="text-center">Bagian</th>
            <th class="text-center">Mulai Bekerja</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($karyawan as $kry) {
              ?>
            <tr>
              <td><?php echo $kry->nama ?></td>
              <td class="text-center"><?php echo $kry->kontak ?></td>
              <td class="text-center"><?php echo $kry->bagian ?></td>
              <td class="text-center"><?php echo $kry->mulai_kerja ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('karyawan/edit/' . $kry->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $kry->nama ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('karyawan/delete/' . $kry->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $kry->nama ?>?">
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
