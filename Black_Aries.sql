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

-- Nếu ai đã chạy hết tất cả database rồi thì chạy thêm lệnh này nữa, chạy lần lượt tránh lỗi.
ALTER TABLE Products
    MODIFY description TEXT;

UPDATE Products
SET description = 'Modern dining table with a sleek design, crafted from high-quality wood, offering durability and elegance for any dining space. The table features a spacious surface, allowing for comfortable dining experiences with family and friends. Its minimalist aesthetic blends seamlessly with modern interiors, while the sturdy legs provide stability and long-lasting support.'
WHERE product_id = 1;

UPDATE Products
SET description = 'Comfortable corner sofa with plush cushions and a sturdy frame, providing ample seating space for family and guests. This sofa offers a contemporary design with soft fabric upholstery, making it a cozy spot for relaxation. The L-shaped configuration is perfect for maximizing seating in small living rooms, and its durable build ensures longevity for years to come.'
WHERE product_id = 2;

UPDATE Products
SET description = 'Ergonomic office chair designed for maximum comfort and support, featuring adjustable height, lumbar support, and breathable mesh material. The chair is equipped with 360-degree swivel functionality, smooth-rolling casters, and a recline feature to suit different work positions. Its sleek, modern look makes it a perfect fit for any home office or workspace.'
WHERE product_id = 3;

UPDATE Products
SET description = 'Stylish queen-size bed with a modern headboard, crafted with high-quality materials to ensure a comfortable and restful night’s sleep. The bed frame is designed to support various mattress types, providing versatility for different preferences. Its sophisticated design enhances the bedroom’s decor, while the sturdy construction guarantees lasting durability.'
WHERE product_id = 4;

UPDATE Products
SET description = 'LED desk lamp with adjustable brightness and a flexible neck, perfect for focused lighting while studying or working. The lamp’s energy-efficient LED bulbs provide bright, long-lasting illumination. It features a touch-sensitive control panel for easy adjustments and a modern design that complements any workspace or study area.'
WHERE product_id = 5;




