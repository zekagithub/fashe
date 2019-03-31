<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/leftmenu');?>
 
      <div class="row">
      	<div class="col-md-3">

      		<div class="small-box bg-aqua">
            <div class="inner">
              <h5>Mehsul Altsecimleri elave et</h5>

            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
            <a href="<?php echo base_url('admin/altsecimelave/'.$option->id);?>" class="small-box-footer">elave et <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      	</div>
      	<div class="col-md-9">
      	<div class="box box-solid">
      		<div class="box-body">
      				<table id="category" class="table table-bordered table-striped">
      		<thead>
      			<tr>
      				<th>Alt Secim adi</th>
      				<th>Emeliyyatlar</th>
      					
      	
      			</tr>
      		</thead> 
      		<tbody>
      			<?php foreach ($suboptions as $suboption) {?>
      			
      			<tr>
      			<td><?php echo $suboption->name ?></td>
      		
      			<td>
                            
      				<a href="<?php echo base_url('admin/altsecimdeyisdir/'.$suboption->id);?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Deyisdir</a>
                              <?php deletebutton('suboptions',$suboption->id); ?>

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