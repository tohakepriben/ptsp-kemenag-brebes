<div class="row">
<div class="col-lg">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-wpforms"> <strong><?=$title?></strong></i>
    </div>
    <div class="card-body">
      <form role="form" method="post">
        <input type="hidden" name="secret" value="1"/>
        <input type="hidden" name="id-satker" value=""/>
		<div class="form-group">
            <label>Pilih Layanan</label>
			<select id="cmb-ref-layanan" name="cmb-ref-layanan" class="form-control" required="">
				<option value="">--Pilih Layanan--</option>
				<?php 
				foreach($satker as $r){
					echo '<optgroup label="'.$r['satker'].'">';
					$layanan = $this->m_ref_layanan->get_ref_layanan_by_satker($r['id']);
					foreach($layanan as $l){
						echo '<option value="'.$l['id'].'">'.$l['layanan'].'</option>';
					}
					echo '</optgroup>';
				} ?>
                
            </select>
        </div>
		<div class="form-group">
            <label>Alur Pelayanan:</label>
			<div class="card" id="alur-pelayanan" style="padding-left: 8px"></div>
        </div>
		<div class="form-group">
            <label>Persyaratan Berkas:</label>
			<div class="card" id="persyaratan-berkas"></div>
        </div>
		<div class="form-group">
            <label>Nama Pemohon</label>
            <input name="pemohon" type="text" class="form-control" required="" />
        </div>
		<div class="form-group">
            <label>No. HP</label>
            <input name="hp" type="tel" class="form-control" required="" />
        </div>

	    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Simpan</i></button>
      </form>

	</div>
  </div>
</div>
</div>

<script>
$(function(){
	$('#cmb-ref-layanan').select2();
	$('#cmb-ref-layanan').change(function(){
		if(isNaN($('#cmb-ref-layanan').val())) return;
		$.get('<?=base_url("api/get_detil_ref_layanan/")?>'+$('#cmb-ref-layanan').val()+'/alur',
			function(data){$('#alur-pelayanan').html(data);}
		);
		$.get('<?=base_url("api/get_detil_ref_layanan/")?>'+$('#cmb-ref-layanan').val()+'/id_satker',
			function(data){$('input[name="id-satker"]').val(data);}
		);
		$.get('<?=base_url("api/get_syarat_berkas_by_ref_layanan/")?>'+$('#cmb-ref-layanan').val(),
			function(data){
				$('#persyaratan-berkas').text('');
				var isi='<ol>';
				$.each(JSON.parse(data), function(){
					isi += '<li>'+this.berkas+'</li>';
				});
				isi += '</ol>';
				$('#persyaratan-berkas').html(isi);
			}
		);
	});
	
});
</script>