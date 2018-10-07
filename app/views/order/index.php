<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('order/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah <?php echo $title ?>">
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
            <th class="text-center">Pelanggan</th>
            <th class="text-center">Tunai</th>
            <th class="text-center">Cicil</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Nomer</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Pelanggan</th>
            <th class="text-center">Tunai</th>
            <th class="text-center">Cicil</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($order as $ord) {
              ?>
            <tr>
              <td class="text-center"><strong class="text-primary"><?php echo $ord->nomer ?></strong></td>
              <td class="text-center"><?php echo $ord->tanggal ?></td>
              <td class="text-center"><?php echo $ord->pelanggan->nama ?></td>
              <td class="text-right">Rp. <?php echo $ord->jumlah_tunai ?></td>
              <td class="text-right">Rp. <?php echo $ord->jumlah_cicil ?></td>
              <td class="text-center">
                &nbsp;
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
