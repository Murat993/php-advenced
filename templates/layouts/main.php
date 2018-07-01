<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		.header {
			width: 100%;
			height: 50px;
			background: pink;
		}
		.footer {
			width: 100%;
			height: 50px;
			background: grey;

		}
	</style>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="header">
		<a href="/user/">user</a>
		<a href="/basket/">Корзина</a>
	</div>
	<div class="content"><?=$content?></div>
	<div class="footer">Это футер</div>
</body>
</html>