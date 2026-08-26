<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?= htmlspecialchars($pageTitle) ?> </title>
        <link rel="stylesheet" href="./src/css/nicepage.css" media="screen">
        <link rel="stylesheet" href="./src/css/index.css" media="screen">
        <script class="u-script" type="text/javascript" src="./src/js/jquery-3.5.1.min.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="./src/js/nicepage-8.6.2.min.js" defer=""></script>
    </head>
    <body class="u-body u-xl-mode" data-lang="hu">
        <?php require "./views/partials/header.php"; ?>
            <main> 
                <?= $content ?> 
            </main> 
        <?php require "./views/partials/footer.php"; ?>
    </body>
</html>
