<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-6">
                  <div class="box box-solid">
                        <div class="box-body">
                              <form method="post" action="<?php echo base_url('admin/mehsuldeyisdir/'.$product->id);?>" >
                                    <div class="form-group">
                                          <label>Mehsul adi</label>
                                          <input type="text" name="title" placeholder="Mehsul adini yazin" value="<?=$product->title?>"  class="form-control">
                                          
                                    </div>
                                      <div class="form-group">
                                          <label>Mehsul kateqoriyasi</label>
                                         <select name="category" class="form-control">
                                          <option <?php if($product->category==1){echo "selected";} ?> value="1">Kisi</option>
                                          <option <?php if($product->category==2){echo "selected";} ?> value="2">Qadin</option>
                                          <option<?php if($product->category==3){echo "selected";} ?> value="3">Usaq</option>


                                         </select>
                                          
                                    </div>
                                      <div class="form-group">
                                          <label>Alt kateqoriyasi</label>
                                         <select name="subcategory" class="form-control">
                                    <?php foreach ($subcategory as $category ) {?>
                                         
                                     <option <?php if($product->subcategory==$category->id){echo "selected";}?> value="<?php echo  $category->id; ?>"><?php echo $category->name;?></option>
                                         <?php } ?>


                                         </select>
                                          
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-6">
                                          <label>Mehsul qiymeti</label>
                                          <input type="text" class="form-control" name="price" value="<?=$product->price;?>">
                                          
                                        </div>
                                        <div class="col-xs-6">
                                          <label>Endirimli qiymeti</label>
                                          <input type="text" class="form-control" name="discount" value="<?=$product->discount;?>">
                                          
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                    <div class="form-group">
                                      <label>Mehsul melumati</label>
                                      <textarea class="form-control" name="desc" rows="3"><?=$product->description?></textarea>


                                    </div>
                                       <div class="form-group">
                                          <label>Mehsul tag</label>
                                          <input type="text" name="tag" class="form-control" value="<?=$product->tag?>">
                                          
                                    </div>
                                    <div class="form-group">
                                          <button type="submit" name="product" value="1" class="btn btn-block btn-flat btn-success">Deyisdir</button>
                                          
                                    </div>
                              </form>
                              
                        </div>
                        
                  </div>


      		
      	</div>
          <div class="col-md-6">
                    <div class="box box-solid">
                      <div class="box-body">
                      <div class="row">
                           <?php foreach ($images as $image ) {?>
                           <div class="col-sm-4">
                                             <img src="<?php echo base_url($image->path);?>" class="img-responsive img-lg">
                                             <a href="<?php echo base_url('admin/mehsulsekilsil/'.$image->id);?>" class="btn btn-danger"><i class="fa fa-remove"> sekil sil</i></a>
                                             <?php if($image->master==0){ ?>
                                             <a href="<?php echo base_url('admin/mehsulsekilfon/'.$image->id);?>" class="btn btn-success"><i class="fa fa-camera"> fon sekili et</i></a>
                                             <?php } ?>

                           </div>
                      
                <?php } ?>
                      </div>
                     
                           <hr>
                      </div>
                       <form class="dropzone" action="<?php echo base_url('admin/mehsulsekilelave/'.$product->id);?>" method="post" enctype="multipart/form-data">
                             
                           </form>
                 
                      
                    </div>
                    
                  </div>
                  
      
     
      </div>
      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mehsul stok melumatlari</h3>

           
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
        
                  <th><?php echo secimler::find($type->option1)->name?></th>
                  <?php if(secimler::find($type->option2)){ ?>
                  <th><?php echo secimler::find($type->option2)->name?></th>
                  <?php } ?>
                  <th>Stok sayisi</th>
                  <th>Emeliyyat</th>
                </tr>
                <?php foreach ($stock as $stok) {?>
               
                <tr>
                  <td><?php echo altsecimler::find($stok->suboption1)->name?></td>
                  <?php if(altsecimler::find($stok->suboption2)){ ?>
                  <td><?php echo altsecimler::find($stok->suboption2)->name ?></td>
                  <?php } ?>
                  <td><?php echo $stok->stock?></td>
                  <td>
                    <a href="<?php echo base_url('admin/mehsulstokdeyisdir/'.$stok->id)?>" class="btn tn-xs btn-primary"><i class="fa fa-edit">Deyisdir</i></a>
<?php deletebutton('stock',$stok->id); ?>
                  </td>
                </tr>
               <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>


<?php $this->load->view('admin/include/footer');?>
 