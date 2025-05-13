<section>
  <h2>welcome to cart</h2>
  <!-- <?php debuguear($cartItems); ?> -->

  <?php foreach ($cartItems as $item): ?>
    <article>
      <p>id : <?= $item['id'] ?></p>
      <h3>name : <?= $item['name'] ?></h3>
      <div>
        <p>price : <?= $item['price'] ?></p>
        <p>category : <?= $item['category'] ?></p>
        <p>id_item_cart : <?= $item['id_item_cart'] ?></p>
        <p>quantity : <?= $item['quantity'] ?></p>
        <p>user_id : <?= $item['user_id'] ?></p>
      </div>
      <form action="">
        <input type="submit" value="+">
        <input type="submit" value="-">
      </form>

    </article>
  <?php endforeach; ?>
</section>