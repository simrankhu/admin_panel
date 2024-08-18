<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conn.php");?>
<!DOCTYPE html>
<html lang="en">


<!-- head -->
<?php include("head.php");?>

<!-- /head -->


<body style="background:url(../assets/img/bg\ \(2\).jpg)">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>

  
 
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" action="sign-up.php" method="post">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="number" class="form-control" name="number">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="cpassword">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Sign
                        Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="sign-in.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script async defer src="../../../buttons.github.io/buttons.js"></script>

  <script src="../assets/js/material-dashboard.mine63c.js?v=3.1.0"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"8b49ded37e3f8ad6","version":"2024.8.0","serverTiming":{"name":{"cfL4":true}},"token":"1b7cbb72744b40c580f8633c6b62637e","b":1}'
    crossorigin="anonymous"></script>
</body>

</html>
<?php

if(isset($_POST['submit'])){
  $name=mysqli_escape_string($conn,$_POST['name']);
  $email=mysqli_escape_string($conn,$_POST['email']);
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $phone=$_POST['number'];

  if($password==$cpassword){
    $hashpass=password_hash($password,PASSWORD_DEFAULT);

   $sql= "INSERT INTO `register`( `name`, `number`, `email`, `password`) VALUES ('$name','$phone','$email','$hashpass')";
   $result=mysqli_query($conn,$sql);
   if($result){
    // Redirect to 'sign-in.php'
    echo "<script>window.location.href = 'sign-in.php';</script>";
   }
   else{
    echo "<script>alert('Registration Failed')</script>";
  }
  }
  else{
    echo "<script>alert('Password Not Match')</script>";
  }

}

?>

