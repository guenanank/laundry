<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('order') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('order/insert', [
      'class' => 'ajaxform',
      'data-module' => 'order'
      ]) ?>

    <div class="form-group">
      <?php echo form_label('Nomer', 'order-nomer') ?>
      <?php echo form_input([
          'name' => 'nomer',
          'id' => 'order-nomer',
          'class' => 'form-control',
          'value' => $nomer,
          'readonly' => true
          ]) ?>
      <div id="feedback-nomer"></div>
    </div>

    <div class="form-group">
      <?php echo form_label('Tanggal', 'order-tanggal') ?>
      <?php echo form_input([
          'name' => 'tanggal',
          'id' => 'order-tanggal',
          'class' => 'form-control datepicker',
          'placeholder' => sprintf('Tanggal %s', $title)
          ]) ?>
      <div id="feedback-tanggal"></div>
    </div>

    <div class="form-group">
      <?php echo form_label('Pelanggan', 'order-id_pelanggan') ?>
      <select name="id_pelanggan"
          class="form-control selectpicker"
          id="order-id_pelanggan"
          data-live-search="true"
          title="<?php echo sprintf('Pilih Pelanggan %s', $title) ?>">
          <?php
            foreach ($pelanggan as $id => $nama) {
              ?>
              <option value="<?php echo $id ?>" <?php echo set_select('id_pelanggan', $id) ?>>
                <?php echo $nama ?>
              </option>
              <?php
            }
          ?>
        </select>
      <div id="feedback-id_pelanggan"></div>
    </div>

    <div class="form-group">
      <?php echo form_label('Catatan', 'order-catatan') ?>
      <?php echo form_textarea([
          'name' => 'catatan',
          'id' => 'order-catatan',
          'class' => 'form-control',
          'placeholder' => sprintf('Catatan %s', $title),
          'cols' => '',
          'rows' => ''
          ]) ?>
      <div id="feedback-catatan"></div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="container">
      <div class="row detil">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo form_dropdown('_barang', [], null, [
                'class' => 'form-control form-control-sm selectpicker',
                'data-live-search' => 'true',
                'id' => 'order-barang',
                'title' => 'Pilih Barang'
                ]) ?>
            <div id="feedback-barang"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo form_dropdown('_cuci', [], null, [
                'class' => 'form-control form-control-sm selectpicker',
                'data-live-search' => 'true',
                'id' => 'order-cuci',
                'title' => 'Pilih Cuci'
                ]) ?>
            <div id="feedback-cuci"></div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <?php echo form_input([
                'name' => '_banyaknya',
                'id' => 'order-banyaknya',
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Banyaknya'
                ]) ?>
            <div id="feedback-banyaknya"></div>
          </div>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-secondary btn-sm" id="tambah">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover" id="daftar">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col">Barang</th>
                  <th scope="col">Cuci</th>
                  <th scope="col">Banyaknya</th>
                  <th scope="col">Subtotal Tunai</th>
                  <th scope="col">Subtotal Angsuran</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tfoot class="thead-light text-right">
                <tr>
                  <td colspan="3"><strong class="text-primary">Total</strong></td>
                  <td>
                    <strong class="text-primary">
                      <span class="jumlah_tunai"></span>
                    </strong>
                    <input type="hidden" name="jumlah_tunai" />
                </td>
                  <td>
                    <strong class="text-primary">
                      <span class="jumlah_cicil"></span>
                    </strong>
                    <input type="hidden" name="jumlah_cicil" />
                </td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
