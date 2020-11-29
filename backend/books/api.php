<?php
    require '../session.php';
    require '../connect.php';
    
    $book_id = "";
    $book_name = "";
    $address = "";
    $price = "";


    ////////
   /////// API TO READ CUSTOMERS
    //////
    if( isset($_POST['editb_id']) ){        
        $sql = "SELECT * FROM books WHERE id = '$_POST[editb_id]'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        { 
                $customer_arr["records"] = array();
                while($row = $result->fetch_assoc()) {
                    //extract($row) will make $row['book_id'] to $book_id
                    extract($row);
                    $customer = array(
                        "id" => $id,
                        "book_name" => $book_name,
                        "book_id" => $book_id,
                        "address" => $address,
                        "price" => $price
                    );

                    array_push($customer_arr["records"],$customer);
                    http_response_code(200);
                    //converts into json format
                    echo json_encode($customer_arr);
                }
                echo json_encode($customer_arr);
            
        }
    }
?>