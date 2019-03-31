<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/secimdeyisdir/'.$options->id);?>" >
                                    <div class="form-group">
                                          <label>Secim adi</label>
                                          <input type="text" name="option" value="<?php echo $options->name; ?>" class="form-control">
                                          
                                    </div>
                                
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-block btn-flat btn-success">Deyisdir</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>

      		
      	</div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>