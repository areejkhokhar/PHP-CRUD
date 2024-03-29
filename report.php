<!doctype html>
<html>

<head>
   <title>Police Management Information System</title>
   <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
   <?php include_once('nav.html') ?>
   <div class="body">
      <div class="container">
         <h2 class="text-center mb-2">Generate Report</h2>
         <form method="post">
            <input type="text" name="keyword" placeholder="Search criminal record" class="search-input">
            <button type="submit" name="report" class="btn-search">Report</button>
         </form>
         <table border="1">
            <tr>
               <th style="color:aliceblue">CNIC</th>
               <th style="color:aliceblue">Name</th>
               <th style="color:aliceblue">Father Name</th>
               <th style="color:aliceblue">Nature of Offence</th>
               <th style="color:aliceblue">Penal Code</th>
               <th style="color:aliceblue">Address</th>
               <th style="color:aliceblue">Gender</th>

            </tr>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'pms');
            if (isset($_POST['report'])) {
               $keyword = $_POST['keyword'];
               $sql = "select * from criminal_data where cnic='$keyword' OR penal_code='$keyword'";
            } else {
               $sql = "select * from criminal_data";
            }
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_array($result)) {
            ?>
                  <tr>
                     <td><?php echo $row['cnic']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['father_name']; ?></td>
                     <td><?php echo $row['offence']; ?></td>
                     <td><?php echo $row['penal_code']; ?></td>
                     <td><?php echo $row['address']; ?></td>
                     <td><?php echo $row['gender']; ?></td>

                  </tr>
               <?php }
            } else {
               ?>
               <tr>
                  <td colspan="7" class="text-center">No record found</td>
               </tr>
            <?php
            }
            ?>

         </table>
      </div>
   </div>
</body>

</html>