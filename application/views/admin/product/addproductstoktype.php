<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
        <div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/mehsulstoktipielave/'.$this->uri->segment(3));?>" >
                                   
                                     <div class="row">
                                      <div class="col-xs-6">
                                      <div class="form-group">
                                          <label>Mehsul 1-ci secimi mueeyyenlesdirin</label>
                                         <select name="subcategory1" class="form-control">
                                    <?php foreach ($options as $option ) {?>
                                         
                                     <option value="<?php echo  $option->id; ?>"><?php echo $option->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                  </div>
                                    <div class="col-xs-6">
                                      <div class="form-group">
                                          <label>Mehsul 2ci secimini mueeyyenlesdirin</label>
                                         <select name="subcategory2" class="form-control">
                                    <?php foreach ($options as $option ) {?>
                                    <option value="0">Secim edin</option>
                                         
                                     <option value="<?php echo  $option->id; ?>"><?php echo $option->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                  </div>
                                </div>
                                 
                                   
                                    <div class="form-group">
                                          <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Elave et</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>


          
        </div>
          <div class="col-md-4">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">3-cu Merhele</h3>
                        <div class="box-body">
                          <h3 align="center">Mehsul secimleri ve stok </h3>
                          
                        </div>
                        
                        
                      </div>
                      
                    </div>
                    
                  </div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>
