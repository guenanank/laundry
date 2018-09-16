<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pengeluaran/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Tambah <?php echo $title ?>">
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
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($pengeluaran as $plrn) {
              ?>
            <tr>
              <td class="text-center"><?php echo $plrn->tanggal ?></td>
              <td class="text-center"><?php echo $plrn->jenis ?></td>
              <td><?php echo $plrn->keterangan ?></td>
              <td class="text-right">Rp. <?php echo $plrn->jumlah ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('pengeluaran/edit/' . $plrn->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $title ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('pengeluaran/delete/' . $plrn->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $title ?>?">
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
