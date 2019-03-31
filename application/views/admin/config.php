<?php $this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="row">
	<div class="col-md-6">
		<div class="box box-solid">
			<div class="box-body">
	<form method="post" action="<?php  echo base_url('admin/configpost');?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Sayt adi</label>
						
						<input type="text" name="title" required class="form-control" value="<?php echo $config->title;?>" >
						<input type="hidden" name="id" required class="form-control" value="<?php echo $config->id;?>" >
					</div>
					<div class="form-group">
						<label>Mail</label>
						<input type="email" name="mail" required class="form-control" value="<?= $config->mail;?>">
						
					</div>
					<div class="form-group">
						<label>Adres melumati</label>
						<textarea class="form-control" rows="3" name="info" ><?=$config->info;?></textarea>
						
					</div>
					<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label>Sayt loqosu</label>
							<input type="file" name="logo" class="form-control" value="<?php echo $config->logo;?>">
							
						</div>
						<div class="col-xs-6">
							<label>Sayt iconu</label>
							<input type="file" name="icon" class="form-control" value="<?php echo $config->icon;?>">
							
						</div>
						
					</div>
				</div>
				<div class="form-group">
						<div class="row">
						<div class="col-xs-6">
							<label>Facebook unvani</label>
							<input type="text" name="facebook" class="form-control" value="<?php echo $config->facebook;?>">
							
						</div>
						<div class="col-xs-6">
							<label>Twitter unvani</label>
							<input type="text" name="twitter" class="form-control" value="<?php echo $config->twitter;?>">
							
						</div>
						
					</div>
				</div>
					<div class="form-group">
						<div class="row">
						<div class="col-xs-6">
							<label>Instaqram unvani</label>
							<input type="text" name="instagram" class="form-control" value="<?php echo $config->instagram;?>">
							
						</div>
						<div class="col-xs-6">
							<label>Youtube unvani</label>
							<input type="text" name="youtube" class="form-control" value="<?php echo $config->youtube;?>">
							
						</div>
						
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-flat btn-block">Qeydet</button>
					
				</div>
				
				</form>
			</div>
				
			</div>
			
		</div>
		
	</div>





<?php $this->load->view('admin/include/footer');
?>