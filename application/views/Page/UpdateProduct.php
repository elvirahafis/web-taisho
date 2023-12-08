  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">Update Product</h3>
     <div class=" col-sm-12 col-xs-6">
      <div class="row">
       <div class="center col-md-6 col-sm-6 col-xs-6 ">

                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Barang</label>
                    <input type="text" class="form-control" id="Kode_Barang" name="Kode_Barang" >
                    <input id="Kode_Barangg" name="Kode_Barangg" value="<?php echo $Kode_Barang; ?>"type="hidden" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Klasifikasi</label>
                    <input type="text" class="form-control" id="Klasifikasi" name="Klasifikasi" >
                </div>
                  <div class="form-group">
                   <label for="exampleInputEmail1">UOM</label>
                    <input type="text" class="form-control" id="UOM" name="UOM" >
                </div>
                <button class="btn btn-primary"  onclick="UpdateProduct()">Submit </button>

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
            getProduct();

    });
    function getProduct() {
        var Kode_Barang=$(Kode_Barangg).val();
          $.ajax({
            url: "<?php echo site_url(); ?>getProductKode",
            method: 'GET',
            data: {
                Kode_Barang:Kode_Barang
            },
            success: function(data) {
                console.log(data.data)
                var product=data.data;
                product.map((data)=>{
                    $('#Kode_Barang').val(data.Kode_Barang);
                    $('#Nama_Barang').val(data.Nama_Barang);
                    $('#Klasifikasi').val(data.Klasifikasi);
                    $('#UOM').val(data.UOM);
                })
            }
         

        });
    }
    function UpdateProduct(){
      var Kode_Barang = $('#Kode_Barang').val();
      var Kode_Barangg=$('#Kode_Barangg').val();
      var Nama_Barang = $('#Nama_Barang').val();
      var Klasifikasi = $('#Klasifikasi').val();
      var UOM = $('#UOM').val();
      
       if(Kode_Barang ==""){
          Swal.fire('Silahkan Masukan Kode Barang !');
          return false;
      } else if(Nama_Barang==""){
          Swal.fire('Silahkan Masukan Nama Barang !');
          return false;
      } else if(Klasifikasi==""){
           Swal.fire('Silahkan Masukan Klasifikasi !');
          return false;
      } else if(UOM==""){
          Swal.fire('Silahkan Masukan UOM !');
          return false;
      } else {
                var formData = new FormData();
                formData.append('Kode_Barang', Kode_Barang);
                formData.append('Kode_Barangg', Kode_Barangg);
                formData.append('Nama_Barang', Nama_Barang);
                formData.append('Klasifikasi', Klasifikasi);
                formData.append('UOM', UOM);
            $.ajax({
            url: "<?php echo site_url(); ?>ProductController/updateProduct",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data)
                    if (data.status == 1) {
                    Swal.fire(
                        'Berhasil   !',
                        data.pesan
                    ).then(function() {
                         location.href = "<?= site_url('ListProducts') ?>"    
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



