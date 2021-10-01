<?php include_once 'app/config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shorcut icon" type="image/png" href="asset/.image/logo-favicon.png">

    <script src="https://kit.fontawesome.com/db95e67526.js" crossorigin="anonymous"></script>

    <title>Santree</title>
</head>
<body>
<header class="border-bottom nav-float bg-white">
        <div class="header-content">
            
        </div>
        <div class="container">
        <nav class="navbar flex align-center">
                <a href="/" class="navbar-brand d-flex align-items-center text-decoration-none">
                    <img src="<?= $basepath ?>asset/.image/logo-favicon.png" alt="Santree" widt="50" height="50">
                    <span class="fs-4">Santree</span>
                </a>

                <ul class="">
                    <li class="navbar-item">
                        <a href="#">Produk</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">Tentang</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">Kontak</a>
                    </li>
                </ul>

                <div class="navbar-header-icon">
                    <form action="" class="search-box">
                        <img src="<?= $basepath ?>asset/.icon/search.svg" alt="search">
                        <input type="text" name="search" id="" placeholder="Cari sesuatu...">
                    </form>
                    <a href="#" class="cart-icon">
                        <img src="<?= $basepath ?>asset/.icon/shopping-bag.svg" alt="cart" class="icon-sm" id="cart">
                        <p class="cart-number"></p>
                    </a>
                    <div class="layer-transparent collapsed" hidden=true></div>
                    <div class="nav-cart collapsed" hidden=true>
                        <div class="container">
                            <!-- if empty cart -->
                            <div class="cart-empty">
                                <img src="<?= $basepath.'asset/.image/cart-empty.png' ?>" alt="Keranjang Kosong">
                                <p>
                                    <strong>
                                        Keranjang Belanja Anda Kosong
                                    </strong><br>
                                    <small class="text-muted">Karena Masih Kosong, Yuk beli sesuatu di Santree...</small>
                                </p>
                            </div>

                            <!-- cart is exist -->
                            <div class="cart-avail">
                                <div class="flex-2-col">
                                    <strong>Keranjang (<span id="number"></span>)</strong>
                                    <strong>
                                        <a href="<?= $basepath.'p/cart.php' ?>" class="c-green" style="text-decoration:none"><small>Lihat Keranjang</small></a>
                                    </strong>
                                </div>
                                <div class="spacer border-bottom"></div>
                                <div class="cart-item-list">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <!-- <div class="p-5 mb-4 bg-light border-radius-16">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Banner</h1>
                    <p class="col-md-8 fs-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita omnis id cum. Sequi minus ducimus aspernatur voluptatum explicabo ratione dolor quibusdam maiores perspiciatis numquam et laboriosam quos, reiciendis laudantium mollitia.
                    </p>
                </div> -->
                <div id="BannerHeadline" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#BannerHeadline" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#BannerHeadline" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#BannerHeadline" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="banner bg-light border-radius-16">
                                <img src="asset/.image/banner-1.png" alt="">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="banner bg-light border-radius-16">
                                <img src="asset/.image/banner-2.png" alt="">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="banner bg-light border-radius-16">
                                <img src="asset/.image/banner-3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#BannerHeadline" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#BannerHeadline" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="spacer"></div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-dark border-radius-16">
                        <h2>Diskon PPKM</h2>
                        <p>Paket Produk diskon selama PPKM sebesar 10%. Cek sekarang sebelum kehabisan.</p>
                        <button class="btn btn-outline-light" type="button">Lihat Selengkapnya <img src="asset/.icon/001-next.png" alt=">" width="10"></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border border-radius-16">
                        <h2>Produk Pilihan Santree</h2>
                        <p>Temukan berbagai macam produk pilihan dari Santree</p>
                        <button class="btn btn-outline-secondary" type="button">Lihat Selengkapnya <img src="asset/.icon/001-next.png" alt=">" width="10"></button>
                        </div>
                    </div>
                </div>
                
                <div id="product">
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <div class="head-title">
                        <h4>Produk Terbaru</h4>
                        <h5><a href="#" style="cursor: pointer; text-decoration:none; color: #73AF59">Lihat Semua</a></h5>
                    </div>
                    <div class="spacer"></div>
                    <div class="row">
                        <?php
                            
                            $productQuery = "SELECT * FROM `product` LIMIT 8";
                            // check query
                            if($mysqli->query($productQuery))
                            {
                                // check data row
                                $productResult = $mysqli->query($productQuery);
                                if($productResult->num_rows >= 1)
                                {
                                    // fetch data to assoc
                                    function toRupiah($number)
                                    {
                                        $price = "Rp.". number_format($number,0,',','.');
                                        return $price;
                                    }
                                    while($productData = $productResult->fetch_assoc()):
                        ?>
                                        <div class="col">
                                        <a href="<?= $basepath.'p/produk.php?id='.$productData['p_id'] ?>" style="text-decoration:none; color:inherit;">
                                            <div class="card">
                                                <img src="content/.upload/<?= $productData['image_path'] ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $productData['product_name'] ?></h5>
                                                    <!-- <small class="text-muted">PESANTREN BABUSSALAM</small> -->
                                                    <p>
                                                        <strong class="c-green"><?= toRupiah($productData['price']) ?></strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                        <?php
                                    endwhile;
                                }
                            }
                        ?>
                    </div>
                    
                </div>
            </div>

            <div class="headline-tags">
                <h4 class="text-center">Mengapa Beli Produk Santree</h4>
                <div class="spacer"></div>
                <div class="spacer"></div>
                <img src="asset/.image/bg-patren-01.png" class="patren-float-right">
                <img src="asset/.image/bg-patren-01.png" class="patren-float-left">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <div class="title">Mitra Pesantren Yang Diberdayakan</div>
                            <p class="text-white">Memiliki 50+ mitra santripreneur</p>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Jaminan Kualitas Unggulan</div>
                            <p class="text-white">Total ada 10+ produk unggulan</p>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Dukung Produk Santri</div>
                            <p class="text-white">Meningkatkan pendapatan santri hingga 60%</p>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Transaksi Aman dan Mudah</div>
                            <p class="text-white">SANTREE Proses mudah, Produk Berkah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="asset/.image/mitra-santree.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Mari bergabung menjadi mitra santree</h1>
                    <p class="lead">Bersama santreeberdaya, temui kemudahan dalam memasarkan produk Anda</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Hubungi kami</button>
                    <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 pt-5 my-5 text-center">
            <h1 class="display-4 fw-bold">Tentang Santree</h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Sosiopreneur berbasis teknologi yang hadir untuk mendukung kemajuan bisnis pesantren di Indonesia. Santree terinspirasi dari potensi bisnis Pesantren yang kurang dioptimalkan karena minimnya akses. Selain itu, tingginya minat pasar terhadap produk pesantren menjadi peluang potensial untuk terus dikembangkan.</p>
            </div>
            <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="asset/.image/illustration.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
            </div>
            </div>
        </div>
    </main>

    <footer class="border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper d-block">
                        <strong>Kontak Kami</strong>
                        <div class="spacer-sm"></div>
                        <p>
                            <img src="asset/.icon/003-pin.png" alt="Address" width="25" class="footer-icon">
                            Jalan Raya Ketawang 17/3 No.51 Gondanglegi Malang
                        </p>
                        <p>
                            <a href="tel:+6281284535690">
                                <img src="asset/.icon/002-telephone.png" alt="Phone" width="25" class="footer-icon">
                                0812 8453 5690
                            </a>
                        </p>
                        <p>
                            <a href="mailto:santree_id@gmail.com">
                                <img src="asset/.icon/001-email.png" alt="Mail" width="25" class="footer-icon">
                                santree_id@gmail.com
                            </a>
                        </p>
                    </div>
                    <div class="spacer"></div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>SANTREE</strong>
                            <div class="spacer-sm"></div>
                            <ul>
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Produk</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong>Mitra</strong>
                            <div class="spacer-sm"></div>
                            <ul>
                                <li><a href="#">Mitra Santree</a></li>
                                <li><a href="#">Syarat Dan Ketentuan</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <strong>Bantuan</strong>
                            <div class="spacer-sm"></div>
                            <ul>
                                <li><a href="#">FAQ/Bantuan</a></li>
                                <li><a href="#">Konfirmasi Pembayaran</a></li>
                                <li><a href="#">Pengembalian Produk</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="social-media">
                                <strong class="title">Sosial Media Kami</strong>
                                <div class="spacer-sm"></div>
                                <div class="social-media-list">
                                    <a href=""><img src="asset/.icon/instagram.png" alt="Instagram"></a>
                                    <a href=""><img src="asset/.icon/facebook.png" alt="Facebook"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <strong>Jasa Pengiriman</strong>
                            <div class="spacer"></div>
                            <div class="coureer-list">
                                <img src="asset/.image/jne.png" alt="JNE">
                                <img src="asset/.image/pos.png" alt="POS">
                                <img src="asset/.image/sicepat.png" alt="SICEPAT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="footer-copy text-center text-white">
            &copy;2021 Santreeberdaya.id
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/store.js"></script>
    <script>
        var myCarousel = document.querySelector('#BannerHeadline')
        var carousel = new bootstrap.Carousel(myCarousel)
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if($(document).scrollTop() > 548) {
                    document.querySelector('.nav-float').style = "position:fixed; top:0px; z-index:99; animation: navShow .5s ease";
                } else if($(document).scrollTop() == 0) {
                    document.querySelector('.nav-float').style = "position:absolute;";
                }
            });
        });
    </script>
</body>
</html>