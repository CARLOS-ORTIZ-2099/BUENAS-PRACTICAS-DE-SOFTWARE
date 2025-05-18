<section>
  <h1>pagina inicio</h1>
  <?php if (isset($_SESSION['error'])): ?>
    <h3><?= $_SESSION['error'] ?></h3>
  <?php endif; ?>
  <?php foreach ($books as $book): ?>
    <article>

      <h2>title :<?= $book['title'] ?></h2>
      <p>id libro : <?= $book['id'] ?> </p>
      <p>genre :<?= $book['genre'] ?></p>
      <p>publication : <?= $book['publication'] ?></p>
      <p>author_id : <?= $book['author_id'] ?></p>
      <p>availables : <?= $book['availables'] ?></p>
      <form action="/loan" method="POST">
        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
        <input type="submit" value="rentar">
      </form>
    </article>
  <?php endforeach; ?>

</section>