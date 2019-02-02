<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('order/paid', [
        'class' => 'ajaxform'
      ], [
        'id' => $order->id,
        'jumlah_tunai' => $order->jumlah_tunai
      ]) ?>
      <div class="modal-header">
        <h5 class="modal-title">Order <strong class="text-primary"><?php echo $order->nomer ?></strong></h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <?php echo form_label('Cara Pembayaran', 'pembayaran') ?>
          <select name="pembayaran"
              class="form-control selectpicker"
              id="pembayaran"
              title="<?php echo sprintf('Pilih Cara Pembayaran %s', $title) ?>">
              <?php
              foreach ($cara_bayar as $key => $value) {
                ?>
                <option value="<?php echo $key ?>" <?php echo set_select('pembayaran', $key) ?>>
                  <?php echo $value ?>
                </option>
                <?php
              }
              ?>
            </select>
          <div id="feedback-cara_bayar"></div>
        </div>

        <div class="form-group">
          <?php echo form_label('Tanggal Pembayaran', 'tanggal_pembayaran') ?>
          <?php echo form_input([
                'name' => 'tanggal_pembayaran',
                'id' => 'tanggal_pembayaran',
                'class' => 'form-control datepicker',
                'placeholder' => 'Tanggal Pembayaran'
                ])
                ?>
          <div id="feedback-tanggal_pembayaran"></div>
        </div>

        <div class="form-group">
          <?php echo form_label('Catatan', 'catatan_pembayaran') ?>
          <?php echo form_textarea([
              'name' => 'catatan_pembayaran',
              'id' => 'catatan_pembayaran',
              'class' => 'form-control',
              'placeholder' => 'Catatan pembayaran',
              'cols' => '',
              'rows' => ''
              ]) ?>
          <div id="feedback-catatan_pembayaran"></div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">
          <i class="fa fa-check"></i>&nbsp;Simpan
        </button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa fa-close"></i>&nbsp;Tutup
        </button>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
