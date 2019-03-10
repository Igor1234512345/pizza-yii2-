<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<section id="slider"><!--slider-->
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="/web/images/slider/ban1.jpg" class="girl img-responsive" alt="" />
            </div>
            <div class="item">
                <img src="/web/images/slider/ban2.jpg" class="girl img-responsive" alt="" />
            </div>
        </div>

        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</section><!--/slider-->




<section>

    <div class="sticky">
        <div class="panel2" data-df-offset="-213px" data-df-animation-speed="300" >
            <ul class="catalog category-products">
                <?=\app\components\MenuWidget::widget(['tpl' => 'menu'])?>
            </ul>


            <div id="menulink" class="menu-button">
                <a><i id="icon-arrow" class="arrow"></i></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">




            <!--  <div class="col-sm-3">
                   <div class="left-sidebar">
                       <h2>Меню</h2>
                       <ul class="catalog category-products">
                           <?/*=\app\components\MenuWidget::widget(['tpl' => 'menu'])*/?>
                       </ul>
                       <div class="brands_products">
                           <h2>Фильтр</h2>
                           <div class="brands-name">
                               <ul class="nav nav-pills nav-stacked">
                                   <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                   <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                   <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                   <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                   <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                   <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                   <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="price-range">
                           <h2>Цена</h2>
                           <div class="well text-center">
                               <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                               <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                           </div>
                       </div>
                   </div>
               </div> -->

            <div class="col-sm-12 padding-right">

                <div class="pizza_items"><!--recommended_items-->
                    <h2 class="title text-center">Пицца</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">


                         <?php $i= 0; foreach($hits as $hit): ?>
                            <?php if($i % 3 == 0): ?>
                              <div class="item <?php if($i == 0) echo 'active' ?>">
                            <?php endif; ?>
                             <?php $mainImg = $hit->getImage(); ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?/*= Html::img($img->getUrl(), ['alt' => $product->name])*/?>
                                                <?/*= Html::img($mainImg = $product->getImage(), ['alt' => $hit->name]) */?>
                                                <?= Html::img($mainImg->getUrl(), ['alt' => $hit['name']]) ?>
                                                <?/*= \yii\helpers\Html::img($hit['img'], ['alt' => $hit['name'], 'height' => 50]) */?>
                                                <h2><?= $hit->price?>&nbsp; сом</h2>
                                                <a class="productP" href="<?= yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a>
                                                <p><?= $hit->content?></p>
                                                <img class="board" src="/web/images/product-details/board.png" alt="" /><br />
                                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id'=> $hit->id])?>" data-id="<?=$hit->id?>" class="action-button shadow animate yellow">В корзину</a>
                                            </div>
                                          <img class="new" alt="" src="/web/images/home/new.png">
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Добавить в список сравнений</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; if($i % 3 == 0): ?>
                            </div>
                             <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/pizza_itams-->


                <?php if(!empty($query2) ): ?>

                    <div class="juse_items">
                        <h2 class="title text-center">Напитки к пицце</h2>
                       <?php foreach ($query2 as $juse): ?>
                        <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                           <!-- <?/*= Html::img("@web/web/images/products/{$juse->img}", ['alt' => $juse->name])*/?> -->
                                            <?php $mainImg2 = $juse->getImage(); ?>
                                            <?= Html::img($mainImg2->getUrl(), ['alt' => $juse['name']]) ?>
                                            <h2><?= $juse->price?>&nbsp; сом</h2>
                                                <a class="productP" href="<?= yii\helpers\Url::to(['product/view', 'id' => $juse->id]) ?>"><?= $juse->name?></a>
                                            <p></p>
                                            <a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $juse->id])?>" data-id="<?= $juse->id?>" class="action-button shadow animate yellow">В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>
<div class="line"></div>

