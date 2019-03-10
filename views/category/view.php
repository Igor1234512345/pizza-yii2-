<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\assets\AppAsset;
AppAsset::register($this);
?>

<!--<section id="advertisement">
    <div class="container">
        <img src="/web/images/shop/advertisement.jpg" alt="" />
    </div>
</section> -->
<section>
    <div class="sticky">
        <div class="panel2" data-df-offset="-213px" data-df-animation-speed="300" >
            <!--  <ul class="models">
                   <li><a href="#"><img src="" alt="icon" />Model 1</a></li>
                   <li><a href="#"><img src="" alt="icon" />Model 2</a></li>
                   <li><a href="#"><img src="" alt="icon" />Model 3</a></li>
               </ul>-->

            <ul class="catalog category-products">
                <?=\app\components\MenuWidget::widget(['tpl' => 'menu'])?>
            </ul>


            <div id="menulink" class="menu-button">
                <a> <i id="icon-arrow" class="arrow"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
           <!-- <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                        <?/*= \app\components\MenuWidget::widget(['tpl' => 'menu'])*/?>
                    </ul>

                  <div class="price-range">
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>

                    <div class="shipping text-center">
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>

                </div>-->
            </div>

            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?= $category->name ?> </h2>

                    <?php if(!empty($products)): ?>
                      <?php $i = 0; foreach ( $products as $product) : ?>
                       <?php $mainImg = $product->getImage(); ?>
                       <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?= Html::img($mainImg->getUrl(), ['alt' => $product['name']]) ?>
                                    <h2>$<?= $product->price ?></h2>
                                    <a href="<?= yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class="productP"><?= $product->name ?></a>
                                    <p><?= substr("$product->content",0,150) ?></p>
                                    <a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault action-button cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </div>

                                <?php if ($product->new): ?>
                                  <?= Html::img("@web/web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                                <?php endif ?>

                                <?php if ($product->sale): ?>
                                    <?= Html::img("@web/web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale'])?>
                                <?php endif ?>


                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <!--<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>-->
                                    <!--<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                       <?php $i++ ?>
                       <?php if($i %3 ==0) : ?>
                            <div class="clearfix"></div>
                       <?php endif; ?>
                       <?php endforeach; ?>
                       <?php else :?>
                        <h2>Товаров нет</h2>

                    <? endif; ?>
                    <div class="clearfix"></div>
                    <?php
                       echo \yii\widgets\LinkPager::widget([
                             'pagination' => $pages,
                          ]);
                    ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>