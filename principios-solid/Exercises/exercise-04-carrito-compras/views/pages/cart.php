<section>
  <h2>welcome to cart</h2>

  <?php if ($originalPrice): ?>
    <span>si aplica descuento cantidad </span>
    ---
    <span> precio sin descuento :<?= $originalPrice ?> </span>
  <?php endif; ?>

  <h2>total a pagar de los productos : <?= $totalPagar ?> $</h2>
  <p>total productos : <?= $quantity ?></p>
  <br><br><br>

  <!-- <?php debuguear($cartItems) ?> -->

  <?php foreach ($cartItems as $item): ?>
    <article>
      <?php if (isset($item['precio_original'])): ?>
        <strong>total a pagar de este producto sin descuento:
          <?= $item['precio_original'] ?>
        </strong>
      <?php endif; ?>
      <p>total a pagar de este producto : <?= $item['total_pagar'] ?>$</p>
      <p>item id : <?= $item['id'] ?></p>
      <h3>name : <?= $item['name'] ?></h3>
      <div>
        <p>price : <?= $item['price'] ?></p>
        <p>category : <?= $item['category'] ?></p>
        <p>id_item_cart : <?= $item['id_item_cart'] ?></p>
        <p>quantity : <?= $item['quantity'] ?></p>
        <p>user_id : <?= $item['user_id'] ?></p>
      </div>
      <form action="/quantityUpdate" method="POST">
        <input type="hidden" name="id" value="<?= $item['id_item_cart'] ?>">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="quantityCurrent" value=<?= $item['quantity'] ?>>
        <input type="submit" name="action" value="+">
        <input type="submit" name="action" value="-">
      </form>
      <br>
      <form action="/removeProduct" method="POST">
        <input type="hidden" name="id" value="<?= $item['id_item_cart'] ?>">
        <input type="submit" value="remove product">
      </form>
      <br>
    </article>
  <?php endforeach; ?>
  <br>

  <form action="/removeProduct" method="POST">
    <input type="submit" value="remove all">
  </form>
</section>