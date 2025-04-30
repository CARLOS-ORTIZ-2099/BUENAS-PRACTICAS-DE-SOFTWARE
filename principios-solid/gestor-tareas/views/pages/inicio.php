<section class="container">
  <h2 class="title-main">visualiza tus tareas aqui</h2>

  <div class="container-tasks">
    <?php if ($tasks): ?>
      <?php foreach ($tasks as $task): ?>
        <!-- esto es posible gracias a que $task es una instancia que creamos
       dinamicamente 
    -->
        <article class="task">
          <div>
            <h2>titulo:<?= $task->getProperty('title') ?></h2>
            <p>descripcion:<?= $task->getProperty('description') ?></p>
            <div>
              <span>estado :<?= $task->getProperty('state') == 0 ? 'pendiente' : 'completo' ?> </span>
              <span>categoria : <?= $task->getProperty('category') ?></span>

            </div>
          </div>
          <a href="<?= '/task?id=' . $task->getProperty('id') ?>">see more about task</a>
        </article>

      <?php endforeach; ?>

    <?php else : ?>
      <h3><?= $info['task'] ?></h3>
    <?php endif ?>



  </div>

</section>