<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
    <script src="/web/js/html5shiv.js"></script>

    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900i" rel="stylesheet">

</head>

<body>
    <?php $this->beginBody() ?>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>996(501)076-607</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?=\yii\helpers\Url::home() ?>"><?= Html::img('@web/web/images/home/logo.png', ['alt' => 'E-SHOPPER']) ?></a>
                        </div>
                        <div class="btn-group pull-right">

                            <div class="btn-group">
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li class="cartstyle"><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart fa-2x">&nbsp;&nbsp;товаров&nbsp;(0)</i>


                             <?php if(!empty($session['cart'])): ?>  <?= $session['cart.qty']?>  <?php endif;?> </a></li>

                               <!-- <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i> Login</a></li> -->
                                <li><a href="<?= yii\helpers\Url::to(['/admin']) ?>"><i class="fa fa-lock fa-2x">&nbsp;Вход</i> </a></li>

                                <?php if(!Yii::$app->user->isGuest) : ?>
                                    <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user fa-2x"></i>
                                            <?= Yii::$app->user->identity['username']?>&nbsp;(Выход)</a></li>
                                <?php endif; ?>

                                <!-- Модальное окно -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Вход</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

       <!-- <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.html" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form method="get" action="<?=\yii\helpers\Url::to(['category/search']) ?>">
                                <input type="text" placeholder="Search" name="q">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--/header-->
    <?= $content; ?>


    <footer id="footer"><!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Контакты</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><i class="fa fa-home fa fa-2x" aria-hidden="true" style="color: #6f6f6c"></i>&nbsp;
                                    <span style="font-size: 1.4em; color: #6f6f6c;">Тут будет адресс</span>
                                </li>
                                <li><i class="fa fa-phone-square fa-2x" style="color: #6f6f6c" aria-hidden="true"></i>&nbsp;
                                    <span style="font-size: 1.4em; color: #6f6f6c;">996(501)076-607</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Подписаться на рассылку</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Ваша почта" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Пицца на дровах © 2018</p>
                    <p class="pull-right">Сайт разработал <span><a target="_blank" href="http://www.themeum.com">R@F</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
<?php
      \yii\bootstrap\Modal::begin([
         'header' => '<h2>Корзина</h2>',
         'id' => 'cart',
         'size' => 'modal-lg',
         'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупку</button>
                      <a href="'. \yii\helpers\Url::to(['cart/view'])  .' "  class="btn btn-success">Оформить заказ</a>
                      <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
              ]);
      \yii\bootstrap\Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>