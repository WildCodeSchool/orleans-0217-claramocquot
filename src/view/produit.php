<?php
require 'header.php';
?>




<div class="containerProduit">
    <div class="row">
        <div class="col-xs-offset-2 titleProduit">
            <p>Chapeau Rouge</p>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="row">
                <div class="col-xs-6 sliderProduit">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-3">
                                <div class="carousel-inner sliderHeight " role="listbox">
                                    <div class="item active">
                                        <img src="img/collection/modele1.1.jpg" alt="...">
                                    </div>

                                    <div class="item">
                                        <img src="img/collection/model2.2.jpg" alt="...">
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 produitDescription">
                    <p><span class="DescProduit">Description: </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores assumenda consequatur corporis culpa cum dolore incidunt labore, laborum molestiae nemo nesciunt, nostrum officia officiis quos sit velit veniam veritatis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, cumque deserunt dolor eius eligendi excepturi illum maiores molestiae, nemo odit, provident rerum sunt totam. Ab architecto culpa illum ipsum saepe! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aliquam architecto cumque cupiditate distinctio ea excepturi, labore officia possimus praesentium qui quisquam suscipit tempore totam unde, vel vero voluptas voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aut autem, consectetur distinctio ex expedita ipsa iste molestiae nemo quas ratione reiciendis sunt vel. Commodi earum facilis molestias odio ut! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dicta dignissimos distinctio eius esse et expedita harum, illum natus nemo rem reprehenderit similique sit tenetur vitae! Eveniet, magnam molestiae. Adipisci!</p>

                    <p><span class="DescProduit"> Prix:</span> 100€</p>
                </div>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Se_renseigner" data-whatever="@mdo"><Cont>Se renseigner</Cont></button>
                <div class="modal fade" id="Se_renseigner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Renseignement produit</h4>
                            </div>
                                    <div class="headModalProduit">
                                        <img src="img/collection/model2.2.jpg">
                                        <p>« Merci de votre confiance - laissez-nous vos coordonnées afin que nous puissions revenir

                                            vers vous et valider votre commande. Si vous la connaissez, donner-nous votre taille de tour de

                                            tête, et surtout n’hésitez pas à ajouter vos questions ou vos remarques dans l’espace

                                            commentaires. Puisque nos produits sont faits par nos soins et requièrent des délais, faites-nous

                                            savoir l’échéance souhaitée »</p>
                                    </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nom:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Prenom:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Adresse email:</label>
                                        <input type="email" class="form-control" id="recipient-name" placeholder="dupont@exemple.fr">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Adresse:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Taille:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Commentaire:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-default">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="buttonFB">
                        <div class="fb-share-button" data-href="#" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fclara%2Fpublic%2Findex.php%3Froute%3Dproduit%23&amp;src=sdkpreparse">Partager</a></div>


                    </div>
            </div>
        </div>
    </div>
</div>




<?php
require 'footer.php';
?>
