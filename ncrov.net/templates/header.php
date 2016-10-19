<!DOCTYPE html>

<html>

    <head>
        <link href="/public/css/bootstrap.css" rel="stylesheet"/>
        <link href="/public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/public/css/styles.css" rel="stylesheet"/>
        <link href="/public/css/bootstrap.theme.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Rover1: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Rover1</title>
        <?php endif ?>

        <script src="/public/js/jquery-1.10.2.min.js"></script>
        <script src="/public/js/bootstrap.min.js"></script>
        <script src="/public/js/scripts.js"></script>
        <script src="/public/js/bootstrap.js"></script>

    </head>
     <body>

        <div class="container">

            <div id="top">
                <a><img alt="Rover1" src="/public/img/Rover-1.gif"/></a>
            </div>