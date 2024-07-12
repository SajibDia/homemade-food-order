<?php require 'templates/header.php'; ?>
<?php if (!isset($_SESSION['isLoggedIn'])) {

  header('Location: signin.php');
  exit;
} else { ?>

  <body>
    <div class="loader-container">
      <label class="label">Loading...</label>
    </div>
    <?php require 'templates/nav.php'; ?>

    <section id="banner" class="banner-bg shop-categories-banner">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="banner-title text-center">
              <p class="banner-heading">order online</p>
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">order online</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="categories container-fluid">
      <div class="row">
        <div class="container">
          <div class="row py-5 my-lg-5">
            <div class="col-12">
              <div class="categories__showcase p-3 p-md-5 mb-5">
                <h2 class="categories__showcase__title text-uppercase font-weight-bold">Home Food</h2>
                <p class="categories__showcase__text mb-0">
                  The best homemade food in you area
                </p>
              </div>
            </div>

            <div class="col-12">
              <div class="categories__item-list">
                <div class="row">
                  <?php
                  include_once 'db_connection.php';

                  $sql = "SELECT * FROM menu_items";

                  $items = $conn->query($sql);

                  foreach ($items as $item) {
                  ?>
                    <div class="col-12 col-md-3">
                      <div class="categories__pizza-item-card text-center mt-5">
                        <a href="item-detail.php?id=<?php echo $item['id']; ?>"><img src="./admin/uploads/<?php echo $item['item_image']; ?>" class="categories__pizza-item-img mb-2 mb-lg-4" alt=""></a>
                        <div class="categories__pizza-item-para ">
                          <a href="item-detail.php?id=<?php echo $item['id']; ?>" class="categories__pizza-item-title">
                            <p class=" h5 text-uppercase categories__pizza-item-title mb-1 mb-md-2"><?php echo $item['item_name']; ?></p>
                          </a>
                          <p class="categories__pizza-item-text mb-1 mb-md-2">
                            <?php
                            $words = explode(" ", $item['description']);
                            $limitedWords = implode(" ", array_slice($words, 0, 10));
                            echo $limitedWords;
                            ?>

                          </p>
                          <p class="categories__pizza-item-price mb-1 mb-md-2">$ <?php echo $item['medium_price']; ?></p>
                        </div>
                        <a href="item-detail.php?id=<?php echo $item['id']; ?>" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a>
                      </div>
                    </div>
                  <?php } ?>
                  <!-- <div class="col-12 col-md-3">
                            <div class="categories__pizza-item-card text-center mt-5">
                              <a href="item-detail.php"><img src="img/shop-detail/rel-1.png" class="categories__pizza-item-img mb-2 mb-lg-4" alt=""></a>
                              <div class="categories__pizza-item-para ">
                                <a href="item-detail.php" class="categories__pizza-item-title" ><p class=" h5 text-uppercase categories__pizza-item-title mb-1 mb-md-2">margherita pizza</p></a>
                                <p class="categories__pizza-item-text mb-1 mb-md-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati tempore </p>
                                <p class="categories__pizza-item-price mb-1 mb-md-2">$ 20.50</p>
                              </div>
                              <a href="item-detail.php" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a>
                            </div>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="categories__pizza-item-card text-center mt-5">
                              <a href="item-detail.php"><img src="img/shop-detail/rel-1.png" class="categories__pizza-item-img mb-2 mb-lg-4" alt=""></a>
                              <div class="categories__pizza-item-para ">
                                <a href="item-detail.php" class="categories__pizza-item-title" ><p class=" h5 text-uppercase categories__pizza-item-title mb-1 mb-md-2">margherita pizza</p></a>
                                <p class="categories__pizza-item-text mb-1 mb-md-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati tempore </p>
                                <p class="categories__pizza-item-price mb-1 mb-md-2">$ 20.50</p>
                              </div>
                              <a href="item-detail.php" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a>
                            </div>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="categories__pizza-item-card text-center mt-5">
                              <a href="item-detail.php"><img src="img/shop-detail/rel-1.png" class="categories__pizza-item-img mb-2 mb-lg-4" alt=""></a>
                              <div class="categories__pizza-item-para ">
                                <a href="item-detail.php" class="categories__pizza-item-title" ><p class=" h5 text-uppercase categories__pizza-item-title mb-1 mb-md-2">margherita pizza</p></a>
                                <p class="categories__pizza-item-text mb-1 mb-md-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati tempore </p>
                                <p class="categories__pizza-item-price mb-1 mb-md-2">$ 20.50</p>
                              </div>
                              <a href="item-detail.php" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a>
                            </div>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="categories__pizza-item-card text-center mt-5">
                              <a href="item-detail.php"><img src="img/shop-detail/rel-1.png" class="categories__pizza-item-img mb-2 mb-lg-4" alt=""></a>
                              <div class="categories__pizza-item-para ">
                                <a href="item-detail.php" class="categories__pizza-item-title" ><p class=" h5 text-uppercase categories__pizza-item-title mb-1 mb-md-2">margherita pizza</p></a>
                                <p class="categories__pizza-item-text mb-1 mb-md-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati tempore </p>
                                <p class="categories__pizza-item-price mb-1 mb-md-2">$ 20.50</p>
                              </div>
                              <a href="item-detail.php" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a>
                            </div>
                          </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  <?php require 'templates/footer.php';
} ?>