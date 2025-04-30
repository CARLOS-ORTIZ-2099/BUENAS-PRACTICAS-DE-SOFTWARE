CREATE TABLE IF NOT EXISTS task (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  state BOOLEAN,
  title VARCHAR(30),
  description VARCHAR(250),
  category VARCHAR(20)

)


INSERT INTO task (state, title, description, category) 
VALUES() 