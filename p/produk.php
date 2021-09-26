<?php 
    include_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

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

                <form action="">

                </form>

                <div class="navbar-header-icon">
                    <form action="" class="search-box">
                        <img src="<?= $basepath ?>asset/.icon/search.svg" alt="search">
                        <input type="text" name="search" id="" placeholder="Cari sesuatu...">
                    </form>
                    <a href="#">
                        <img src="<?= $basepath ?>asset/.icon/shopping-bag.svg" alt="cart" class="icon-sm" id="cart">
                    </a>
                    <div class="layer-transparent collapsed" hidden=true>

                    </div>
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
                            <div class="cart-avail" hidden=true>
                                <div class="flex-2-col">
                                    <strong>Keranjang (1)</strong>
                                    <strong>
                                        <a href="" class="c-green" style="text-decoration:none"><small>Lihat Keranjang</small></a>
                                    </strong>
                                </div>
                                <div class="spacer border-bottom"></div>
                                <div class="cart-item-list">
                                    <div class="flex cart-item">
                                        <img src="<?= $basepath.'content/.upload/jeruk-nipis-kering.jpeg' ?>" alt="Item" style="margin:0px">
                                        <p class="info">
                                            <strong class="title">Jeruk Nipis kering</strong><br>
                                            <small class="text-muted">1 Barang (50gram)</small>
                                        </p>
                                    </div>
                                    <div class="flex cart-item">
                                        <img src="<?= $basepath.'content/.upload/jeruk-nipis-kering.jpeg' ?>" alt="Item" style="margin:0px">
                                        <p class="info">
                                            <strong class="title">Jeruk Nipis kering</strong><br>
                                            <small class="text-muted">1 Barang (50gram)</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- tabs -->
    <div class="tabs">
        <div class="container">
            <a href="#">Beranda</a> <img src="../asset/.icon/001-next.png" alt=">" width="10">
            <a href="#">Produk</a> <img src="../asset/.icon/001-next.png" alt=">" width="10">
            <a href="#">Jeruk Nipis Kering</a>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../content/.upload/jeruk-nipis-kering.jpeg" alt="" class="item-image">
                </div>
                <div class="col-md-6">
                    <div class="flex-2-col">
                        <h3 class="product-title" id="product-name">Jeruk Nipis Kering</h3>
                        <small class="text-muted">Kode Produk 1uh27b</small>
                    </div>
                    <div class="spacer"></div>
                    <p class="decription-item">
                        100% jeruk nipis asli, kaya vitamin C, siap seduh untuk wedang lemon ataupun sajian lainnya yang praktis
                        <br>
                        <small class="text-muted">Ukuran : 50 gram</small>
                    </p>
                    <h4 class="c-green"><strong id="product-price">Rp. 28.000</strong></h4>
                    <div class="spacer"></div>
                    <p><strong>Jumlah</strong></p>
                    <div class="spacer"></div>
                    <div class="flex-2-col">
                        <div class="input-item">
                            <button class="icon-item" id="minus">&#45;</button>
                            <input type="text" name="quantity" id="qty" value=1 readonly=true>
                            <button class="icon-item" id="plus">&plus;</button>
                        </div>
                        <button class="btn btn-cart" id="addCart">
                            +&nbsp;Tambahkan Ke Keranjang
                        </button>
                    </div>
                    <div class="spacer"></div>
                    <div class="border-top border-bottom" style="padding-top:15px;">
                        <p class="flex">
                            <img src="../asset/.icon/001-info-button.png" alt="i" width=20 height=20 style="margin-right:5px">
                            <small class="text-muted">Waktu proses 1 hari kerja setelah selesai melakukan pembayaran</small>
                        </p>
                    </div>
                </div>
            </div>
            <div id="product">
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <div class="head-title">
                        <h4>Produk Lainnya</h4>
                        <h5><a href="#" style="cursor: pointer; text-decoration:none; color: #73AF59">Lihat Semua</a></h5>
                    </div>
                    <div class="spacer"></div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <img src="../content/.upload/lemon-kering.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Lemon Kering</h5>
                                    <small class="text-muted">PESANTREN BABUSSALAM</small>
                                    <p>
                                        <strong class="c-green">Rp. 32.000</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="" style="cursor:pointer; text-decoration:none;">
                                <div class="card">
                                    <img src="../content/.upload/jeruk-nipis-kering.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-black">Jeruk Nipis Kering</h5>
                                        <small class="text-muted">PESANTREN BABUSSALAM</small>
                                        <p>
                                            <strong class="c-green">Rp. 28.000</strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../content/.upload/poty.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Poty</h5>
                                    <small class="text-muted">PESANTREN AL RIFA’IE</small>
                                    <p>
                                        <strong class="c-green">Rp. 15.000</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../content/.upload/kopi-gunung-kawi.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Kopi Gunung Kawi</h5>
                                    <small class="text-muted">De Kawi</small>
                                    <p>
                                        <strong class="c-green">Rp. 45.000</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="spacer"></div>
    </main>

    <footer class="border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper">
                        <strong>Tentang Kami</strong>
                        <div class="spacer-sm"></div>
                        <p>
                        Sosiopreneur berbasis teknologi yang hadir untuk mendukung kemajuan bisnis pesantren di Indonesia. Santree terinspirasi dari potensi bisnis Pesantren yang kurang dioptimalkan karena minimnya akses. Selain itu, tingginya minat pasar terhadap produk pesantren menjadi peluang potensial untuk terus dikembangkan
                        </p>
                    </div>
                    <div class="wrapper d-block">
                        <strong>Kontak Kami</strong>
                        <div class="spacer-sm"></div>
                        <p>
                            <img src="../asset/.icon/003-pin.png" alt="Address" width="25" class="footer-icon">
                            Jalan Raya Ketawang 17/3 No.51 Gondanglegi Malang
                        </p>
                        <p>
                            <a href="tel:+6281284535690">
                                <img src="../asset/.icon/002-telephone.png" alt="Phone" width="25" class="footer-icon">
                                0812 8453 5690
                            </a>
                        </p>
                        <p>
                            <a href="mailto:santree_id@gmail.com">
                                <img src="../asset/.icon/001-email.png" alt="Mail" width="25" class="footer-icon">
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
                                    <a href=""><img src="../asset/.icon/instagram.png" alt="Instagram"></a>
                                    <a href=""><img src="../asset/.icon/facebook.png" alt="Facebook"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <strong>Jasa Pengiriman</strong>
                            <div class="spacer"></div>
                            <div class="coureer-list">
                                <img src="../asset/.image/jne.png" alt="JNE">
                                <img src="../asset/.image/pos.png" alt="POS">
                                <img src="../asset/.image/sicepat.png" alt="SICEPAT">
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
    <script src="../js/main.js"></script>
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