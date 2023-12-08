  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">List User</h3>
     <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
        <table  class="table table-striped table-bordered table-condensed" id="productTable">
          <thead>
            <tr>
              <th scope="col">User ID</th>
              <th scope="col">full Name</th>
              <th scope="col">Password</th>
              <th scope="col"><a class="btn btn-dark" href="<?= site_url('viewAddUser') ?>">Add</a>
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
<script type="text/javascript">
    $(document).ready(function() {
            getListOutlet();

    });

    function getListOutlet() {
        $.ajax({
            url: "<?php echo site_url(); ?>getListUser",
            method: 'GET',
            success: function(data) {
              console.log(data)
                var dataproduct=data.data
                var i = 0;
                var no = '1'
                var datarow = '';
                
                console.log(dataproduct.length)
                while (i < dataproduct.length) {
  
                  datarow +='<tr><td style="width:10%">' + dataproduct[i].User_Id + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].Fullname + '</td>' +
                  '<td style="width:10%">' + dataproduct[i].password + '</td>' +
                  '<td style="width:10% !important;"><div class="btn-group">' +
                  '<a type="button" href=" <?= base_url(); ?>UpdateUser/' + dataproduct[i].User_Id +'" class="btn btn-primary">Update</a>' +
                  '<button type="button" onClick="DeleteUser(\'' + dataproduct[i].User_Id + '\')" class="btn btn-dark me-1">Delete</button></td></tr>' 
                   i++;
                }
            
                $('#productTable tbody').append(datarow);
            }
         

        });

    }
   function DeleteUser(User_Id) {
      console.log(User_Id)
             Swal.fire({
                 title: 'Hapus!!',
                 text: "Apakah Anda Yakin Ingin Menghapus Outlet?",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     var formData = new FormData();
                     formData.append('User_Id', User_Id);
                     console.log(formData)
                     $.ajax({
                         url: '<?php echo site_url(); ?>UserController/HapusUser',
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



