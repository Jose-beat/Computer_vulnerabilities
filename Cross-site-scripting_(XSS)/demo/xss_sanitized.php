<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Site Script (XSS) Demo No Sanitizada</title>
</head>
<body>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        Name: <input type="text" name="name">
        E-mail: <input type="text" name="email">
    <button type="submit">Enviar</button>
    </form>

    <?php
    $name = "";
    $email = "";

    //* Inject in the URL : /%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E To execute an XSS vulnerability in xss.php
    //! Its important check all input from users and add all the methods to prevent XSS attacks.
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST["name"]);
        $email = test_input( $_POST["email"]);
    }

    function test_input($user_data){
        $user_data = trim($user_data);
        $user_data = stripcslashes($user_data);
        $user_data = htmlspecialchars($user_data);
        return $user_data;
    }

    echo "<h2>Informacion por enviar</h2>";
    echo "<p><strong>Nombre</strong></p>";
    echo $name;
    echo "<br>";
    echo "<p><strong>Email</strong></p>";
    echo $email;

    ?>
</body>


</html>