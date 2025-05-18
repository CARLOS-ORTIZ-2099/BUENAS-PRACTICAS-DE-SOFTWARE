<h1><?= isset($loginPage) ? 'logueate' : 'registrate' ?> aqui</h1>

<?php if (isset($message)): ?>
  <h3><?= $message ?></h3>
<?php endif; ?>

<section>
  <form action="<?= isset($loginPage) ? '/login' : '/register' ?>" method="POST" novalidate>

    <?php if (isset($loginPage)) : ?>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>

    <?php else : ?>
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required>
      <br>
      <br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <br>

      <label for="rol_id">Role:</label>
      <select name="rol_id" id="rol_id">
        <option value="">---</option>
        <option value="1">estudiante</option>
        <option value="2">profesor</option>
        <option value="3">administrador</option>
      </select>
      <br>
      <br>

    <?php endif; ?>

    <button type="submit">Enviar</button>
  </form>
  <br>

  <a href="<?= isset($loginPage) ? '/register' : '/login' ?>">
    <?= isset($loginPage) ? 'registrate' : 'logueate' ?>
  </a>
</section>