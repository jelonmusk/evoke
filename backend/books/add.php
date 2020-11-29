<?php
    include '../session.php';
?>
<style>
    .heading {
        font-size: 22px;
    }

    .row {
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
<?php
    $msg= "";
    if( isset($_POST['book_id']) ){    
        
        $sql = "INSERT INTO books ( book_id, book_name, author, price) VALUES ('$_POST[book_id]', '$_POST[book_name]', '$_POST[author]','$_POST[price]')";
            if ($conn->query($sql) === TRUE) {
                sleep(1);
                $msg="Book added successully.Redirecting to manage page";
                header( "refresh:2; url=manage.php" );
            } 
            else {
                $msg="Couldn't add  Book";
                echo("Error description: " . mysqli_error($conn));
            }        
    } 
?>



<!doctype html>
<html lang="en">
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Evoke</title>
  </head>
  <body>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
    <?php include '../header.php' ?>
    <div class="container" style="margin-top:50px;">
        <p class="heading" style="margin:0 auto;"><?php echo $msg; ?></p>
        <p class="heading">Add Book</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="book_id">Book ID</label>
                    <input type="text" class="form-control" id="book_id" placeholder="Enter Book ID like 'b11' " name="book_id">
                </div>
                <div class="col-md-6">
                    <label for="book_name">Book Name</label>
                    <input type="text" class="form-control" id="book_name" placeholder="Enter Book Name" name="book_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="author">Author</label>
                    <input name="author" type="text" id="author" placeholder="Enter Book Author" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="price">Price</label>
                    <input name="price" type="number" id="price" placeholder="Enter Price" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button style="background-color: #f9a826;" class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>

  </body>
</html>