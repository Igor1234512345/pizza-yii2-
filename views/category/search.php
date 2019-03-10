<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="text-center">Вы искали:<?= $q ?> </h2>

                    <?php if(!empty($products)): ?>
                        <?php $i = 0; foreach ( $products as $product) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/web/images/products/{$product->img}", ['alt' => $product->name])?>
                                            <h2>$<?= $product->price ?></h2>
                                            <a href="<?= yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class="productP"><?= $product->name ?></a>
                                            <p><?=$product->content ?></p>
                                            <a href="#" class="action-button shadow animate yellow">В корзину</a>
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
                        <h2>Ничего не найденно...</h2>
                    <? endif; ?>
                    <div class="clearfix"></div>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>