<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                           <form class="dropzone" action="<?php echo base_url('admin/mehsulsekilelave/'.$this->uri->segment(3).'');?>" method="post" enctype="multipart/form-data">
                             
                           </form>
                           <div>
                             <a href="<?php echo base_url('admin/mehsulstoktipielave/'.$this->uri->segment(3).'');?>" class="btn btn-success btn-flat btn-block">Mehsul secimleri ve stok melumatlari</a>
                           </div>
                              
                        </div>
                        
                  </div>


      		
      	</div>
          <div class="col-md-4">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">2-ci Merhele</h3>
                        <div class="box-body">
                          <h3 align="center">Mehsul sekil melumati </h3>
                          
                        </div>
                        
                        
                      </div>
                      
                    </div>
                    
                  </div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>
