<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="/frontend/web/images/logo/favicon.ico"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <?php if (!\Yii::$app->user->isGuest) { ?>
                <header class="main-header">

                    <!-- Logo -->
                    <a href="/backend/web" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>WB</b></span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>WeWebit</b></span>
                    </a>

                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="/backend/web/img/admin.png" class="user-image" alt="Admin Image">
                                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="/backend/web/img/admin.png" class="img-circle" alt="Admin Image">
                                            <p>
                                                <?= Yii::$app->user->identity->username ?>
                                                <small>Email : <?= Yii::$app->user->identity->email ?></small>
                                                <small style="display:none;">Date joined : <?= $created = Yii::$app->user->identity->created_at ?></small>
                                                <small>Date joined : <?php echo date("d/m/Y", $created); ?></small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-right">
                                                <a href="/backend/web/site/logout" data-method="post" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="/backend/web/img/admin.png" class="img-circle" alt="Arizona Admin">
                            </div>
                            <div class="pull-left info">
                                <p><?= Yii::$app->user->identity->username ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                        <!-- search form -->
                        <form action="#" method="get" class="sidebar-form">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /.search form -->
                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li><a href="/backend/web"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="/backend/web/products"><i class="fa fa-list"></i> <span>Products</span></a></li>
                            <li><a href="/backend/web/category"><i class="fa fa-tags"></i> <span>Categories</span></a></li>
                            <li><a href="/backend/web/orders"><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>
                            
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
            <?php } ?>

            <?= $content ?>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.8
                </div>
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="/backend/web">WeWebit</a>.</strong> All rights
                reserved.
            </footer>
        </div>


        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner_image_main').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pagesbanners-path").change(function () {
        readURL(this);
    });
</script>