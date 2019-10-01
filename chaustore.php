<!DOCTYPE html>
<html>
	<head>
		<title>Chaustore</title>
		<meta charset="utf8">
		<link rel="stylesheet" href="chaustore.css">
	</head>
	<body>
		<nav>
			<p>Tables</p>
			<a href="#product">Produit</a>
			<a href="#category">Catégorie</a>
			<a href="#brand">Marque</a>
			<a href="#color">Couleur</a>
			<a href="#size">Pointure</a>
			<a href="#stock">Stock</a>
		</nav>
		<section>
		<?php
			$conn = mysqli_connect('localhost', 'bouchra', 'Azerty1@');
			mysqli_select_db ($conn, 'simplon_chaustore');
			mysqli_set_charset ($conn, 'utf8');
		?>
<!--  --------------------------------------------------------------------------category -------------------------------------------------------------------------------------------- -->

		<p id="category">category : id/name</p>
		<?php
			$sql_category = 'select * from category;';
			$result_category = mysqli_query($conn, $sql_category);
			while ($row_category = mysqli_fetch_array($result_category)) {
			echo ($row_category[0]." ".$row_category[1]."<br>");
			}
		?>
		<br/>
		<form method="POST">
		    <label>
		    <input type="text" name="category_name" placeholder="nom de la nouvelle catégorie" value="<?php if (!empty($_POST['category_name'])) { echo $_POST['category_name']; } ?>">
		    </label>
		    <input type="submit" value="ajouter">
		</form>
		<?php
		if (!empty($_POST)) {
			$conn = mysqli_connect('164.132.110.233', 'simplon', 'xCIwyTKo3)?(31;*', 'simplon_chaustore');
			var_dump($conn);
			$add_category_name = $_POST['category_name'];
			$req = 'INSERT INTO category(name) VALUES("'.$add_category_name.'")';
			$result = mysqli_query($conn, $req);
			}
			echo "<br/>";
		?>
<!--  --------------------------------------------------------------------------color ------------------------------------------------------------------------------------------------ -->

		<p id="color">color : id/name</p>
		<?php
			$sql_color = 'select * from color;';
			$result_color = mysqli_query($conn, $sql_color);
			while ($row_color = mysqli_fetch_array($result_color)) {
			echo ($row_color[0]." ".$row_color[1]."<br>");
			}
		?>
		<br/>
		<form method="POST">
		    <label>
		    <input type="text" name="color_name" placeholder="nom de la nouvelle couleur" value="<?php if (!empty($_POST['color_name'])) { echo $_POST['color_name']; } ?>">
		    </label>
		    <input type="submit" value="ajouter">
		</form>
		<?php
			if (!empty($_POST)) {
			$conn = mysqli_connect('164.132.110.233', 'simplon', 'xCIwyTKo3)?(31;*', 'simplon_chaustore');
			var_dump($conn);
			$add_color_name = $_POST['color_name'];
			$req = 'INSERT INTO color(name) VALUES("'.$add_color_name.'")';
			$result = mysqli_query($conn, $req);
			}
			echo "<br/>";
		?>
<!--  -----------------------------------------------------------------------------brand --------------------------------------------------------------------------------------------- -->

		<p id="brand">brand : id/name/logo(NULL)</p>
		<?php
			$sql_brand = 'select * from brand;';
			$result_brand = mysqli_query($conn, $sql_brand);
			while ($row_brand = mysqli_fetch_array($result_brand)) {
			echo ($row_brand[0]." ".$row_brand[1]."<br>");
			}
		?>
		<br/>
		<form method="POST">
		    <label>
		    <input type="text" name="brand_name" placeholder="nom de la nouvelle marque" value="<?php if (!empty($_POST['brand_name'])) { echo $_POST['brand_name']; } ?>">
		    </label>
		    <input type="submit" value="ajouter">
		</form>
		<?php
			if (!empty($_POST)) {
			$conn = mysqli_connect('164.132.110.233', 'simplon', 'xCIwyTKo3)?(31;*', 'simplon_chaustore');
			var_dump($conn);
			$add_brand_name = $_POST['brand_name'];
			$req = 'INSERT INTO brand(name) VALUES("'.$add_brand_name.'")';
			$result = mysqli_query($conn, $req);
			}
			echo "<br/>";
		?>
<!--  -----------------------------------------------------------------------------product -------------------------------------------------------------------------------------------- -->

		<p id="product">product : id/name/category/brand/color/image/price/gender</p>
		<?php
			$sql_product = 'select * from product;';
			$result_product = mysqli_query($conn, $sql_product);
			while($result_column = mysqli_fetch_row($result_product)) {
			for ($i=0; $i<count($result_column);$i++) {
			echo($result_column [$i]."  ");
			}
			echo "<br/>";
			}
			echo "<br/>";
		?>
<!--  ---------------------------------------------------------------------------stock ------------------------------------------------------------------------------------------------ -->

		<p id="stock">stock : product/size/stock</p>
		<?php
			$sql_stock = 'select * from stock;';
			$result_stock = mysqli_query($conn, $sql_stock);
			while($result = mysqli_fetch_row($result_stock)) {
			for ($i=0; $i<count($result);$i++) {
			echo($result [$i]."  ");
			}
			echo "<br/>";
		 	}
			echo "<br/>";
		?>
<!--  ---------------------------------------------------------------------------size ------------------------------------------------------------------------------------------------ -->

		<p id="size">size : id/name</p>
		<?php
			$sql_size = 'select * from size;';
			$result_size = mysqli_query($conn, $sql_size);
			while ($row_size = mysqli_fetch_array($result_size)) {
			echo ($row_size[0]." ".$row_size[1]."<br>");
			}
		?>
		</section>
	</body>
</html>
