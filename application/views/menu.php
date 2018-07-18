<?php include 'design/header.php';?>

        <div class="main-panel" style="background-color: #f6f7f8;background-image: linear-gradient(225deg, #f6f7f8 0%, #e1eaea 33%, #f6f7f8 66%, #e1eaea 100%);">

            <div class="content" style="margin-top:-20px">

              <div class="row" style="margin: 0px"><h4 class="pull-left"><b>Daftar menu</b></h4>
               </div>

              
              <div class="material-datatables" style="padding: 10px; background: white">
                        <table id="table_menu" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead class="head_table">
                                <tr>
                                    
                                    <th><strong>ID</strong></th>
                                    <th><strong>NAMA MENU</strong></th>
                                    <th><strong>KATEGORI</strong></th>
                                    <th><strong>STATUS</strong></th>
                                    <th><strong style="text-align: right">HARGA</strong></th>
                                    <th><strong>UBAH STATUS</strong></th>
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
  var table_menu;
    $(document).ready(function() {
      load_table_menu();
    });


    function tambah(){
        $('#modal_tambah').modal('show');
    }


    function load_table_menu(){
        table_menu = $('#table_menu').DataTable({
          "ajax": {
                    "url": "<?php echo site_url('App/load_table_menu')?>",
                    "type": "POST",
                    "data": function ( data ) {
                    },
                },
        } );
    }

    function reload_table_menu(){
        table_menu.ajax.reload(null, false);
    }
  

 

    function ubah_status(id, status) {

        if (status == 'nonaktifkan') {
            link = "<?php echo site_url('App/nonaktifkan_menu')?>";
        }else{
            link = "<?php echo site_url('App/aktifkan_menu')?>";
        }
          $.ajax({
            url : link,
            data: {
              "id":id
            },
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
            
              swal('Sukses','Menu berhasil diperbarui','success');
              reload_table_menu();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal('ERROR','Kesalahan sistem','error');
            }
          });
    }






</script>
</html>
