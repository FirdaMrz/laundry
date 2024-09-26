<?php
 $title='Dashboard';
 
include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');
if(isset($_POST['Add_ser']))
     {
        extract($_POST);
    $insert = "insert into services_uploade(Services_Name,Services_Type,Dry_Price,Laundry_Price) 
     VALUES('".$Ser_Name."','".$Ser_Type."','".$Dry_Price."','".$Laundry_Price."')";

     $query = $db->query($insert);
   if($query){
   include('SMS/Change_password.php');
   }
  
};
if(isset($_GET["SRVaction"]))
{


$sel="DELETE FROM services_uploade WHERE Id ='".$_GET["ID"]."' ";
$objExecute=$db->query($sel);
  // if($info){
   if($objExecute)
   {

     include('SMS/Successful_Delete.php');

   }
    header("location:Services_record.php");
   
}

    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Services Record</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
    
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"></i>  Add New Services Uploade</div>
        <div class="card-body">
          <form action="" method="POST" >
          <div class="row">
            <div class="form-group col-lg-3">
            <label for="">Servics Type </label>
            <select name="Ser_Type" class="form-control" required="" >
              <option hidden="" >Select Type</option>
               <?php $Show1=Serv_Type();
                $count='0';
                 while ($row=$Show1->fetch_object()) {
                   $count++;
                ?>
              <option value="<?php echo $row->Services_Name ?>"><?php echo $row->Services_Name ?></option>
                  <?php };?>
            </select>
            
          </div>
         
          <div class="form-group col-lg-3">
            <label for="">Name </label>
            <input type="text"  class="form-control" name="Ser_Name" required=""  placeholder="Enter Services Name">
          </div>
          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">Dry Price </label>
            <input type="number"  class="form-control" name="Dry_Price" maxlength="12" minlength="12" placeholder="Dry Price" required="">
          </div>

          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">Laundry Price </label>
            <input type="number"  class="form-control" name="Laundry_Price" maxlength="12" minlength="12" placeholder="Laundry Price" required="">
          </div>
           <div class="form-group col-lg-12">
            <input type="submit"  class="form-control btn btn-primary" name="Add_ser">
          </div>
        </div>
       </form> 
        </div>
        
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Services Record</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SR#</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>Delete</th>
                </tr>
              </thead>
              
              
              <tbody>
                <?php $Show=Serv_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td><?php echo $row->Services_Type; ?></td>
                  <td><?php echo $row->Dry_Price; ?></td>
                  <td><?php echo $row->Laundry_Price; ?></td>
                 
                  <td><a 
                   onclick="return confirm('Are you sure you want to delete this entry?')"
                    href="Services_record.php?SRVaction&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Delete</a></td>
                </tr>
                <?php  # code...
                 };?>
                
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
