
<?php $this->load->view('admin/parts/header_vw'); ?>

<div id="wrapper">
 
	<?php $this->load->view('admin/parts/navigation_left_vw'); ?>
    <div id="page-wrapper"> 
        <div class="container-fluid"> 
        	<?php if(isset($message)): ?>
			<div class="alert alert-success"><?php echo $message; ?></div>
        	<?php endif; ?>
        	<?php if(validation_errors()): ?>
				<div class="alert alert-danger"><?php echo validation_errors() . $message; ?></div>
			<?php endif ?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        People &raquo; Add New 
                    </h4>  
                </div> 
				<div class="col-md-12"> 
					<?php echo form_open(base_url('people/add')); ?>
					<div class="row">
						<div class="col-md-4">
							<label>* Lastname : </label>
							<input type="text" name="lastname" class="form-control" required>
						</div> 
						<div class="col-md-4">
							<label>Middlename : </label>
							<input type="text" name="middlename" class="form-control">
						</div> 
						<div class="col-md-4">
							<label>* Firstname : </label>
							<input type="text" name="firstname" class="form-control" required>
						</div> 
					</div><br>
					<div class="row">
						<div class="col-md-5">
							<label for="birthday">* Birthday</label>
							<input type="text" name="birthday" class="form-control" required><br>
							<label for="contact">Contact</label>
							<input type="text" name="contact" class="form-control" ><br>
							<label for="spouse">Spouse</label>
							<input type="text" name="spouse" class="form-control" >
						</div>
						<div class="col-md-7">
							<label for="address">Address</label>
							<textarea name="address" class="form-control"  rows="9"></textarea>
						</div>
					</div><br><br><br>
					<input type="submit" name="store" value="Submit & Go to List " class="btn btn-primary">
					&nbsp;&nbsp;
					<input type="submit" name="addnew" value="Submit & Add New" class="btn btn-success"><br><br>
					<small class="text-muted">Note: Fields with asterisk are required</small>
					<?php echo form_close(); ?>
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>