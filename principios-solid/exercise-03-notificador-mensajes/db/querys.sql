CREATE TABLE IF NOT EXISTS notificaciones (
  id INT unsigned AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60),
  valorTipoNotificacion VARCHAR(30),
  tipoNotificacion VARCHAR(60)
);


DROP TABLE IF EXISTS notificaciones;
TRUNCATE TABLE notificaciones;