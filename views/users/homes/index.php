
<?php if (!empty($products)) :?>

<div class="row product-list">
    <?php foreach ($products as $product) :?>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="product-grid">
            <div class="product-image">
                <?php 
                    $avatars = explode('/',$product['avatar']);
                ?>
                <a href="">
                    <img class="pic1 img-responsive" src="assets/uploads/product/<?php echo $avatars[0]?>" alt="">
                    <img class="pic2 img-responsive" src="assets/uploads/product/<?php echo $avatars[1]?>" alt="">
                </a>
                <ul class="social">
                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                    <li><a href="" data-tip="Add to Cart" data-id="<?php echo $product['id'] ?>" class="add"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
                <span class="product-new-label">New</span>
                <span class="product-discount-label">Sale</span>
            </div>
            <ul class="rating">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
            <div class="product-content">
                <h3 class="title">
                    <a href="">
                        <?php echo $product['title'] ?>
                    </a>
                </h3>
                <div class="price">
                    <?php echo $product['price'] ?>
                    <span></span>
                </div>
                <div class="add-to-cart">
                    <a class="" href=""><i class="fa fa-plus">Add to cart</i></a>
                </div>
                
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<br>
<br>

<?php 
    if (!empty($pages)){
        echo $pages;
    }
?>

    

<?php else :?>


<?php endif; ?>
