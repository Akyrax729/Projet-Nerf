<?php 
    include ("general/function.php");

    $request = $bdd->prepare('  SELECT gamme.gamme_id, gamme.gamme_name
                                FROM gamme                         
                            ');

    $request-> execute(array());

    $datagamme = $request-> fetchAll();

    $requestproduit = $bdd->prepare(' SELECT produit.produit_id,produit.produit_name,produit.produit_img,produit.gamme_id,produit.produit_desc
                                    FROM produit
                                    LEFT JOIN gamme
                                    ON gamme.gamme_id = produit.gamme_id
                                ');

    $requestproduit-> execute(array());

    $dataproduit = $requestproduit -> fetchAll();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo-nerf.png" type="image/x-icon">
    <title>Nerf</title>
</head>
<body>
    <header>
        <div>
            <img class="logo" src="assets/img/logo-nerf.png" alt="Logo Nerf">
            <h1>Nerf</h1>
            <span></span>
        </div>
        <nav>
            <ul>

            <!-- GAMME  -->
        <?php foreach ($datagamme as $datag) :?>
                <li><a href="#<?= $datag['gamme_id']?>"><?= $datag['gamme_name'];?></a></li>
        <?php endforeach; ?>
        
            </ul>
        </nav>

    </header>


    <main>

            <!-- GAMME  -->

        <?php foreach ($datagamme as $datag) :?>
            <section id="<?php echo $datag['gamme_id'] ?>">
                <h2><?php echo $datag['gamme_name'] ?></h2>

                <!-- PRODUIT  -->

                <?php foreach ($dataproduit as $data):?>
                    <?php if ($data['gamme_id'] == $datag["gamme_id"]) :?>
                        <div>                     
                            <img src="assets/img/<?= $data['produit_img'] ?>" alt="Image de <?= $data['produit_name'] ?>">
                            <div class="text">
                                <h3><?=$data['produit_name']?></h3>
                                <p><?= $data['produit_desc'] ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <p><a href=""></a></p>
            </section>
        <?php endforeach; ?>

    </main>


    <footer>
        <img class="logo" src="assets/img/logo-nerf.png" alt="Logo Nerf">

        <section>
            <h2>A Propos</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam repudiandae expedita quaerat perspiciatis aspernatur error facere maxime! Magni quasi error iure ex et vel vero, animi quisquam temporibus, earum minus.</p>

        </section>

        <a href="#"><img src="assets/img/arrow_up.png" alt=""></a>
    </footer>

    
<!-- 
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄░░░░░░░░░
░░░░░░░░▄▀░░░░░░░░░░░░▄░░░░░░░▀▄░░░░░░░
░░░░░░░░█░░▄░░░░▄░░░░░░░░░░░░░░█░░░░░░░
░░░░░░░░█░░░░░░░░░░░░▄█▄▄░░▄░░░█░▄▄▄░░░
░▄▄▄▄▄░░█░░░░░░▀░░░░▀█░░▀▄░░░░░█▀▀░██░░
░██▄▀██▄█░░░▄░░░░░░░██░░░░▀▀▀▀▀░░░░██░░
░░▀██▄▀██░░░░░░░░▀░██▀░░░░░░░░░░░░░▀██░
░░░░▀████░▀░░░░▄░░░██░░░▄█░░░░▄░▄█░░██░
░░░░░░░▀█░░░░▄░░░░░██░░░░▄░░░▄░░▄░░░██░
░░░░░░░▄█▄░░░░░░░░░░░▀▄░░▀▀▀▀▀▀▀▀░░▄▀░░
░░░░░░█▀▀█████████▀▀▀▀████████████▀░░░░
░░░░░░████▀░░███▀░░░░░░▀███░░▀██▀░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
 -->
</body>
</html>