


<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/e.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <!--   Core JS Files   -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <!-- Select Plugin -->
    <script src="<?php echo base_url();?>assets/js/jquery.select-bootstrap.js"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="<?php echo base_url();?>assets/js/sweetalert2.js"></script>
    <!-- TagsInput Plugin -->
    <script src="<?php echo base_url();?>assets/js/jquery.tagsinput.js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url();?>assets/js/material-dashboard.js"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url();?>assets/js/demo.js"></script>
  

    <style type="text/css">
    .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    opacity: 0.5;
    background-color: white;
    }
    .img-responsive1 {
    width: 50px;
    height: 50px;
    position:absolute;
    left:50%;
    top:50%;
    margin-top:-25px; /* This needs to be half of the height */
    margin-left:-25px;
    }


    </style>
</head>
<body>
    <div class="se-pre-con" hidden=""><img src='<?php echo base_url();?>assets/img/loader.gif' class="img-responsive1" /></div>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url();?>assets/img/pay.png">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="" id="form-validation">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="black" style="background-color: #08AEEA;background-image: linear-gradient(45deg, #08AEEA 0%, #2AF598 100%);">
                                        <!-- <i class="material-icons" style="font-size: 50px">trending_up</i> -->
                                        <img style="width: 100px" src="<?php echo base_url()?>assets/img/e.png">
                                        <h4 class="card-title">Kasir</h4>
                                    </div>
                                    <div class="card-content">
                                        <div id="notif_error" hidden="" style="margin-left: 15px;padding: 10px;background-color: #fbe1e3;border-left: solid #e73d4a; color: #e73d4a">
                                            <p><span><i class="material-icons">warning</i></span><b id="pesan"></b></p>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" required="true">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" required="true" minlength="4">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" style="background-color: background-color: #08AEEA;background-image: linear-gradient(45deg, #08AEEA 0%, #2AF598 100%);" class="btn btn-info btn-wd btn-round btn-md">LOGIN</button>
                                        <br>
                                        <a href="#" onclick="reg()">Belum memiliki akun? Daftar disini.</a>

                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">

                </div>
            </footer>
        </div>
    </div>
</body>





<script type="text/javascript">







    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    function reg(){
      $('#modal-reg').modal('show');
    }

    $().ready(function() {

        
    });


    function registrasi(){
      $.ajax({
         url : "<?php echo site_url('App/registrasi')?>",
         data: {
           "npm":$('#npm').val(),
           "nama":$('#nama').val(),
           "semester":$('#semester').val(),
           "fakultas":$('#fakultas').val(),
           "jurusan":$('#jurusan').val(),
           "username":$('#username_reg').val(),
           "password":$('#password_reg').val()
         },
         type: "POST",
         dataType: "JSON",
         success: function(data)
         {
           swal('Sukses','Silahkan melanjutkan login aplikasi.','success');
           $('#modal-reg').modal('hide');
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
             swal('ERROR','Kesalahan sistem','error');
         }
     });
    }

    $( "#form-validation" ).submit(function( event ) {
        if ($('#form-validation').valid()){
            $('#submit').prop('disabled',true);
             $.ajax({
                url : "<?php echo site_url('Login/akses')?>",
                data: {"username":$('#username').val(),"password":$('#password').val()},
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    if (data.status) {
                        window.location.href = "<?php echo base_url('App');?>";
                    }else{
                        $('#submit').prop('disabled',false);
                        swal('Info!',data.message,'warning');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('#submit').prop('disabled',false);
                    swal('ERROR','Kesalahan sistem','error');
                }
            });
        }
        event.preventDefault();
    });

</script>

</html>
