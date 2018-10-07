<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('order') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('order/insert', ['class' => '', 'data-module' => 'order']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nomer', 'order-nomer') ?>
        <?php echo form_input(['name' => 'nomer', 'id' => 'order-nomer', 'class' => 'form-control', 'value' => $nomer, 'readonly' => 'true']) ?>
        <div id="feedback-nomer"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tanggal', 'order-tanggal') ?>
        <?php echo form_input(['name' => 'tanggal', 'id' => 'order-tanggal', 'class' => 'form-control datepicker', 'placeholder' => sprintf('Tanggal %s', $title)]) ?>
        <div id="feedback-tanggal"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Pelanggan', 'order-pelanggan') ?>
        <?php echo form_dropdown('id_pelanggan', $pelanggan, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'order-pelanggan', 'title' => 'Pilih Pelanggan']) ?>
        <div id="feedback-pelanggan"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Catatan', 'order-catatan') ?>
        <?php echo form_textarea(['name' => 'catatan', 'id' => 'order-catatan', 'class' => 'form-control', 'placeholder' => sprintf('Catatan %s', $title)]) ?>
        <div id="feedback-catatan"></div>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
    <div class="row detil">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
              <?php echo form_dropdown('_barang', [], null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'order-barang', 'title' => 'Pilih Barang']) ?>
              <div id="feedback-barang"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
              <?php echo form_dropdown('_cuci', [], null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'order-cuci', 'title' => 'Pilih Cuci']) ?>
              <div id="feedback-cuci"></div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
              <?php echo form_input(['name' => '_banyaknya', 'id' => 'order-banyaknya', 'class' => 'form-control', 'placeholder' => 'Banyaknya']) ?>
              <div id="feedback-banyaknya"></div>
						</div>
					</div>
					<div class="col-sm-2">
            <button type="button" class="btn btn-secondary" id="tambah">
                <i class="fa fa-plus"></i> Tambah
            </button>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="daftar">
						<thead>
							<tr>
								<th>Barang</th>
								<th>Cuci</th>
								<th class="text-center">Banyaknya</th>
								<th class="text-right">Subtotal Tunai</th>
								<th class="text-right">Subtotal Angsuran</th>
								<th class="text-center">&nbsp;</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="3" class="text-right"><strong class="text-primary">Total</strong></td>
								<td class="text-right">
									<strong class="text-primary"><span class="jumlah_tunai"></span></strong>
									<input type="hidden" name="jumlah_tunai" />
								</td>
								<td class="text-right">
									<strong class="text-primary"><span class="jumlah_cicil"></span></strong>
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
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
