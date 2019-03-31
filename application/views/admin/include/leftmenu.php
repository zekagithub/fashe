
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/back/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
 
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li class="<?php active('panel');?>">
          <a href="<?php echo base_url('admin/panel');?>"> <i class="fa fa-dashboard"></i> <span>Anasehife</span></a>
        
        </li>
            <li class="<?php active('mehsullar');?>">
          <a href="<?php echo base_url('admin/mehsullar');?>"> <i class="fa fa-shopping-bag"></i> <span>Mehsullar</span></a>

        
        </li>
         
          <li class="<?php active('mehsulsecimleri');?>">
          <a href="<?php echo base_url('admin/mehsulsecimleri');?>"> <i class="fa fa-sort"></i> <span>Mehsul secimleri</span></a>

        
        </li>
         <li class="<?php active('kateqoriyalar');?>">
          <a href="<?php echo base_url('admin/kateqoriyalar');?>"> <i class="fa fa-list"></i> <span>Kateqoriyalar</span></a>

        
        </li>
            <li class="<?php active('config');?>">
          <a href="<?php echo base_url('admin/config');?>"> <i class="fa fa-cog"></i> <span>Sayt ayarlari</span></a>
        </li>

          <li>
          <a href="<?php echo base_url('admin/cixis');?>"> <i class="fa fa-sign-out"></i> <span>Cixis</span></a>
          
        
        </li>
        <li class="header">
          Funksiyalar:
        </li>
        <?php if($this->session->userdata('deletefunction')){ ?>
                  <a href="<?php echo base_url('admin/deletefunction');?>" class="btn btn-flat btn-block btn-success"><i class="fa fa-check" >Sil funksiyasi aciqdir</i></a>
                  <?php }else { ?>
           <a href="<?php echo base_url('admin/deletefunction');?>" class="btn btn-flat btn-block btn-danger"><i class="fa fa-exclamation" >Sil funksiyasi baglidir</i></a>

                  <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--ana baslangic qismi-->

   <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php if(isset( $head)) echo $head;; ?>
      </h1>
      <?php flashread();?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
