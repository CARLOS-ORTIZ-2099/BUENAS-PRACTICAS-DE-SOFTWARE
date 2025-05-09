<form action="<?= isset($edit) ? '' : '/crear' ?>" method="POST">
  <?php if (isset($success['task'])): ?>
    <h2><?= $success['task'] ?></h2>
  <?php endif; ?>
  <label for="title">type your title</label>
  <input
    type="text"
    placeholder="title"
    id="title"
    name="title"
    value="<?= $task['title'] ?? '' ?>">
  <?php if (isset($errors['title'])) : ?>
    <p><?= $errors['title'] ?></p>
  <?php endif; ?>

  <label for=" description">type your description </label>
  <textarea name="description" id="description"><?= $task['description'] ?? '' ?></textarea>
  <?php if (isset($errors['description'])) : ?>
    <p><?= $errors['description'] ?></p>
  <?php endif; ?>


  <label for="category">choose your category</label>
  <select name="category" id="category">
    <option value="">---</option>
    <option value="deporte"
      <?php if ($task['category']  === 'deporte'): ?>
      selected
      <?php endif; ?>>deporte</option>

    <option value="estudios"
      <?php if ($task['category'] === 'estudios'): ?>
      selected
      <?php endif; ?>>estudios</option>
    >estudios</option>

    <option value="trabajo"
      <?php if ($task['category']  === 'trabajo'): ?>
      selected
      <?php endif; ?>>trabajo</option>
    >trabajo</option>

    <option value="ocio"
      <?php if ($task['category']  === 'ocio'): ?>
      selected
      <?php endif; ?>>ocio</option>
    >ocio</option>
  </select>
  <?php if (isset($errors['category'])) : ?>
    <p><?= $errors['category'] ?></p>
  <?php endif; ?>

  <?php if (isset($edit)): ?>
    <input type="hidden" value="<?= $task['id'] ?>" name="id">
  <?php endif; ?>

  <input type="submit" value="<?= isset($edit) ? 'editar' : 'crear' ?>">
</form>