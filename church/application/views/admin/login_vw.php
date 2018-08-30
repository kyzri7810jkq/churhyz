
<?php $this->load->view('admin/parts/header_vw'); ?>

<style>
  body{
    background: #fff;
  }
</style> 
<div class="container-fluid">
  
<?php if(validation_errors()): ?>
<div class="alert alert-danger"><?php echo validation_errors() . $message; ?></div>
<?php endif ?>

    <!-- Page Heading -->
    <div class="row"> 
        <div class="col-md-4 col-md-offset-4">
            <h2 class="page-header">
                <i class="fa fa-user"></i>&nbsp;Login 
            </h2>  
    <?php
    echo form_open(base_url('auth/login') , array('class'=>"form-signin"));
    ?>  
    <label for="username">Username</label>
<input type="text" class="form-control" name="username" id="username" placeholder="Your Username" autofocus><br>
<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder="Password"> <br><br>
<input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Log in" />

    <?php 
    echo form_close();
    ?>
        </div>
    </div>  <!-- /.row -->
</div> 
 
<?php $this->load->view('admin/parts/footer_vw'); ?>