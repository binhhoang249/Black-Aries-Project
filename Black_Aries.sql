CREATE DATABASE Black_Aries;

USE Black_Aries;
CREATE TABLE Categories (
      category_id INT PRIMARY KEY AUTO_INCREMENT,
      category_name VARCHAR(50) NOT NULL
);

CREATE TABLE Products (
      product_id INT PRIMARY KEY AUTO_INCREMENT,
      product_name VARCHAR(50) NOT NULL,
      description VARCHAR(235),
      time_stamp DATE,
      category_id INT,
      status INT,
      discount FLOAT,
      popular INT DEFAULT 0,
      FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE Color (
     color_id INT PRIMARY KEY AUTO_INCREMENT,
     color_name VARCHAR(50) NOT NULL,
     color_link VARCHAR(135)
);


CREATE TABLE Product_color (
    product_color_id INT PRIMARY KEY AUTO_INCREMENT,
    quantity INT NOT NULL,
    image VARCHAR(135),
    price INT,
    defaultal INT,
    product_id INT,
    color_id INT,
    FOREIGN KEY (product_id) REFERENCES Products(product_id),
    FOREIGN KEY (color_id) REFERENCES Color(color_id)
);

INSERT INTO Categories (category_name) VALUES
   ('Table'),
   ('Sofa'),
   ('Chair'),
   ('Bed'),
   ('Lamp');

INSERT INTO Products (product_name, description, time_stamp, category_id, status, discount, popular) VALUES
  ('Dining Table', 'Modern dining table', '2024-12-10', 1, 1, 10.5, 1),
  ('Corner Sofa', 'Comfortable corner sofa', '2024-12-10', 2, 1, 15.0, 0),
  ('Office Chair', 'Ergonomic office chair', '2024-12-10', 3, 1, 8.0, 1),
  ('Queen Bed', 'Stylish queen-size bed', '2024-12-10', 4, 1, 12.0, 0),
  ('Desk Lamp', 'LED desk lamp', '2024-12-10', 5, 1, 5.0, 1);

INSERT INTO Color (color_name, color_link) VALUES
   ('Red', '#FF0000'),
   ('Blue', '#0000FF'),
   ('Green', '#008000'),
   ('Black', '#000000'),
   ('White', '#FFFFFF');

INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
    (10, 'dining_table_red.png', 250, 1, 1, 1),
    (5, 'corner_sofa_blue.png', 800, 1, 2, 2),
    (15, 'office_chair_green.png', 150, 1, 3, 3),
    (8, 'queen_bed_black.png', 500, 1, 4, 4),
    (20, 'desk_lamp_white.png', 50, 1, 5, 5);




