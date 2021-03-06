<div class="modal fade" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <?php echo form_open('#', ['class' => ''], ['id' => $order->id, 'dicetak' => true]) ?>
      <div class="modal-header">
        <h5 class="modal-title">Nomer :
            <strong class="text-primary">
              <?php echo $order->nomer ?>
            </strong>
            <span class="pull-right">
              Tgl Order&nbsp;:&nbsp;<?php echo $order->tanggal ?>
            </span>
        </h5>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <?php echo form_label('Nama pelanggan', 'pelanggan', [
            'class' => 'col-sm-3 offset-sm-1 col-form-label'
            ]) ?>
          <div class="col-sm-7">
            <?php echo form_input([
                'name' => 'pelanggan',
                'id' => 'pelanggan',
                'class' => 'form-control-plaintext',
                'readonly' => true,
                'value' => $order->pelanggan->nama
                ])
                ?>
            <div id="feedback-pelanggan"></div>
          </div>
        </div>
        <div class="form-group row">
          <?php echo form_label('Tanggal Kirim', 'dikirim', [
            'class' => 'col-sm-3 offset-sm-1 col-form-label'
            ]) ?>
          <div class="col-sm-7">
            <?php echo form_input([
                'name' => 'dikirim',
                'id' => 'dikirim',
                'class' => 'form-control',
                'readonly' => is_null($order->dikirim) ? false : true,
                'value' => $order->dikirim
                ])
                ?>
            <div id="feedback-dikirim"></div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-sm table-hover">
            <thead class="thead-light text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Barang</th>
                <th scope="col">Cuci</th>
                <th scope="col">Banyaknya</th>
                <th scope="col">Tunai</th>
                <th scope="col">Cicil</th>
                <th scope="col">Subtotal Tunai</th>
                <th scope="col">Subtotal Cicil</th>
              </tr>
            </thead>
            <tfoot class="thead-light text-right">
              <tr>
                <td colspan="6">
                  <strong class="text-primary">Total</strong>
                </td>
                <td>
                  <strong class="text-primary">Rp. <?php echo $order->jumlah_tunai ?></strong>
                </td>
                <td>
                  <strong class="text-primary">Rp. <?php echo $order->jumlah_cicil ?></strong>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach($order->detil as $detil) {?>
              <tr>
                <td class="text-center">
                  <div class="checkbox">
                    <label>
                        <input type="checkbox"
                          name="detil[]"
                          value="<?php echo $detil->id_barang . ',' . $detil->id_cuci ?>">
                        <i class="input-helper"></i>
                    </label>
                  </div>
                </td>
                <td>
                  <?php echo $barang[$detil->id_barang] ?>
                </td>
                <td>
                  <?php echo $cuci[$detil->id_cuci] ?>
                </td>
                <td class="text-center">
                  <?php echo (int) $detil->banyaknya ?>
                </td>
                <td class="text-right">Rp.
                  <?php echo number_format($detil->harga_tunai) ?>
                </td>
                <td class="text-right">Rp.
                  <?php echo number_format($detil->harga_cicil) ?>
                </td>
                <td class="text-right">Rp.
                  <?php echo number_format($detil->subtotal_tunai) ?>
                </td>
                <td class="text-right">
                  <?php echo number_format($detil->subtotal_cicil) ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark btn-sm">
            <i class="fa fa-print"></i>&nbsp;Cetak surat jalan
        </button>
        <?php if($order->dicetak == false AND is_null($order->pembayaran)) { ?>
        <a href="<?php echo base_url('order/' . $ord->id . '/edit') ?>"
          class="btn btn-primary btn-sm">
              <i class="fa fa-edit"></i>&nbsp;Ubah
          </a>
        <?php } ?>
        <button type="button"
          class="btn btn-secondary btn-sm"
          data-dismiss="modal">
            <i class="fa fa-close"></i>&nbsp;Tutup
        </button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>
