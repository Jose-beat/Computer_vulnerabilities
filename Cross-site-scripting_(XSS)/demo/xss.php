<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Site Script (XSS) Demo No Sanitizada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="container">
    <div class="row">
        <form class="mt-3"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="col-6">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="col-6">
                <label for="email">E-mail:</label>
                <input class="form-control"  type="text" name="email">
            </div>
            
            <button class=" mt-3 btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>

    <div class="mt-3">
        <?php
        $name = "";
        $email = "";

        //* Inject in the URL : /%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E To execute an XSS vulnerability in xss.php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $email = $_POST["email"];
        }
        echo "<h2>Informacion por enviar</h2>";
        echo "<p><strong>Nombre</strong></p>";
        echo $name;
        echo "<br>";
        echo "<p><strong>Email</strong></p>";
        echo $email;

        ?>
    </div>
    
</body>


</html>