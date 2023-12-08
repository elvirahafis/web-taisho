  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">Add Purchase</h3>
     <div class=" col-sm-12 col-xs-6">
      <div class="row">
       <div class="center col-md-6 col-sm-6 col-xs-6 ">

                <div class="form-group">
                    <label for="exampleInputEmail1">No Dokumen Masuk</label>
                    <input type="text" class="form-control" id="No_dokumen_masuk" name="No_dokumen_masuk" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="Tanggal_transaksi" name="Tanggal_transaksi" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Nomor PO</label>
                    <input type="text" class="form-control" id="Nomor_PO" name="Nomor_PO" >
                </div>
                 <div class="form-group">
                   <label for="exampleInputEmail1">Kode Barang</label>
                    <input type="text" class="form-control" id="Kode_barang" name="Kode_barang" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" id="Nama_barang" name="Nama_barang" >
                </div>
                  <div class="form-group">
                   <label for="exampleInputEmail1">QTY</label>
                    <input type="text" class="form-control" id="Qty" name="Qty" >
                </div>
                
                  <div class="form-group">
                   <label for="exampleInputEmail1">Harga Beli</label>
                    <input type="text" class="form-control" id="Harga_beli" name="Harga_beli" >
                </div>
                <button class="btn btn-primary"  onclick="SubmitProduct()">Submit </button>

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
    function SubmitProduct(){
      var No_dokumen_masuk = $('#No_dokumen_masuk').val();
      var Tanggal_transaksi = $('#Tanggal_transaksi').val();
      var Nomor_PO = $('#Nomor_PO').val();
      var Kode_barang = $('#Kode_barang').val();
      var Nama_barang = $('#Nama_barang').val();
      var Qty = $('#Qty').val();
      var Harga_beli = $('#Harga_beli').val();

      if(No_dokumen_masuk==""){
          Swal.fire('Silahkan Masukan Nomor Dokumen Masuk !');
          return false;
      } else if(Tanggal_transaksi==""){
          Swal.fire('Silahkan Masukan Tanggal Transaksi !');
          return false;
      } else if(Nomor_PO==""){
          Swal.fire('Silahkan Masukan Nomor PO !');
          return false;
      } else if(Kode_barang==""){
          Swal.fire('Silahkan Masukan Kode Barang !');
          return false;
      } else if(Nama_barang==""){
         Swal.fire('Silahkan Masukan Nama Barang !');
          return false;
      } else if(Qty==""){
          Swal.fire('Silahkan Masukan Qty !');
          return false;
      } else if(Harga_beli==""){
           Swal.fire('Silahkan Masukan Harga Beli !');
          return false;
      } else {
      var formData = new FormData();
      formData.append('No_dokumen_masuk', No_dokumen_masuk);
      formData.append('Tanggal_transaksi', Tanggal_transaksi);
      formData.append('Nomor_PO', Nomor_PO);
      formData.append('Kode_barang', Kode_barang);
      formData.append('Nama_barang', Nama_barang);
      formData.append('Qty', Qty);
      formData.append('Harga_beli', Harga_beli);
      console.log(formData)
            $.ajax({
            url: "<?php echo site_url(); ?>PurchaseController/createPurchase",
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
                         location.href = "<?= site_url('ListPurchase') ?>"    
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



