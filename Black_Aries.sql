CREATE DATABASE Black_Aries;
USE Black_Aries; 
CREATE TABLE Categories (
      category_id INT PRIMARY KEY AUTO_INCREMENT,
      category_name VARCHAR(50) NOT NULL
);
CREATE TABLE Adress (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    name_province VARCHAR(50),
    name_district VARCHAR(50),
    name_commune VARCHAR(50),
    note VARCHAR(50)
);

CREATE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(50),
    date_of_birth DATE,
    phone VARCHAR(10),
    email VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(100),
    avatar VARCHAR(135),
    role INT,
    address_id INT,
    FOREIGN KEY (address_id) REFERENCES Adress(address_id)
);

CREATE TABLE Products (
      product_id INT PRIMARY KEY AUTO_INCREMENT,
      product_name VARCHAR(50) NOT NULL,
      description Text,
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
   ('Chair'),
   ('Lamp'),
   ('Sofa'),
   ('Bed');

  INSERT INTO Products (product_name, description, time_stamp, category_id, status, discount, popular)
VALUES
  ('Vortex Dining Table', 'This contemporary dining table is designed with clean, sharp lines and a minimalist aesthetic, making it a perfect centerpiece for modern dining rooms. Its sleek design offers versatility, seamlessly blending into both formal and casual settings, with a durable surface ideal for daily use or elegant dinner parties.', '2024-12-10', 1, 1, 10.5, 0),
  ('Multiplo Square Cafe Table ', 'Embrace rustic charm with the Multiplo Square Cafe Table. Its sturdy square base and solid wood finish bring a warm, inviting atmosphere to cafes or home kitchens. Perfect for small gatherings, its timeless design will complement any rustic or industrial-themed space while providing functional seating.', '2024-12-4', 1, 1, 11.0, 0),
  ('GAX XW Table', 'The GAX XW Table combines industrial aesthetics with modern sophistication, offering a sturdy metal frame and a sleek wood tabletop. Perfect for urban lofts or contemporary dining spaces, this table is both functional and stylish, designed to withstand the rigors of daily use while making a bold statement in any room.', '2024-12-8', 1, 1, 12.0, 0),
  ('Rows Diagonal Dining Table ', 'This modern dining table is an ideal choice for those seeking a touch of elegance and sophistication. Featuring a diagonal frame and a transparent glass top, it allows the beauty of your space to shine through. Its minimalistic yet striking design makes it a perfect addition to any contemporary dining room.', '2024-12-9', 1, 1, 13.0, 0),
  ('Orbital Curved Extendable  ', 'With its minimalist design and innovative curved structure, the Orbital Curved Dining Table is a modern marvel. The extendable feature provides flexibility for larger gatherings, while its smooth finish and elegant lines make it a stylish focal point in any home or office dining area.', '2024-8-6', 1, 1, 14.0, 1),
  ('Levante Extendable ', 'The Levante Dining Table combines rustic farmhouse charm with modern functionality. Its extendable design allows for easy accommodation of larger groups, making it ideal for family meals or dinner parties. Crafted with high-quality wood and finished with a natural tone, it offers both durability and beauty.', '2024-5-2', 1, 1, 15.0, 1),
  ('Prego Dining Table', 'This classic wooden dining table brings timeless appeal to any home. Its traditional design features solid wood construction, with a smooth finish that adds warmth and elegance. Perfect for families, this table offers ample space for meals while maintaining a sophisticated, rustic look.', '2024-10-10', 1, 1, 16.0, 1),
  ('Tony Cafe Table', 'Designed with a vintage flair, the Tony Cafe Table features a round wooden top and a sturdy base, making it a perfect addition to cafes, bistros, or home dining areas. Its simple yet charming design captures the essence of old-school cafe culture while providing reliable support for your dining needs', '2024-9-10', 1, 1, 17.0, 1),
  ('Carlina Round Dining ', 'The Carlina Round Dining Table brings a fresh Scandinavian touch to your dining space. Made from natural wood and featuring a clean, round design, this table fits perfectly in homes that embrace minimalism and simplicity. Its design emphasizes functionality and comfort, making it a versatile addition to any contemporary dining room.', '2024-12-5', 1, 1, 18.0, 0),
  ('Explorer Round Dining Table', 'The Explorer Round Dining Table features a transitional style that combines traditional craftsmanship with modern design elements. Its smooth surface and sturdy base make it a versatile option for dining rooms or kitchens, perfect for both intimate family dinners and larger social gatherings.', '2024-8-5', 1, 1, 19.0, 0),

  ('Lollygagger Lounge Chair', 'Level up your patio space with the Lollygagger Lounge Chair from Loll Designs. This modern Adirondack chair is a fresh take on a classic where you’ll find an integrated bottle opener underneath the arm to ensure maximum relaxation as you sit back, relax and watch the world go by. Select the optional Sunbrella fabric cushion for the ultimate leisure experience with no fear of the elements.', '2024-12-8', 2, 1, 8.0, 0),
  ('Amelia Club Chair', 'Offering an air of simple elegance, the Amelia Club Chair from Azzurro Living is a functional blend of comfort and style. Characterized by its aluminum frame and hand-knotted sand rope detailing, this club chair is suitable for use both indoors and out, and is topped with Solvita Performance covered, high-density foam cushions, ready to stand up to the elements. This update on a traditional club chair frame works well in a variety of settings whether part of a large seating ensemble poolside or paired together with a teak end table on a screened-in porch. ', '2024-12-3', 2, 1, 8.5, 0),
  ('Montauk Club Chair', 'Featuring a mesh back for breathability and a sleek frame, the Montauk Club Chair is a perfect blend of comfort and modern style. Ideal for both work and relaxation, this chair provides support for long hours while adding a touch of sophistication to any office or home setting.', '2024-12-3', 2, 1, 9.0, 0),
  ('Moments Outdoor Lounge Chair', 'Elevate your outdoor space with the Moments Outdoor Lounge Chair. Crafted from premium leather and designed for ultimate comfort, this chair combines luxury with practicality. Whether you place it poolside or on your patio, it offers a stylish and durable seating option for long hours of relaxation.', '2024-12-14', 2, 1, 9.5, 0),
  ('Amelia Hanging Chair', 'The Amelia Hanging Chair is perfect for those seeking a unique and fun seating option. Whether used in a living room, patio, or gaming space, its suspended design offers an inviting space to relax and unwind. Made from high-quality materials, this chair combines comfort with a modern aesthetic.', '2024-8-10', 2, 1, 10.0, 1),
  ('Kiawah Hanging Chair', ' A swivel office chair with a twist, the Kiawah Hanging Chair offers both style and functionality. Perfect for small spaces or casual settings, it provides comfortable seating with the added benefit of swivel movement, making it a versatile choice for workspaces or leisure areas.', '2024-1-4', 2, 1, 10.5, 1),
  ('Proust Lounge Chair', 'The Monet Outdoor Highback Chair combines lounge-style comfort with modern design. Its high back offers excellent support, making it ideal for long hours of relaxation or reading. Whether used indoors or outdoors, it provides an elegant and comfortable seating experience.', '2024-7-10', 2, 1, 11.0, 1),
  ('Monet  Highback Chair', ' The Monet Outdoor Highback Chair combines lounge-style comfort with modern design. Its high back offers excellent support, making it ideal for long hours of relaxation or reading. Whether used indoors or outdoors, it provides an elegant and comfortable seating experience.', '2024-7-9', 2, 1, 11.5, 1),
  ('BM5568 Deck Chair', 'The BM5568 Deck Chair offers height adjustability for personalized comfort. Perfect for both home and office settings, this chair provides ergonomic support while maintaining a sleek, modern look. Whether used for work or relaxation, it ensures comfort during long hours of use.', '2024-6-19', 2, 1, 12.0, 0),
  ('Wailea  Swivel Chair', 'Compact yet stylish, the Wailea Outdoor Swivel Chair is perfect for smaller spaces. Designed for both comfort and practicality, this chair features a swivel base and modern design, making it an ideal addition to any outdoor setting or contemporary office.', '2024-6-10', 2, 1, 12.5, 0),

  ('Outrack LED Track Light', 'The Outrack Garota Outdoor LED Track Light is a versatile lighting option for any space. Its flexible arm allows you to adjust the light angle, making it perfect for illuminating outdoor patios, decks, or garden areas. A reliable and stylish addition to your outdoor lighting collection.', '2024-12-11', 3, 1, 5.0, 0),
  ('Ventura Pendant Light', 'The Ventura Outdoor Pendant Light offers touch-sensitive controls and sleek design for modern outdoor spaces. Ideal for patios, decks, or balconies, it provides ambient lighting while adding a contemporary touch to your outdoor decor.', '2024-12-16', 3, 1, 5.5, 0),
  ('Rochefort  Pendant Light', 'This wireless charging LED desk lamp combines modern functionality with sleek design. The Rochefort Outdoor Pendant Light is perfect for illuminating workspaces or outdoor areas, offering both style and convenience with its built-in wireless charging feature.', '2024-12-12', 3, 1, 6.0, 0),
  ('Outrack Nans Perris Light', 'This outdoor LED track light features a modern design and energy-efficient lighting. The adjustable light direction makes it perfect for illuminating outdoor areas such as gardens, walkways, or decorative outdoor spaces.', '2024-12-25', 3, 1, 6.5, 0),
  ('Outrack Nans Cone Outdoor LED Track Light', 'This outdoor LED track light with a conical shape provides strong and energy-efficient illumination. Its design is ideal for outdoor spaces, highlighting gardens, pathways, or decorative areas in an elegant and functional way.', '2024-6-10', 3, 1, 7.0, 1),
  ('Nucli Outdoor Pendant Light', 'The Nucli outdoor pendant light offers a simple and elegant design, perfect for hanging in outdoor areas such as gardens or porches. Equipped with LED technology, it provides soft yet efficient lighting for a comfortable outdoor experience.', '2024-9-10', 3, 1, 7.5, 1),
  (' LED Hanging Lamp', 'The Amelie portable outdoor hanging lamp is versatile and ideal for outdoor events or spaces that require easy mobility. It uses LED bulbs to ensure long-lasting, energy-efficient lighting, creating a warm and inviting atmosphere wherever it’s placed.', '2024-2-10', 3, 1, 8.0, 1),
  (' Hanging Light', ' The Alford Place outdoor hanging light combines functionality with decorative beauty. Its vibrant colors and durable construction make it perfect for outdoor spaces, adding a lively and cozy touch to any setting.', '2024-9-11', 3, 1, 8.5, 1),
  ('LED Aurora Dual Zone ', 'The LED Aurora flush mount light features a sleek, seamless design with dual lighting zones, allowing you to adjust the brightness for different areas. It’s suitable for both indoor and outdoor use, providing even and energy-efficient lighting for a variety of spaces.', '2024-8-10', 3, 1, 9.0, 0),
  ('LED Round Flush Mount', ' The Pi LED round flush mount light brings a minimalist, modern look to any space. Its simple design makes it perfect for installation in various areas, including living rooms, dining rooms, or hallways, while offering energy-saving and long-lasting LED illumination.', '2024-2-10', 3, 1, 9.5, 0),

  ('Asker 3 Seater Sofa ', 'The Asker 3-Seater Sofa with Ottoman offers a luxurious and comfortable seating experience, designed with a recliner mechanism for ultimate relaxation. This sofa set includes a matching ottoman for added convenience, making it perfect for living rooms and lounges.', '2024-12-24', 4, 1, 20.0, 0),
  ('Asker 3 Seater Sofa', 'The Asker 3-Seater Sofa is a sectional luxury sofa designed to provide a cozy and stylish seating solution for your living space. With high-quality upholstery and a modern design, it offers both comfort and elegance for any home.', '2024-12-28', 4, 1, 21.0, 0),
  ('Ridge Outdoor Sofa', 'The Ridge Outdoor Sofa combines comfort with durability, featuring a sleeper design for versatile seating options. Perfect for outdoor spaces, it offers a comfortable lounging experience while also doubling as a bed for added convenience.', '2024-12-22', 4, 1, 22.0, 0),
  ('Salto Sofa', 'The Salto Sofa boasts a classic design that blends timeless style with luxurious comfort. Its sleek lines and soft cushions make it the ideal centerpiece for any living room or seating area, offering both elegance and relaxation.', '2024-12-15', 4, 1, 23.0, 0),
  ('PAROS 3-Seater Sofa', 'The PAROS 3-Seater Sofa is a contemporary luxury sofa designed for modern living. With its plush cushions and refined silhouette, it offers a sophisticated and comfortable seating option that complements any stylish interior.', '2024-6-10', 4, 1, 24.0, 1),
  ('Jack Outdoor  Sofa', 'The Jack Outdoor 3-Seater Sofa features an L-shaped design, perfect for outdoor relaxation. Made with durable materials, it provides a comfortable seating area for gatherings while adding a modern touch to patios or garden spaces.', '2024-9-19', 4, 1, 25.0, 1),
  ('Lounge End Sofa', 'The Bonan Lounge End Sofa offers a U-shaped design, creating a spacious and comfortable lounging area. Its luxurious fabric and modern style make it a perfect addition to both contemporary and classic interiors.', '2024-1-10', 4, 1, 26.0, 1),
  ('Nisswa Sofa', 'The Nisswa Sofa features a tufted design that adds a touch of luxury and elegance to any space. With its plush cushions and stylish structure, this sofa is a perfect blend of comfort and classic aesthetics.', '2024-3-11', 4, 1, 27.0, 1),
  ('Jut Sofa', 'The Jut Sofa is a modular luxury sofa designed for ultimate flexibility. Its contemporary design allows for easy configuration, making it ideal for various room layouts and providing both comfort and style.', '2024-2-10', 4, 1, 28.0, 0),
  ('Stone Sofa', ' The Stone Sofa offers a vintage-style design that exudes charm and character. With its classic upholstery and timeless design, this sofa brings a cozy, retro feel to any living room or sitting area.', '2024-6-10', 4, 1, 29.0, 0),

  ('CLOE Upholstered Bed', 'The CLOE Upholstered Bed offers a luxurious and comfortable sleeping experience, featuring a soft, padded headboard for added support. Its queen-size frame and elegant design make it a perfect centerpiece for any bedroom.', '2024-12-2', 5, 1, 12.0, 0),
  ('Potter Bed', 'The Potter Bed features a sturdy wooden frame with a queen-size design, combining strength and style. Its clean lines and natural wood finish make it an ideal choice for those seeking a rustic yet refined look for their bedroom.', '2024-12-4', 5, 1, 13.0, 0),
  ('Sydney Bed', 'The Sydney Bed features a platform design, offering a sleek and modern aesthetic. The low-profile queen-size frame provides a minimalist look, making it a perfect fit for contemporary bedroom styles.', '2024-12-8', 5, 1, 14.0, 0),
  ('Linn Bed', 'The Linn Bed offers a storage queen-size design, providing ample space underneath for keeping your bedroom organized. Its functional yet stylish design makes it an excellent choice for those looking for both comfort and convenience.', '2024-12-5', 5, 1, 15.0, 0),
  ('Allegra Bed', 'The Allegra Bed features a canopy-style design, adding an element of elegance and romance to your bedroom. With its queen-size frame, this bed is perfect for creating a luxurious, serene sleeping environment.', '2024-4-10', 5, 1, 16.0, 1),
  (' Upholstered Bed', 'The Laurent Upholstered Bed features a sleek sleigh design with a soft, upholstered headboard. Its queen-size frame provides both comfort and style, making it a perfect addition to any elegant bedroom.', '2024-3-10', 5, 1, 17.0, 1),
  ('Moment Bed', ' The Moment Bed features a modern design with clean lines and a contemporary queen-size frame. Its minimalist aesthetic offers both comfort and sophistication, making it a perfect fit for modern bedroom decor.', '2024-6-10', 5, 1, 18.0, 1),
  ('Platform Bed', 'The Platform Bed is a traditional queen-size design with a simple yet classic structure. Its sturdy frame and clean lines offer both support and elegance, making it ideal for any traditional bedroom setting.', '2024-4-03', 5, 1, 19.0, 1),
  ('Air Bed', ' The Air Bed offers an industrial queen-size design, featuring a metal frame and modern styling. Its bold, minimalist look is perfect for adding a touch of urban style to your bedroom while providing a comfortable sleeping experience.', '2024-8-8', 5, 1, 20.0, 0),
  ('Nook Bed', 'The Nook Bed offers a contemporary queen-size design with a focus on comfort and style. Its sleek frame and modern aesthetic make it a perfect choice for those seeking a stylish and comfortable sleeping arrangement.Contemporary queen-size bed', '2024-8-3', 5, 1, 21.0, 0);


INSERT INTO Color (color_name, color_link) VALUES
   ('Red', '#FF0000'),
   ('Blue', '#0000FF'),
   ('Green', '#008000'),
   ('Black', '#000000'),
   ('White', '#FFFFFF');

    -- Vortex Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
(10, 'a1_1.jpg', 650, 0, 1, 1),  
(10, 'a1_5.jpg', 250, 0, 1, 2),  
(10, 'a1_3.jpg', 250, 0, 1, 3),  
(10, 'a1_5.jpg', 850, 0, 1, 4),  
(10, 'a1_2.jpg', 250, 1, 1, 5),  
(5, 'a2_1.jpg', 800, 0, 2, 1),  
(5, 'a2_2.jpg', 500, 0, 2, 2),  
(5, 'a2_3.jpg', 800, 0, 2, 3),  
(5, 'a2_4.jpg', 870, 0, 2, 4),  
(5, 'a2_5.jpg', 800, 1, 2, 5),
(15, 'a3_1.jpg', 150, 0, 3, 1),  
(15, 'a3_2.jpg', 190, 0, 3, 2),  
(15, 'a3_3.jpg', 150, 0, 3, 3),  
(15, 'a3_4.jpg', 150, 0, 3, 4),  
(15, 'a3_5.jpg', 150, 1, 3, 5), 
(8, 'a4_1.jpg', 500, 0, 4, 1),  
(8, 'a4_2.jpg', 560, 0, 4, 2),  
(8, 'a4_3.jpg', 580, 0, 4, 3),  
(8, 'a4_4.jpg', 500, 0, 4, 4),  
(8, 'a4_5.jpg', 100, 1, 4, 5),
(20, 'a5_1.jpg', 580, 0, 5, 1),  
(20, 'a5_2.jpg', 550, 0, 5, 2),  
(20, 'a5_3.jpg', 550, 0, 5, 3),  
(20, 'a5_4.jpg', 550, 0, 5, 4),  
(20, 'a5_5.jpg', 550, 1, 5, 5), 
(10, 'a6_1.jpg', 610, 0, 6, 1),  
(10, 'a6_2.jpg', 600, 0, 6, 2),  
(10, 'a6_3.jpg', 600, 0, 6, 3),  
(10, 'a6_4.jpg', 600, 0, 6, 4),  
(10, 'a6_5.jpg', 600, 1, 6, 5), 
(12, 'a7_1.jpg', 450, 0, 7, 1),  
(12, 'a7_2.jpg', 480, 0, 7, 2),  
(12, 'a7_3.jpg', 450, 0, 7, 3),  
(12, 'a7_4.jpg', 450, 0, 7, 4), 
(12, 'a7_5.jpg', 450, 1, 7, 5),
(18, 'a8_1.jpg', 200, 0, 8, 1),  
(18, 'a8_2.jpg', 200, 0, 8, 2),  
(18, 'a8_3.jpg', 200, 0, 8, 3),  
(18, 'a8_4.jpg', 200, 0, 8, 4),  
(18, 'a8_5.jpg', 200, 1, 8, 5), 
(14, 'a9_1.jpg', 350, 0, 9, 1),  
(14, 'a9_2.jpg', 350, 0, 9, 2),  
(14, 'a9_3.jpg', 350, 0, 9, 3),  
(14, 'a9_4.jpg', 350, 0, 9, 4),  
(14, 'a9_5.jpg', 350, 1, 9, 5), 
(16, 'a10_1.jpg', 400, 0, 10, 1),  
(16, 'a10_2.jpg', 400, 0, 10, 2),  
(16, 'a10_3.jpg', 400, 0, 10, 3),  
(16, 'a10_4.jpg', 400, 0, 10, 4),  
(16, 'a10_5.jpg', 400, 1, 10, 5),  
(15, '1a.jpg', 550, 0, 11, 1),  
(15, '1b.jpg', 560, 0, 11, 2),
(15, '1c.jpg', 570, 0, 11, 3),
(15, '1d.jpg', 580, 0, 11, 4),
(15, '1e.jpg', 590, 1, 11, 5),
(20, '2a.jpg', 600, 0, 12, 1),
(20, '2b.jpg', 610, 0, 12, 2),
(20, '2c.jpg', 620, 0, 12, 3),
(20, '2d.jpg', 630, 0, 12, 4),
(20, '2e.jpg', 640, 1, 12, 5),
(18, '3a.jpg', 650, 0, 13, 1),
(18, '3b.jpg', 660, 0, 13, 2),
(18, '3c.jpg', 670, 0, 13, 3),
(18, '3d.jpg', 680, 0, 13, 4),
(18, '3e.jpg', 690, 1, 13, 5),
(25, '4a.jpg', 700, 0, 14, 1),
(25, '4b.jpg', 710, 0, 14, 2),
(25, '4c.jpg', 720, 0, 14, 3),
(25, '4d.jpg', 730, 0, 14, 4),
(25, '4e.jpg', 740, 1, 14, 5),
(12, '5a.jpg', 750, 0, 15, 1),
(12, '5b.jpg', 760, 0, 15, 2),
(12, '5c.jpg', 770, 0, 15, 3),
(12, '5d.jpg', 780, 0, 15, 4),
(12, '5e.jpg', 790, 1, 15, 5),
(10, '6a.jpg', 800, 0, 16, 1),
(10, '6b.jpg', 810, 0, 16, 2),
(10, '6c.jpg', 820, 0, 16, 3),
(10, '6d.jpg', 830, 0, 16, 4),
(10, '6e.jpg', 840, 1, 16, 5),
(15, '7a.jpg', 850, 0, 17, 1),
(15, '7b.jpg', 860, 0, 17, 2),
(15, '7c.jpg', 870, 0, 17, 3),
(15, '7d.jpg', 880, 0, 17, 4),
(15, '7e.jpg', 890, 1, 17, 5),
(18, '8a.jpg', 900, 0, 18, 1),
(18, 'http://localhost/Black-Aries-Project/public/images/8b.jpg', 910, 0, 18, 2),
(18, 'http://localhost/Black-Aries-Project/public/images/8c.jpg', 920, 0, 18, 3),
(18, 'http://localhost/Black-Aries-Project/public/images/8d.jpg', 930, 0, 18, 4),
(18, 'http://localhost/Black-Aries-Project/public/images/8e.jpg', 940, 1, 18, 5),
(22, 'http://localhost/Black-Aries-Project/public/images/9a.jpg', 950, 0, 19, 1),
(22, 'http://localhost/Black-Aries-Project/public/images/9b.jpg', 960, 0, 19, 2),
(22, 'http://localhost/Black-Aries-Project/public/images/9c.jpg', 970, 0, 19, 3),
(22, 'http://localhost/Black-Aries-Project/public/images/9d.jpg', 980, 0, 19, 4),
(22, 'http://localhost/Black-Aries-Project/public/images/9e.jpg', 990, 1, 19, 5),
(20, 'http://localhost/Black-Aries-Project/public/images/10a.jpg', 1000, 0, 20, 1),
(20, 'http://localhost/Black-Aries-Project/public/images/10b.jpg', 1010, 0, 20, 2),
(20, 'http://localhost/Black-Aries-Project/public/images/10c.jpg', 1020, 0, 20, 3),
(20, 'http://localhost/Black-Aries-Project/public/images/10d.jpg', 1030, 0, 20, 4),
(20, 'http://localhost/Black-Aries-Project/public/images/10e.jpg', 1040, 1, 20, 5),
(15, 'Outrack_Garota_Outdoor_LED_Track_Light_red.png', 160, 0, 21, 1),
(18, 'Outrack_Garota_Outdoor_LED_Track_Light_blue.png', 210, 0, 21, 2),
(20, 'Outrack_Garota_Outdoor_LED_Track_Light_green.png', 170, 0, 21, 3),
(14, 'Outrack_Garota_Outdoor_LED_Track_Light_black.png', 180, 0, 21, 4),
(22, 'Outrack_Garota_Outdoor_LED_Track_Light_white.png', 150, 1, 21, 5),
(15, 'Ventura_Outdoor_Pendant_Light_red.png', 180, 0, 22, 1),
(18, 'Ventura_Outdoor_Pendant_Light_blue.png', 230, 0, 22, 2),
(20, 'Ventura_Outdoor_Pendant_Light_green.png', 200, 0, 22, 3),
(14, 'Ventura_Outdoor_Pendant_Light_black.png', 210, 0, 22, 4),
(22, 'Ventura_Outdoor_Pendant_Light_white.png', 190, 1, 22, 5),
(10, 'Rochefort_Outdoor_Pendant_Light_red.png', 200, 0, 23, 1),
(12, 'Rochefort_Outdoor_Pendant_Light_blue.png', 240, 0, 23, 2),
(15, 'Rochefort_Outdoor_Pendant_Light_green.png', 210, 0, 23, 3),
(18, 'Rochefort_Outdoor_Pendant_Light_black.png', 220, 0, 23, 4),
(20, 'Rochefort_Outdoor_Pendant_Light_white.png', 200, 1, 23, 5),
(15, 'Outrack_Nans_Perris_Outdoor_LED_Track_Light_red.png', 180, 0, 24, 1),
(20, 'Outrack_Nans_Perris_Outdoor_LED_Track_Light_blue.png', 230, 0, 24, 2),
(18, 'Outrack_Nans_Perris_Outdoor_LED_Track_Light_green.png', 190, 0, 24, 3),
(14, 'Outrack_Nans_Perris_Outdoor_LED_Track_Light_black.png', 200, 0, 24, 4),
(22, 'Outrack_Nans_Perris_Outdoor_LED_Track_Light_white.png', 180, 1, 24, 5),
(12, 'Outrack_Nans_Cone_Outdoor_LED_Track_Light_red.png', 190, 0, 25, 1),
(15, 'Outrack_Nans_Cone_Outdoor_LED_Track_Light_blue.png', 240, 0, 25, 2),
(18, 'Outrack_Nans_Cone_Outdoor_LED_Track_Light_green.png', 200, 0, 25, 3),
(14, 'Outrack_Nans_Cone_Outdoor_LED_Track_Light_black.png', 210, 0, 25, 4),
(22, 'Outrack_Nans_Cone_Outdoor_LED_Track_Light_white.png', 190, 1, 25, 5),
(15, 'Nucli_Outdoor_Pendant_Light_red.png', 150, 0, 26, 1),
(18, 'Nucli_Outdoor_Pendant_Light_blue.png', 180, 0, 26, 2),
(20, 'Nucli_Outdoor_Pendant_Light_green.png', 160, 0, 26, 3),
(14, 'Nucli_Outdoor_Pendant_Light_black.png', 170, 0, 26, 4),
(22, 'Nucli_Outdoor_Pendant_Light_white.png', 150, 1, 26, 5),
(10, 'Amelie_Portable_Outdoor_LED_Hanging_Lamp_red.png', 190, 0, 27, 1),
(12, 'Amelie_Portable_Outdoor_LED_Hanging_Lamp_blue.png', 220, 0, 27, 2),
(15, 'Amelie_Portable_Outdoor_LED_Hanging_Lamp_green.png', 200, 0, 27, 3),
(18, 'Amelie_Portable_Outdoor_LED_Hanging_Lamp_black.png', 210, 0, 27, 4),
(20, 'Amelie_Portable_Outdoor_LED_Hanging_Lamp_white.png', 190, 1, 27, 5),
(12, 'Alford_Place_Outdoor_Hanging_Light_red.png', 160, 0, 28, 1),
(15, 'Alford_Place_Outdoor_Hanging_Light_blue.png', 190, 0, 28, 2),
(18, 'Alford_Place_Outdoor_Hanging_Light_green.png', 170, 0, 28, 3),
(14, 'Alford_Place_Outdoor_Hanging_Light_black.png', 180, 0, 28, 4),
(20, 'Alford_Place_Outdoor_Hanging_Light_white.png', 160, 1, 28, 5),
(15, 'LED_Aurora_Dual_Zone_Flush_Mount_red.png', 170, 0, 29, 1),
(18, 'LED_Aurora_Dual_Zone_Flush_Mount_blue.png', 200, 0, 29, 2),
(20, 'LED_Aurora_Dual_Zone_Flush_Mount_green.png', 180, 0, 29, 3),
(14, 'LED_Aurora_Dual_Zone_Flush_Mount_black.png', 190, 0, 29, 4),
(22, 'LED_Aurora_Dual_Zone_Flush_Mount_white.png', 170, 1, 29, 5),
(15, 'Pi_LED_Round_Flush_Mount_red.png', 180, 0, 30, 1),
(18, 'Pi_LED_Round_Flush_Mount_blue.png', 210, 0, 30, 2),
(20, 'Pi_LED_Round_Flush_Mount_green.png', 190, 0, 30, 3),
(14, 'Pi_LED_Round_Flush_Mount_black.png', 200, 0, 30, 4),
(22, 'Pi_LED_Round_Flush_Mount_white.png', 180, 1, 30, 5),
(18, 'Asker_3_Seater_Sofa_with_Ottoman_red.png', 240, 0, 31, 1),
(20, 'Asker_3_Seater_Sofa_with_Ottoman_blue.png', 270, 0, 31, 2),
(22, 'Asker_3_Seater_Sofa_with_Ottoman_green.png', 250, 0, 31, 3),
(16, 'Asker_3_Seater_Sofa_with_Ottoman_black.png', 260, 0, 31, 4),
(24, 'Asker_3_Seater_Sofa_with_Ottoman_white.png', 240, 1, 31, 5),
(20, 'Asker_3_Seater_Sofa_red.png', 220, 0, 32, 1),
(22, 'Asker_3_Seater_Sofa_blue.png', 250, 0, 32, 2),
(24, 'Asker_3_Seater_Sofa_green.png', 230, 0, 32, 3),
(18, 'Asker_3_Seater_Sofa_black.png', 240, 0, 32, 4),
(26, 'Asker_3_Seater_Sofa_white.png', 220, 1, 32, 5),
(20, 'Ridge_Outdoor_Sofa_red.png', 320, 0, 33, 1),
(18, 'Ridge_Outdoor_Sofa_blue.png', 350, 0, 33, 2),
(22, 'Ridge_Outdoor_Sofa_green.png', 330, 0, 33, 3),
(16, 'Ridge_Outdoor_Sofa_black.png', 340, 0, 33, 4),
(24, 'Ridge_Outdoor_Sofa_white.png', 320, 1, 33, 5),
(20, 'Platform_Bed_red.png', 300, 0, 34, 1),
(25, 'Platform_Bed_blue.png', 330, 0, 34, 2),
(28, 'Platform_Bed_green.png', 310, 0, 34, 3),
(18, 'Platform_Bed_black.png', 320, 0, 34, 4),
(30, 'Platform_Bed_white.png', 300, 1, 34, 5),
(25, 'Fusion_Bed_red.png', 320, 0, 35, 1),
(20, 'Fusion_Bed_blue.png', 350, 0, 35, 2),
(18, 'Fusion_Bed_green.png', 330, 0, 35, 3),
(22, 'Fusion_Bed_black.png', 340, 0, 35, 4),
(28, 'Fusion_Bed_white.png', 320, 1, 35, 5),
(15, 'Genesis_Bed_red.png', 300, 0, 36, 1),
(18, 'Genesis_Bed_blue.png', 330, 0, 36, 2),
(22, 'Genesis_Bed_green.png', 310, 0, 36, 3),
(20, 'Genesis_Bed_black.png', 320, 0, 36, 4),
(25, 'Genesis_Bed_white.png', 300, 1, 36, 5),
(20, 'Sunrise_Bed_red.png', 310, 0, 37, 1),
(22, 'Sunrise_Bed_blue.png', 340, 0, 37, 2),
(24, 'Sunrise_Bed_green.png', 320, 0, 37, 3),
(18, 'Sunrise_Bed_black.png', 330, 0, 37, 4),
(26, 'Sunrise_Bed_white.png', 310, 1, 37, 5),
(15, 'Neptune_Bed_red.png', 300, 0, 38, 1),
(18, 'Neptune_Bed_blue.png', 320, 0, 38, 2),
(20, 'Neptune_Bed_green.png', 300, 0, 38, 3),
(14, 'Neptune_Bed_black.png', 310, 0, 38, 4),
(22, 'Neptune_Bed_white.png', 300, 1, 38, 5),
(25, 'Meridian_Bed_red.png', 330, 0, 39, 1),
(28, 'Meridian_Bed_blue.png', 360, 0, 39, 2),
(26, 'Meridian_Bed_green.png', 340, 0, 39, 3),
(18, 'Meridian_Bed_black.png', 350, 0, 39, 4),
(35, 'Meridian_Bed_white.png', 330, 1, 39, 5),
(20, 'Vanguard_Bed_red.png', 310, 0, 40, 1),
(22, 'Vanguard_Bed_blue.png', 340, 0, 40, 2),
(24, 'Vanguard_Bed_green.png', 320, 0, 40, 3),
(18, 'Vanguard_Bed_black.png', 330, 0, 40, 4),
(26, 'Vanguard_Bed_white.png', 310, 1, 40, 5),
(20, 'CLOE_Upholstered_Bed_red.png', 320, 0, 41, 1),
(22, 'CLOE_Upholstered_Bed_blue.png', 350, 0, 41, 2),
(24, 'CLOE_Upholstered_Bed_green.png', 330, 0, 41, 3),
(18, 'CLOE_Upholstered_Bed_black.png', 340, 0, 41, 4),
(26, 'CLOE_Upholstered_Bed_white.png', 320, 1, 41, 5),
(18, 'Potter_Bed_red.png', 330, 0, 42, 1),
(22, 'Potter_Bed_blue.png', 360, 0, 42, 2),
(24, 'Potter_Bed_green.png', 340, 0, 42, 3),
(16, 'Potter_Bed_black.png', 350, 0, 42, 4),
(26, 'Potter_Bed_white.png', 330, 1, 42, 5),
(20, 'Sydney_Bed_red.png', 310, 0, 43, 1),
(22, 'Sydney_Bed_blue.png', 340, 0, 43, 2),
(24, 'Sydney_Bed_green.png', 320, 0, 43, 3),
(18, 'Sydney_Bed_black.png', 330, 0, 43, 4),
(26, 'Sydney_Bed_white.png', 310, 1, 43, 5),
(15, 'Linn_Bed_red.png', 300, 0, 44, 1),
(18, 'Linn_Bed_blue.png', 330, 0, 44, 2),
(20, 'Linn_Bed_green.png', 310, 0, 44, 3),
(14, 'Linn_Bed_black.png', 320, 0, 44, 4),
(22, 'Linn_Bed_white.png', 300, 1, 44, 5),
(20, 'Allegra_Bed_red.png', 280, 0, 45, 1),
(22, 'Allegra_Bed_blue.png', 310, 0, 45, 2),
(24, 'Allegra_Bed_green.png', 290, 0, 45, 3),
(18, 'Allegra_Bed_black.png', 300, 0, 45, 4),
(26, 'Allegra_Bed_white.png', 280, 1, 45, 5),
(25, 'Laurent_Upholstered_Bed_red.png', 350, 0, 46, 1),
(30, 'Laurent_Upholstered_Bed_blue.png', 380, 0, 46, 2),
(28, 'Laurent_Upholstered_Bed_green.png', 360, 0, 46, 3),
(20, 'Laurent_Upholstered_Bed_black.png', 370, 0, 46, 4),
(35, 'Laurent_Upholstered_Bed_white.png', 350, 1, 46, 5),
(20, 'Moment_Bed_red.png', 330, 0, 47, 1),
(22, 'Moment_Bed_blue.png', 360, 0, 47, 2),
(24, 'Moment_Bed_green.png', 340, 0, 47, 3),
(18, 'Moment_Bed_black.png', 350, 0, 47, 4),
(26, 'Moment_Bed_white.png', 330, 1, 47, 5),
(15, 'Platform_Bed_red.png', 320, 0, 48, 1),
(18, 'Platform_Bed_blue.png', 350, 0, 48, 2),
(20, 'Platform_Bed_green.png', 330, 0, 48, 3),
(14, 'Platform_Bed_black.png', 340, 0, 48, 4),
(22, 'Platform_Bed_white.png', 320, 1, 48, 5),
(25, 'Air_Bed_red.png', 340, 0, 49, 1),
(30, 'Air_Bed_blue.png', 370, 0, 49, 2),
(28, 'Air_Bed_green.png', 350, 0, 49, 3),
(20, 'Air_Bed_black.png', 360, 0, 49, 4),
(35, 'Air_Bed_white.png', 340, 1, 49, 5),
(18, 'Nook_Bed_red.png', 310, 0, 50, 1),
(22, 'Nook_Bed_blue.png', 340, 0, 50, 2),
(24, 'Nook_Bed_green.png', 320, 0, 50, 3),
(16, 'Nook_Bed_black.png', 330, 0, 50, 4),
(26, 'Nook_Bed_white.png', 310, 1, 50, 5);



-- Cái này là cái mới nhất cho nên sẽ chạy cuối cùng
CREATE TABLE Bussiness (
   Bussiness_id INT PRIMARY KEY DEFAULT 1,
   bussiness_name VARCHAR(50) NOT NULL,
   description TEXT,
   address VARCHAR(255),
   contact_number VARCHAR(15),
   email VARCHAR(100),
   logo VARCHAR(135),
   image VARCHAR(135));

INSERT INTO Bussiness (bussiness_name, description, address, contact_number, email, logo, image)
VALUES
    ('Black Aries',
     'Black Aries is a premium furniture company specializing in high-quality, modern, and stylish furniture pieces for homes and offices. We offer a wide range of products including sofas, tables, chairs, and storage solutions, all designed for durability and aesthetics. Our expert design team ensures that each product aligns with the latest design trends and meets the highest standards of craftsmanship. We take pride in our commitment to customer satisfaction and creating spaces that are both functional and beautiful.',
     '123 Main Street, City Center, Hometown, Country',
     '+1234567890',
     'contact@blackaries.com',
     'logo_black_aries.png',
     'image_black_aries.png');