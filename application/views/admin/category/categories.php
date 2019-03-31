<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-3">

      		<div class="small-box bg-aqua">
            <div class="inner">
              <h3>Kateqoriya</h3>

            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
            <a href="<?php echo base_url('admin/kateqoriyaelave');?>" class="small-box-footer">elave et <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      	</div>
      	<div class="col-md-9">
      	<div class="box box-solid">
      		<div class="box-body">
      				<table id="category" class="table table-bordered table-striped">
      		<thead>
      			<tr>
      				<th>kateqoriya adi</th>
      				<th>ust kateqoriya</th>
      				<th>emeliyyatlar</th     	
      			</tr>
      		</thead> 
      		<tbody>
      			<?php foreach ($categories as $kateqoriya) {?>
      			
      			<tr>
      			<td><?php echo $kateqoriya->name ?></td>
      			<td><?php if($kateqoriya->topcategory==1){echo "Kisi";} elseif($kateqoriya->topcategory==2){echo "Qadin";} else{echo "Usaq";} ?></td>
      			<td>
      				<a href="<?php echo base_url('admin/kateqoriyadeyisdir/'.$kateqoriya->id);?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Deyisdir</a>
                              <?php deletebutton('category',$kateqoriya->id); ?>

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