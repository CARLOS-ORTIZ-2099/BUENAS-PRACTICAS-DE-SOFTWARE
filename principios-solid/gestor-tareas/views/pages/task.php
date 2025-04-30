<div>
  <h2>titulo:<?= $task->getProperty('title') ?></h2>
  <p>descripcion:<?= $task->getProperty('description') ?></p>
  <div>
    <p>estado :<?= $task->getProperty('state') == 0 ? 'pendiente' : 'completo' ?> </p>
    <p>categoria : <?= $task->getProperty('category') ?></p>

  </div>

  <a href="/editar?id=<?= $task->getProperty('id') ?>">editar tarea</a>
  <form action="/eliminar" method="POST">
    <input type="hidden" value="<?= $task->getProperty('id') ?>" name="id">
    <input type="submit" value="eliminar tarea">
  </form>

</div>