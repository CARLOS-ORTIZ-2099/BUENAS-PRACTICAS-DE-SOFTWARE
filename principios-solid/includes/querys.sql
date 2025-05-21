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

DROP TABLE IF EXISTS task;
TRUNCATE TABLE task;


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

INSERT INTO users (name, email, password) 
VALUES ('maria', 'maria@maria', '123456');


CREATE TABLE IF NOT EXISTS items (
   id INT unsigned AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(60),
   price DECIMAL(10,2),
   category VARCHAR(60)
);

DROP TABLE IF EXISTS items;
TRUNCATE TABLE items;


INSERT INTO items (name, price, category) 
VALUES ('iphone 1', 1000.50, 'tecnologia'),
('silla', 500, 'hogar'),
('zapatillas', 60, 'calzado');


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

INSERT INTO cart_items (item_id, user_id, quantity) 
VALUES ('2', '2', '10');


SELECT items.*, cart_items.id as id_item_cart, cart_items.quantity,
  cart_items.user_id
FROM cart_items
INNER JOIN items
ON cart_items.item_id = items.id
WHERE user_id = 2 ;


-- gestor de biblioteca

-- tabla roles

CREATE TABLE roles (
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL
);


INSERT INTO roles (name) VALUES
('estudiante'),
('profesor'),
('administrador');


DROP TABLE IF EXISTS roles;


-- tabla library_users

CREATE TABLE IF NOT EXISTS  library_users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  date_registered DATE DEFAULT CURRENT_DATE,
  rol_id INT UNSIGNED,
  FOREIGN KEY (rol_id) REFERENCES roles(id)
);

INSERT INTO library_users (name, email, rol_id) VALUES
('Juan Pérez', 'juanperez@gmail.com',1),
('Ana López', 'analopez@hotmail.com',2),
('Carlos Gómez', 'carlosgomez@yahoo.com',3),
('María Fernández', 'mariaf@gmail.com',1);


DROP TABLE IF EXISTS library_users;


-- tabla authors

CREATE TABLE IF NOT EXISTS authors (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  nacionality VARCHAR(30),
  birth_date DATE
);

INSERT INTO authors (name, nacionality, birth_date) VALUES
('Gabriel García Márquez', 'Colombiana', '1927-03-06'),
('J.K. Rowling', 'Británica', '1965-07-31'),
('George Orwell', 'Británica', '1903-06-25'),
('Isabel Allende', 'Chilena', '1942-08-02');

DROP TABLE IF EXISTS authors;


-- tabla books

CREATE TABLE  IF NOT EXISTS books (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(50) NOT NULL,
  genre VARCHAR(30),
  publication DATE,
  author_id INT UNSIGNED ,
  availables INT UNSIGNED ,
  CONSTRAINT author_fk FOREIGN KEY (author_id) REFERENCES authors (id)
  ON DELETE SET NULL
  ON UPDATE CASCADE
);


INSERT INTO books (title, genre, publication, author_id, availables) VALUES
('Cien Años de Soledad', 'Realismo Mágico', '1967-05-30', 1, 5),
('Harry Potter y la Piedra Filosofal', 'Fantasía', '1997-06-26', 2, 8),
('1984', 'Distopía', '1949-06-08', 3, 4),
('La Casa de los Espíritus', 'Realismo Mágico', '1982-09-15', 4, 3);


DROP TABLE IF EXISTS books;


-- tabla loans

CREATE TABLE IF NOT EXISTS loans (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED ,
  book_id INT UNSIGNED ,
  loan_date DATE DEFAULT CURRENT_DATE,
  return_date DATE,
  returned  TINYINT DEFAULT FALSE,
  CONSTRAINT user_fk FOREIGN KEY (user_id) REFERENCES library_users (id) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT book_fk FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO loans (user_id, book_id, return_date) VALUES
(1, 1, '2025-01-15'),
(2, 2, '2025-01-20'),
(3, 3, NULL),
(4, 4, '2025-01-25');

DROP TABLE IF EXISTS loans;






