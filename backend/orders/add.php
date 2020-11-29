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
    if( isset($_POST['order_id']) ){    
        
        $sql = "INSERT INTO orders ( order_id, dateOrdered, customer_id, payment_id, payment_type, total_amount) VALUES ('$_POST[order_id]', '$_POST[dateOrdered]', 
                '$_POST[customer_id]','$_POST[payment_id]','$_POST[payment_type]','$_POST[total_amount]')";
            if ($conn->query($sql) === TRUE) {
                sleep(1);
                $msg="Order added successully.Redirecting to manage page";
                header( "refresh:2; url=manage.php" );
            } 
            else {
                $msg="Couldn't add  Order";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Evoke</title>
</head>

<body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <?php include '../header.php' ?>
    <div class="container" style="margin-top:50px;">
        <p class="heading" style="margin:0 auto;"><?php echo $msg; ?></p>
        <p class="heading">Add Order</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="order_id">Order ID</label>
                    <input type="text" class="form-control" id="order_id" placeholder="Enter Order ID like 'ord1' "  name="order_id">
                </div>
                <div class="col-md-6">
                    <label for="dateOrdered">Date Ordered</label>
                    <input type="date" class="form-control" id="dateOrdered" placeholder="Enter Order Date" name="dateOrdered">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="customer_id">Customer ID</label>
                    <input name="customer_id" type="text" id="customer_id" placeholder="Enter Customer ID" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="payment_id">Payment ID</label>
                    <input name="payment_id" type="number" id="payment_id" placeholder="Enter Payment ID" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="payment_type">Payment Type</label>
                    <select id="payment_type" class="form-control" name="payment_type">
                            <option value="1" selected>CASH</option>
                            <option value="0">CREDIT</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="total_amount">Total Amount</label>
                    <input name="total_amount" class="form-control" id="total_amount" type="text" placeholder="Total Amount">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button style="background-color: #f9a826;" class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
</div>
</body>

</html>