<?php
include "../../configdb/db_connector.php";
$base = connect_to_db();

$requette1 = "SELECT * From categories ;";
$data1 = $base->query($requette1);


$requette2 = "SELECT * From authors ;";
$data2 = $base->query($requette2);





?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>



<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark  bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Book Adiction</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>
    
    <div class="container-fluid">

        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class=" nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active" href="#">
                                <i class="fas fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <i class="fas fa-list"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <i class="fas fa-user-friends"></i>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <i class="fas fa-file"></i>
                                Order
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Add Prodect</h2>
                <hr>
                <div class="col-9">
                    <form action="../../controllers/BookController.php?event=add" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            
                            <div class="col-sm">
                                <p> Name<br>
                                    <input type="text" class="form-control" size="30" name="name" required /></p>
                            </div>
                            <div class="col-sm">
                                <p> Author <br>

                                    <select name="author" class="form-control w-100 p-1">
                                        <?php while ($category = $data2->fetchObject()) { ?>
                                            <tr>
                                                <option value=<?php echo $category->id; ?>>
                                                    <?php echo $category->name; ?>
                                            </tr>
                                        <?php } ?>
                                    </select>
                                </p>
                            </div>
                            <div class=" col-12">
                                <p> Description
                                    <textarea id="w3mission" class="form-control" name="descreption" rows="4" cols="150">
                                     </textarea>
                            </div>
                            <div class=" col-12">
                                <p> Resume
                                    <textarea id="w3mission" class="form-control" name="resume" rows="2" cols="120">
                                     </textarea>
                            </div>

                            <div class="col-6 ">
                                <p> Price<br>
                                    <input type="text" class="form-control" name="price" required /></p>
                            </div>
                            <div class="col-6">
                                <p> Discount<br>
                                    <input type="text" class="form-control" name="discount" required /></p>
                            </div>
                        </div>

                        <div>
                            <p>
                                Category <br>
                                <select name="cat" class="form-control w-100 p-1">



                                    <?php while ($category = $data1->fetchObject()) { ?>
                                        <tr>
                                            <option value=<?php echo $category->id; ?>>

                                                <?php echo $category->name; ?>

                                        </tr>
                                    <?php } ?>



                                </select>
                            </p>
                        </div>

                        <div class="row">
                                        
                            <div class="col-6 ">
                                <p> Release Date<br>
                                    <input type="date" class="form-control" name="release" required /></p>
                            </div>
                            <div class="col-6">
                                <p> Cover<br>
                                    <input type="file" class="form-control" name="img" required /></p>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary ml-auto m-3 ">Add Product</button>


                        </p>


                </div>
                </form>
        </div>
        </main>
    </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>