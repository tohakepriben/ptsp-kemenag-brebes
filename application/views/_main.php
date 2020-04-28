<?php
$uri1	= $this->uri->segment(1);
$uri2	= $this->uri->segment(2);
$uri3	= $this->uri->segment(3);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Penerimaan Peserta Didik Baru SMK Arya Singasari Larangan">
    <meta name="author" content="M. Toha Kepriben">
    <link href="<?=base_url('assets/favicon.png')?>" rel="icon" type="image/png" />	

	<?php if($uri1==''): ?>
    	<title>PTSP Kemenag Brebes</title>
	<?php else: ?>
	    <title>PTSP Kemenag Brebes - <?=$title?></title>
	<?php endif; ?>

    <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/sb-admin.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap"> 
    
    <link rel="stylesheet" href="<?=base_url('assets/vendor/datatables/datatables.min.css')?>">	    
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<?php if($uri1==''): ?>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/chart/chart.min.css')?>">	
    <script src="<?=base_url('assets/vendor/chart/chart.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/chart/chartjs-plugin-datalabels.js')?>"></script>
	<?php endif; ?>	

	<?php if($uri1=='layanan'): ?>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/select2/select2.min.css')?>">	
    <script src="<?=base_url('assets/vendor/select2/select2.min.js')?>"></script>
	<?php endif; ?>	
	
	<?php if($uri1=='pengumuman'): ?>
    <script src="<?=base_url('assets/vendor/ckeditor/ckeditor.js')?>"></script>
	<?php endif; ?>
	

</head>
	
<body id="page-top">
	<?php $this->load->view('_top') ?>
 
    <div id="wrapper">
	<?php $this->load->view('_menu') ?>
      <!-- Sidebar -->

      <div id="content-wrapper">

        <div class="container-fluid">


        <?php 
        	if($uri1==''){
	        	$this->load->view('beranda');

			}elseif($uri1=='layanan'){
	        	if		($uri2=='lihat' && $uri3>0) 	$this->load->view('layanan/lihat');
				elseif	($uri2=='tambah') 			$this->load->view('layanan/tambah');
				else 								$this->load->view('layanan/data');

			}else{
	        	$this->load->view($uri1);
			}
        
        ?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer" style="height: 50px">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Kemenag Brebes <?=date('Y')?></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
<?php if($this->session->has_userdata('level')): ?>
    <div class="modal fade bd-example-modal-sm" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #e9ecef">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Logout Aplikasi?</div>
          <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='<?=base_url('login/logout')?>'">Logout</button>
            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>


    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/datatables/datatables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/sb-admin.min.js')?>"></script>
  </body>

</html>
