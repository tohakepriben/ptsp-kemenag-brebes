<div class="row">
<div class="col-lg">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-wpforms"> Pelayanan: <strong><?=$title?></strong></i>
    </div>
    <div class="card-body">
      <form role="form">
		<div class="form-group">
            <label>Nama Pemohon</label>
            <input id="pemohon" class="form-control" value="<?=$this->m_layanan->get_detil_layanan($id_layanan,'pemohon')?>" />
        </div>
		<div class="form-group">
            <label>No. HP</label>
            <input id="pemohon" class="form-control" value="<?=$this->m_layanan->get_detil_layanan($id_layanan,'hp')?>" />
        </div>
		
		<label>Berkas-berkas:</label>        
        <div class="card" style="padding: 8px">
        	<input type="file" id="browse-file" data-layanan="" data-idrefberkas="" data-berkas="" hidden=""/>
	        <?php $syarat_berkas=$this->m_syarat_berkas->get_syarat_berkas_by_ref_layanan($id_ref_layanan);
	        	foreach($syarat_berkas as $r):
	        	$ket=$this->m_berkas->get_ket_berkas($id_layanan, $r['id_ref_berkas']);
	        	$file=$this->m_berkas->get_file_berkas($id_layanan, $r['id_ref_berkas']);
	        	$dl_file=base_url('download?id_layanan='.$id_layanan.'&file='.$file);
	        ?>
			<div class="form-group row">
		        <label class="col-sm-4 col-form-label"><?=$r['berkas']?></label>
		        <div class="col-sm-4" style="text-align: right">
					<div class="btn-group" role="group">
					  <button type="button" 
					    <?php if($file=='') echo 'class="btn btn-sm btn-primary"'; else echo 'class="btn btn-sm" disabled'; ?>
					  	onclick="upload_berkas('<?=$id_layanan?>','<?=$r['id_ref_berkas']?>','<?=fix_file_name($r['berkas'])?>');"
					  	title="Upload"
					  ><i class="fa fa-cloud-upload"></i></button>
					  <button type="button" 
					    <?php if($file!='') echo 'class="btn btn-sm btn-success"'; else echo 'class="btn btn-sm" disabled'; ?>
					  	onclick="location.href='<?=$dl_file?>'"
					  	title="Download"
					  ><i class="fa fa-cloud-download"></i></button>
					  <button type="button" 
					    <?php if($file!='') echo 'class="btn btn-sm btn-danger"'; else echo 'class="btn btn-sm" disabled'; ?>
					  	data-toggle="modal" data-target="#hapusBerkasModal"
					  	data-idlayanan="<?=$id_layanan?>" data-idrefberkas="<?=$r['id_ref_berkas']?>" data-file="<?=$file?>"
					  	title="Hapus"
					  ><i class="fa fa-trash"></i></button>
					</div>
				</div>
		        <div class="col-sm-4">
					<input id="keterangan" style="width: 100%" placeholder="keterangan" value="<?=$ket?>"/>
				</div>
		    </div>
		    <?php endforeach; ?>
	    </div>
      </form>
    <br />
    <a href="javascript:history.back();" class="btn btn-secondary"><i class="fa fa-backward"> Kembali</i></a>
    <a id="simpan" class="btn btn-primary"><i class="fa fa-save"> Simpan</i></a>
    <br />
    <div class="card" style="padding: 8px">
    	<label>Status distribusi</label>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
    		<thead>
    			<tr>
    				<th>Bagian</th>
    				<th>Respon</th>
    				<th>Tanggal</th>
    				<th>Ket</th>
    			</tr>
    		</thead>
    		<tbody>
    		<?php 
    		$arr_bagian=$this->m_bagian->get_bagian();
    		foreach($arr_bagian as $b):
    			echo '<tr><td>'.$b['bagian'].'</td>';
	    		$arr_respon = $this->m_respon->get_respon($id_layanan, $b['id']);
	    		//echo($id_layanan.'-'.$b['id']);
	    		$respon='<span class="badge badge-secondary"><i class="fa fa-question"></i></span>';;
	    		$tgl_respon='';
	    		$keterangan='';
	    		
	    		foreach($arr_respon as $r):
		    		if($r['respon']==1) 	$respon='<span class="badge badge-success">	 <i class="fa fa-check"></i></span>';
		    		elseif($r['respon']==2) $respon='<span class="badge badge-danger">	 <i class="fa fa-remove"></i></span>';
		    		$tgl_respon=($r['respon_tanggal']=='' || $r['respon_tanggal']=='1990-01-01 01:01:01')?'':$r['respon_tanggal']; 
		    		$keterangan=$r['keterangan'];
    			endforeach;
    			
				echo '<td>'.$respon.'</td>';
				echo '<td>'.$tgl_respon.'</td>';
				echo '<td>'.$keterangan.'</td>';
    			echo '</tr>';
    		endforeach;
    		?>
    		</tbody>
    	</table>
    	</div>
    	
    	<div class="row">
    	<div class="col-sm-6">
	    	<a id="kembalikan" class="btn btn-success" data-toggle="modal" data-target="#logoutModal">
	    		<i class="fa fa-mail-reply"> Kembalikan ke </i>
	    	</a>
	    </div>
    	<div class="col-sm-6" style="text-align: right">
	    	<a id="teruskan" class="btn btn-success" data-toggle="modal" data-target="#logoutModal">
	    		<i class="fa fa-mail-forward"> Teruskan ke </i>
	    	</a>
	    </div>
    	</div>
    </div>
	</div>
  </div>
</div>
</div>

<div class="modal fade" id="responModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #e9ecef">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea id="ket-terus-atau-kembali" placeholder="Keterangan"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="terus-atau-kembali"></button>
        <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
function upload_berkas(id_layanan, id_ref_berkas, berkas){
	$('#browse-file').val('');
	$('#browse-file').data('idlayanan', id_layanan);
	$('#browse-file').data('idrefberkas', id_ref_berkas);
	$('#browse-file').data('berkas', berkas);
	$('#browse-file').click();
};

$(function(){
	$('#browse-file').change(function(){
		var ctl_file = $(this);
    	if(ctl_file.val()==''){
    		return;				
		}

	    var form_data = new FormData();                  
	    form_data.append('id_layanan', ctl_file.data('idlayanan'));
	    form_data.append('id_ref_berkas', ctl_file.data('idrefberkas'));
	    form_data.append('berkas', ctl_file.data('berkas'));
	    form_data.append('file_data', ctl_file.prop('files')[0]);
	    form_data.append('file_name', ctl_file.val());

	    $.ajax({
	        type		: 'post',
	        url			: '<?=base_url("api/upload_berkas_persyaratan")?>',
	        data		: form_data,                         
	        dataType	: 'text', 
	        cache		: false,
	        contentType	: false,
	        processData	: false,
	        success		: function(data){
	        				if(data==1) location.reload();
							else alert(data);
	        			  }
	     });			    	

	});

});
</script>