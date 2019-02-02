<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pemasukan/create') ?>"
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
    <i class="fa fa-table">&nbsp;</i>Daftar
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Nomer</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jenis</th>
            <th scope="col">Pembayaran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Nomer</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Pembayaran</th>
            <th>Jumlah</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($pemasukan as $row) {
              ?>
          <tr>
            <td class="text-center">
              <strong class="text-primary">
                  <?php echo $row->nomer ?>
                </strong>
            </td>
            <td class="text-center">
              <?php echo $row->tanggal ?>
            </td>
            <td class="text-center">
              <?php echo $row->jenis ?><br />
              <?php echo empty($row->pelanggan) ? null : sprintf('(%s)', $row->pelanggan->nama) ?>
            </td>
            <td class="text-center">
              <?php echo $row->cara_bayar ?>
            </td>
            <td class="text-right">
              Rp.
              <?php echo $row->jumlah ?>
            </td>
            <td class="text-center">
              <?php if($row->jenis != 'Penambahan Biaya') { ?>
              <a href="#"
                    class="btn btn-warning"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Cetak <?php echo sprintf('%s %s', $title, $row->nomer) ?>">
                    <i class="fa fa-print"></i>
                  </a>&nbsp;
              <?php } ?>
              <a href="<?php echo base_url('pemasukan/edit/' . $row->id) ?>"
                  class="btn btn-info"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Ubah <?php echo sprintf('%s %s', $title, $row->nomer) ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('pemasukan/delete/' . $row->id) ?>"
                  class="btn btn-danger delete"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Hapus <?php echo sprintf('%s %s', $title, $row->nomer) ?>?">
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
