<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    
    input[type="submit"] {
        background-color: #4c95af;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<body>
    <form method="Post" action="">
        <label > Name : </label>
        <input type="text" name="name" placeholder="Set your name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>"/>
        
        <label> Email :  </label>
        <input type="email" name="email" placeholder=" Set your mail " value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>"/>

        <input type="submit" value="submit">

        
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (empty($name)) {
        echo '<div >
                    Please Enter Your Name.
                </div>';
        }
    if (empty($email)) {
            echo '<div>
                        Please Enter Your Email.
                    </div>';
                }

    if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "
                <div>
                    Thank you <strong>$name</strong> for submitting the form! We will contact you at <strong>$email</strong>.
                </div>
                ";
                }
}

?>
