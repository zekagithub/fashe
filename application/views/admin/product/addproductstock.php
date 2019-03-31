<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
        <div class="col-md-8">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/mehsulstok/'.$this->uri->segment(3));?>" >
                                   
                                     <div class="row">
                                      <div class="col-xs-12">
                                      <div class="form-group">
                                          <label><?php echo secimler::find($type->option1)->name;?></label>
                                         <select name="subcategory1" class="form-control">
                                    <?php foreach ($options as $option ) {?>
                                         
                                     <option value="<?php echo  $option->id; ?>"><?php echo $option->name;?></option>
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
                                         
                                     <option value="<?php echo  $option->id; ?>"><?php echo $option->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                  </div>
                                  <?php } ?>
                                
                                </div>
                                <div class="form-group">
                                  <label>stock sayisi</label>
                                  <input type="number" name="stock" class="form-control" value="1" min="1" >
                                </div>
                                 
                                   
                                    <div class="form-group">
                                          <button type="submit" name="step1" value="1" class="btn btn-block btn-flat btn-success">Elave et</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>
                  <div class="box box-primary">
                    <div class="box-body">
                      <?php foreach($stocks as $stok){ ?>
                      <li><u><?php echo secimler::find($type->option1)->name.'-</u> '.altsecimler::find($stok->suboption1)->name?>
                        <?php if(secimler::find($type->option2))
                        {
                          echo ' <u>'.secimler::find($type->option2)->name.'</u> -'.altsecimler::find($stok->suboption2)->name;

                        }echo ":Stok sayisi-$stok->stock"; ?>
                      
                    </li>
                      <?php } ?>
                      
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
                    <a href="<?php echo base_url('admin/mehsulcontroller/'.$this->uri->segment(3))?>" class="btn btn-flat btn-block btn-primary"><i class="fa fa-check">Mehsulu qeyd et</i></a>


                    
                  </div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>
