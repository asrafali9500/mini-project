<?php session_start();?>
<?php 
if(is_null($_SESSION['USER'])){
  session_destroy();
  ?> <script>window.location.href="error.html"</script> <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Request List - Blood Donation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      
      <a href="index.html" class="logo me-auto"><img src="assets/img/favicon.png" alt="logo" class="img-fluid">Blood Donation</a>
    
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blood Request List</h2>
          <ol>
            <li><a href="user.php">Home</a></li>
            <li>Blood Request List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Request List Section ======= -->
    <section id="requestlist">
      <div class="container mt-1">

        <div class="row content mt-1">
          <div class="col-lg-12 table-responsive">
              <h5 class="btn btn-danger"><b>Blood Request List</b></h5>
            <table class="table table-hover table-bordered mt-4">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">No Of Units</th>
                    <th scope="col">Description</th>
                    <th scope="col">Mobile No</th>
                   <!-- <th scope="col">Donate</th> -->
                    </tr>
                </thead>
               
                <tbody>
                <?php
                require 'connect.php';
                $sql="select * from bloodrequest";
                $result=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_array($result)) {
                ?>
                    <tr>
                    <th scope="row"><?php echo $row["id"];?></th>
                    <td> <?php echo $row["patient_name"];?> </td>
                    <td> <?php echo $row["blood_group"];?> </td>
                    <td> <?php echo $row["no_of_units"];?> </td>
                    <td> <?php echo $row["description"];?> </td>
                    <td> <?php echo $row["mobileno"];?> </td>
                   <!-- <td> <a href="donateblood.php" class="btn btn-danger">Donate</a> </td> -->
                    </tr>
                    <?php }?>
                </tbody>
                </table>
          </div>
        </div>

      </div>
    </section><!-- End USER Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Asraf</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php
        require 'connect.php';
		  if(isset($_POST['request-blood'])){
            $patientname=$_POST['name'];
            $no_of_units=$_POST['units'];
            $bloodgroup=$_POST['bloodgroup'];
            $hospitalname=$_POST['hospitalname'];
            $description=$_POST['description'];
          // echo " pressed";
        //   echo $patientname;
        //   echo $bloodgroup;
        //   echo $no_of_units;
        //   echo $description;
        //   echo $hospitalname;
          
          $sql="insert into bloodrequest (id,patient_name,blood_group,no_of_units,description,hospital_name) 
          values (null,'$patientname','$bloodgroup','$no_of_units','$description','$hospitalname')";
            if($con->query($sql))
            {
            ?><script>alert("Request send Successfully!");window.location.href="user.php"</script><?php
            }
            else
            {
            echo "error".$sql."<br>".$con->error;
            }  
            $con->close();
		  }
          
            if(isset($_SESSION['USER'])){
                // echo $_SESSION['USER'];
                
            }else{
                session_destroy();
                ?> <script>window.location.href="./"</script> <?php
            }
?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>