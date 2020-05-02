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
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline">Ingat Saya !</label>
                </div>
              </div>

              <button class="btn btn-outline-primary py-3 px-5" name="submit" value="login">Login Sekarang !</button>
            </form>
            
          </div>


        </div>
      </div>
    </section>