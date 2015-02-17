<?php
/**
 * Created by PhpStorm.
 * User: Amir
 * Date: 2/17/2015
 * Time: 1:47 PM
 */
$product_query = "SELECT products.products_id, products.products_name, products.products_price, products.products_temper, products.products_smell, products.products_category, products.products_brandId, products.products_date, products.products_sellCount,
 images.images_id, images.images_productId, images.images_image
 FROM products INNER JOIN images ON products.products_id=images.images_productId WHERE 1=1 ";


if(isset($_GET['category'])){
    $product_query .= "AND products_category = '$_GET[category]' ";
}

if(isset($_GET['brand'])){
    $product_query .= "AND products_brandId = '$_GET[brand]' ";
}



$product_result = mysqli_query($connection,$product_query);
while($product_row = mysqli_fetch_assoc($product_result)){

    echo "

				<div class='col-lg-3 col-sm-3 hero-feature text-center'>
	                <div class='thumbnail'>
	                	<a href='?page=productdetail&id=".$product_row['products_id']."' class='link-p'>
	                    	<img src='images/products/".$product_row['images_image']."' alt=''>
	                	</a>
	                    <div class='caption prod-caption'>
	                        <h4><a href='?page=productdetail&id=".$product_row['products_id']."' class='commando'>".$product_row['products_name']."</a></h4>
	                    </div>
	                </div>
	            </div>

			";
}