<section>
  <?= $message ?? '' ?>
  <h2>crea tu producto</h2>
  <!--  <?php isset($product) ? debuguear($product) : '' ?> -->
  <form action="" method="POST">

    <label for="name">nombre producto</label>
    <input type="text" id="name" name="name" value="<?= $product['name'] ?? '' ?>">
    <br>

    <label for="price">precio producto</label>
    <input type="number" id="price" name="price" value="<?= $product['price'] ?? '' ?>">
    <br>

    <?php
    $continents = ["asia", "america", "africa", "europa", "oceania"];

    ?>
    <label for="continent">continente de origen</label>
    <select name="continent" id="continent">
      <option value="">----</option>

      <?php foreach ($continents as $continent): ?>
        <option value="<?= $continent ?>"
          <?php if (isset($product) && $continent == $product['continent']): ?>
          selected
          <?php endif; ?>>
          <?= $continent ?>
        </option>
      <?php endforeach; ?>

    </select>
    <br>

    <label for="quantity">cantidad disponible</label>
    <input type="number" id="quantity" name="quantity" min="0"
      value="<?= $product['quantity'] ?? '' ?>">
    <br>

    <?php
    $categories = ["tecnologia", "ropa", "videojuegos", "calzado", "deporte", "libros"];
    ?>

    <label for="category">categoria</label>
    <select name="category" id="category">

      <option value="">----</option>
      <?php foreach ($categories as $category): ?>
        <option value="<?= $category ?>"
          <?php if (isset($product) && $category == $product['category']): ?>
          selected
          <?php endif; ?>>
          <?= $category ?>
        </option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="<?= isset($product) ? 'editar producto' : 'create product' ?>">
  </form>

</section>