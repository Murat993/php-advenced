<?php /** @var \app\models\Product[] $items */ ?>
<style>
	.product_container {
		margin: 0 auto;
		width: 90%;
	}
    .product_preview {
        width: 200px;
        height: 250px;
        padding: 8px;
        float: left;
        margin: 20px;
        border: 1px solid lightgray;
    }

    .product_preview:hover{
        border: 1px solid #8bd8ff;
    }
    .clearfix{
        clear: both;
    }
    img {
    	width: 150px;
    }
    .product_name {
    	font-size: 16px;
    }
    .price {
    	text-align: center;
    	font-size: 20px;
    	color: orange;
    }
   	.basket {
   		display: inline-block;
   		color: red;
   		font-size: 18px;
   	}
</style>
<h1>Каталог товаров</h1>

<div class="product_container">
    <?php foreach ($items as $item): ?>
    <a class="product_card" href="<?= $item->getUrl()?>">
        <div class="product_preview">
        	<img src="../../img/1.jpg">
                <div class="product_title">
                    <span class="product_name"><?= $item->name ?></span>
                    <p class="price">
                        <?= $item->price .'$'?>
                    </p>
                </div>     
        </div>
    </a>
    <?php endforeach; ?> 
    <div class="clearfix"></div>
</div>


