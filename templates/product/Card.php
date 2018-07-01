<style type="text/css">
	.name {
		font-size: 20px;
		color: blue;
	}
	.desc {
		margin: 10px;
		font-size: 18px;
	}
	.price {
		font-size: 20px;
		color: orange;
	}
	.basket {
		color: red;
		font-size: 25px;
	}
</style>
<h1 class="name"><?=$product->name?></h1>
<img src="../../img/1.jpg">
<p class="desc"><?=$product->description?></p>
<p class="price"><?=$product->price . '$'?></p>
<a class="basket" href="/basket/">Корзина</a>