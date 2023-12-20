
<?php

    // include('index.html');
    include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and process the form data

    $orderNo = $_POST['orderNo'];
    $modelName = $_POST['modelName'];
    // Retrieve other form fields as needed

    // Validate Installation Service Order No
    if (!preg_match('/^[A-Za-z]{3}\d{10}$/', $orderNo)) {
        echo 'Invalid Installation Service Order No. Please email xyz@gmail.com for warranty registration.';
        // exit();
    }

    // Process the form data, save to the database, send email, etc.
    // if($_SERVER["REQUEST_METHOD"] == "POST"){

    //     $product_order_num = filter_input(INPUT_POST, "orderNo", FILTER_SANITIZE_SPECIAL_CHARS);
    //     $product_model_name = filter_input(INPUT_POST, "modelName", FILTER_SANITIZE_SPECIAL_CHARS);
        
        
    //     $sql = "INSERT INTO `userData` (`installation_service_order_no`,`model_name`)
    //                 VALUES( '$product_order_num', '$product_model_name')";
    //     // mysqli_query($conn, $sql);
        
    //     try {
    //         mysqli_query($conn, $sql);
    //         echo "Data inserted successfully!";
    //     } catch (mysqli_sql_exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
    session_start();
    $_SESSION['orderNo'] = $orderNo;
    $_SESSION['modelName'] = $modelName;
    header('Location: customer_info.php');
    // header('Location: product_info.html');

    // Display success message
    // echo 'Thank you for sharing the documents with us. Our team will verify the details and get back to you within 7 working days.';
} else {
    // Redirect to the form page if accessed directly
    header('Location: index.html');
    exit();
}
?>
