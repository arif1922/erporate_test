<?php include 'design/header.php';?>

        <div class="main-panel" style="background-color: #f6f7f8;background-image: linear-gradient(225deg, #f6f7f8 0%, #e1eaea 33%, #f6f7f8 66%, #e1eaea 100%);">

            <div class="content" style="margin-top:-20px">

              <div class="row" style="margin: 0px"><h4 class="pull-left"><b>Daftar aktifitas</b></h4>
               </div>

              
              <div class="material-datatables" style="padding: 10px; background: white">
                        <table id="table_aktifitas" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead class="head_table">
                                <tr>
                                    
                                    <th><strong>WAKTU</strong></th>
                                    <th><strong>USER</strong></th>
                                    <th><strong>AKTIFITAS</strong></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

    <!-- //code.jquery.com/jquery-1.12.4.js -->



<script type="text/javascript">
  var table_aktifitas;
    $(document).ready(function() {
      load_table_aktifitas();
    });




    function load_table_aktifitas(){
        table_aktifitas = $('#table_aktifitas').DataTable({
          "ajax": {
                    "url": "<?php echo site_url('App/load_table_aktifitas')?>",
                    "type": "POST",
                    "data": function ( data ) {
                    },
                },
        } );
    }

    function reload_table_aktifitas(){
        table_aktifitas.ajax.reload(null, false);
    }
  




</script>
</html>
