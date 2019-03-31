<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-3">

      		<div class="small-box bg-aqua">
            <div class="inner">
              <h5>Mehsul elave et</h5>

            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
            <a href="<?php echo base_url('admin/mehsulelave');?>" class="small-box-footer">elave et <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      	</div>
      	<div class="col-md-9">
      	<div class="box box-solid">
      		<div class="box-body">
      				<table id="category" class="table table-bordered table-striped">
      		<thead>
      			<tr>
      				<th>Mehsul adi</th>
      				<th>Mehsul kateqoriyasi</th>
                              <th>Mehsul alt  kateqoriyasi</th>
                                <th>Mehsul qiymeti</th>


      				<th>emeliyyatlar</th>
      					
      	
      			</tr>
      		</thead> 
      		<tbody>
      			<?php foreach ($products as $product) {?>
      			
      			<tr>
      			<td><?php echo $product->title ?></td>
      			<td><?php if($product->category==1){echo "Kisi";} elseif($product->category==2){echo "Qadin";} else{echo "Usaq";} ?></td>
                  <td>
                        <?php echo kateqoriya::find( $product->subcategory)->name; ?>
                  </td>
                  <td>
                        <?php if($product->discount!=null){echo "<del class='text-red'>".$product->price."Man"."</del>"."  " .$product->discount."Man";}else{echo $product->price."Man";} ?>

                  </td>
                  <td>

                                          <a href="<?php echo base_url('admin/mehsuldeyisdir/'.$product->id)?>" class="btn btn-xs btn-default"><i class="fa fa-edit">Deyisdir</i></a>

                  </td>
                  <td>
                              <?php deletebutton('products',$product->id); ?>

                  </td>



      				
      		</tr>

      		<?php } ?>
      		</tbody>
      			
      		</table>
      			
      		</div>
      		
      	</div>
      		
      	</div>
      
     
      </div>

<?php $this->load->view('admin/include/footer');?>