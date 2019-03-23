<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
use frontend\models\SignupForm;
use backend\models\Cart;

$user_id = $created = Yii::$app->user->identity->id;

$getCartData = Cart::find()->where(['user_id' => $user_id])->andWhere(['status' => 1])->count();

$session = Yii::$app->session;
$lang_id = $session['language_id'];


$session = Yii::$app->session;
$lang = $session['language_id'];

if ($lang == "2") {
    $lang_words = "AR";
    $font_family = "cairo_regular";
} else {
    $lang_words = "EN";
    $font_family = "poiret";
}

$this->title = "WeWebit";
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="/frontend/web/images/logo/favicon.ico"/>
        <?= Html::csrfMetaTags() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!-- Main Wrapper Start -->
        <!--header area start-->
        <header class="header_area">
            <!--header top start-->
            <div class="header_top">
                <div class="container">   
                    <div class="row align-items-center">

                        <div class="col-lg-7 col-md-12">
                            <div class="welcome_text">
                                <p>Free shipping on all domestic orders with coupon code <span>“Watches2018”</span></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="top_right text-right">
                                <ul>
                                    <li class="language"><a href="#"> English <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_language">
                                            <li><a href="#"> French</a></li>
                                            <li><a href="#">Germany</a></li>
                                            <li><a href="#">Japanese</a></li>
                                        </ul>
                                    </li>
                                    <li class="currency"><a href="#">USD <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#">EUR – Euro</a></li>
                                            <li><a href="#">GBP – British Pound</a></li>
                                            <li><a href="#">INR – India Rupee</a></li>
                                        </ul>
                                    </li>
                                    <li class="top_links"><a href="#">My Account <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="#">Checkout </a></li>
                                            <li><a href="#">My Account </a></li>
                                            <li><a href="/cart">Shopping Cart</a></li>
                                            <li><a href="#">Wishlist</a></li>
                                        </ul>
                                    </li> 



                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->

            <!--header middel start-->
            <div class="header_middel">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5">
                            <div class="home_contact">
                                <div class="contact_box">
                                    <label>Location</label>
                                    <p>Street 12345 – USA</p>
                                </div>
                                <div class="contact_box">
                                    <label>Call free</label>
                                    <p>+(012) 800 456 789</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="/img/logo/logo.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-9">
                            <div class="middel_right">
                                <div class="search_btn">
                                    <a href="#"><i class="ion-ios-search-strong"></i></a>
                                    <div class="dropdown_search">
                                        <form action="#">
                                            <input placeholder="Search product..." type="text">
                                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="cart_link">
                                    <a href="/cart"><i class="ion-android-cart"></i>
                                    <span class="cart_quantity"><?php echo $getCartData ?></span>
                                    </a>
                                    <!--mini cart-->

                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->

            <!--header bottom satrt-->
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="main_menu_inner">
                                <div class="logo_sticky">
                                    <a href="/"><img src="/img/logo/logo.jpg" alt=""></a>
                                </div>
                                <div class="main_menu d-none d-lg-block"> 
                                    <nav>  
                                        <ul>

                                            <li class="active"><a href="/">Home </a></li>
                                            <li><a href="/">Shop </a></li>
                                            <li><a href="/cart">Cart </a></li>
                                            <li><a href="/checkout">Checkout </a></li>
                                        </ul>  
                                    </nav> 
                                </div>
                                <div class="mobile-menu d-lg-none">
                                    <nav>  
                                        <ul>

                                            <li class="active"><a href="/">Home </a></li>
                                            <li><a href="/">Shop </a></li>
                                            <li><a href="/cart">Cart </a></li>
                                            <li><a href="/checkout">Checkout </a></li>
                                        </ul>  
                                    </nav>     
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </header>
        <!--header area end-->






        <?= $content ?>

        <!--footer area start-->
        <footer class="footer_widgets">
            <div class="container">  
                
                <div class="footer_middel">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_middel_menu">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Online Store</a></li>
                                    <li><a href="#">Promotion</a></li>
                                    <li><a href="#">Privacu Policy</a></li>
                                    <li><a href="#">Terms Of Use</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright_area">
                                <p>Copyright &copy; <?php echo date('Y') ?> <a href="#">WeWebit</a>  All Right Reserved.</p>
                                <img src="/img/icon/papyel2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </footer>
        <!--footer area end-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

