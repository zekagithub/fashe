<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/kateqoriyaelave');?>" >
                                    <div class="form-group">
                                          <label>Kateqoriya adi</label>
                                          <input type="text" name="category" placeholder="kateqoriya adini yazin" required class="form-control">
                                          
                                    </div>
                                      <div class="form-group">
                                          <label>Ust kateqoriya</label>
                                         <select name="topcategory" class="form-control">
                                          <option value="1">Kisi</option>
                                          <option value="2">Qadin</option>
                                          <option value="3">Usaq</option>


                                         </select>
                                          
                                    </div>
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-block btn-flat btn-success">Elave et</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>

      		
      	</div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>