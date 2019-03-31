<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
            <div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/altsecimelave/'.$this->uri->segment(3));?>" >
                                    <div class="form-group">
                                          <label>Alt Secim adi</label>
                                          <input type="text" autocomplete="off" name="suboption" placeholder="alt secim adini yazin" required class="form-control">
                                          
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