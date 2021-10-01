<?php
    include_once "../app/config/config.php";
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
<body class="bg-light">
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
                    <form action="" method="get" class="search-box">
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
            <div class="d-flex align-items-center p-3 my-3 text-white bg-web-default rounded shadow-sm">
            <img src="<?= $basepath ?>asset/.icon/001-shopping-bag-white.png" alt="cart" width=38 style="margin-right:5px">
                <div class="lh-1">
                    <h1 class="h5 mb-0 text-white lh-1">Checkout</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <p class="mb-3">
                        <h4>Alamat Pengiriman</h4>
                        <small class="text-muted">Isi alamat pengiriman dengan benar agar mempermudah proses pemesanan.</small>
                    </p>
                    <form class="needs-validation" name="shipping-form" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nama depan</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                [valid] Nama depan dibutuhkan.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Nama belakang</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Opsional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="masukan alamat email">
                            <div class="invalid-feedback">
                                Tolong masukan email yang benar untuk update pengiriman.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Jalan</label>
                            <input type="text" class="form-control" id="address" placeholder="Alamat jalan" required>
                            <div class="invalid-feedback">
                                Tolong masukan alamat anda dengan benar.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="form-select" id="province" required>
                                <option value="">Pilih Provinsi...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Provinsi dengan benar
                            </div>
                        </div>

                        <div class="col-md-4">
                        <label for="state" class="form-label">Kabupaten</label>
                        <select class="form-select" id="state" required>
                            <option value="">Pilih Kabupaten...</option>
                            <option>Kab. Malang</option>
                        </select>
                        <div class="invalid-feedback">
                            Pilih Kabupaten dengan benar
                        </div>
                        </div>

                        <div class="col-md-3">
                        <label for="zip" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Kode pos dibutuhkan
                        </div>
                        </div>
                    </div>
                    
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <h4 class="mb-3">Metode Pembayaran</h4>
                    <div class="my-3">
                        <h5>Transfer Bank</h5>
                        <small class="text-muted">Silahkan melakukan transfer ke Bank berikut</small>
                    </div>

                    <div class="row gy-3 bank-list">
                        <div class="col-sm-4 d-block text-center">
                            <img src="../asset/.image/logo-bank-mandiri.png" alt="Mandiri">
                            <div class="info">
                                <strong class="text-center">Mandiri</strong>
                                <p>A.n Santree Berdaya <br> 000-000-000-0</p>
                            </div>
                        </div>
                        <div class="col-sm-4 d-block text-center">
                            <img src="../asset/.image/logo-bank-bca.png" alt="BCA">
                            <div class="info">
                                <strong class="text-center">BCA</strong>
                                <p>A.n Santree Berdaya <br> 000-000-000-0</p>
                            </div>
                        </div>
                        <div class="col-sm-4 d-block text-center">
                            <img src="../asset/.image/logo-bank-bni.png" alt="BNI">
                            <div class="info">
                                <strong class="text-center">BNI</strong>
                                <p>A.n Santree Berdaya <br> 000-000-000-0</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" id="checkout-btn">Lanjut proses checkout</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Ringkasan Belanja</h6>
                        <div class="list-items-checkout"></div>
                        <div class="d-flex text-muted pt-3">
                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                    <strong class="text-gray-dark">Total Harga (<span class="total-item"></span>) item</strong>
                                    <strong class="total-price c-green"></strong>
                                </div>
                                <span class="d-block"></span>
                            </div>
                        </div>
                        <small class="text-muted">Pastikan belanjaan anda sudah sesuai</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="spacer"></div>

        <!-- execute after all form is filled -->
        <div class="loading" hidden>
            <div class="loading-content text-center">
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p>Terimakasih sudah berbelanja di santree. Selanjutnya proses pemesanan akan di alihkan ke whatsapp Admin Santree...</p>
            </div>
        </div>
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

        // javascript validation
        (function () {
                'use strict'
        
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')
        
                // Loop over them and prevent submission
                var i = 0;
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            generateMessage();
                        }
                        
                        form.classList.add('was-validated')
                    }, false)
                    })
            })();
    </script>
</body>
</html>