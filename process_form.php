
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
