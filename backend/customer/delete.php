<?php
    require '../connect.php';
    
    if( isset($_POST['deletec_id']) )
    {
        $sql = "DELETE FROM customer WHERE id = '$_POST[deletec_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "customer Deleted Successfully. Redirecting to Manage page in 2manage seconds. ";
            header( "refresh:5; url=manage.php" );
        } 
        else 
        {    
            echo "Could not delete customer. Redirecting to Manage page in 2manage seconds. ";
            header( "refresh:2; url=manage.php" );
        }
    }
    else
    {
        echo "DELETE customer ID NOT SET. Redirecting to Manage page in 2manage seconds. ";
        header( "refresh:2; url=manage.php" );
    }
?>