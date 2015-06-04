<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
	<?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('bootstrap.min');
//		echo $this->Html->css('sb-admin');
		echo $this->Html->css('plugins/morris');
		echo $this->Html->css('font-awesome/font-awesome.min');
		echo $this->Html->css('main');
                
		echo $this->Html->script('jquery');
                echo $this->Html->script('main');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('plugins/morris/raphael.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Router::url("/"); ?>">
                        <?php echo $this->Html->image('logo.png', array('class' => 'main-logo')); ?>
                        Provivienda El Mariposal
                    </a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> 
                            <?php echo $user["name"]; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo Router::url(array("controller"=>"users","action"=>"logout")); ?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#members">
                                <i class="fa fa-fw fa-table"></i> Asociados <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="members" class="collapse">
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"members","action"=>"index")); ?>">Lista de Asociados</a>
                                </li>
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"members","action"=>"add")); ?>">Agregar Nuevo Asociados</a>
                                </li>
                            </ul>
                            <div class="menu-icon" onclick="showMenu()">
                                <i class="fa fa-2x fa-table"></i>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#activity">
                                <i class="fa fa-fw fa-desktop"></i> Actividades <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="activity" class="collapse">
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"activities","action"=>"index")); ?>">Lista de Actividades</a>
                                </li>
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"activities","action"=>"add")); ?>">Agregar Nuevo Actividad</a>
                                </li>
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"categories","action"=>"index")); ?>">Tipos de Actividades</a>
                                </li>
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"categories","action"=>"add")); ?>">Agregar Tipo de Actividad</a>
                                </li>
                            </ul>                        
                            <div class="menu-icon" onclick="showMenu()">
                                <i class="fa fa-2x fa-desktop"></i>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#asitencias">
                                <i class="fa fa-fw fa-edit"></i> Registrar Asistencia <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="asitencias" class="collapse">
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"activitiesMembers","action"=>"add")); ?>">Agregar Registro</a>
                                </li>
                                <li>
                                    <a href="<?php  echo Router::url(array("controller"=>"activitiesMembers","action"=>"index")); ?>">Lista de Registros</a>
                                </li>
                            </ul>   
                            <div class="menu-icon" onclick="showMenu()">
                                <i class="fa fa-2x fa-edit"></i>
                            </div>
                        </li>
                        <li>
                            <a href="<?php  echo Router::url(array("controller"=>"reports","action"=>"dashboard")); ?>">
                                <i class="fa fa-fw fa-bar-chart-o"></i>
                                Reportes
                            </a>
                            <div class="menu-icon" onclick="showMenu()">
                                <i class="fa fa-2x fa-bar-chart-o"></i>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" onclick="closeNav();">
                                <i class="fa fa-fw fa-chevron-circle-left"></i>
                                Ocultar
                            </a>
                            <div class="menu-icon" onclick="showMenu()">
                                <i style="margin-right: 4px;" class="fa fa-2x fa-chevron-circle-right"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="container">
                <div id="page-wrapper">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>	
                        <?php // echo $this->element('sql_dump'); ?>

                </div>
            </div>
        </div>
        <div id="loading-box"> 
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </body>
</html>
