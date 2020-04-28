<?php
$uri1	= $this->uri->segment(1);
$uri2	= $this->uri->segment(2);
   
?>

<ul class="sidebar navbar-nav">
<li class="nav-item <?=$uri1=='' ? 'active' : ''?>">
  <a class="nav-link" href="<?=base_url()?>">
    <i class="fa fa-fw fa-home"></i>
    <span>Beranda</span>
  </a>
</li>
<li class="nav-item <?=$uri1=='layanan' ? 'active' : ''?>">
  <a class="nav-link" href="<?=base_url('layanan')?>">
    <i class="fa fa-fw fa-question-circle "></i>
    <span>Layanan</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fa fa-fw fa-sign-out"></i>
    <span>Logout</span></a>
</li>


</ul>
