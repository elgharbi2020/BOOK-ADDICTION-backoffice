<?php
include "../configdb/db_connector.php";
$base = connect_to_db();




if (isset($_GET['event']) || !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    switch ($event) {
        case 'add':
           $name=$_POST["name"];
           $author=$_POST["author"];
           $descreption=$_POST["descreption"];
           $resume=$_POST["resume"];
           $price=$_POST["price"];
           $discount=$_POST["discount"];
           $release=$_POST["release"];
           $idcategorie=$_POST["cat"];
            /*
          echo "<pre>";
            print_r($_FILES['img']);
          echo "</pre>";
            */
          $image=$_FILES['img']['name'];
            $ext=substr($image,strpos($image,"."));
            $imageName=generateRandomString().$ext;
            move_uploaded_file($_FILES['img']['tmp_name'],"../assets/images/books/".$imageName);     
        
            $req="insert into books values (null,'$name','$descreption','$resume','$price','$discount','$release',$author,$idcategorie,'$imageName')";
            
            $rowInserted = $base->exec($req);
            if ($rowInserted == 1){
                header('location:../views/books/allBooks.php');
            }
    else {
        echo "SQL Error";
    }
        break;
        
        default:
            echo "<h1 style='color:red'>Invalid Action !</h1>";
        break;
        }
}else {
    echo "<h1 style='color:red'>You Are not allowed !</h1>";
}
 
function generateRandomString(){
    $hourouf="012356789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    $charLength=strlen($hourouf);
    $randomString="";
    for($i=0;$i<10;$i++){
        $randomString=$randomString.$hourouf[rand(0,$charLength-1)];
    }
    return $randomString;
}


?>