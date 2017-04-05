<footer>
    <div class="container pdp">
        <div class="row ">
            <div class="col-md-4 col-xs-4 ">
                <div class="row">
                    <div class="col-md-4 col-xs-4  ">
                        <a href="https://www.facebook.com/claramocquotchapeaux/"><img src="img/logo/facebook.jpg" class="fb"></a>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <a href="https://www.instagram.com/claramocquotchapeaux/?hl=fr"><img src="img/logo/instagram.png"></a>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="img/logo/pinterest.jpg"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-0 col-xs-3 col-xs-offset-1 contact">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#contact" data-whatever="@mdo"><Cont>CONTACT</Cont></button>
                <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Formulaire de contact</h4>
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
                                        <label for="message-text" class="control-label">Message:</label>
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
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <a href="https://wildcodeschool.fr/"><img src="img/logo/wcs_logo.png"></a>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <a href="#mentions" data-target="#mentions" data-toggle="modal"><img src="img/logo/info.png"></a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="mentions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Mentions légales</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/burger.js"></script>
<script src="js/landingPage.js"></script>
<script src="js/thumbnailHome.js"></script>

<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>