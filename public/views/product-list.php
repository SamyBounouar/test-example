<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ITC test</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
        <?php foreach ($viewDatas as $product): ?>
            <div class="col s6">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://via.placeholder.com/500x250">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $product['name'] ?><i class="material-icons right">more_vert</i></span>
                        <p><a href="#">See more details</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Product informations:<i class="material-icons right">close</i></span>
                        <p>ID : <?= $product['id'] ?></p>
                        <p>Description : <?= $product['description'] ?></p>
                        <p>Type : <?= $product['type'] ?></p>
                        <p>Suppliers :<br/>
                            <?php
                            foreach ($product['suppliers'] as $supplier):
                                echo '- ' . $supplier . '<br />';
                            endforeach;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>
