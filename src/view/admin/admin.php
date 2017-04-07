<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clara Mocquot Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Overpass|PT+Sans|PT+Sans+Caption|PT+Serif|Roboto+Condensed"
          rel="stylesheet"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/skins/skin-black.min.css">
    <link rel="stylesheet" href="../css/summernote.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index.php?route=admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>CM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Clara Mocquot</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
<!--                    <li class="dropdown messages-menu">-->
<!--                        <!-- Menu toggle button -->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-envelope-o"></i>-->
<!--                            <span class="label label-success">4</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">You have 4 messages</li>-->
<!--                            <li>-->
<!--                                <!-- inner menu: contains the messages -->
<!--                                <ul class="menu">-->
<!--                                    <li><!-- start message -->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <!-- User Image -->
<!--                                            </div>-->
<!--                                            <!-- Message title and timestamp -->
<!--                                            <h4>-->
<!--                                                Jacques C.-->
<!--                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
<!--                                            </h4>-->
<!--                                            <!-- The message -->
<!--                                            <p>Contenu</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <!-- end message -->
<!--                                </ul>-->
<!--                                <!-- /.menu -->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">See All Messages</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- /.messages-menu -->

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Clara Mocquot</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="img/collection.jpg">
                                <p>
                                    Clara Mocquot - Admin
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-comment-o"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->


            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Rechercher">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">GESTION DU CONTENU</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="#"><i class="fa fa-file-image-o"></i> <span>Changer l'image d'accueil</span></a>
                </li>
                <li><a href="#"><i class="fa fa-plus-square-o"></i> <span>Ajouter un produit</span></a></li>
                <li><a href="#"><i class="fa fa-refresh"></i> <span>Modifier un produit</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-indent"></i> <span>Créer un article</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Evenement</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Marraines</a></li>
                        <li><a href="#">Partenaires</a></li>
                        <li><a href="#">Prestations Pro.</a></li>
                        <li><a href="#">Portrait</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-indent"></i> <span>Modifier un article</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Evenement</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Marraines</a></li>
                        <li><a href="#">Partenaires</a></li>
                        <li><a href="#">Prestations Pro.</a></li>
                        <li><a href="#">Portrait</a></li>
                    </ul>
                </li>

                <li class="header">GESTION DES MESSAGES</li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Consulter les messages</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Titre de la page
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong><a href="http://www.wildcodeschool.fr">Wild code school 2017 </a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-comment-o"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->

            <!-- /.control-sidebar-menu -->

            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane active" id="control-sidebar-settings-tab">
                <form method="post" class="text-center">
                    <h3 class="control-sidebar-heading">Reporter un bug</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Votre mail
                        </label>
                        <input type="email" class="pull-right" value="E-m@il">
                        <label class="control-sidebar-subheading">
                            Votre message
                        </label>
                        <input type="text" class="pull-right" value="Message">
                    </div>
                    <br/><br/>
                    <input class="btn btn-default text-center" type="submit">
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
</div>
<!-- ./wrapper -->


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/app.min.js"></script>
<script src="../js/jquery.slimscroll.min.js"></script>
<script src="../js/fastclick.min.js"></script>
<script src="../js/summernote.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../lang/summernote-fr-FR.js"></script>


</body>
</html>
