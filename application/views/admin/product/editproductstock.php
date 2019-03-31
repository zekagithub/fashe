<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
        <div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/mehsulstokdeyisdir/'.$this->uri->segment(3));?>" >
                                   
                                     <div class="row">
                                      <div class="col-xs-12">
                                        <div class="form-group">
                                          <label>
                                            <a href="<?php echo base_url("admin/mehsuldeyisdir/".$stocks->product)?> " class="btn btn-sm btn-default"><i class="fa fa-arrow-left">Mehsul deyisdire geri qayit</i></a>
                                          </label>
                                          
                                        </div>
                                      <div class="form-group">
                                          <label><?php echo secimler::find($type->option1)->name;?></label>
                                         <select name="subcategory1" class="form-control">
                                    <?php foreach ($options as $option ) {?>
                                         
                                     <option value="<?php echo  $option->id; ?>"<?php if($option->id==$stocks->suboption1){echo "selected";};?>><?php echo $option->name;?></option>
                                         <?php } ?>


                                         </select>

                                          
                                    </div>

                                  </div>
                                    <?php if($option2!=null)  { ?>
                                    <div class="col-xs-6">
                                      <div class="form-group">
                                          <label><?php echo secimler::find($type->option2)->name;?></label>
                                         <select name="subcategory2" class="form-control">
                                    <?php foreach ($option2 as $option ) {?>
                                         
                                     <option value="<?php echo  $option->id; ?>"<?php if($option->id==$stocks->suboption2){echo "selected";};?>><?php echo $option->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                  </div>
                                  <?php } else{
                                    echo"tapilmadi";
                                  }  ?>
                                
                                </div>
                                <div class="form-group">
                                  <label>stock sayisi</label>
                                  <input type="number" name="stock" class="form-control" value="<?php echo $stocks->stock ?>" min="1" >
                                </div>
                                 
                                   
                                    <div class="form-group">
                                          <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Deyisdir</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>
                  


          
        </div>
          
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>
