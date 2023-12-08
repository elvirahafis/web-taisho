  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/navbar'); ?>
   <div class="col-md-12 col-sm-6 col-xs-6" role="main">
    <h3 class="container">Update User</h3>
     <div class=" col-sm-12 col-xs-6">
      <div class="row">
       <div class="center col-md-6 col-sm-6 col-xs-6 ">

                 <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="Fullname" name="Fullname" >
                    <input id="Users_Id" name="Users_Id" value="<?php echo $User_Id; ?>"type="hidden" >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="password" name="password" >
                </div>

                <button class="btn btn-primary"  onclick="UpdateUser()">Submit </button>

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
        var User_Id=$(Users_Id).val();
        console.log(User_Id)
          $.ajax({
            url: "<?php echo site_url(); ?>getUserKode",
            method: 'GET',
            data: {
                User_Id:User_Id
            },
            success: function(data) {
                console.log(data)
                var product=data.data;
                product.map((data)=>{
                    $('#Fullname').val(data.Fullname);
                    $('#password').val(data.password);
                })
            }
         

        });
    }
    function UpdateUser(){
      var Fullname = $('#Fullname').val();
      var password=$('#password').val();
      var User_Id = $(Users_Id).val();
      console.log(User_Id);
      if(Fullname==""){
         Swal.fire('Silahkan Masukan Fullname !');
          return false;
      } else if(password==""){
         Swal.fire('Silahkan Masukan Password !');
          return false;
      } else {
            var formData = new FormData();
      formData.append('Fullname', Fullname);
      formData.append('password', password);
      formData.append('User_Id', User_Id);
        $.ajax({
            url: "<?php echo site_url(); ?>UserController/updateUser",
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
                         location.href = "<?= site_url('ListUser') ?>"    
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



