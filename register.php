<!DOCTYPE html>
<?php
if(isset($_POST['email'], $_POST['password'], $_POST['student_id'], $_POST['first_name'], $_POST['last_name'])) {
  $conn = new mysqli("localhost", "root", "", "presmun");

  $email = $_POST['email'];
  $password = $_POST['password'];
  $student_id = $_POST['student_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  
  if(empty($email) || empty($password) || empty($student_id) || empty($first_name) || empty($last_name)) {
      echo "error";
      return;
  }
  
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  $encrypted = password_hash($password, PASSWORD_DEFAULT);
  $student_id = mysqli_real_escape_string($conn, $student_id);
  $first_name = mysqli_real_escape_string($conn, $first_name);
  $last_name = mysqli_real_escape_string($conn, $last_name);
  $message = "";
  $icon = "error";
  $checkEmailQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = mysqli_query($conn, $checkEmailQuery);

  if ($result && mysqli_num_rows($result) > 0) {
      // Email already exists, handle accordingly (e.g., show an error message)
      $message = "Email already exists. Please choose a different email.";
  } else {
      // Email is unique, proceed with the registration
      $sql = "INSERT INTO `users`(`email`, `password`, `student_id`, `first_name`, `last_name`) VALUES ('$email','$encrypted','$student_id','$first_name','$last_name')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $icon = "success";  
        $message = "Registration successful";
      } else {
          $message = "Registration failed";
      }
  }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
		<link href="css/regist.css" rel="stylesheet" />
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<meta http-equiv="Cache-control" content="public">
		<meta property="og:url" content="https://presmun.com" />
		<meta property="og:title" content="PRESMUN 2024" />
		<meta property="og:description" content="PresMUN itself is an annual MUN conference co-hosted by President University Model United Nations (PUMUN). PresMUN has achieved a certain reputation and is often deemed as one of the most prestigious MUN conferences in Indonesia despite its young age." />
		<meta property="og:image" content="https://presmun.com/img/banner-1.jpg" />
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <form method="post" action="register.php" class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Registration Form</Form></h2>
              <p class="text-white-50 mb-5">Please Insert Your data Below</p>

              <div class="form-outline form-white mb-4">
                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeIdX" name="student_id" class="form-control form-control-lg" />
                <label class="form-label" for="typeIdX">Student Id</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeNameX" name="first_name" class="form-control form-control-lg" />
                <label class="form-label" for="typeFirstNameX">First Name</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeEmailX" name="last_name" class="form-control form-control-lg" />
                <label class="form-label" for="typeLastNameX">LastName</label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

              </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      <?php
        if($result) {
          $title = "Failed";
          if($icon == "success"){
            $title = "Success";
          }
          echo "Swal.fire({
            title: '$title',
            text: '$message',
            icon: '$icon'
          })";
        }
        
      ?>

    </script>
  </div>
</section>
</body>
</html>