<div class="row">
<div class="col-lg">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-wpforms"> <strong><?=$title?></strong></i>
    </div>
    <div class="card-body">
        <table width="100%" id="tbl-layanan" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Satker</th>
                    <th>Layanan</th>
                    <th>Pemohon</th>
                    <th>No. HP</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
	            $no = 1;
	            foreach($layanan as $r): 
            ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$r['satker']?></td>
                    <td><?=$r['layanan']?></td>
                    <td><?=$r['pemohon']?></td>
                    <td><?=$r['hp']?></td>
                    <td><?=$r['fo_acc_tanggal']?></td>
                    <td>
                    	<span class="badge badge-success">Fo</span>
                    	<span class="badge badge-secondary">Bo</span>
                    	<span class="badge badge-secondary">Ka</span>
                    	<span class="badge badge-secondary">Tu</span>
                    	<span class="badge badge-secondary">Sk</span>
                    </td>
                    <td>
                    	<button class="btn btn-sm btn-primary" onclick="location.href='<?=base_url('layanan/lihat/'.$r['id'])?>'">
                    		<i class="fa fa-eye"></i> Lihat
                    	</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
		<button class="btn btn-primary" onclick="location.href='<?=base_url('layanan/tambah')?>'">
			<i class="fa fa-plus"></i> Tambah
		</button>
	</div>
  </div>
</div>
</div>

<script>
$(document).ready(function(){ 
	$('#tbl-layanan').DataTable({
		scrollX: true,
		dom: 'Bfrtip',
		buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5']
	});

}); 
</script>
