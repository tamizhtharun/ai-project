<?php require_once('header.php'); ?>

<!-- side mega menu -->

<div class="category-pad">
<div class="category-box">
    <ul class="categories">
        <?php
            $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
        ?>
            <li class="category">
                <a class="category-link" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category">
                    <img src="./icons/hole.png" width="30px" height="30px">
                    <span><?php echo $row['tcat_name']; ?></span>
                </a>
                <ul class="subcategories">
                    <?php
                        $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
                        $statement1->execute(array($row['tcat_id']));
                        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result1 as $row1) {
                    ?>
                        <li class="subcategory">
                            <a href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category">
                                <?php echo $row1['mcat_name']; ?>
                            </a>
                            <ul class="sub-subcategories">
                                <?php
                                    $statement2 = $pdo->prepare("SELECT * FROM tbl_end_category WHERE mcat_id=?");
                                    $statement2->execute(array($row1['mcat_id']));
                                    $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result2 as $row2) {
                                ?>
                                    <li>
                                        <a href="product-category.php?id=<?php echo $row2['ecat_id']; ?>&type=end-category">
                                            <?php echo $row2['ecat_name']; ?>
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </li>
        <?php
            }
        ?>
    </ul>
</div>


  <div class="right-category-pad">
    <div class="quote-container">
      <p class="quote"><span class="quote-bold">Buy</span> at your Desired bidding price</p>
      <img src="./icons/dead stock.png" alt="Logo" class="logo">
    </div>
    <div class="brands">
      <div class="ind-brand">
        <a href="#" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
        <img src="./icons/index milling.png">
      </div>
      <p class="brand-name">Indexable Milling Tools</p>
      </a>
      </div>
      <div class="ind-brand">
        <a href="#" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
        <img src="./icons/endmill.png">
      </div>
      <p class="brand-name">Solid Carbide Endmills</p>
        </a>
      </div>
      <div class="ind-brand">
        <a href="#" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
        <img src="./icons/turning.png">
      </div>
      <p class="brand-name ">Turning Tools</p>
        </a>
      </div>
      <div class="ind-brand">
        <a href="#" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
            <img src="./icons/hole.png">
          </div>
          <p class="brand-name">Holemaking Tools</p>
        </a>
      </div>
      <div class="ind-brand">
        <a href="#" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
        <img src="./icons/Threading tools.png">
      </div>
      <p class="brand-name">Threading Tools</p>
        </a>
      </div>
      <div class="ind-brand">
        <a href="./products.html" class="link-body-emphasis link-underline-opacity-0">
          <div class="img-category">
            <img src="./icons/others.png">
      </div>
      <p class="brand-name">Others</p>
        </a>
      </div>
  </div>
  </div>
</div>

<!-- End side mega menu -->

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

<!-- End Live Bidding -->

<!-- categories -->


<div class="wrapper">
  <span class="cat-title">TURNING TOOLS</span>
  <!-- <i id="left" class="fa-solid  fas fa-angle-left"></i> -->
  <ul class="carousel">
      <!-- <li class="card"> -->
        <a href="#" style="text-decoration: none; color: black;">
          <li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      <!-- </li> -->
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;">
          <li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>

        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
  </ul>
  <!-- <i id="right" class="fa-solid fas fa-angle-right"></i> -->

</div>


<!--category 2-->
<div class="wrapper">
  <span class="cat-title">HOLEMAKING TOOLS</span>
  <!-- <i id="left" class="fa-solid  fas fa-angle-left"></i> -->
  <ul class="carousel">
      <!-- <li class="card"> -->
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      <!-- </li> -->
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>

        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
  </ul>
  <!-- <i id="right" class="fa-solid fas fa-angle-right"></i> -->

</div>


<!--category 3-->
<div class="wrapper">
  <span class="cat-title">THREADING TOOLS</span>
  <!-- <i id="left" class="fa-solid  fas fa-angle-left"></i> -->
  <ul class="carousel">
      <!-- <li class="card"> -->
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      <!-- </li> -->
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      </li>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>

        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
      
        <a href="#" style="text-decoration: none; color: black;"><li class="cat-product-list-card swiper-slide">
          <div class="cat-product-img">
            <img src="./icons/dclnr-iso_ex_pvd_p_01_png.jpg" width="130px" height="100px">
          </div>
          <div class="product-card-lower">
            <div class="cat-product-title">
              <span>Shank tool - Rigid clamping</span>
            </div>
            <div class="cat-product-price">
              ₹100.00
            </div>
            <div class="cat-product-original-price">
              <div class="price-strike">₹500</div>
              <div class="cat-product-discount">
                15% OFF
              </div>
            </div>
          </div>
        </li>
      </a>
    </ul>
  <!-- <i id="right" class="fa-solid fas fa-angle-right"></i> -->
</div>

<!--End Category -->

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="assets\js\index.js"></script>
<script src="index.js"></script>

