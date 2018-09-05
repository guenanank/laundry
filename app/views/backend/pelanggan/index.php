<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pelanggan/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Tambah <?php echo $title ?>">
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
            <th class="text-center">Alamat</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($pelanggan as $plg) {
              ?>
            <tr>
              <td><?php echo $plg->nama ?></td>
              <td><?php echo $plg->alamat ?></td>
              <td><?php echo $plg->telepon ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('harga/index/' . $plg->id) ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Harga <?php echo $plg->nama ?>">
                  <i class="fa fa-shopping-cart"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('pelanggan/edit/' . $plg->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $plg->nama ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('pelanggan/delete/' . $plg->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $plg->nama ?>?">
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
