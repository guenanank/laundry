<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pelanggan') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('harga/#') ?>"
        class="btn btn-warning"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Cetak <?php echo $title . '&nbsp;' . $pelanggan->nama ?>">
        <i class="fa fa-print"></i>
      </a>&nbsp;
      <a href="<?php echo base_url('harga/create/' . $pelanggan->id) ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Tambah <?php echo $title . '&nbsp;' . $pelanggan->nama ?>">
        <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table"></i>&nbsp;Daftar
    <?php echo $title . '&nbsp;' . $pelanggan->nama ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Barang</th>
            <th scope="col">Cuci</th>
            <th scope="col">Tunai</th>
            <th scope="col">Cicil</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Barang</th>
            <th>Cuci</th>
            <th>Tunai</th>
            <th>Cicil</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach ($harga as $row) {
                ?>
          <tr>
            <td>
              <?php echo $row->barang->nama ?>
            </td>
            <td>
              <?php echo $row->cuci->nama ?>
            </td>
            <td class="text-right">Rp.
              <?php echo $row->tunai ?>
            </td>
            <td class="text-right">Rp.
              <?php echo $row->cicil ?>
            </td>
            <td class="text-center">
              <a href="<?php echo base_url('harga/edit/' . sprintf('%s/%s/%s', $row->id_pelanggan, $row->id_barang, $row->id_cuci)) ?>"
                    class="btn btn-info btn-sm"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Ubah">
                    <i class="fa fa-edit"></i>
                  </a>&nbsp;
              <a href="<?php echo base_url('harga/delete/' . sprintf('%s/%s/%s', $row->id_pelanggan, $row->id_barang, $row->id_cuci)) ?>"
                    class="btn btn-danger btn-sm delete"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Hapus">
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
