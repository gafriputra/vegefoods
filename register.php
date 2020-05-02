<?php
   cekSudahLogin_user();
?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	
        <div class="row block-9 bg-white shadow">
          <div class="col-md-6 d-flex">
                
          </div>
          <div class="col-md-6 order-md-last d-flex">

            <form action="proses.php" class="needs-validation p-5 contact-form" novalidate autocomplete="off" method="POST">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom01">First name</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="" name="nama_depan" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please Enter Name.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom02">Last name</label>
                  <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="nama_belakang" value="" >
                </div>
                <div class="col-md-6 mb-3">
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
                <div class="col-md-6 mb-3">
                    <label for="validationEmail">Email</label>
                    <input type="email" class="form-control" id="validationEmail" placeholder="Email" value="" name="email" required>
                    <div class="invalid-feedback">
                    Please Email.
                    </div>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationPassword">Password</label>
                  <input type="password" class="form-control" id="validationPassword" placeholder="Password" name="password" required>
                  <div class="invalid-feedback">
                    Please Password.
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationRe-password">Re-password</label>
                  <input type="password" class="form-control" id="validationRe-password" placeholder="Re-password" name="repassword" required>
                  <div class="invalid-feedback">
                    Please Re-password.
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <div class="custom-control custom-checkbox my-1 mr-sm-2">
                      <input type="checkbox" name="remember" class="custom-control-input" id="invalidCheck" required>
                      <label class="custom-control-label" for="invalidCheck">Agree to terms and conditions</label>
                      
                      <div class="invalid-feedback">
                        You must agree before submitting.
                      </div>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary py-3 px-5" type="submit" name="submit" value="register">Daftar Sekarang!</button>
            </form>
            
          </div>


        </div>
      </div>
    </section>