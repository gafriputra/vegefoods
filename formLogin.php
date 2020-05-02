<?php


    // if ( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ) {

    //   $id = $_COOKIE['id'];
    //   $key = $_COOKIE['key'];

    //   // ambil username berdasarkan id
    //   $result = mysqli_query($koneksi, "SELECT username FROM user WHERE user_id = $id");
    //   $row = mysqli_fetch_assoc($result);

    //   // cek cookie dan username

    //   if ( $key === hash('sha256', $row['username']) ) {
    //       $_SESSION['login'] = true;
    //   }
    // }

    // if ( isset($_SESSION["login"]) ) {
    //   header("Location: index.php");
    //   exit;
    // }


    if (isset($_POST['login'])) {
      
      $username = $_POST["username"];
      $password = $_POST["password"];

      $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

      // cwk username
      if (mysqli_num_rows($result)===1) {

          // cek password
          $row = mysqli_fetch_assoc($result);
          if ( password_verify($password,$row["password"]) ) {

              // set session
              $_SESSION["login"] = true;
              
              // cek remember me
              if ( isset($_POST['remember']) ) {
                  // buaat cookie
                  setcookie('id', $row['user_id'], time()+60);
                  setcookie('key', hash('sha256',$row['username']), time()+60);
              }

              header("Location: index.php");
              exit;
          }
      }

      $error = true;
    }


?>
        <form action="" class="needs-validation p-5 contact-form" novalidate autocomplete="off" method="POST">
              <div class="form-group form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustomUsername">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" name="username" required >
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="validationPassword">Password</label>
                  <input type="password" class="form-control" id="validationPassword" placeholder="Password" name="password" required>
                  <div class="invalid-feedback">
                    Please Password.
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
              <div class="form-group mt-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="invalidCheck">
                  <label class="form-check-label" for="invalidCheck">
                    Ingat Saya!
                  </label>
                </div>
               
              </div>

              <button class="btn btn-outline-primary py-3 px-5" type="submit" name="submit" value="login">Login Sekarang !</button>
            </form>

            <!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <h3 class="heading">Login Disini</h3>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

       <?php include_once("formLogin.php") ?>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalPush-->