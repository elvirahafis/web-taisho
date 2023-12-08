  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">Update Outlet</h3>
     <div class=" col-sm-12 col-xs-6">
      <div class="row">
       <div class="center col-md-6 col-sm-6 col-xs-6 ">

                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Outlet</label>
                    <input type="text" class="form-control" id="Kode_Outlet" name="Kode_Outlet" >
                    <input id="Kode_outlett" name="Kode_outlett" value="<?php echo $Kode_outlet; ?>"type="hidden" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Nama Outlet</label>
                    <input type="text" class="form-control" id="Nama_outlet" name="Nama_outlet" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">NPWP</label>
                    <input type="text" class="form-control" id="NPWP" name="NPWP" >
                </div>
                  <div class="form-group">
                   <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="Alamat" name="Alamat" >
                </div>
                <button class="btn btn-primary"  onclick="UpdateOutlet()">Submit </button>

     </div>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
            getOutlet();

    });
    function getOutlet() {
        var Kode_Outlet=$(Kode_outlett).val();
         console.log(Kode_Outlet);
          $.ajax({
            url: "<?php echo site_url(); ?>getOutletKode",
            method: 'GET',
            data: {
                Kode_Outlet:Kode_Outlet
            },
            success: function(data) {
                console.log(data)
                var product=data.data;
                product.map((data)=>{
                    $('#Kode_Outlet').val(data.Kode_Outlet);
                    $('#Nama_outlet').val(data.Nama_outlet);
                    $('#NPWP').val(data.NPWP);
                    $('#Alamat').val(data.Alamat);
                })
            }
         

        });
    }
    function UpdateOutlet(){
      var Kode_Outlet = $('#Kode_Outlet').val();
      var Kode_outlett=$('#Kode_outlett').val();
      var Nama_outlet = $('#Nama_outlet').val();
      var NPWP = $('#NPWP').val();
      var Alamat = $('#Alamat').val();
        if(Kode_Outlet ==""){
          Swal.fire('Silahkan Masukan Kode Outlet !');
          return false;
      } else if(Nama_outlet==""){
        Swal.fire('Silahkan Masukan Nama Outlet !');
          return false;
      }else if(NPWP==""){
        Swal.fire('Silahkan Masukan NPWP !');
          return false;
      } else if(Alamat =="") {
        Swal.fire('Silahkan Masukan Alamat !');
          return false;
      } else {
           var formData = new FormData();
            formData.append('Kode_Outlet', Kode_Outlet);
            formData.append('Kode_outlett', Kode_outlett);
            formData.append('NPWP', NPWP);
            formData.append('Alamat', Alamat);
            formData.append('Nama_outlet', Nama_outlet);
        $.ajax({
            url: "<?php echo site_url(); ?>OutletController/updateOutlet",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data.data)
                    if (data.status == 1) {
                    Swal.fire(
                        'Berhasil   !',
                        data.pesan
                    ).then(function() {
                         location.href = "<?= site_url('ListOutlet') ?>"    
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.pesan
                    }).then(function() {
                     
                    });
                }
            
            }

        });
      }

    }
  </script>



