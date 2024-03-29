<!doctype html>
<html>

<head>
   <title>PMIS </title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <style>
      body {
         background-image: url(image/img.jpg);
         color: white;
      }
   </style>
</head>

<body>
   <?php include_once('nav.html') ?>

   <div class="body">
      <br><br>
      <div class="container">
         <div class="card">
            <br>
            <div class="card-body">
               <h2 class="text-center pt-3">Add Criminal Data</h2>
               <form method="post">
                  <label>Name</label>
                  <input type="text" name="name" placeholder="Enter name" class="form-control">
                  <label>Father Name</label>
                  <input type="text" name="father_name" placeholder="Enter father name" class="form-control">
                  <label>CNIC</label>
                  <input type="text" name="cnic" placeholder="Enter NIC" class="form-control">
                  <label>City</label>
                  <input type="text" name="city" placeholder="Enter city" class="form-control">
                  <label>Address</label>
                  <input type="text" name="address" placeholder="Enter address" class="form-control">
                  <label>Nature of Offence</label>
                  <input type="text" name="offence" placeholder="Enter nature of offence" class="form-control">
                  <label>Penal Code</label>
                  <input type="text" name="penal_code" placeholder="Enter penal code" class="form-control">
                  <label>Gender</label>
                  <input type="radio" name="gender" id="gender" value="Male"> Male
                  <input type="radio" name="gender" id="gender" value="Female"> Female<br>
                  <button type="submit" name="submit" class="btn-info mt-3">Submit</button>
                  <button type="reset" class="btn-info mt-3 ml-2">Reset</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $father_name = $_POST['father_name'];
   $cnic = $_POST['cnic'];
   $offence = $_POST['offence'];
   $penal_code = $_POST['penal_code'];
   $city = $_POST['city'];
   $address = $_POST['address'];
   $gender = $_POST['gender'];

   // database connection

   $con = mysqli_connect('localhost', 'root', '', 'pms');
   $sql = "select * from criminal_data where cnic='$cnic'";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('Sorry this cnic is already exist')</script>";
   } else {
      $sql = "insert into criminal_data values('$cnic','$name','$father_name','$offence','$penal_code','$city','$address','$gender')";
      $result = mysqli_query($con, $sql);
      if ($result) {
         echo "<script>window.location.href='add_data.php'
				alert('Data added successfully')</script>";
      } else {
         echo "<script>alert('Sorry something went wrong')</script>";
      }
   }
}
?>