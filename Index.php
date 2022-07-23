<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuyển sinh</title>
</head>
<body>
    <?php
        include_once './system/respository/Model.php';
        spl_autoload_register(function ($class){
            include_once './system/library/'.$class.'.php';
        });
        include_once './config/Config.php';
        // include_once './config/Routing.php';

        $main = new Main();
        
    ?>
</body>
</html>