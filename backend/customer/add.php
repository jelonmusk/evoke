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
    if( isset($_POST['customer_id']) ){    
        
        $sql = "INSERT INTO customer ( customer_id, customer_name, address, city, state, country, email) VALUES ('$_POST[customer_id]', '$_POST[customer_name]', 
                '$_POST[address]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[email]')";
            if ($conn->query($sql) === TRUE) {
                sleep(1);
                $msg="Customer added successully.Redirecting to manage page";
                header( "refresh:2; url=manage.php" );
            } 
            else {
                $msg="Couldn't add  Customer";
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
        <p class="heading">Add Customer</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="customer_id">Customer ID</label>
                    <input type="text" class="form-control" id="customer_id" placeholder="Enter Customer ID like 'c11' " name="customer_id">
                </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" class="form-control" id="customer_name" placeholder="Enter Customer Name" name="customer_name">
                </div>
                <div class="col-md-6">
                    <label for="address">Address</label>
                    <input name="address" type="text" id="address" placeholder="Enter Customer Address" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="city">City</label>
                    <input name="city" type="text" id="city" placeholder="Enter City" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="state">State</label>
                    <input name="state" class="form-control"  id="state" type="text" placeholder="State">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <input name="country" class="form-control"  id="country" type="text" placeholder="Country" >
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email"id="email" name="email" class="form-control" placeholder="Enter Customer Email">
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