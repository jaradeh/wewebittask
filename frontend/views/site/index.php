<?php

use backend\models\Products;
use backend\models\AssignedCategory;
use backend\models\Category;

$productsCount = Products::find()->count();
$getProducts = Products::find()->all();
?>
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">home</a></li>
                        <li>&gt;</li>
                        <li>All Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>


<div class="shop_area shop_fullwidth shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar">
                    <div class="list_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="ion-grid"></i></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="ion-ios-list-outline"></i> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="orderby_wrapper">
                        <div class="page_amount">
                            <p>Showing <?php echo $productsCount ?> results</p>
                        </div>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop tab product start-->
                <div class="tab-content">
                    <div class="tab-pane grid_view fade show active" id="large" role="tabpanel">
                        <div class="row">
                            <?php foreach ($getProducts as $products => $product) { ?>
                                <?php
                                $getCategores = AssignedCategory::find()->where(['product_id' => $product['id']])->all();
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="#"><img src="/frontend/web/images/products/270x270/<?php echo $product['image'] ?>" alt=""></a>
                                            <a class="secondary_img" href="#"><img src="/frontend/web/images/products/270x270/<?php echo $product['image'] ?>" alt=""></a>

                                        </div>
                                        <div class="product_content">
                                            <div class="tag_cate">
                                                <?php foreach ($getCategores as $categoires => $category) { ?>
                                                    <?php $getCatDetails = Category::find()->where(['id' => $category['category_id']])->one(); ?>
                                                    <a href="#"><?php echo $getCatDetails['name'] ?> - </a>
                                                <?php } ?>
                                            </div>
                                            <h3>
                                                <a href="#"><?php echo $product['name'] ?></a>
                                                <p>In-Stock : <?php echo $product['store_quantity'] ?></p>
                                            </h3>
                                            <div class="price_box">
                                                <span class="current_price"><?php echo $product['price'] ?> JOD</span>
                                            </div>
                                            <div class="product_hover">
                                                <div class="product_ratings">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere metus vitae arcu imperdiet</p>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="/add-cart?id=<?php echo $product['id'] ?>" title="" data-original-title="add to cart">add to cart</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane list_view fade " id="list" role="tabpanel">
                        <?php foreach ($getProducts as $products => $product) { ?>
                            <?php
                            $getCategores = AssignedCategory::find()->where(['product_id' => $product['id']])->all();
                            ?>
                            <div class="single_product product_list_item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="#"><img src="/frontend/web/images/products/270x270/<?php echo $product['image'] ?>" alt=""></a>
                                            <a class="secondary_img" href="#"><img src="/frontend/web/images/products/270x270/<?php echo $product['image'] ?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-7">
                                        <div class="product_content">               
                                            <h3><a href="#"><?php echo $product['name'] ?></a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_desc">
                                                <?php foreach ($getCategores as $categoires => $category) { ?>
                                                    <?php $getCatDetails = Category::find()->where(['id' => $category['category_id']])->one(); ?>
                                                    <?php echo $getCatDetails['name'] ?> -
                                                <?php } ?>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price"><?php echo $product['price'] ?> JOD</span>
                                            </div>

                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart"><a href="/add-cart?id=<?php echo $product['id'] ?>" title="" data-original-title="add to cart">add to cart</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <!--shop tab product end-->
                <!--shop wrapper end-->
            </div>
        </div>    
    </div>
</div>