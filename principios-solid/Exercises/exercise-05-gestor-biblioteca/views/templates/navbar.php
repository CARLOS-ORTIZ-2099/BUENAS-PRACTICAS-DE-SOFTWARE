<nav class="nav">

  <a href="/">incio</a>

  <?php if (isset($_SESSION['user'])): ?>
    <a href="/logout">cerrar session</a>
    <a href="">hola <?= $_SESSION['user']['name'] ?></a>
  <?php else : ?>
    <a href="/register">registrate</a>
  <?php endif ?>




</nav>