<?php include 'design/header.php';?>

        <div class="main-panel" style="background-color: #f6f7f8;background-image: linear-gradient(225deg, #f6f7f8 0%, #e1eaea 33%, #f6f7f8 66%, #e1eaea 100%);">

            <div class="content" style="margin-top:-20px">


              <div class="row" style="margin-left:10px">
                <div class="col-md-9">
                  
                  <div class="row">
                    <h4 style="margin-top: 10px" class="text-left col-md-9"><b>Daftar Pesanan Aktif</b></h4>

                    <?php
                      if ($this->session->userdata('level') == 'kasir') {
                        
                      }else{
                        echo'<button onclick="pesanan_baru()" class="btn btn-info pull-right">Pesanan baru<div class="ripple-container"></div></button>';
                      }
                    ?>
                    
                  </div>


                  <div class="row" style="" id="daftar_pesanan">
                
                  </div>
                  <div class="col-md-6" id="pesanan_kosong" style="background: white; box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); display: none">
                    <img src="<?php echo base_url("assets/pesanankosong.png")?>">
                    <h4>Belum ada pesanan</h4> 
                    
                  </div>
                </div>
                <div class="col-md-3">

                  <div class="row">
                    <h4 style="margin-top: 10px; margin-bottom:20px " class="text-left col-md-12"><b>Pesanan Terbayar</b></h4>
                    
                    <label class="col-md-6" style="margin:0px">Total: </label> 
                    <label class="col-md-6 text-right" style="margin:0px"><b id="qty_penjualan">3</b> Penjualan</label>
                    <label class="col-md-7" style="margin:0px">Total nominal: </label> 
                    <label class="col-md-5 text-right" style="margin:0px" id="total_penjualan">100000</label>

                  </div>
                  
                  <div class="row" style="margin-top:5px" id="daftar_pesanan_terbayar">
                    
                  </div>
                </div>
              </div>


              

              

              

            </div>

        </div>
    </div>
</body>

    <!-- //code.jquery.com/jquery-1.12.4.js -->

    <div class="modal fade" id="modal_pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1200px; margin: 10px auto">
            <div class="modal-content">
                <div class="modal-header">
                    <button style="color: red;font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="judul_modal" class="modal-title" style="font-weight: bold;"><i class="material-icons">assignment</i></h4>

                    
                </div>
                <div class="modal-body">

                        <div class="col-md-7" style=";padding: 20px; padding-left: 0px; padding-top: 0px">
                          
                          <div id="daftar_menu">
                            
                          </div>

                          <div id="pesanan_terbayar" class="text-center" style="margin-top: 60px">
                            <i class="material-icons" style="font-size: 50px;padding: 20px;background: whitesmoke;border-radius: 10px;">how_to_vote</i>
                            <h4>Pesanan Terbayar</h4>
                          </div>

                        </div>

                        <div class="col-md-5" style="border: solid 1px skyblue;padding: 20px">

                          <h4 style="font-weight: bold;margin-top: 0px;">Rincian pesanan no : <span id="id_pesanan" style="color: green"></span></h4>
                                        <div class="row">
                                            <label class="col-sm-4 label-on-right">Nomor Meja</label>
                                            <div class="col-sm-8">
                                                <div class="form-group label-floating" style="margin: 0px">
                                                    <input class="form-control" type="text" id="no_meja" value="" required="true">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="keranjang_menu"></div>
                                        <label style="color: #d10505;background: antiquewhite;padding: 5px;" id="keranjang_kosong">Pesanan Kosong</label>
                                        
                                        <div style="margin-top: 8px">
                                          <label class="col-md-9"><b>TOTAL</b></label>
                                          <label style="color: green" class="col-md-3 pull-left"><b>Rp. <span id="total_keranjang" ></span></b></label>
                                        </div>

                        </div>

                </div>
                <div class="modal-footer">
                  
                  <button onclick="batal()" style="margin: 10px" type="button" class="btn  btn-danger pull-left" id="btn-batal"><span class="btn-label"> Hapus pemesanan </span></button>

                    <button onclick="simpan_pesanan()" style="margin: 10px; display: none" type="button" class="btn  btn-success" id="btn-save"><span class="btn-label">Tambah Pesanan</span></button>

                    <button onclick="pembayaran()" style="margin: 10px; display: none;" type="button" class="btn  btn-success" id="btn-bayar"><span class="btn-label">Pembayaran</span></button>


                </div>
            </div>
        </div>
    </div>




<script type="text/javascript">
    $(document).ready(function() {
      daftar_pesanan();
    });




    


    function pesanan_baru(){
      $('#modal_pesanan').modal('show');
      
      $('#btn-save').show();
      $('#judul_modal').text('Pesanan Baru');
      $('#btn-bayar').hide();
      $('#no_meja').attr('disabled', false);
      $('#no_meja').val('');
      $('#id_pesanan').text('');
      daftar_menu();
      daftar_keranjang();
      $('#pesanan_terbayar').hide();
      
    }


    function daftar_pesanan(){
      $.ajax({
        url : "<?php echo site_url('App/daftar_pesanan')?>",
        data: {

        },
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          

          if (data == '') {
            $('#pesanan_kosong').show();
          }
          else{
            $('#pesanan_kosong').hide();
            $('#daftar_pesanan').empty();
            $('#daftar_pesanan_terbayar').empty();

            aktif = 0;
            qty = 0;
            nominal = 0;
            $.each(data, function(a, b) {


              if (b.status_pesanan == 'terbayar') {
                append = "daftar_pesanan_terbayar";
                col = "col-md-12";
                rows2='<div class="'+col+'" style=" padding:5px;">'+
                        '<div class="row" style="background:white;border-left:solid blueviolet; margin:0px">'+
                          
                          '<div class="col-md-9">'+
                            '<h4 class="pull-left" style="color:green; font-weight:bolder; margin: 0px; text-align:left">Meja no: '+b.no_meja+'</h4>'+
                            '<label style="margin-top: 0px;" class="pull-left">'+b.waktu+'</label>'+
                          '</div>'+

                          '<div class="col-md-3"><i onclick=edit_keranjang("'+b.id_pesanan+'","'+b.no_meja+'","terbayar") class="material-icons pull-right" style="color: white;padding: 6px;cursor: pointer;background: blueviolet;">launch</i></div>'+
                          

                          '<h4 class="col-md-12" style="margin:0px"><b>'+b.id_pesanan+'</b></h4>'+
                          
                        '</div>'+
                    '</div>';

                    qty += 1;
                    nominal += parseInt(b.total);
              }
              else{
                append = "daftar_pesanan";
                col = "col-md-6";
                rows2='<div class="'+col+'" style=" padding:5px;">'+
                        '<div class="row" style="background:white;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); margin:0px">'+
                          
                          '<h4 class="col-md-10" style="margin-bottom:0px"><b>'+b.id_pesanan+'</b></h4>'+
                          
                          '<div class="col-md-2"><i onclick=edit_keranjang("'+b.id_pesanan+'","'+b.no_meja+'","aktif") class="material-icons pull-right" style="color: green;padding: 6px;cursor: pointer;background: greenyellow;">launch</i></div>'+
                          
                          '<label style="margin-top: 5px;" class="col-md-7 pull-left">'+b.waktu+'</label>'+
                          
                          '<h4 class="col-md-5 pull-left" style="color:green; font-weight:bolder; margin-top: 0px; text-align:right">Meja no: '+b.no_meja+'</h4>'+
                          
                        '</div>'+
                    '</div>';
                    aktif +=1;
              }
              if (aktif == 0) {
                $('#pesanan_kosong').show();
              }else{
                $('#pesanan_kosong').hide();
              }
              $(rows2).appendTo("#"+append);
            });


            $('#qty_penjualan').text(qty);
            $('#total_penjualan').text(accounting.formatNumber(nominal));
          }
          
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('ERROR','Kesalahan sistem','error');
        }
      });

    }


    function daftar_menu(){
      $.ajax({
        url : "<?php echo site_url('App/daftar_menu')?>",
        data: {

        },
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          $('#daftar_menu').empty();
          $.each(data, function(a, b) {
            if (b.img == '' || b.img == null) {
              img = 'banner.jpg';
            }else{
              img = b.img;
            }
            rows2='<div class="col-md-4" style=" padding:5px; ">'+
                      '<img src="<?php echo base_url("assets/'+img+'") ?>" class="img-responsive" />'+
                      '<div style="background:lavender;">'+
                        '<h4 class="col-md-12"><b>'+b.nama_menu+'</b></h4>'+
                        '<label class="col-md-6 pull-left">Rp.'+b.harga+'</label>'+
                        '<label class="col-md-6 text-right">'+b.tipe+'</label>'+
                        '<button type="button" onclick="tambah_keranjang('+b.id_menu+')" class="btn btn-success" style="margin-left:10px">Tambahkan</button>'+
                      '</div>'+
                  '</div>';
            $(rows2).appendTo("#daftar_menu");

          });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('ERROR','Kesalahan sistem','error');
        }
      });

    }


    function daftar_keranjang(){
      $.ajax({
        url : "<?php echo site_url('App/daftar_keranjang')?>",
        data: {
          "id_pesanan" : $('#id_pesanan').text()
        },
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          $('#keranjang_menu').empty();
          x = 0;
          
          if (data != '') {
            $.each(data, function(a, b) {

              if (b.status_pesanan == 'terbayar') {
                menu ='<label style="margin-top:12px" class="col-md-9"><b>'+b.nama_menu+'</b></label>';
                hapus = '';
              }
              else{
                hapus = '<i onclick="hapus_keranjang('+b.id_menu+')" class="material-icons col-md-1" style="color: red;padding: 6px;background: white;border-radius: 50px;cursor: pointer;">delete_forever</i>';
                menu ='<label style="margin-top:7px" class="col-md-8"><b>'+b.nama_menu+'</b></label>';
                          }
              
              rows2='<div class="col-md-12" style=" padding:5px; background:lavender; margin-top:5px">'+
                        '<div style=";">'+
                          hapus + menu +
                          
                          
                          '<label style="margin-top:7px" class="col-md-3 pull-left">Rp.'+b.harga+'</label>'+
                        '</div>'+
                    '</div>';

              $(rows2).appendTo("#keranjang_menu");
              $('#id_pesanan').text(b.id_pesanan);
              $('#no_meja').val(b.no_meja);
              x += parseInt(b.harga);

            });
            $('#keranjang_kosong').hide();
          }
          else{
           $('#id_pesanan').text('');
           $('#no_meja').val('');
            $('#keranjang_kosong').show();
          }

          $('#total_keranjang').text(x);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('ERROR','Kesalahan sistem','error');
        }
      });

    }



    function batal() {

      if ($('#id_pesanan').text() == '') {
        daftar_pesanan();
        $('#modal_pesanan').modal('hide');
      }else{

        swal({
                title: 'Hapus pesanan?',
                text: "Pesanan yang sudah ditambahkan akan dihapus.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                buttonsStyling: false
            }).then(function() {
                $.ajax({
                  url : "<?php echo site_url('App/batal_pesan')?>",
                  data: {
                    "id_pesanan":$('#id_pesanan').text()
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function(data)
                  {
                    daftar_pesanan();
                    $('#modal_pesanan').modal('hide');

                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      swal('ERROR','Kesalahan sistem','error');
                  }
                });
            });
      
        
      }
    }




    function tambah_keranjang(id_menu) {
      $.ajax({
        url : "<?php echo site_url('App/tambah_keranjang')?>",
        data: {
          "id_menu": id_menu, "id_pesanan":$('#id_pesanan').text()
        },
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          daftar_keranjang();
          $('#id_pesanan').text(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('ERROR','Kesalahan sistem','error');
        }
      });
    }



    function edit_keranjang(id_pesanan, no_meja, status) {

      $('#id_pesanan').text(id_pesanan);
      
      $('#modal_pesanan').modal('show');
      if (status == 'terbayar') {
          $('#judul_modal').text('Detail Pesanan');
          $('#btn-save').hide();
          $('#btn-bayar').hide();
          $('#btn-batal').hide();
          $('#daftar_menu').empty();
          $('#pesanan_terbayar').show();
          
      }else{
        daftar_menu();
        $('#judul_modal').text('Edit Pesanan');
        $('#btn-save').hide();
        
        $('#btn-batal').show();
        $('#pesanan_terbayar').hide();
        if ('<?php echo $this->session->userdata('level') == 'kasir' ?>') {
          $('#btn-bayar').show();
        }else{
          $('#btn-bayar').hide();
        }
      }
      daftar_keranjang();
      $('#no_meja').attr('disabled', true);
    }



    function hapus_keranjang(id_menu) {
      $.ajax({
        url : "<?php echo site_url('App/hapus_keranjang')?>",
        data: {
          "id_pesanan": $('#id_pesanan').text(), "id_menu":id_menu
        },
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          daftar_keranjang();
          $('#id_pesanan').text(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('ERROR','Kesalahan sistem','error');
        }
      });
    }



    function simpan_pesanan() {
      if ($('#total_keranjang').text() == 0) {
        swal('Informasi','Belum ada menu yang dipilih','warning');
      }

      else if ($('#no_meja').val() == '') {
        swal('Informasi','Masukan nomor meja','warning');
      }
      
      else{


        $.ajax({
          url : "<?php echo site_url('App/simpan_pesanan')?>",
          data: {
        
            "id_pesanan": $('#id_pesanan').text(), "no_meja" : $('#no_meja').val()
          },
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            swal('Sukses','Pesanan baru sukses ditambahkan','success');
            $('#modal_pesanan').modal('hide');
            $('#id_pesanan').text('');
            $('#no_meja').val('');
            daftar_pesanan();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              swal('ERROR','Kesalahan sistem','error');
          }
        });
      }
    }



    function pembayaran() {

      swal({
                title: 'Pembayaran tidak dapat dibatalkan.',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Bayar',
                cancelButtonText: 'Batal',
                buttonsStyling: false
            }).then(function() {
                $.ajax({
                  url : "<?php echo site_url('App/pembayaran')?>",
                  data: {
                
                    "id_pesanan": $('#id_pesanan').text()
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function(data)
                  {
                    swal('Sukses','Pesanan sukses dibayar','success');
                    $('#modal_pesanan').modal('hide');
                    $('#id_pesanan').text('');
                    $('#no_meja').val('');

                  
                    daftar_pesanan();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      swal('ERROR','Kesalahan sistem','error');
                  }
                });
            });
      
    }




       


</script>
</html>
