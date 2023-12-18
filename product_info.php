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
    // $username = filter_input(INPUT_POST, "orderNo");
   


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // $product_serial_num = filter_input(INPUT_POST, "serial", FILTER_SANITIZE_SPECIAL_CHARS);
        $product_purchase_date = filter_input(INPUT_POST, "purchaseDate", FILTER_SANITIZE_SPECIAL_CHARS);
        
        
    }

    $sql = "INSERT INTO users (user)
                VALUES( '$product_purchase_date')";
    // mysqli_query($conn, $sql);
    
    try{
        mysqli_query($conn, $sql);
        echo "Registered";
    }catch(mysqli_sql_exception $e){
        echo "All info will be passed";
    }
    mysqli_close($conn);
?>
