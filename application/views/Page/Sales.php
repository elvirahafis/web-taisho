  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">List Sales</h3>
     <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                   <button target="_blank" class="btn btn-dark" onclick="ExportToExcel('xlsx')">EXPORT KE EXCEL</button>
        <table  class="table table-striped table-bordered table-condensed" id="productTable">
          <thead>
            <tr>
              <th scope="col">Nomor Dokumen Keluar</th>
              <th scope="col">Nomor Dokumen Masuk</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Kode Barang</th>
               <th scope="col">Nama Barang</th>
              <th scope="col">Kode Outlet</th>
              <th scope="col">Nama Outlet</th>
              <th scope="col">Qty</th>
              <th scope="col">Harga Jual</th>
               <th scope="col"><a class="btn btn-dark" href="<?= site_url('viewAddSales') ?>">Add</a>
            </tr></th>
               
          </thead>
          <tbody>
          </tbody>
        </table>
     </div>
    </div>
  </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
            getListSales();

    });
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('productTable');
       
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Sales.' + (type || 'xlsx')));
    }
     function formatMoney(angka) {
             var rupiah = '';
             var angkarev = angka.toString().split('').reverse().join('');
             for (var i = 0; i < angkarev.length; i++)
                 if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
             return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
         }
    function getListSales() {
        $.ajax({
            url: "<?php echo site_url(); ?>getListSales",
            method: 'GET',
            success: function(data) {
                var dataproduct=data.data
                console.log(data);
                var i = 0;
                var no = '1'
                var datarow = '';
                
                console.log(dataproduct.length)
                while (i < dataproduct.length) {
  
                  datarow +='<tr><td style="width:10%">' + dataproduct[i].No_dokumen_keluar + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].No_dokumen_masuk + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Tanggal_transaksi + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Kode_barang + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Nama_barang + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Kode_outlet + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Nama_outlet + '</td>' +
                    '<td style="width:10%">' + dataproduct[i].Qty + '</td>' +
                  '<td style="width:10%">' + formatMoney(dataproduct[i].Harga_jual) + '</td>' +
                  '<td style="width:10% !important;"><div class="btn-group">' +
                   '<a type="button" href=" <?= base_url(); ?>UpdateSales/' + dataproduct[i].No_dokumen_keluar +'" class="btn btn-primary">Update</a>' +
                  '<button type="button" onClick="DeleteSales(\'' + dataproduct[i].No_dokumen_keluar + '\')" class="btn btn-dark me-1">Delete</button></td></tr>' 
                   i++;
                }
            
                $('#productTable tbody').append(datarow);
            }
         

        });

    }
    function DeleteSales(No_dokumen_keluar) {
      console.log(No_dokumen_keluar)
             Swal.fire({
                 title: 'Hapus!!',
                 text: "Apakah Anda Yakin Ingin Menghapus Product?",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     var formData = new FormData();
                     formData.append('No_dokumen_keluar', No_dokumen_keluar);
                     console.log(formData)
                     $.ajax({
                         url: '<?php echo site_url(); ?>SalesController/HapusSales',
                         method: 'POST',
                         data: formData,
                         processData: false,
                         contentType: false,
                         success: function(data) {
                             if (data.status == 1) {
                                 Swal.fire(
                                     'Berhasil   !',
                                     data.pesan
                                 ).then(function() {
                                     location.reload();
                                 });
                             } else {
                                 Swal.fire({
                                     icon: 'error',
                                     title: 'Gagal',
                                     text: data.pesan
                                 }).then(function() {
                                     location.reload();
                                 });
                             }

                         }
                     });
                 } else {
                     return false
                 }
             })
         }

  </script>



