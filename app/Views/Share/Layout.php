<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>

    <link href="<?php echo _WEB_ROOT . "/public/lib/bootstrap/bootstrap.min.css" ?>" rel="stylesheet">
    <script src="<?php echo _WEB_ROOT . "/public/lib/jquery-3.6.3.js" ?>"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT . "/public/style.css" ?>">
    
</head>

<body class="gradient">

    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    
    <div style="width:100%; height: 100%;">
        
        <?php require_once _DIR_ROOT . "/app/Views/" . $data['subview'] . '.php' ?>
    </div>
    
    <script src="<?php echo _WEB_ROOT . "/public/lib/bootstrap/bootstrap.bundle.min.js" ?>"></script>
    <script src="<?php echo _WEB_ROOT . '/public/script.js' ?>"></script>
        
    <script>
        $(window).on("load", function() {
            $("body").addClass("loaded");
        });
    </script>
</body>

</html>