<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/public/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        main {
            height: 100vh;
            max-height: 100vh;
        }
    </style>
</head>
<body>
<?=$content."\n"?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/public/js/materialize.min.js"></script>
</body>
</html>
