<section>
  <h2>tienda de virtual</h2>
  <!--  <?php debuguear($items) ?> -->
  <?php if (count($items) > 0): ?>
    <?php foreach ($items as $item): ?>
      <article>
        <h3><?= $item->getProperty('name') ?></h3>
        <p>precio : <?= $item->getProperty('price') ?></p>
        <p>categoria : <?= $item->getProperty('category') ?></p>
        <p>id : <?= $item->getProperty('id') ?></p>
      </article>
      <form action="/addToCart" method="POST">
        <input type="hidden" name="id" value="<?= $item->getProperty('id') ?>">
        <input type="submit" value="comprar">
      </form>
    <?php endforeach; ?>
  <?php else : ?>
    <h2>aun no hay productos</h2>
  <?php endif; ?>

</section>