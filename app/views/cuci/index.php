<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('jasa') ?>" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Jasa Cuci">
        <i class="fa fa-cube"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('cuci/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah <?php echo $title ?>">
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
            <th class="text-center">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($cuci as $cci) {
              ?>
            <tr>
              <td><?php echo $cci->nama ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('cuci/edit/' . $cci->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $cci->nama ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('cuci/delete/' . $cci->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $cci->nama ?>?">
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
