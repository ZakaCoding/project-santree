<?php 
    include_once "../app/config/config.php";

    // get id
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $productQuery = "SELECT * FROM `product` WHERE `p_id` = '$id'";

        // result
        $result = $mysqli->query($productQuery);
        if($result->num_rows == 1)
        {
            $productData = $result->fetch_assoc();
        }

    }

    function toRupiah($number)
    {
        $price = "Rp.". number_format($number,0,',','.');
        return $price;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shorcut icon" type="" href="../asset/.image/logo-favicon.png">

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
                                        <a href="cart.php" class="c-green" style="text-decoration:none"><small>Lihat Keranjang</small></a>
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
                <!-- hidden item  -->
                <input type="text" id="product-id" value="<?= $productData['p_id'] ?>" hidden="hidden">
                <div class="col-md-6">
                    <img id="item-image" src="../content/.upload/<?= $productData['image_path'] ?>" alt="" class="item-image">
                </div>
                <div class="col-md-6">
                    <div class="flex-2-col">
                        <h3 class="product-title" id="product-name"><?= $productData['product_name'] ?></h3>
                        <small class="text-muted">Kode Produk 1uh27b</small>
                    </div>
                    <div class="spacer"></div>
                    <p class="decription-item">
                        <?= $productData['product_desc'] ?>
                        <br>
                        <small class="text-muted">Ukuran : <?= $productData['size'] ?></small>
                    </p>
                    <h4 class="c-green"><strong id="product-price"><?= toRupiah($productData['price']) ?></strong></h4>
                    <div class="spacer"></div>
                    <p><strong>Jumlah</strong></p>
                    <div class="spacer"></div>
                    <div class="flex-2-col">
                        <div class="input-item">
                            <button class="icon-item" id="minus">&#45;</button>
                            <input type="text" name="quantity" id="qty" value=1>
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
                            <img src="../content/.upload/kopi-gunung-kawi.jpg" class="card-img-top" alt="...">
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
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center w-sm float" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                Produk berhasil ditambahkan <a href="cart.php"><button class="btn btn-sm btn-success">Lihat Keranjang</button></a>
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
    <script src="../js/store.js"></script>
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