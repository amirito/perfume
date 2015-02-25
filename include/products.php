<?php
    $brand_query = "SELECT * FROM brands";
    $brand_result = mysqli_query($connection,$brand_query);
    $brand_row = mysqli_fetch_assoc($brand_result);
?>
<div class="grid container">
    <div class="title"><h1 class="title-text" dir="rtl">محصولات <?php if(isset($_GET['category']) && $_GET['category']=='men'){echo 'مردانه';} elseif(isset($_GET['category']) && $_GET['category']=='women'){echo 'زنانه';} if(isset($_GET['brand'])){echo $brand_row['brands_name'];} ?> </h1></div>
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
            <div class='col-md-3 col-sm-4 col-xs-6'>
                <figure class='effect-zoe'>
                    <img src='images/products/".$product_row['images_image']."' alt='img26'/>
                    <figcaption>
                        <form method='post'>
                        <h2>".$product_row['products_price']."</h2>
                        <p class='icon-links tt-wrapper'>
                            <a href='#'><i class='fa fa-heart'></i><span>پسندیدم</span></a>
                            <a href='#'><i class='fa fa-eye'></i><span>مشخصات</span></a>
                            <input type='hidden' name='id' value='".$product_row['products_id']."'>
                            <a><button type='submit'><i class='fa fa-shopping-cart'></i><span>افزودن به سبد خرید</span></button></a>
                        </p>
                        <p class='description'>".$product_row['products_name']."</p>
                        </form>
                    </figcaption>
                </figure>
            </div>
			";
}
?>



</div>
