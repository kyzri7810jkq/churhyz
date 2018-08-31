
<?php $this->load->view('admin/parts/header_vw'); ?>

<?php 
list($peps) = $peps->result();
$lastname  = ($this->input->post('lastname')) ? $this->input->post('lastname') : $peps->lastname;
$firstname = ($this->input->post('firstname')) ? $this->input->post('firstname') : $peps->firstname;
$middlename = ($this->input->post('middlename')) ? $this->input->post('middlename') : $peps->middlename;
$birthday = ($this->input->post('birthday')) ? $this->input->post('birthday') : $peps->birthday;
$contact = ($this->input->post('contact')) ? $this->input->post('contact') : $peps->contact;
$spouse = ($this->input->post('spouse')) ? $this->input->post('spouse') : $peps->spouse;
$address = ($this->input->post('address')) ? $this->input->post('address') : $peps->address;
?>
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
            <a href="<?php echo base_url('people'); ?>" class="pull-right">&laquo;Go back to List</a>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        People &raquo; EDIT <i class="fa fa-pencil"></i> 
                        <b>ID # <?php echo $this->input->get('pid'); ?></b> 
                    </h4>  
                </div> 
				<div class="col-md-12"> 

					<?php echo form_open(base_url('people/edit?pid=' . $this->input->get('pid'))); ?>
					<input type="hidden" value="<?php echo $this->input->get('pid') ?>" name="hidid">
					<div class="row">
						<div class="col-md-4">
							<label>* Lastname : </label>
							<input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" required>
						</div> 
						<div class="col-md-4">
							<label>* Firstname : </label>
							<input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" required>
						</div> 
						<div class="col-md-4">
							<label>Middlename : </label>
							<input type="text" name="middlename" value="<?php echo $middlename; ?>" class="form-control">
						</div> 
					</div><br>
					<div class="row">
						<div class="col-md-5">
							<label for="birthday">* Birthday (YYYY-MM-DD)</label>
							<input type="text" name="birthday" data-provide="datepicker" value="<?php echo $birthday; ?>" class="form-control" required><br>
							<label for="contact">Contact</label>
							<input type="text" name="contact" value="<?php echo $contact; ?>" class="form-control" ><br>
							<label for="spouse">Spouse</label>
							<input type="text" name="spouse" value="<?php echo $spouse; ?>" class="form-control" >
						</div>
						<div class="col-md-7">
							<label for="address">Address</label>
							<textarea name="address" class="form-control"  rows="9"><?php echo $address; ?></textarea>
						</div>
					</div><br><br><br>
					<input type="submit" name="update" value="Update Changes" class="btn btn-primary"> <hr>
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