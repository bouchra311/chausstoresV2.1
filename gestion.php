 <?php
 session_start();
 require_once "connect2.php";
  ?>

  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">

      <title>Gestion des stocks</title>

  </head>
  <body>
    <h1>Bienvenue sur votre interface administrateur:</h1>

    <h2>Pour modifier une couleur <a href="color.php" >cliquez ICI</a></h2>
    <h2>Pour modifier une marque <a href="brand.php">cliquez ICI</a></h2>
    <h2>Pour modifier une catégorie <a href="category.php">cliquez ICI</a></h2>



      <h2>Ajouter du stock</h2>
      <div>
      <p><?php if(isset($error)){echo $error;} ?></p>
      <form method="post" action="" id="add_stock">
  				<label for="name">Quantité</label><br>
  				<input type="text" name="stock_quantity" value="<?php
              if(!empty($_POST['stock_quantity'])){
                  echo $_POST['stock_quantity'];
              }?>"><br>
  				<label for="product">Nom du produit</label><br>
  				<select name="product_name" id="product_name">
  					<?php
                      $prod = 'select * from product ORDER BY id DESC;';
                      $reqprod = mysqli_query($conn, $prod);
                      while ($req = mysqli_fetch_array($reqprod)) {
                              echo "<option>".$req[1]."</option>";
                      }
  		            ?>
  				</select><br>
  			</p>
  			<p>
  				<label for="size">Taille</label><br>
  				<select name="size_name" id="size_name">
  					<?php
                      $size = 'select * from size ORDER BY id DESC;';
                      $reqsize = mysqli_query($conn, $size);
                      while ($req = mysqli_fetch_array($reqsize)) {
                              echo "<option>".$req[1]."</option>";
                      }
  		            ?>
  				</select><br>
  				<input type="submit" name="add_stock" id="add_stock">
  		</form>
          </div>
      <h2>Voir les produits</h2>
      <div>
      <?php
              $stock = 'SELECT stock.stock, product.name, size.name, product.id, size.id
              from stock,
              product,
              size
              WHERE
              stock.product_id = product.id
              AND
              stock.size_id = size.id ORDER BY product.id DESC;';
              $reqstock = mysqli_query($conn, $stock);
              while ($req = mysqli_fetch_row($reqstock)) {
                  $id_product = $req[3];
                  $id_size = $req[4];?>
                  <div id='stock'><p><?php echo $req[0]." ".$req[1]." ".$req[2];?></p>
                    <?php


                         echo("<form method='post'>
                                    <input type='text' name='form' placeholder='newname'>
                                    <input type='submit' name='modif".$id_product."' value='modifier'>
                                    <input type='submit' name='supp".$id_product."' value='supprimer'>
                                    </form>");


                                    if(isset($_POST["supp".$id_product])){
                                    header("location:suppproduct.php?id=".$id_product);
                                   }

                                   if(isset($_POST["modif".$id_product])) {
                                     $postprod = htmlspecialchars($_POST['form']);
                                     $modifprod = "UPDATE category SET name = '$postprod'
                                     WHERE id = '$id_product'";
                                     mysqli_query($conn, $modifprod);
                                     header("location:gestion.php");
                                   }
                                  }



                      ?>
                  </div>

      </div>
  </body>
  </html>
