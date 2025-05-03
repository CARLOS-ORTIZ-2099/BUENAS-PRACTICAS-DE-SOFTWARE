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
