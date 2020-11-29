<?php
    include '../session.php';
    
    require '../connect.php';

    $book_id = "";
    $quantity = "";
    $message = "";
    $amount = "";
    $order_details_id = "";
    if( isset($_POST['view_id']) ){        
        $sql = "SELECT * FROM orders WHERE id = '$_POST[view_id]'";
        
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {
			while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $order_id=$row['order_id'];
                $dateOrdered=$row['dateOrdered'];
                $customer_id=$row['customer_id'];
                $payment_id=$row['payment_id'];
                $payment_type=$row['payment_type'];
                $total_amount=$row['total_amount'];
            }
        }
        
    }
    else{
        $message = "Error Occured. Can't view order details.";
    }
?>
<?php 

    if( isset($_POST['view_id']) ){
        $sql_alpha = "SELECT * FROM order_details WHERE order_details.order_id IN (SELECT order_id FROM orders WHERE id = '$_POST[view_id]')";
        $result2 = $conn->query($sql_alpha);
        $count2 = mysqli_num_rows($result2);
        if($count2==1)
        {
			while($row2 = $result->fetch_assoc()) {
                $order_details_id = $row2['order_details_id'];
                $book_id = $row2['book_id'];
                $quantity = $row2['quantity'];
                $amount = $row2['amount'];
            }
        }
    }
?>
<style>
    .heading {
        font-size: 22px;
        font-weight: 600;
    }
</style>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--FONTAWESOME CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

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

    <?php include '../header.php'; ?>

    <!---database table-->
    <div class="container" style="margin-top:50px;">
        <p class="heading" style="margin:0 auto;"><?php echo $message; ?></p>
        <div class="row">
            <div class="col-md-6">
                    <label for="update_id">ID</label>
                    <input type="text" class="form-control" id="update_id"name="update_id" value = "<?php echo $id; ?>" readonly="readonly"  />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="order_id">Order ID</label>
                <input readonly="readonly" type="text" class="form-control" id="order_id" value = "<?php echo $order_id; ?>"placeholder="Enter Order ID like 'ord1' "  name="order_id">
            </div>
            <div class="col-md-6">
                <label for="dateOrdered">Date Ordered</label>
                <input readonly="readonly" type="date" value = "<?php echo $dateOrdered; ?>"  class="form-control" id="dateOrdered" placeholder="Enter Order Date" name="dateOrdered">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="book_id">Customer ID</label>
                <input readonly="readonly" name="book_id" value = "<?php echo $book_id; ?>" type="text" id="book_id" placeholder="Enter Customer ID" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="quantity">Quantity</label>
                <input readonly="readonly" name="quantity" value = "<?php echo $quantity; ?>" type="number" id="quantity" placeholder="Enter Payment ID" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="payment_type">Payment Type</label>
                <select readonly="readonly" id="payment_type" class="form-control" name="payment_type">
                        <?php 
                            if($payment_type==1){
                                echo "<option value=1 selected>CASH</option>";
                            }
                            else{
                                
                                echo "<option value=0 selected>CREDIT</option>";
                            }
                        ?>        
                </select>
            </div>
            <!-- order details -->
            <div class="row">
            <div class="col-md-6">
                <label for="customer_id">Customer ID</label>
                <input readonly="readonly" name="customer_id" value = "<?php echo $customer_id; ?>" type="text" id="customer_id" placeholder="Enter Customer ID" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="payment_id">Payment ID</label>
                <input readonly="readonly" name="payment_id" value = "<?php echo $payment_id; ?>" type="number" id="payment_id" placeholder="Enter Payment ID" class="form-control">
            </div>
        </div>
            <div class="col-md-6">
                <label for="total_amount">Total Amount</label>
                <input readonly="readonly" name="total_amount"value = "<?php echo $total_amount; ?>"  class="form-control" id="total_amount" type="text" placeholder="Total Amount">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="manage.php" role="button" aria-pressed="true" style="background-color: #f9a826;" class="btn btn-primary" type="submit">Go Back to Manage</a>
            </div>
        </div>
    </div>
</body>
</html>