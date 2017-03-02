<?php ?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->url('default_index'); ?>">VODIN Framework</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <?php if (isset($_SESSION['user'])) : ?>  
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li>
                            <!-- appel administration du site -->
                            <a href="<?php echo $this->url('default_index'); ?>"><i class="fa fa-gear fa-fw"></i> ACCUEIL</a>
				
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="<?= $this->url('default_deconnexion') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            <?php else : ?>
                <li>
                    <a href="<?= $this->url('default_inscription') ?>"><i class="fa fa-user fa-fw"></i> Inscription</a>
                </li>
                <li>
                    <a href="<?= $this->url('default_connexion') ?>"><i class="fa fa-sign-in fa-fw"></i> Connexion</a>
                </li>
            <?php endif; ?>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo $this->url('default_index'); ?>"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                    </li>
                    <li>
                        <!-- menu gestion des utilisateurs -->
                        <a href="#"><i class="fa fa-user fa-fw"></i> Utilisateurs <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <!-- appel liste -->
                                <a href="?controler=user&action=index"><i class="fa fa-list fa-fw"></i> Liste</a>
                            </li>
                            <li>
                                <!-- appel création -->
                                <a href="?controler=user&action=edit"><i class="fa fa-plus fa-fw"></i> Création</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $this->e($title) ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
			
					
            <?= $this->section('main_content') ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->