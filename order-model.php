<?php 
include('include/Connection.php');
include('include/function.php');
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .register {
      background: -webkit-linear-gradient(left, #009688, #00c6ff);
      margin-top: 3%;
      padding: 3%;
    }
    .register-left {
      text-align: center;
      color: #fff;
      margin-top: 4%;
    }
    .register-left input {
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      width: 60%;
      background: #f8f9fa;
      font-weight: bold;
      color: #383d41;
      margin-top: 30%;
      margin-bottom: 3%;
      cursor: pointer;
      font-size: 16px; /* Ukuran font yang lebih besar */
      text-align: center; /* Memusatkan teks */
    }
    .register-right {
      background: #f8f9fa;
      border-top-left-radius: 10% 50%;
      border-bottom-left-radius: 10% 50%;
    }
    .register-left img {
      margin-top: 15%;
      margin-bottom: 5%;
      width: 25%;
      -webkit-animation: mover 2s infinite alternate;
      animation: mover 1s infinite alternate;
    }
    @keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
    }
    .register-left p {
      font-weight: lighter;
      padding: 12%;
      margin-top: -9%;
    }
    .register .register-form {
      padding: 10%;
      margin-top: 10%;
    }
    .btnBack {
      float: left;
      margin-top: 10%;
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      background: #6c757d;
      color: #fff;
      font-weight: 600;
      width: 45%;
      cursor: pointer;
      margin-right: 10px;
    }
    .btnRegister {
      float: right;
      margin-top: 10%;
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      background: #0062cc;
      color: #fff;
      font-weight: 600;
      width: 45%;
      cursor: pointer;
    }
    .register .nav-tabs {
      margin-top: 3%;
      border: none;
      background: #0062cc;
      border-radius: 1.5rem;
      width: 28%;
      float: right;
    }
    .register .nav-tabs .nav-link {
      padding: 2%;
      height: 34px;
      font-weight: 600;
      color: #fff;
      border-top-right-radius: 1.5rem;
      border-bottom-right-radius: 1.5rem;
    }
    .register .nav-tabs .nav-link.active {
      width: 100px;
      color: #0062cc;
      border: 2px solid #0062cc;
      border-top-left-radius: 1.5rem;
      border-bottom-left-radius: 1.5rem;
    }
    .register-heading {
      text-align: center;
      margin-top: 8%;
      margin-bottom: -15%;
      color: #495057;
    }
    .error {
      color: red;
      font-size: 12px;
    }
    .form-control {
      font-size: 16px; /* Ukuran font yang lebih besar */
      color: #495057; /* Warna teks yang kontras */
    }
  </style>
</head>
<body>

<div class="register">
  <div class="row">
    <div class="col-md-3 register-left">
      <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
      <h3>Welcome to LaundryJa</h3>
      <a href="Login.php"><input type="submit" value="Login"/></a>
    </div>
    <div class="col-md-9 register-right">
      <h3 class="register-heading">Quick Order</h3>
      <form id="quickOrderForm" class="row register-form">
        <div class="col-md-6">
          <div class="form-group">
            <label>User name</label><span id="name1" class="error"></span>
            <input type="text" class="form-control" id="name" placeholder="Full Name *" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone No</label><span id="phone1" class="error"></span>
            <input type="number" class="form-control" maxlength="12" minlength="12" id="phone" placeholder="Phone Number *" required pattern="[0-9]{12}" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Pick Up Date</label><span id="P_date1" class="error"></span>
            <input type="date" class="form-control" id="P_date" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Delivery Date</label><span id="D_date1" class="error"></span>
            <input type="date" class="form-control" id="D_date" required />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Address</label><span id="Address1" class="error"></span>
            <textarea class="form-control" id="Address" required></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Service Type</label><span id="TypeError" class="error"></span>
            <select class="form-control" id="Type" onchange="Type1()" required>
              <option class="hidden" selected disabled>Choose Service Type</option>
              <?php $Show1 = Serv_Type();
              while ($row = $Show1->fetch_object()) { ?>
                <option value="<?php echo $row->Services_Name ?>"><?php echo $row->Services_Name ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-12" id="result"></div>
        <div class="col-md-6">
          <button type="button" class="btnBack" onclick="goBack()">Back</button>
          <button type="button" class="btnRegister" onclick="submitForm()">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="css"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function Type1() {
  var Type = $('#Type').val();
  $.ajax({
    type: 'POST',
    url: 'ajax/item.php',
    data: { Type: Type },
    success: function (html) {
      $('#result').html(html);
    }
  });
}

function submitForm() {
  var name = $('#name').val();
  var phone = $('#phone').val();
  var P_date = $('#P_date').val();
  var D_date = $('#D_date').val();
  var Address = $('#Address').val();
  var Type = $('#Type').val();

  if (!name || !phone || !P_date || !D_date || !Address || !Type) {
    alert('Please fill all fields');
    return;
  }

  $.ajax({
    type: 'POST',
    url: 'ajax/Quck_order.php',
    data: {
      name: name,
      phone: phone,
      P_date: P_date,
      D_date: D_date,
      Address: Address,
      Type: Type
    },
    success: function (html) {
      $('#css').html(html);
      location.reload();
    },
    error: function () {
      alert('Something went wrong. Please try again.');
    }
  });
}

function goBack() {
    window.location.href = 'http://localhost/laundry/index.php';
}

</script>

</body>
</html>
