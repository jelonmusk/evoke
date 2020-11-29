<?php
    require '../connect.php';
    
    if( isset($_POST['deleteo_id']) )
    {
        $sql = "DELETE FROM orders WHERE id = '$_POST[deleteo_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Order Deleted Successfully. Redirecting to Manage page in 2 seconds. ";
            header( "refresh:5; url=manage.php" );
        } 
        else 
        {    
            echo "Could not delete Order. Redirecting to Manage page in 2 seconds. ";
            header( "refresh:2; url=manage.php" );
        }
    }
    else
    {
        echo "DELETE Order ID NOT SET. Redirecting to Manage page in 2 seconds. ";
        header( "refresh:2; url=manage.php" );
    }
?>