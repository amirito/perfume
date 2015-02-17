<section class="container main-content">
    <div class="title"><h1 class="title-text">جدیدترین محصولات</h1></div>
    <div class="main">
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
	            <div class='col-md-4'>
                    <div class='view view-tenth'>
                        <img src='images/products/".$product_row['images_image']."'/>

                        <div class='mask mask-1'></div>
                        <div class='mask mask-2'></div>
                        <div class='content'>
                            <h2>".$product_row['products_name']."</h2>

                            <p dir='rtl'>تیری موگلر ای من پیور هاوانه (تیری ماگلر ای من پور هاوان)</p>
                            <a href='?page=productdetail&id=".$product_row['products_id']."' class='info'>بیشتر</a>
                        </div>
                    </div>
                </div>

			";
}
?>
    </div>
</section>

