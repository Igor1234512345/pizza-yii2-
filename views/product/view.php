<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\debug;
?>
<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();
/*debug($mainImg);*/
?>
<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-12 padding-right">

                <div class="product-details"><!--product-details-->
                    <div class="col-sm-7">
                        <div class="span7 ty-product-block__img-wrapper">
                            <div class="ty-product-block__img cm-reload-161" id="product_images_161_update">
                                <div class="active-gallery two-col"></div>
                                <div class="two-col">


                                    <div class="ty-product-img cm-preview-wrapper" style="display:inline-block">
                                        <?php
                                         $count = count($gallery);
                                         $i = 0;

                                           foreach ($gallery as $img) : ?>

                                       <!-- <a id="" data-ca-image-id="" class="cm-image-previewer cm-previewer ty-previewer" data-ca-image-width="650" data-ca-image-height="650" href='<?/*= $mainImg->getUrl() ?>' title=""><?= Html::img($mainImg->getUrl(), ['alt' => $product->name])*/?>

                                        </a> -->

                                               <?php if ($img->isMain == 1) : ?>
                                                   <a id="<?= $img->id ?>" data-ca-image-id="" class="cm-image-previewer cm-previewer ty-previewer" data-ca-image-width="650" data-ca-image-height="650" href='<?= $img->getUrl() ?>' title=""><?= Html::img($img->getUrl(), ['alt' => $product->name])?>
                                                   </a>
                                              <?php endif; ?>


                                        <?php endforeach; ?>
                                        <p class="ty-center"><small style="color:#999;">Наведите на картинку для увеличения</small></p>

                                        <!--Миниатюра товара-->
                                        <div class="ty-product-thumbnails ty-center cm-image-gallery" id="images_preview_1615b8daf4b9e8b1" style="width: 80px;">
                                            <ul class="under">
                                               <?php $count = count($gallery); $i = 0; foreach ($gallery as $img): ?>
                                                <li>
                                                    <a data-ca-gallery-large-id="<?= $img->id ?>" class="cm-thumbnails-mini ty-product-thumbnails__item active"> <?= Html::img($img->getUrl(), ['alt' => $product->name])?>
                                                    </a>
                                                </li>
                                               <!-- <li>
                                                    <a data-ca-gallery-large-id="2" class="cm-thumbnails-mini ty-product-thumbnails__item"><img class="ty-pict     cm-image" id="det_img_1615b8daf4b9e8b1_618_mini" src="/web/images/products/1.jpg" alt="" title="">
                                                    </a>
                                                </li> -->
                                                <?php endforeach; ?>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-5">
                        <div class="product-information"><!--/product-information-->
                            <?php if ($product->new): ?>
                                <?= Html::img("@web/web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                            <?php endif ?>

                            <?php if ($product->sale): ?>
                                <?= Html::img("@web/web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                            <?php endif ?>
                            <h2><?=$product->name?></h2>
                           <!-- <img src="/web/images/product-details/rating.png" alt="" /> -->
                            <span>
									<span><?=$product->price ?>&nbsp;сом</span>

                                  <p style="float: left;">
                                      <button id="minus1" class="minus" style=" cursor: pointer;">-</button>
                                      <input style="cursor: pointer;" id="qty" type="text" value="1" class="qty" />
                                      <button id="add1" class="add" style=" cursor: pointer;">+</button>
                                  </p>
                            </span>
                            <p><b><a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault action-button cart">
										<i class="fa fa-shopping-cart"></i>
										В корзину
                                    </a></b></p>

                            <p><b>Категория:</b> <a href="<?=\yii\helpers\Url::to(['category/view', 'id' =>
                             $product->category->id]) ?>"><?= $product->category->name ?></a></p>

                            <script type="text/javascript">(function(w,doc) {
                                    if (!w.__utlWdgt ) {
                                        w.__utlWdgt = true;
                                        var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
                                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                        s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
                                        var h=d[g]('body')[0];
                                        h.appendChild(s);
                                    }})(window,document);
                            </script>
                            <div data-mobile-view="true" data-share-size="30" data-like-text-enable="false"
                                 data-background-alpha="0.0" data-pid="1791028" data-mode="share"
                                 data-background-color="#ffffff" data-share-shape="round-rectangle"
                                 data-share-counter-size="12" data-icon-color="#ffffff"
                                 data-mobile-sn-ids="fb.vk.tw.ok.wh.vb.tm." data-text-color="#000000"
                                 data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff"
                                 data-share-counter-type="disable" data-orientation="horizontal"
                                 data-following-enable="false" data-sn-ids="fb.vk.tw.ok.tm."
                                 data-preview-mobile="false" data-selection-enable="true" data-exclude-show-more="false"
                                 data-share-style="1" data-counter-background-alpha="1.0" data-top-button="false"
                                 class="uptolike-buttons" >
                            </div>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->







                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Описание</a></li>
                            <li><a href="#composition" data-toggle="tab">Состав</a></li>
                            <li><a href="#reviews" data-toggle="tab">Коментарии</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >

                            <div class="col-sm-12">
                                <div class="description">
                                    <?= $product->description ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="composition" >
                          <div class="col-sm-12">
                            <div class="description">
                                <?= $product->content ?>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="tag" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/web/images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/web/images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/web/images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/web/images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>

                                <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="/web/images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <!--    <div class="recommended_items">
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/web/images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div> -->

            </div>
        </div>
    </div>
</section>



