<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Product Information</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    <form action='product_info.php' method='post' enctype='multipart/form-data'>
        <label for='serial'>Serial Number:</label>
        <input type='text' name='serial' id='serial' required>

        <label for='purchaseDate'>Purchase Date:</label>
        <input type='date' name='purchaseDate' id='purchaseDate' required>

        <label for='invoice'>Scan of Invoice (PDF):</label>
        <input type='file' name='invoice' id='invoice' accept='.pdf' required>

        <label for='registrationForm'>Scan of Lifetime Warranty Registration Form (PDF):</label>
        <input type='file' name='registrationForm' id='registrationForm' accept='.pdf' required>

        <input type='submit' name='submit' value='Submit'>
    </form>
</body>
</html>

<?php


    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'businessdb';
    $conn = '';

    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
        echo 'Could not connect!';
    }
    // $username = filter_input(INPUT_POST, "orderNo"s);
   
    session_start();
    
    $user = $_SESSION['name'];
    $orderNo = $_SESSION['orderNo'];
    $modelName = $_SESSION['modelName'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['mobile'];
    $address = $_SESSION['address'];
    $city = $_SESSION['city'];
    $state = $_SESSION['state'];
    $pincode = $_SESSION['pincode'];


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $product_purchse_date = filter_input(INPUT_POST, "purchaseDate", FILTER_SANITIZE_SPECIAL_CHARS);
        $product_serial_num = filter_input(INPUT_POST, "serial", FILTER_SANITIZE_SPECIAL_CHARS);
        // $product_order_num = $_POST['order'];
        // $product_model_name = $_POST['modelName'];
        
        
        // $sql = "INSERT INTO `userData` (`installation_service_order_no`,`model_name`,`serial_num`,`purchase_date`)
        //             VALUES('$product_order_num', '$product_model_name', '$product_serial_num', '$product_purchse_date')";
        $sql = "INSERT INTO `userData` (user, installation_service_order_no, model_name, email, mobile_number, address, city, state, pincode, serial_num, purchase_date)
                    VALUES('$user','$orderNo', '$modelName', '$email', '$phone', '$address', '$city', '$state', '$pincode','$product_serial_num', '$product_purchse_date')";
        // mysqli_query($conn, $sql);
        // $to = 'rkeccentric001@gmail.com';
        // $subject = 'New Form Submission';
        // $message = "Name: $product_purchse_date\nEmail: $product_serial_num\n"; // Add more fields as needed
        // $headers = 'From: kumar25rohit08@gmail.com'; // Set your email address

        // mail($to, $subject, $message, $headers);
        try {
            mysqli_query($conn, $sql);
            header('Location: final.html');
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    mysqli_close($conn);
?>
