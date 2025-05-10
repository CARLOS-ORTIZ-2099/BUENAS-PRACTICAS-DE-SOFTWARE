<section>
  <?= $message ?>
  <h2>selecciona por que medio quieres recibir nuestra notificacion de newlester</h2>
  <form action="" method="POST" novalidate>
    <label for="name">tu nombre</label>
    <input type="text" name="nombre" id="name">
    <br>

    <label for="email">email</label>
    <input type="email" name="email" id="email">
    <br>

    <label for="sms">sms</label>
    <input type="text" name="sms" id="sms">
    <br>
    <input type="submit" value="enviar">
  </form>

</section>