<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>file/<?php echo $this->session->userdata('img'); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/e.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-learning</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Payment Point Online Bank">
    <meta name="author" content="Trimindi Media">
    <meta name="robots" content="noindex, nofollow">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="<?php echo base_url();?>assets/css/select2.min.css" type="text/css" rel="stylesheet"/>


    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" type="text/css" rel="stylesheet"/>





	<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.full.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>


    <style type="text/css">

      .img-responsive1 {
        width: 50px;
        height: 50px;
        position:absolute;
        left:50%;
        top:50%;
        margin-top:-25px; /* This needs to be half of the height */
        margin-left:-25px;
      }

      .sidebar .nav li > a, .off-canvas-sidebar .nav li > a{
          margin: 0px 15px 0;
      }

      .nav > li > a{
          padding: 8px 15px;
      }
    </style>
</head>






<style type="text/css">

    .head_table{
        background-color:#34b027; color:white;
    }
    .btn.btn-info.btn-simple, .navbar .navbar-nav > li > a.btn.btn-info.btn-simple{
        padding: 0px; margin: 5px 0px;
    }
    .btn.btn-success.btn-simple, .navbar .navbar-nav > li > a.btn.btn-success.btn-simple{
        padding: 0px; margin: 5px 0px;
    }
    .btn.btn-danger.btn-simple, .navbar .navbar-nav > li > a.btn.btn-danger.btn-simple{
        padding: 0px; margin: 5px 0px;
    }
    .modal .modal-dialog{
        margin-top: 20px;
    }

    .select2-container--default .select2-selection--single{
        background-color: transparent;
        border-radius: 0px
    }

    .sidebar[data-active-color="blue"] li.active > a, .off-canvas-sidebar[data-active-color="blue"] li.active > a{
    	background-color: white;
    	box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(16, 111, 6, 0.7);
    }

    .sidebar .nav li.active > a, .sidebar .nav li.active > a i, .off-canvas-sidebar .nav li.active > a, .off-canvas-sidebar .nav li.active > a i{
    	color: black;
    }

    .sidebar .nav i, .off-canvas-sidebar .nav i{
    	color: white;
    }
    .sidebar .nav li > a, .off-canvas-sidebar .nav li > a{
    	color: white;
    }

    .sidebar .sidebar-background::after, .off-canvas-sidebar .sidebar-background::after{
    	background:#FFF3;
    }

    .header_panel{
    	background-color: #a5e65a;
    	background-image:linear-gradient(45deg, #a5e65a 0%, #22F594 100%);
    }

    .reload_table{
    	color: #4fc143;
    }
</style>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chartist.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.bootstrap-wizard.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-jvectormap.js"></script>
<script src="<?php echo base_url();?>assets/js/nouislider.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.select-bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.datatables.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.js"></script>
<script src="<?php echo base_url();?>assets/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.tagsinput.js"></script>
<script src="<?php echo base_url();?>assets/js/material-dashboard.js"></script>
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/js/accounting.js"></script>

<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>


<body>

    <div class="wrapper">


        <div class="sidebar" data-active-color="blue" data-background-color="white" style="background-color: #4fc143">
            <div class="logo" style="background-color: white">
                <a  href="<?php echo base_url(); ?>" class="simple-text">
                    <?php
                      echo $this->session->userdata('level')." - ".$this->session->userdata('nama');
                     ?>
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="<?php echo base_url(); ?>" class="simple-text">
                    CA
                </a>
            </div>
            <div class="sidebar-wrapper" style="background-color: <?php echo $this->session->userdata('color'); ?>">
                <div class="user">
                    <div class="photo" style="border-radius: unset; width: 100px; box-shadow: unset; height: 100px">
                        <img src="<?php echo base_url()?>assets/user.png">
                    </div>
                </div>
                <ul class="nav">

                    <li>
                        <a href="<?php echo base_url()?>app">
                            <i class="material-icons">exit_to_app</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>app/menu">
                            <i class="material-icons">exit_to_app</i>
                            <p>List Menu</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>app/record">
                            <i class="material-icons">exit_to_app</i>
                            <p>Record activity</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="logout()">
                            <i class="material-icons">exit_to_app</i>
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </div>

        </div>





<script type="text/javascript">
    function logout(){
        swal({
                title: 'Apakah anda yakin?',
                text: "anda akan keluar dari sistem!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Tidak!',
                buttonsStyling: false
            }).then(function() {
                window.location.href = "<?php echo base_url();?>app/logout";
            });
    }
</script>