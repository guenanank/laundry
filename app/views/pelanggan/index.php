<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('sales') ?>"
        class="btn btn-dark"
        data-toggle="tooltip"
        data-placement="top"
        title="Sales">
        <i class="fa fa-blind"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('pelanggan/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="left"
        title="Tambah <?php echo $title ?>">
        <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table"></i>&nbsp;Daftar&nbsp;
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Sales</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Sales</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($pelanggan as $row) {
              ?>
          <tr>
            <td>
              <?php echo $row->nama ?>
            </td>
            <td>
              <?php echo $row->alamat ?>
            </td>
            <td>
              <?php echo $row->telepon ?>
            </td>
            <td>
              <?php echo isset($row->sales) ? $row->sales->nama : null ?>
            </td>
            <td class="text-center">
              <a href="<?php echo base_url('harga/index/' . $row->id) ?>"
                  class="btn btn-warning btn-sm"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Harga <?php echo $row->nama ?>">
                  <i class="fa fa-shopping-cart"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('pelanggan/edit/' . $row->id) ?>"
                  class="btn btn-info btn-sm"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Ubah <?php echo $row->nama ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('pelanggan/delete/' . $row->id) ?>"
                  class="btn btn-danger btn-sm delete"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Hapus <?php echo $row->nama ?>?">
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
