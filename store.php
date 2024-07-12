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
                            <p class="banner-heading">our Seller</p>
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sellers</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="categories container-fluid">
            <div class="row">
                <div class="container">
                    <div class="my-5">
                        <div class="col-12">
                            <div class="categories__showcase p-3 p-md-5 mb-5">
                                <h2 class="categories__showcase__title text-uppercase font-weight-bold">Our Sellers</h2>
                                <p class="categories__showcase__text mb-0">
                                    THE BEST SELLERS FOR YOUR BEST FOOD
                                </p>
                            </div>
                        </div>

                        <!-- Top Three -->
                        <div class="row mx-3 mx-md-0">
                            <div class="col-12">
                                <div class="owl-carousel">

                                    <div class="mt-2 col-md-12">
                                        <div class="card">
                                            <img src="img/about/cuisine_female.png" class="our-chef__chef-img" alt="...">
                                            <div class="card-body our-chef__chef-info text-center">
                                                <p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Kaniz Alam</p>
                                                <p class="card-text our-chef__chef-position">Master chef</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-md-12">
                                        <div class="card">
                                            <img src="img/about/cuisine_female.png" class="our-chef__chef-img" alt="...">
                                            <div class="card-body our-chef__chef-info text-center">
                                                <p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Kaniz Alam</p>
                                                <p class="card-text our-chef__chef-position">Master chef</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-md-12">
                                        <div class="card">
                                            <img src="img/about/cuisine_female.png" class="our-chef__chef-img" alt="...">
                                            <div class="card-body our-chef__chef-info text-center">
                                                <p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Kaniz Alam</p>
                                                <p class="card-text our-chef__chef-position">Master chef</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- Random Seller -->
                        <div class="col-12">
                            <div class="categories__item-list">
                                <div class="row">

                                    <?php
                                    include_once 'db_connection.php';
                                    $sql2 = "SELECT * From user WHERE user_role = 'seller'";
                                    $rev = mysqli_query($conn, $sql2);
                                    while ($row = $rev->fetch_assoc()) {
                                    ?>
                                        <div class="col-12 col-md-3">
                                            <div class="categories__pizza-item-card text-center mt-5">
                                                <div>
                                                    <div class="card">
                                                        <img src="<?php echo $row['profile_image']; ?>" class="our-chef__chef-img" alt="...">
                                                        <div class="card-body our-chef__chef-info text-center">
                                                            <p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name"><?php echo $row['full_name']; ?></p>
                                                            <p class="card-text our-chef__chef-position"><?php echo $row['shop_name']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <a href="item-detail.php?id=" class="text-uppercase font-weight-bold btn categories__order-btn">Order Now</a> -->
                                            </div>
                                        </div>

                                    <?php } ?>
                                    

                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>





        <!-- Join as Seller -->
        <section class="services container-fluid">
            <div class="row">
                <div class="services__top-img">
                    <img src="img/order-top.png" class="w-100" alt="">
                </div>
                <div class="container py-5">
                    <div class="row align-items-center text-center">
                        <div class="col-12 col-md-4">
                            <div class="services__card">
                                <img src="img/seller/image-seller2.jpg" class="our-chef__chef-img" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="services__card">
                                <p class="text-uppercase services__caption mb-2">Join as a Seller</p>
                                <p class="services__para"> It's Your Turn. Make money selling your hand made food. We always encourage you to start
                                    make your first move. One Platform, One Opportunity. </p>
                                <a class="text-uppercase booking__book-btn py-1 py-md-2 text-center rounded" href="register_seller.php">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="services__bottom-img">
                    <img src="img/order-bottom.png" class="w-100" alt="">
                </div>
            </div>
        </section>





    <?php require 'templates/footer.php';
} ?>