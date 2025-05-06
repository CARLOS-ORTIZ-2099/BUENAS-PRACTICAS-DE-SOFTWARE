<!-- 
## 📧 3. Notificador de Mensajes

Descripción: Una aplicación que envía notificaciones por correo electrónico y SMS.

Principios SOLID aplicados:

- ISP (Segregación de Interfaces): Crear interfaces específicas para cada tipo de notificación.

- DIP (Inversión de Dependencias): Las clases de alto nivel dependen de abstracciones, no de implementaciones concretas.
-->


<?php
require_once  "../includes/app.php";
require_once "./Routes.php";
require_once "./controllers/NotificationController.php";

$newRoute = new Routes();

$newRoute->get('/', [NotificationController::class, 'initController']);
$newRoute->post('/', [NotificationController::class, 'initController']);





$newRoute->execute();
