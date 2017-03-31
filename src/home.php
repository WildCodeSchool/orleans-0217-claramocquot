<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clara Mocquot | Accueil</title>

    <!-- Importation des fonts Google -->
    <link href="https://fonts.googleapis.com/css?family=Overpass|PT+Sans|PT+Sans+Caption|PT+Serif|Roboto+Condensed"
          rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" />

    <!-- Style -->
    <link href="css/style.css" type="text/css" rel="stylesheet">

</head>
<body>
<!-- =========================
    SECTION ACCUEIL
============================== -->

<section class="landingPageAccueil" id="accueil">
    <div class="section_overlay">
        <div class="container home-container">
            <a href="#navigation"><span class="titreCadre1">CLARA MOCQUOT</span></a>
            <h1 class="title">COIFFES & CHAPEAUX<br>
                sur-mesure et à la demande</h1>
        </div>
    </div>
</section>

<!-- =========================
    MOSAIQUE DE NAVIGATION
============================== -->

<section class="landingPageNavigation" id="navigation">
    <div class="section_overlay">
        <div class="container home-container">

            <span class="titreCadre2">NAVIGATION</span>
            <br><br>

            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <a href="index.php?route=entreprise" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="index.php?route=manifeste" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="index.php?route=articles" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="https://www.chapellerie-traclet.com/37425-large/chapeau-fez-bordeaux.jpg"
                             alt="thumbnail image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================
    SECTION NOUVEAUTÉS
============================== -->

<section class="landingPageNouveautes" id="nouveautes">
    <div class="section_overlay">
        <div class="container home-container">
            <span class="titreCadre2">NOUVEAUTÉS</span>
        </div>
    </div>
</section>

<!-- =========================
    SECTION ACTUALITÉS
============================== -->

<section class="landingPageActualites" id="actualites">
    <div class="section_overlay">
        <div class="container home-container">
            <span class="titreCadre2">ACTUALITÉS</span>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
require 'footer.php';
?>

</body>
</html>