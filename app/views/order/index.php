<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('order/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Tambah <?php echo $title ?>">
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
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Nomer</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Tunai</th>
            <th scope="col">Cicil</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Nomer</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Tunai</th>
            <th>Cicil</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($order as $row) {
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
                <?php echo $row->pelanggan->nama ?>
              </td>
              <td class="text-right">
                Rp. <?php echo $row->jumlah_tunai ?>
              </td>
              <td class="text-right">
                Rp. <?php echo $row->jumlah_cicil ?>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('order/' . $row->id) ?>"
                  class="btn btn-sm btn-secondary"
                  title="Detil order nomer <?php echo $row->nomer ?>"
                  data-toggle="tooltip"
                  id="detil">
              		<span class="fa fa-search"></span>
            		</a>&nbsp;
                <?php if(is_null($row->pembayaran)) { ?>
  							<a href="<?php echo base_url('order/' . $row->id . '/pembayaran') ?>"
                  class="btn btn-sm btn-info"
                  title="Lunas order nomer <?php echo $row->nomer ?>"
                  data-toggle="tooltip"
                  data-placement="bottom" id="lunas">
              		<span class="fa fa-check"></span>
            		</a>&nbsp;
  							<?php } ?>
                <?php if($row->dicetak == false AND is_null($row->pembayaran)) { ?>
                <a href="<?php echo base_url('order/delete/' . $row->id) ?>"
                  class="btn btn-danger btn-sm delete"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Hapus <?php echo $row->nomer ?>?">
                  <i class="fa fa-trash"></i>
                </a>
                <?php } ?>
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
