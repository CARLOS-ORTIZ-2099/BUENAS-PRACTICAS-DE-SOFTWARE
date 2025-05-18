<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <main>

    <?php require_once  "./views/templates/navbar.php" ?>


    <h1>App de gestor de libros</h1>

    <?php if (isset($routeViewComplement)): ?>
      <?php require_once $routeViewComplement ?>
    <?php endif; ?>


  </main>

</body>

</html>