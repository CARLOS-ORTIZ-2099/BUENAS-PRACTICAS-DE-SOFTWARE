<section>
  <!-- <?php debuguear($product); ?> -->
  <article>
    <h2><?= $product->getProperty('name') ?></h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem </p>
    <div>
      <p>precio : <?= $product->getProperty('price') ?></p>
      <p>continente : <?= $product->getProperty('continent') ?></p>
      <p>cantidad : <?= $product->getProperty('quantity') ?></p>
      <p>categoria : <?= $product->getProperty('category') ?></p>
      <p>aplica delivery : <?= $product->getProperty('applyDelivery') >= 1 ? 'SI' : 'NO' ?></p>
    </div>
    <a href="/editar?id=<?= $product->getProperty('id') ?>">editar producto</a>
    <a href="/eliminar?id=<?= $product->getProperty('id') ?>">eliminar producto</a>
  </article>
</section>