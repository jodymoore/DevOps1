<!DOCTYPE html>

<html>

    <head>
        <link href="public/css/bootstrap.css" rel="stylesheet"/>
        <link href="public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="public/css/styles.css" rel="stylesheet"/>
        <link href="public/css/bootstrap.theme.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Rover1: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Rover1</title>
        <?php endif ?>

        <script src="ncrov/public/js/jquery-1.10.2.min.js"></script>
        <script src="ncrov/public/js/bootstrap.min.js"></script>
        <script src="ncrov/public/js/scripts.js"></script>
        <script src="ncrov/public/js/bootstrap.js"></script>

        
        <!-- http://1000hz.github.io/bootstrap-validator/ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    </head>
     <body>

        <div class="container">

            <div id="top">
                <a><img alt="Rover1" src="ncrov/public/img/Rover-1.gif"/></a>
            </div>