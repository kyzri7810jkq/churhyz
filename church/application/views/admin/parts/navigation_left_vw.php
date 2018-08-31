<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo site_name(); ?></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">  
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome, <?php echo $this->session->userdata('username'); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li> 
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li <?php if($this->uri->segment(1)=='') echo 'class="active"'; ?>>
                <a href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>   
            <li  <?php if($this->uri->segment(1)=='people') echo 'class="active"'; ?>>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user"></i> People <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="<?php echo base_url('people/add'); ?>">Add New</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('people'); ?>">List All</a>
                    </li>
                </ul>
            </li>  
            <li>
                <a href="<?php echo base_url('track'); ?>">
                    <i class="fa fa-fw fa-user"></i> CC8 track
                </a>
            </li>  
            <li>
                <a href="<?php echo base_url('users'); ?>">
                    <i class="fa fa-fw fa-user"></i> Users
                </a>
            </li>  
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>