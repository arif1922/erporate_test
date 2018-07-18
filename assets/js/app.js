$('.nav').on('click', 'li', function() {
    $('.nav li.active').removeClass('active');
    $(this).addClass('active');
});

$(window).on('hashchange', function(e){
    var url     = window.location.href;
    var cek     = url.substring(31,35);
    var menu    = url.substring(33);

    if (cek == 'app') {
        var cek     = url.substring(34);
        var menu    = url.substring(36);
    }else
    if (cek == 'app/') {
        var cek     = url.substring(35);
        var menu    = url.substring(37);
    }

    if (cek == '') {
        $('[href="#/dashboard"]').click();
        $.ajax({url: "<?php echo base_url();?>app/pages/monitoring", success: function(result){ $(".content").html(result); }});
        $.ajax({url: "<?php echo base_url();?>app/modals/monitoring", success: function(result){ $("modal").html(result); }});
    }else{
        $('[href="#/'+menu+'"]').click();
        $('#page-content').empty();
        $.ajax({url: "<?php echo base_url();?>app/pages/"+menu, success: function(result){ $(".content").html(result); }});
        $.ajax({url: "<?php echo base_url();?>app/modals/"+menu, success: function(result){ $("modal").html(result); }});
    }
});
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