<section>
  <?php if (count($products) < 1): ?>
    <h2>aún no hay tareas</h2>
  <?php else : ?>
    <h2>productos</h2>
    <?php foreach ($products as $product): ?>
      <!-- <?php debuguear($product) ?> -->
      <article>
        <h2><?= $product->getProperty('name') ?></h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem </p>
        <p>precio : <?= $product->getProperty('price') ?></p>
        <p>precio : <?= $product->getProperty('category') ?></p>

        <a href="/product?id=<?= $product->getProperty('id') ?>">ver mas</a>
      </article>
    <?php endforeach; ?>
  <?php endif; ?>



</section>