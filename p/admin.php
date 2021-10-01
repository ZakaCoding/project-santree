<!-- disable user access this page if without login -->
<?php 
    // include required data
    include_once "../app/config/config.php";

    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    // start session
    session_start();

    // check session login
    if(!isset($_SESSION['login'])) {
        // destroy session
        session_destroy();
        // force back to login page
        header("location: http://localhost/santree/p/login.php");
        exit(); // stop code
        // die("login session not set");
    } else {
        // compared session data on server
        $username = $_SESSION['login']['username'];
        $token = $_SESSION['login']['token'];
        
        // get data from database
        $query = "SELECT `username`, `session_token` FROM `users` WHERE `username` = '$username' AND `session_token` = '$token'";

        // check query error
        if($mysqli->query($query)) {
            // check data rows
            $result = $mysqli->query($query);
            if($result->num_rows == 1) {
                // print data from database
                $data = $result->fetch_assoc();
            } else {
                // destroy session
                session_destroy();
                // force back to login page
                header("location: http://localhost/santree/p/login.php");
                exit(); // stop code
            }
        } else {
            // this message only for programmer
            // die("query error ".$mysqli->error);

            // for user
            // destroy session
            session_destroy();
            // force back to login page
            header("location: http://localhost/santree/p/login.php");
            exit(); // stop code
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap v4.5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="../css/p.css">

    <title>Product Santree</title>
</head>
<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Login Panel</a>
    
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?= $username; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Setting Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Hello Admin</h1>
                <p class="lead">Halaman ini digunakan untuk manajemen data</p>
            </div>
        </div>

        <div class="container">
            <!-- show message from any session-->
            <?php 
                if(isset($_SESSION['success'])) {
                    // session success code
                    if($_SESSION['success']["PORTOFOLIO_SUCCESS"]) {
            ?> 
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> Data Product berhasil di upload. silahkan cek di tab Product
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif ($_SESSION['success']['DELETE_SUCCESS_CODE']) {
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> <?= $_SESSION['success']['DELETE_SUCCESS_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif($_SESSION['success']['ADD_SUCCESS_CODE']) {
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> <?= $_SESSION['success']['ADD_SUCCESS_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif($_SESSION['success']['DELETE_USER_CODE']) {
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> <?= $_SESSION['success']['DELETE_USER_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    }
                }

                // show if failed message true
                if(isset($_SESSION['failed'])) {
                    if($_SESSION['failed']['UPLOAD_FAIL_CODE']) {
            ?> 
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed</strong> Data Product gagal di upload. ERROR CODE[<?= $_SESSION['failed']['UPLOAD_FAIL_CODE']; ?>] <?= $_SESSION['failed']['UPLOAD_FAIL_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif($_SESSION['failed']['DELETE_FAIL_CODE']) {
            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed</strong> <?= $_SESSION['failed']['DELETE_FAIL_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif($_SESSION['failed']['ADD_FAIL_CODE']) {
            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed</strong> <?= $_SESSION['failed']['ADD_FAIL_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    } elseif($_SESSION['failed']['DELETE_USER_FAIL_CODE']) {
            ?> 
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed</strong> <?= $_SESSION['failed']['DELETE_FAIL_MESSAGE']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    }
                }
            ?>
            
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Users</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Product</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="jumbotron">
                            <h4 class="display-4">Dashboard</h4>
                            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                            <hr class="my-4">
                            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <button class="btn btn-success" data-toggle="modal" data-target="#user">Add new user</button>
                        <div class="spacer"></div>
                        <table class="table">
                            <caption>List of users</caption>
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                // show data from table user
                                $users_query = "SELECT `user_id`,`username`,`password`,`role` FROM `users` LIMIT 10";
                                // check query
                                if($mysqli->query($users_query)) {
                                    // check data not empty
                                    $user_result = $mysqli->query($users_query);
                                    if($user_result->num_rows >= 1) {
                                        // fetch data to array
                                        $users_no = 1;
                                        while ($user_data = $user_result->fetch_assoc()) :
                            ?> 
                                            <tr>
                                            <th scope="row"><?= $users_no; ?></th>
                                            <td><?= $user_data['username'] ?></td>
                                            <td>*******************</td>
                                            <td><?= $user_data['role'] ?></td>
                                            <td>
                                                <a href="<?= $basepath.'function/f_deleteuser.php?userid='.$user_data['user_id']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                            
                            <?php
                                            $users_no++;
                                        endwhile;
                                    } else {
                                        echo ("Data Not Found");
                                    }
                                } else {
                                    $message = $mysqli->error;
                                }
                            ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="user" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add new user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../function/f_adduser.php" method="post">
                                        <div class="form-group">
                                            <label for="userName">Username</label>
                                            <input type="text" class="form-control" id="userName" aria-describedby="userHelp" name="username" required>
                                            <small id="userHelp" class="form-text text-muted">Masukan username tanpa spasi untuk Users login</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="userPassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="userPassword" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="add">Add user</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!-- PORTOFOLIO -->
                        <button class="btn btn-success" data-toggle="modal" data-target="#portofolio">Add product</button>
                        <div class="spacer"></div>
                        <table class="table">
                            <caption>List of Product</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Product Size (in gram/Kg)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $product_query = "SELECT * FROM `product` LIMIT 10";
                                    // check query
                                    if($mysqli->query($product_query)) {
                                        // check data not empty
                                        $porto_result = $mysqli->query($product_query);
                                        if($porto_result->num_rows >= 1) {
                                            // fetch data to array
                                            $number = 1;
                                            while ($data_product = $porto_result->fetch_assoc()) :
                                ?>
                                                <tr>
                                                    <th scope="row"><?= $number; ?></th>
                                                    <td><?= $data_product['product_name'] ?></td>
                                                    <td><?= $data_product['product_desc'] ?></td>
                                                    <td><?= $data_product['price'] ?></td>
                                                    <td><?= $data_product['stock'] ?></td>
                                                    <td><?= $data_product['size'] ?></td>
                                                    <td>
                                                        <?php 
                                                            // format data to array with link foto
                                                            $picture = $data_product['image_path'];
                                ?>
                                                        <a target="_blank" href="<?= $basepath.'content/.upload/'.$picture; ?>"><?= $picture; ?></a>
                                                    </td>
                                                    <td><a href="<?= $basepath."function/f_delete.php?id=".$data_product['p_id'] ?>" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                <?php
                                                $number++;
                                            endwhile;
                                        } else {
                                            echo "Data kosong";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- show modal when user add new portofolio -->
                        <!-- Vertically centered modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="portofolio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add new product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../app/function/upload-product.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="portofolioTitle">Porduct Name</label>
                                            <input type="text" class="form-control" id="portofolioTitle" aria-describedby="portofolioHelp" name="product-name" required>
                                            <small id="portofolioHelp" class="form-text text-muted">Masukan nama produk</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="portofolioDesc">Product Description</label>
                                            <textarea name="product-desc" class="form-control" id="portofolioDesc" cols="15" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="productPrice">Product price</label>
                                            <input type="number" class="form-control-file" id="productPrice" aria-describedby="priceHelp" name="price" required="required">
                                            <small id="priceHelp" class="form-text text-muted">Product price in Rupiah. Example 20000 mean Rp.20.000</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="productSize">Product Size</label>
                                            <input type="text" class="form-control-file" id="productSize" aria-describedby="sizeHelp" name="size" required="required">
                                            <small id="sizeHelp" class="form-text text-muted">Product size in gram/Kg. Example 40gram/1Kg</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="portofolioImage">Image</label>
                                            <input type="file" class="form-control-file" id="portofolioTitle" aria-describedby="imageHelp" name="image" required="required">
                                            <small id="imageHelp" class="form-text text-muted">Add image for product</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button> -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- javascript end off body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<!-- unset session  -->
<?php
    if(isset($_SESSION['success']) || isset($_SESSION['failed'])) {
        unset($_SESSION['success']);
        unset($_SESSION['failed']);
    }
?>