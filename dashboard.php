<?php
include('_secure.php'); // Memastikan pengguna telah login
$title = 'Dashboard';
include('header.php');
include('include/Connection.php');
include('include/function.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5">
                <?php echo get_menu_Count(); ?> Total Services Provided!
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu_record.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><?php echo Total_user_reg(); ?> Registered Users!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_user.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Pending Orders Table -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Pending Orders
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SR#</th>
                  <th>Order Code</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Pick Up Date</th>
                  <th>Delivery Date</th>
                  <th>Total Price</th>
                  <th>Status</th>
                  <th>View Order</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $Show = get_order_status_Count();
                $count1 = 0;
                while ($row = $Show->fetch_object()) {
                  $count1++;
                ?>
                <tr>
                  <th><?php echo $count1; ?></th>
                  <th><?php echo $row->Order_Code; ?></th>
                  <td><?php echo $row->User_Name; ?></td>
                  <td><?php echo $row->Phone_No; ?></td>
                  <td><?php echo $row->Address; ?></td>
                  <td><?php echo $row->Pick_up_date; ?></td>
                  <td><?php echo $row->Delivery_date; ?></td>
                  <td><?php echo $row->Total_Price; ?></td>
                  <td><?php echo $row->Delivery_status; ?></td>
                  <td>
                    <a data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1; ?>" class="btn btn-primary">View</a>
                    <?php include('view_User_Order_detail.php'); ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
  </div>
</body>

</html>
