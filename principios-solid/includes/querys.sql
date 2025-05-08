-- gestor de tareas
CREATE TABLE IF NOT EXISTS task (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  state BOOLEAN,
  title VARCHAR(30),
  description VARCHAR(250),
  category VARCHAR(20)

)


INSERT INTO task (state, title, description, category) 
VALUES() 


ALTER TABLE task ADD COLUMN priority VARCHAR(60);


-- inventario de productos


CREATE TABLE IF NOT EXISTS products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60),
  price FLOAT(5,2),
  pais VARCHAR(60),
  quantity INT UNSIGNED,
  category VARCHAR(30),
  applyDelivery TINYINT
);


-- notificaciones
CREATE TABLE IF NOT EXISTS notificaciones (
  id INT unsigned AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60),
  valorTipoNotificacion VARCHAR(30),
  tipoNotificacion VARCHAR(60)
);

DROP TABLE IF EXISTS notificaciones;
TRUNCATE TABLE notificaciones;


-- carrito de compras
CREATE TABLE IF NOT EXISTS users (
  id INT unsigned AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60),
  email VARCHAR(60) UNIQUE NOT NULL,
  password VARCHAR(100)
);

DROP TABLE IF EXISTS users;
TRUNCATE TABLE users;

CREATE TABLE IF NOT EXISTS items (
   id INT unsigned AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(60),
   price DECIMAL(10,2),
   category VARCHAR(60)
);

DROP TABLE IF EXISTS items;
TRUNCATE TABLE items;


CREATE TABLE IF NOT EXISTS cart_items (
  id INT unsigned AUTO_INCREMENT PRIMARY KEY,
  user_id INT unsigned,
  item_id INT unsigned,
  quantity INT unsigned DEFAULT 1,
  CONSTRAINT itemId_fk FOREIGN KEY (item_id) REFERENCES items(id)
  ON DELETE CASCADE,
  CONSTRAINT userId_fk FOREIGN KEY (user_id) REFERENCES users(id)
  ON DELETE CASCADE
);

DROP TABLE IF EXISTS cart_items;
TRUNCATE TABLE cart_items;

INSERT INTO items (name, price, category) 
VALUES ('iphone 1', 1000.50, 'tecnologia'),
('silla', 500, 'hogar'),
('zapatillas', 60, 'calzado');

