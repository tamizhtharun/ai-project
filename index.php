<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Ai Consultancy</title>
</head>

<body>
  <nav id="nav-bar-head" class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./icons/Hadezign-Hobbies-Photography.ico" alt="Logo" width="30" height="30"
          class="d-inline-block align-text-top">
        Dead Stock
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse page-head" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item search-form" id="navbarSupportedContent">
            <form class="d-flex" role="search">
              <div class="search-container">
                <ion-icon class="search-outline" name="search-outline" type="submit" size="small"
                  style="padding: 5px;"></ion-icon>
                <input id="form-control-me-2" class="form-control me-2" type="search" placeholder="Search"
                  aria-label="Search">
              </div>
            </form>
          </li>
          <li class="nav-item btns">
            <button id="seller-btn" type="button" class="signup-btn btn btn-outline-secondary">
              Sell here!
            </button>
            <button type="button" class="login-btn btn btn-outline-secondary"
              data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Login
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- runningtxt -->
  <div class="runningtxt">
    <marquee id="marquee" onmouseover="this.stop();" onmouseout="this.start();">
    </marquee>

  </div>
  


  <!-- modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ai consultancy</h1>
          <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="modal-body" class="modal-body">
          <!-- Sign In Form -->
          <form id="signin-form" method="POST" action="login/login.php">
            <h1 class="modal-title fs-5" id="box-header">Login</h1>
            <div class="input-box">
              <input type="email" id="mail" class="input-field" placeholder="Email" name="email" autocomplete="off"
                required>
              <p id="email-error"></p>
            </div>
            <div class="input-box">
              <input type="password" class="input-field" placeholder="Password" name="password" autocomplete="off"
                required>

            </div>
            <div class="forgot" id="forgot-password-link">
              <!-- <section>
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
              </section> -->
              <section>
                <a href="#">Forgot password ?</a>
              </section>
            </div>
            <div class="input-submit">
              <button class="submit-btn" id="submit" name="login">
                <label for="submit">Sign In</label>
              </button>
            </div>
            <div class="sign-up-link">
              <p>Don't have an account? <a href="#" id="signup-link">Sign Up</a></p>
            </div>
          </form>


          <!-- Password Reset Form -->
        <form id="reset-form" method="POST" action="sendotp.php" style="display: none;">
          <h1 class="modal-title fs-5" id="box-header">Reset Password</h1>
          <div class="input-box">
            <input type="email" id="reset-email" class="input-field" placeholder="phone-number" name="phone-number" autocomplete="off"
              required>
            <p id="reset-email-error"></p>
          </div>
          <div class="input-submit">
            <button class="submit-btn" id="reset-submit" name="sendotp">
              <label for="reset-submit">send otp</label>
            </button>
          </div>
          <div class="back-to-login-link">
            <p>Back to <a href="#" id="back-to-login-link">Login</a></p>
          </div>
        </form>


          <!-- Sign Up Form -->

          <form id="signup-form" method="POST" action="login/register.php" style="display: none;">
            <h1 class="modal-title fs-5" id="box-header">SignUp</h1>
            <div class="input-box">
              <input type="text" class="input-field" placeholder="Username" name="username" autocomplete="off" required>
            </div>
            <div class="input-box">
              <input type="tel" id="phone-number" class="input-field" placeholder="Phone" name="phone_number"
                autocomplete="off" required pattern="[0-9]{10}">
              <p id="error-message"></p>
            </div>
            <div class="input-box">
              <input type="email" id="email" class="input-field" placeholder="Email" name="email" autocomplete="off"
                required>
              <p id="email-error-message"></p>
            </div>
            <div class="input-box">
              <input id="password" type="password" class="input-field" placeholder="Password" name="password" autocomplete="off"
                required >
                <p id="password-error"></p>
            </div>
            <div class="input-submit">
              <button class="submit-btn" id="submit" name="register">
                <label for="submit">Sign Up</label>
              </button>
            </div>
            <div class="sign-in-link">
              <p>Already have an account? <a href="#" id="signin-link">Sign In</a></p>
            </div>
          </form>          
        </div>
      </div>
    </div>
  </div>
  <!-- seller modal -->
<div class="modal fade" id="seller-registration-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ai consultancy</h1>
        <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="modal-body" class="modal-body">
        <!-- Seller registration form -->
        <form id="seller-registration-form" method="POST" action="login/seller_registration.php" style="display: block;">
          <h1 class="modal-title fs-5" id="box-header">Seller Registration</h1>
          <div class="input-box">
            <input type="text" id="seller-name" class="input-field" placeholder="Seller Name" name="seller_name" required>
          </div>

          <div class="input-box">
            <input type="text" id="address" class="input-field" placeholder="Address" name="seller_address" required>
          </div>

          <div class="input-box">
            <input type="tel" id="seller-phone" class="input-field" placeholder="Phone Number" name="seller_phone" required>
            <p id="sellerphoneError"></p>  
          </div>

          <div class="input-box">
            <input type="email" id="seller-email" class="input-field" placeholder="Email" name="seller_email" required>
            <p id="sellerEmailError"></p>
          </div>

            <div class="input-box">
              <input type="password" id="seller-password" class="input-field" placeholder="Password" name="seller_password" required>
              <p id="seller-password-error"></p>
            </div>

          <div class="input-submit">
            <button class="submit-btn" id="seller-register" name="seller_register">
              <label for="seller-register">Register</label>
            </button>
          </div>
          <div class="sign-in-link">
            <p>Already a Seller?<a href="#" id="loginlink" data-bs-target="#staticBackdrop" data-bs-toggle="modal"> Sign In</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>






  <!-- Quote -->
  <div class="quote-container">
    <p class="quote"><span class="quote-bold">Buy</span> at your Desired bidding price</p>
    <img src="./icons/Hadezign-Hobbies-Photography.ico" alt="Logo" class="logo">
  </div>
  <!-- Product categories -->
  <div class="product-categories">
    <div class="product-category">
      <img class="img-category" src="./icons/phone.png" width="110px" height="70px">
      <p class="category cat-mobile"></p>
    </div>
    <div class="product-category">
      <img class="img-category cat-tv" src="./icons/TV.png" width="110px" height="70px">
      <p class="category">TV</p>
    </div>
    <div class="product-category">
      <img class="img-category cat-headphone" src="./icons/headphones.png" width="110px" height="70px">
      <p class="category ">Headphones</p>
    </div>
    <div class="product-category">
      <img class="img-category cat-watch" src="./icons/watch.png" width="110px" height="70px">
      <p class="category">Smart Watches</p>
    </div>
    <div class="product-category">
      <img class="img-category cat-electronics" src="./icons/Lap.png" width="70px" height="70px">
      <p class="category">Electronics</p>
    </div>
    <div class="product-category">
      <img class="img-category cat-furniture" src="./icons/Sofa -4 copy.png" width="100px" height="70px">
      <p class="category">Furnitures</p>
    </div>
    <div class="product-category">
      <img class="img-category cat-furniture" src="./icons/Sofa -4 copy.png" width="100px" height="70px">
      <p class="category">Others</p>
    </div>
</div>



<div class="testdiv">
  hello
</div>

<!-- Footer -->
 <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Product 1</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Product 2</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Product 3</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Product 4</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Trending Products</a>
          </p>
          <p>
            <a href="#!" class="text-reset">My Account</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 contact">Contact</h6>
          <p><i class="fas fa-home me-3"></i> MKCE, Karur - 639113</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            example@mkce.ac.in
          </p>
          <p><i class="fas fa-phone me-3"></i> +91 99988 xxxxx</p>
          <p><i class="fas fa-print me-3"></i> +91 99988 xxxxx</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="#">Ai Consultancy</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- ionicons -->
 <script src="index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>