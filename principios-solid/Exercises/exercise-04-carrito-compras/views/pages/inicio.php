<section>
  <h2>tienda de virtual</h2>
  <!--  <?php debuguear($items) ?> -->
  <?php if (count($items) > 0): ?>
    <?php foreach ($items as $item): ?>
      <article>
        <h3><?= $item['name'] ?></h3>
        <p>precio : <?= $item['price'] ?></p>
        <p>categoria : <?= $item['category'] ?></p>
        <p>id : <?= $item['id'] ?></p>
      </article>
      <form action="/addToCart" method="POST">
        <input type="hidden" name="itemId" value="<?= $item['id'] ?>">
        <input type="number" name="quantity" placeholder="insert you  quantity" min="1">
        <input type="submit" value="añadir">
      </form>
    <?php endforeach; ?>
  <?php else : ?>
    <h2>aun no hay productos</h2>
  <?php endif; ?>

</section>