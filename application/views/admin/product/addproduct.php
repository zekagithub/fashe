<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/mehsulcontroller');?>" >
                                    <div class="form-group">
                                          <label>Mehsul adi</label>
                                          <input type="text" name="title" placeholder="Mehsul adini yazin"  class="form-control">
                                          
                                    </div>
                                      <div class="form-group">
                                          <label>Mehsul kateqoriyasi</label>
                                         <select name="category" class="form-control">
                                          <option value="1">Kisi</option>
                                          <option value="2">Qadin</option>
                                          <option value="3">Usaq</option>


                                         </select>
                                          
                                    </div>
                                      <div class="form-group">
                                          <label>Alt kateqoriyasi</label>
                                         <select name="subcategory" class="form-control">
                                    <?php foreach ($subcategory as $category ) {?>
                                         
                                     <option value="<?php echo  $category->id; ?>"><?php echo $category->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-6">
                                          <label>Mehsul qiymeti</label>
                                          <input type="text" class="form-control" name="price">
                                          
                                        </div>
                                        <div class="col-xs-6">
                                          <label>Endirimli qiymeti</label>
                                          <input type="text" class="form-control" name="discount">
                                          
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                    <div class="form-group">
                                      <label>Mehsul melumati</label>
                                      <textarea class="form-control" name="desc" rows="3"></textarea>


                                    </div>
                                       <div class="form-group">
                                          <label>Mehsul tag</label>
                                          <input type="text" name="tag" class="form-control">
                                          
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
                        <h3 class="box-title">1-ci Merhele</h3>
                        <div class="box-body">
                          <h3 align="center">Mehsul melumati </h3>
                          
                        </div>
                        
                        
                      </div>
                      
                    </div>
                    
                  </div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>
