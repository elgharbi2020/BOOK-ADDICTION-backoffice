<?php
include "../../configdb/db_connector.php";
$base = connect_to_db();
$req = 'SELECT * FROM books;';
$reqExecuted = $base->query($req);

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
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="addCategory.php" class="btn btn-primary my-5"><i class="far fa-plus-square"></i> Add Category</a>  
        </div>
    </div>
    <div class="row">
        <div class="col">            
            <table class="table table-striped table-sm">
            <thead> 
                <tr>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php while($books = $reqExecuted->fetchObject()){ ?>
                <tr>
                    <td> <img src="../../assets/images/books/<?php echo $books->image; ?>" > </td>
                  
                    <td> 
                        <a href="" class="btn btn-danger"> <i class="far fa-trash-alt"></i>   </a>
                        <a href="" class="btn btn-warning"><i class="far fa-edit"></i></a> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>

            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>