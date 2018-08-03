<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pemasukan/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Tambah <?php echo $title ?>">
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
            <th class="text-center">Nomer</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Pelanggan</th>
            <th class="text-center">Pembayaran</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Nomer</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Pelanggan</th>
            <th class="text-center">Pembayaran</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($pemasukan as $pmsk) {
              ?>
            <tr>
              <td class="text-center"><strong class="text-primary"><?php echo $pmsk->nomer ?></strong></td>
              <td class="text-center"><?php echo $pmsk->tanggal ?></td>
              <td class="text-center"><?php echo $pmsk->jenis ?></td>
              <td><?php echo empty($pmsk->pelanggan) ? null : $pmsk->pelanggan->nama ?></td>
              <td class="text-center"><?php echo $pmsk->cara_bayar ?></td>
              <td class="text-right">Rp. <?php echo $pmsk->jumlah ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('pemasukan/edit/' . $pmsk->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $pmsk->nomer ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('pemasukan/delete/' . $pmsk->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $pmsk->nomer ?>?">
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
