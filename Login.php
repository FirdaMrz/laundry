<?php
session_start(); // Memulai sesi

// Menghubungkan ke database
include('include/Connection.php'); // Pastikan ini adalah path yang benar
include('include/function.php');

// Pastikan koneksi database berhasil
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    // Mengambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengamankan data
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    // Validasi login
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Arahkan ke dashboard
        exit();
    } else {
        // Login gagal
        $valid = false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>LaundryJa ! Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Menggunakan CDN untuk Bootstrap dan Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
    .modal-header, h4, .close {
      background-color: #5cb85c;
      color: white !important;
      text-align: center;
      font-size: 30px;
    }
    .modal-footer {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <!-- PHP untuk validasi login -->
          <?php if(isset($valid) && $valid == false) { ?>
            <div class="alert alert-danger">
              Invalid Username or Password
            </div>
          <?php } ?>
          
          <form role="form" method="post" action=""> 
            <div class="form-group">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" required="" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" required="" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Not a member? <a href="Registration.php">New Registration</a></p>
          <!-- Tombol "Kembali ke Halaman Sebelumnya" -->
          <button onclick="goBack()" class="btn btn-primary">Back</button>
        </div>
      </div>
      
    </div>
  </div> 
</div>

<script type="text/javascript">
  // Memunculkan modal saat halaman diload
  $(window).on('load', function(){
      $('#myModal').modal('show');
  });

  // Disable klik di luar modal untuk menutup
  $('#myModal').modal({
    backdrop: 'static',   // Disable klik di luar modal
    keyboard: true        // Enable event keyboard (esc)
  });

  // Fungsi untuk kembali ke halaman sebelumnya
  function goBack() {
    window.location.href = 'http://localhost/laundry/index.php';
  }
</script>
</body>
</html>
