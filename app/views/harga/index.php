<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pelanggan') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('harga/#') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Cetak <?php echo $title . '&nbsp;' . $pelanggan->nama ?>">
        <i class="fa fa-print"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('harga/create/' . $pelanggan->id) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah <?php echo $title . '&nbsp;' . $pelanggan->nama ?>">
        <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar <?php echo $title . '&nbsp;' . $pelanggan->nama ?> </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">Barang</th>
            <th class="text-center">Cuci</th>
            <th class="text-center">Tunai</th>
            <th class="text-center">Cicil</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Barang</th>
            <th class="text-center">Cuci</th>
            <th class="text-center">Tunai</th>
            <th class="text-center">Cicil</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($harga as $hrg) {
              ?>
              <tr>
                <td><?php echo $hrg->barang->nama ?></td>
                <td><?php echo $hrg->cuci->nama ?></td>
                <td class="text-right">Rp. <?php echo $hrg->tunai ?></td>
                <td class="text-right">Rp. <?php echo $hrg->cicil ?></td>
                <td class="text-center">
                  <a href="<?php echo base_url('harga/edit/' . sprintf('%s/%s/%s', $hrg->id_pelanggan, $hrg->id_barang, $hrg->id_cuci)) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah">
                    <i class="fa fa-edit"></i>
                  </a>&nbsp;
                  <a href="<?php echo base_url('harga/delete/' . sprintf('%s/%s/%s', $hrg->id_pelanggan, $hrg->id_barang, $hrg->id_cuci)) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus">
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
