<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Customer Information</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    <form action='customer_info.php' method='post'>
        <label for='name'>Name:</label>
        <input type='text' name='name' id='name' required>

        <label for='email'>Email Address:</label>
        <input type='email' name='email' id='email' required>

        <label for='mobile'>Mobile Number:</label>
        <input type='tel' name='mobile' id='mobile' required>

        <label for='address'>Address:</label>
        <textarea name='address' id='address' rows='4' required></textarea>

        <label for='city'>City:</label>
        <input type='text' name='city' id='city' required>

        <label for='state'>State:</label>
        <input type='text' name='state' id='state' required>

        <label for='pincode'>Pincode:</label>
        <input type='text' name='pincode' id='pincode' required>

        <input type='submit' value='Next' name='submit'>
    </form>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header('Location: product_info.php');
    }
?>
