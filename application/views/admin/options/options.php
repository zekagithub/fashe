<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-3">

      		<div class="small-box bg-aqua">
            <div class="inner">
              <h5>Mehsul secimleri elave et</h5>

            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
            <a href="<?php echo base_url('admin/secimelave');?>" class="small-box-footer">elave et <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      	</div>
      	<div class="col-md-9">
      	<div class="box box-solid">
      		<div class="box-body">
      				<table id="category" class="table table-bordered table-striped">
      		<thead>
      			<tr>
      				<th>Secim adi</th>
      				<th>Secim sayisi</th>
      				<th>emeliyyatlar</th>
      					
      	
      			</tr>
      		</thead> 
      		<tbody>
      			<?php foreach ($options as $option) {?>
      			
      			<tr>
      			<td><?php echo $option->name ?></td>
      			<td><?php echo altsecimler::count(['option_id'=>$option->id]); ?></td>
      			<td>
                              <a href="<?php echo base_url('admin/altsecimler/'.$option->id); ?>" class="btn btn-success"><i class="fa-fa-circle-o">Alt secimler</i></a>
      				<a href="<?php echo base_url('admin/secimdeyisdir/'.$option->id);?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Deyisdir</a>
      				  <?php deletebutton('options',$option->id); ?>


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