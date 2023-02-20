<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="<?php echo _WEB_ROOT . "/public/lib/bootsrap/bootstrap.min.css" ?>" rel="stylesheet" > 
    <link rel="stylesheet" href="<?php echo _WEB_ROOT . "/public/style.css" ?>">
    <script src="<?php echo _WEB_ROOT . "/public/lib/jquery-3.6.3.slim.min.js" ?>"></script>

</head>

<body class="gradient">
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="all">
        
        <?php require_once _DIR_ROOT . "/app/Views/" . $data['subview'] . '.php' ?>
    </div>



    <script src="<?php echo _WEB_ROOT . "/public/lib/bootsrap/bootstrap.bundle.min.js" ?>"></script>
    <script src="<?php echo _WEB_ROOT . '/public/script.js' ?>"></script>
    <script>
        $(window).on("load", function() {
            $("body").addClass("loaded");
        });
    </script>
</body>

</html>