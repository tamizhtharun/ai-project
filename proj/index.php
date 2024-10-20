<?php require_once('header.php'); ?>


 <!-- quote container -->
 <div class="quote-container">
    <p class="quote"><span class="quote-bold">Buy</span> at your Desired bidding price</p>
    <img src="assets/uploads/<?php echo $logo; ?>" alt="Logo" class="logo">
  </div>


  <!-- Product categories -->
  
  <div class="product-categories">
    <div class="product-category">
      <a href="#" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
      <img src="./icons/index milling.png">
    </div>
    <p class="category-txt">Indexable Milling Tools</p>
    </a>
    </div>
    <div class="product-category">
      <a href="#" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
      <img src="./icons/endmill.png">
    </div>
    <p class="category-txt">Solid Carbide Endmills</p>
      </a>
    </div>
    <div class="product-category">
      <a href="#" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
      <img src="./icons/turning.png">
    </div>
    <p class="category-txt ">Turning Tools</p>
      </a>
    </div>
    <div class="product-category">
      <a href="#" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
          <img src="./icons/hole.png">
        </div>
        <p class="category-txt">Holemaking Tools</p>
      </a>
    </div>
    <div class="product-category">
      <a href="#" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
      <img src="./icons/Threading tools.png">
    </div>
    <p class="category-txt">Threading Tools</p>
      </a>
    </div>
    <div class="product-category">
      <a href="./products.html" class="link-body-emphasis link-underline-opacity-0">
        <div class="img-category">
          <img src="./icons/others.png">
    </div>
    <p class="category-txt">Others</p>
      </a>
    </div>
</div>
<!-- end product category -->

<!-- banner -->
<div class="banner"> 
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="img" src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/b35a105fe8bc8cbb.png?q=20" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img class="img" src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/3322c8a97f524397.jpeg?q=20" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img class="img" src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/42a2afb08834f823.jpeg?q=20" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
<!-- end banner  -->

<!-- Live Bidding -->
<div class="container swiper">
  <p class="swiper-title">Live Bidding</p>
  <div class="slider-wrapper">
    <div class="card-list swiper-wrapper">
      <div class="card-item swiper-slide">
        <div class="card-img">
        <img alt="Card-img" src="./icons/index milling.png" >
        </div>
        <div class="live-bidding-details">
        <div class="live-bidding-product-title">
          <h2>Product title</h2>
        </div>
          <div class="price-section">
            <p class="actual-price">₹1,000.00</p>
            <p class="price-strikethrough"> ₹2,500.00</p>
          </div>
          <div class="live-bidding-price">
            <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
          </div>
          <div class="available-stock">
            <p>Available Stock: <span class="available-stock-text">10</span> units</p>
          </div>
          <div class="bid-ends-in">
            <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
          </div>
        </div>
      </div>

      <div class="card-item swiper-slide">
        <div class="card-img">
          <img alt="Card-img" src="./icons/index milling.png" >
          </div>
          <div class="live-bidding-details">
          <div class="live-bidding-product-title">
            <h2>Product title</h2>
          </div>
            <div class="price-section">
              <p class="actual-price">₹1,000.00</p>
              <p class="price-strikethrough"> ₹2,500.00</p>
            </div>
            <div class="live-bidding-price">
              <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
            </div>
            <div class="available-stock">
              <p>Available Stock: <span class="available-stock-text">20</span> units</p>
            </div>
            <div class="bid-ends-in">
              <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
            </div>
          </div>
      </div>

      <div class="card-item swiper-slide">
        <div class="card-img">
          <img alt="Card-img" src="./icons/index milling.png" >
          </div>
          <div class="live-bidding-details">
          <div class="live-bidding-product-title">
            <h2>Product title</h2>
          </div>
            <div class="price-section">
              <p class="actual-price">₹1,000.00</p>
              <p class="price-strikethrough"> ₹2,500.00</p>
            </div>
            <div class="live-bidding-price">
              <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
            </div>
            <div class="available-stock">
              <p>Available Stock: <span class="available-stock-text">30</span> units</p>
            </div>
            <div class="bid-ends-in">
              <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
            </div>
          </div>
      </div>

      <div class="card-item swiper-slide">
        <div class="card-img">
          <img alt="Card-img" src="./icons/index milling.png" >
          </div>
          <div class="live-bidding-details">
          <div class="live-bidding-product-title">
            <h2>Product title</h2>
          </div>
            <div class="price-section">
              <p class="actual-price">₹1,000.00</p>
              <p class="price-strikethrough"> ₹2,500.00</p>
            </div>
            <div class="live-bidding-price">
              <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
            </div>
            <div class="available-stock">
              <p>Available Stock: <span class="available-stock-text">40</span> units</p>
            </div>
            <div class="bid-ends-in">
              <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
            </div>
          </div>
      </div>

      <div class="card-item swiper-slide">
        <div class="card-img">
          <img alt="Card-img" src="./icons/index milling.png" >
          </div>
          <div class="live-bidding-details">
          <div class="live-bidding-product-title">
            <h2>Product title</h2>
          </div>
            <div class="price-section">
              <p class="actual-price">₹1,000.00</p>
              <p class="price-strikethrough"> ₹2,500.00</p>
            </div>
            <div class="live-bidding-price">
              <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
            </div>
            <div class="available-stock">
              <p>Available Stock: <span class="available-stock-text">50</span> units</p>
            </div>
            <div class="bid-ends-in">
              <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
            </div>
          </div>
      </div>

      <div class="card-item swiper-slide">
        <div class="card-img">
          <img alt="Card-img" src="./icons/index milling.png" >
          </div>
          <div class="live-bidding-details">
          <div class="live-bidding-product-title">
            <h2>Product title</h2>
          </div>
            <div class="price-section">
              <p class="actual-price">₹1,000.00</p>
              <p class="price-strikethrough"> ₹2,500.00</p>
            </div>
            <div class="live-bidding-price">
              <p>Live Bidding Price: <span class="live-bidding-price-text">₹ 100.00</span></p>
            </div>
            <div class="available-stock">
              <p>Available Stock: <span class="available-stock-text">60</span> units</p>
            </div>
            <div class="bid-ends-in">
              <p>Bid Ends In: <span class="bid-ends-in-text" id="bid-ends-in-time"></span></p>
            </div>
          </div>
      </div>
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-slide-button swiper-button-prev"></div>
    <div class="swiper-slide-button swiper-button-next"></div>
  </div>
</div>


<!-- footer -->
<div class="footer">
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
                <i class="fas fa-gem me-3"></i>Dead Stock
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
        <a class="text-reset fw-bold" href="#">Dead Stock</a>
      </div>
      <!-- Copyright -->
    </footer>
</div>

