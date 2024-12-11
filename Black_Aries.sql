CREATE DATABASE Black_Aries;
USE Black_Aries;
CREATE TABLE Categories (
      category_id INT PRIMARY KEY AUTO_INCREMENT,
      category_name VARCHAR(50) NOT NULL
);

CREATE TABLE Products (
      product_id INT PRIMARY KEY AUTO_INCREMENT,
      product_name VARCHAR(50) NOT NULL,
      description text,
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
  ('Multiplo Square Cafe Table with Square Base', 'Embrace rustic charm with the Multiplo Square Cafe Table. Its sturdy square base and solid wood finish bring a warm, inviting atmosphere to cafes or home kitchens. Perfect for small gatherings, its timeless design will complement any rustic or industrial-themed space while providing functional seating.', '2024-12-4', 1, 1, 11.0, 0),
  ('GAX XW Table', 'The GAX XW Table combines industrial aesthetics with modern sophistication, offering a sturdy metal frame and a sleek wood tabletop. Perfect for urban lofts or contemporary dining spaces, this table is both functional and stylish, designed to withstand the rigors of daily use while making a bold statement in any room.', '2024-12-8', 1, 1, 12.0, 0),
  ('Rows Diagonal Dining Table with Glass Top', 'This modern dining table is an ideal choice for those seeking a touch of elegance and sophistication. Featuring a diagonal frame and a transparent glass top, it allows the beauty of your space to shine through. Its minimalistic yet striking design makes it a perfect addition to any contemporary dining room.', '2024-12-9', 1, 1, 13.0, 0),
  ('Orbital Curved Extendable Dining Table', 'With its minimalist design and innovative curved structure, the Orbital Curved Dining Table is a modern marvel. The extendable feature provides flexibility for larger gatherings, while its smooth finish and elegant lines make it a stylish focal point in any home or office dining area.', '2024-8-6', 1, 1, 14.0, 1),
  ('Levante Extendable Dining Table', 'The Levante Dining Table combines rustic farmhouse charm with modern functionality. Its extendable design allows for easy accommodation of larger groups, making it ideal for family meals or dinner parties. Crafted with high-quality wood and finished with a natural tone, it offers both durability and beauty.', '2024-5-2', 1, 1, 15.0, 1),
  ('Prego Dining Table', 'This classic wooden dining table brings timeless appeal to any home. Its traditional design features solid wood construction, with a smooth finish that adds warmth and elegance. Perfect for families, this table offers ample space for meals while maintaining a sophisticated, rustic look.', '2024-10-10', 1, 1, 16.0, 1),
  ('Tony Cafe Table', 'Designed with a vintage flair, the Tony Cafe Table features a round wooden top and a sturdy base, making it a perfect addition to cafes, bistros, or home dining areas. Its simple yet charming design captures the essence of old-school cafe culture while providing reliable support for your dining needs', '2024-9-10', 1, 1, 17.0, 1),
  ('Carlina Round Dining TableDining Table', 'The Carlina Round Dining Table brings a fresh Scandinavian touch to your dining space. Made from natural wood and featuring a clean, round design, this table fits perfectly in homes that embrace minimalism and simplicity. Its design emphasizes functionality and comfort, making it a versatile addition to any contemporary dining room.', '2024-12-5', 1, 1, 18.0, 0),
  ('Explorer Round Dining Table', 'The Explorer Round Dining Table features a transitional style that combines traditional craftsmanship with modern design elements. Its smooth surface and sturdy base make it a versatile option for dining rooms or kitchens, perfect for both intimate family dinners and larger social gatherings.', '2024-8-5', 1, 1, 19.0, 0),

  ('Lollygagger Lounge Chair', 'Level up your patio space with the Lollygagger Lounge Chair from Loll Designs. This modern Adirondack chair is a fresh take on a classic where you’ll find an integrated bottle opener underneath the arm to ensure maximum relaxation as you sit back, relax and watch the world go by. Select the optional Sunbrella fabric cushion for the ultimate leisure experience with no fear of the elements.', '2024-12-8', 2, 1, 8.0, 0),
  ('Amelia Club Chair', 'Offering an air of simple elegance, the Amelia Club Chair from Azzurro Living is a functional blend of comfort and style. Characterized by its aluminum frame and hand-knotted sand rope detailing, this club chair is suitable for use both indoors and out, and is topped with Solvita Performance covered, high-density foam cushions, ready to stand up to the elements. This update on a traditional club chair frame works well in a variety of settings whether part of a large seating ensemble poolside or paired together with a teak end table on a screened-in porch. ', '2024-12-3', 2, 1, 8.5, 0),
  ('Montauk Club Chair', 'Featuring a mesh back for breathability and a sleek frame, the Montauk Club Chair is a perfect blend of comfort and modern style. Ideal for both work and relaxation, this chair provides support for long hours while adding a touch of sophistication to any office or home setting.', '2024-12-3', 2, 1, 9.0, 0),
  ('Moments Outdoor Lounge Chair', 'Elevate your outdoor space with the Moments Outdoor Lounge Chair. Crafted from premium leather and designed for ultimate comfort, this chair combines luxury with practicality. Whether you place it poolside or on your patio, it offers a stylish and durable seating option for long hours of relaxation.', '2024-12-14', 2, 1, 9.5, 0),
  ('Amelia Hanging Chair', 'The Amelia Hanging Chair is perfect for those seeking a unique and fun seating option. Whether used in a living room, patio, or gaming space, its suspended design offers an inviting space to relax and unwind. Made from high-quality materials, this chair combines comfort with a modern aesthetic.', '2024-8-10', 2, 1, 10.0, 1),
  ('Kiawah Hanging Chair', ' A swivel office chair with a twist, the Kiawah Hanging Chair offers both style and functionality. Perfect for small spaces or casual settings, it provides comfortable seating with the added benefit of swivel movement, making it a versatile choice for workspaces or leisure areas.', '2024-1-4', 2, 1, 10.5, 1),
  ('Proust Outdoor Lounge Chair', 'The Monet Outdoor Highback Chair combines lounge-style comfort with modern design. Its high back offers excellent support, making it ideal for long hours of relaxation or reading. Whether used indoors or outdoors, it provides an elegant and comfortable seating experience.', '2024-7-10', 2, 1, 11.0, 1),
  ('Monet Outdoor Highback Chair', ' The Monet Outdoor Highback Chair combines lounge-style comfort with modern design. Its high back offers excellent support, making it ideal for long hours of relaxation or reading. Whether used indoors or outdoors, it provides an elegant and comfortable seating experience.', '2024-7-9', 2, 1, 11.5, 1),
  ('BM5568 Deck Chair', 'The BM5568 Deck Chair offers height adjustability for personalized comfort. Perfect for both home and office settings, this chair provides ergonomic support while maintaining a sleek, modern look. Whether used for work or relaxation, it ensures comfort during long hours of use.', '2024-6-19', 2, 1, 12.0, 0),
  ('Wailea Outdoor Swivel Chair', 'Compact yet stylish, the Wailea Outdoor Swivel Chair is perfect for smaller spaces. Designed for both comfort and practicality, this chair features a swivel base and modern design, making it an ideal addition to any outdoor setting or contemporary office.', '2024-6-10', 2, 1, 12.5, 0),

  ('Outrack Garota Outdoor LED Track Light', 'The Outrack Garota Outdoor LED Track Light is a versatile lighting option for any space. Its flexible arm allows you to adjust the light angle, making it perfect for illuminating outdoor patios, decks, or garden areas. A reliable and stylish addition to your outdoor lighting collection.', '2024-12-11', 3, 1, 5.0, 0),
  ('Ventura Outdoor Pendant Light', 'The Ventura Outdoor Pendant Light offers touch-sensitive controls and sleek design for modern outdoor spaces. Ideal for patios, decks, or balconies, it provides ambient lighting while adding a contemporary touch to your outdoor decor.', '2024-12-16', 3, 1, 5.5, 0),
  ('Rochefort Outdoor Pendant Light', 'This wireless charging LED desk lamp combines modern functionality with sleek design. The Rochefort Outdoor Pendant Light is perfect for illuminating workspaces or outdoor areas, offering both style and convenience with its built-in wireless charging feature.', '2024-12-12', 3, 1, 6.0, 0),
  ('Outrack Nans Perris Outdoor LED Track Light', 'This outdoor LED track light features a modern design and energy-efficient lighting. The adjustable light direction makes it perfect for illuminating outdoor areas such as gardens, walkways, or decorative outdoor spaces.', '2024-12-25', 3, 1, 6.5, 0),
  ('Outrack Nans Cone Outdoor LED Track Light', 'This outdoor LED track light with a conical shape provides strong and energy-efficient illumination. Its design is ideal for outdoor spaces, highlighting gardens, pathways, or decorative areas in an elegant and functional way.', '2024-6-10', 3, 1, 7.0, 1),
  ('Nucli Outdoor Pendant Light', 'The Nucli outdoor pendant light offers a simple and elegant design, perfect for hanging in outdoor areas such as gardens or porches. Equipped with LED technology, it provides soft yet efficient lighting for a comfortable outdoor experience.', '2024-9-10', 3, 1, 7.5, 1),
  ('Amelie Portable Outdoor LED Hanging Lamp', 'The Amelie portable outdoor hanging lamp is versatile and ideal for outdoor events or spaces that require easy mobility. It uses LED bulbs to ensure long-lasting, energy-efficient lighting, creating a warm and inviting atmosphere wherever it’s placed.', '2024-2-10', 3, 1, 8.0, 1),
  ('Alford Place Outdoor Hanging Light', ' The Alford Place outdoor hanging light combines functionality with decorative beauty. Its vibrant colors and durable construction make it perfect for outdoor spaces, adding a lively and cozy touch to any setting.', '2024-9-11', 3, 1, 8.5, 1),
  ('LED Aurora Dual Zone Flush Mount', 'The LED Aurora flush mount light features a sleek, seamless design with dual lighting zones, allowing you to adjust the brightness for different areas. It’s suitable for both indoor and outdoor use, providing even and energy-efficient lighting for a variety of spaces.', '2024-8-10', 3, 1, 9.0, 0),
  ('Pi LED Round Flush Mount', ' The Pi LED round flush mount light brings a minimalist, modern look to any space. Its simple design makes it perfect for installation in various areas, including living rooms, dining rooms, or hallways, while offering energy-saving and long-lasting LED illumination.', '2024-2-10', 3, 1, 9.5, 0),

  ('Asker 3 Seater Sofa with Ottoman', 'The Asker 3-Seater Sofa with Ottoman offers a luxurious and comfortable seating experience, designed with a recliner mechanism for ultimate relaxation. This sofa set includes a matching ottoman for added convenience, making it perfect for living rooms and lounges.', '2024-12-24', 4, 1, 20.0, 0),
  ('Asker 3 Seater Sofa', 'The Asker 3-Seater Sofa is a sectional luxury sofa designed to provide a cozy and stylish seating solution for your living space. With high-quality upholstery and a modern design, it offers both comfort and elegance for any home.', '2024-12-28', 4, 1, 21.0, 0),
  ('Ridge Outdoor Sofa', 'The Ridge Outdoor Sofa combines comfort with durability, featuring a sleeper design for versatile seating options. Perfect for outdoor spaces, it offers a comfortable lounging experience while also doubling as a bed for added convenience.', '2024-12-22', 4, 1, 22.0, 0),
  ('Salto Sofa', 'The Salto Sofa boasts a classic design that blends timeless style with luxurious comfort. Its sleek lines and soft cushions make it the ideal centerpiece for any living room or seating area, offering both elegance and relaxation.', '2024-12-15', 4, 1, 23.0, 0),
  ('PAROS 3-Seater Sofa', 'The PAROS 3-Seater Sofa is a contemporary luxury sofa designed for modern living. With its plush cushions and refined silhouette, it offers a sophisticated and comfortable seating option that complements any stylish interior.', '2024-6-10', 4, 1, 24.0, 1),
  ('Jack Outdoor 3 Seater Sofa', 'The Jack Outdoor 3-Seater Sofa features an L-shaped design, perfect for outdoor relaxation. Made with durable materials, it provides a comfortable seating area for gatherings while adding a modern touch to patios or garden spaces.', '2024-9-19', 4, 1, 25.0, 1),
  ('Bonan Lounge End Sofa', 'The Bonan Lounge End Sofa offers a U-shaped design, creating a spacious and comfortable lounging area. Its luxurious fabric and modern style make it a perfect addition to both contemporary and classic interiors.', '2024-1-10', 4, 1, 26.0, 1),
  ('Nisswa Sofa', 'The Nisswa Sofa features a tufted design that adds a touch of luxury and elegance to any space. With its plush cushions and stylish structure, this sofa is a perfect blend of comfort and classic aesthetics.', '2024-3-11', 4, 1, 27.0, 1),
  ('Jut Sofa', 'The Jut Sofa is a modular luxury sofa designed for ultimate flexibility. Its contemporary design allows for easy configuration, making it ideal for various room layouts and providing both comfort and style.', '2024-2-10', 4, 1, 28.0, 0),
  ('Stone Sofa', ' The Stone Sofa offers a vintage-style design that exudes charm and character. With its classic upholstery and timeless design, this sofa brings a cozy, retro feel to any living room or sitting area.', '2024-6-10', 4, 1, 29.0, 0),

  ('CLOE Upholstered Bed', 'The CLOE Upholstered Bed offers a luxurious and comfortable sleeping experience, featuring a soft, padded headboard for added support. Its queen-size frame and elegant design make it a perfect centerpiece for any bedroom.', '2024-12-2', 5, 1, 12.0, 0),
  ('Potter Bed', 'The Potter Bed features a sturdy wooden frame with a queen-size design, combining strength and style. Its clean lines and natural wood finish make it an ideal choice for those seeking a rustic yet refined look for their bedroom.', '2024-12-4', 5, 1, 13.0, 0),
  ('Sydney Bed', 'The Sydney Bed features a platform design, offering a sleek and modern aesthetic. The low-profile queen-size frame provides a minimalist look, making it a perfect fit for contemporary bedroom styles.', '2024-12-8', 5, 1, 14.0, 0),
  ('Linn Bed', 'The Linn Bed offers a storage queen-size design, providing ample space underneath for keeping your bedroom organized. Its functional yet stylish design makes it an excellent choice for those looking for both comfort and convenience.', '2024-12-5', 5, 1, 15.0, 0),
  ('Allegra Bed', 'The Allegra Bed features a canopy-style design, adding an element of elegance and romance to your bedroom. With its queen-size frame, this bed is perfect for creating a luxurious, serene sleeping environment.', '2024-4-10', 5, 1, 16.0, 1),
  ('Laurent Upholstered Bed', 'The Laurent Upholstered Bed features a sleek sleigh design with a soft, upholstered headboard. Its queen-size frame provides both comfort and style, making it a perfect addition to any elegant bedroom.', '2024-3-10', 5, 1, 17.0, 1),
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
  (10, 'vortex_dining_table_red.png', 650, 0, 1, 1),  
  (10, 'vortex_dining_table_blue.png', 250, 0, 1, 2),  
  (10, 'vortex_dining_table_green.png', 250, 0, 1, 3),  
  (10, 'vortex_dining_table_black.png', 850, 0, 1, 4),  
  (10, 'vortex_dining_table_white.png', 250, 1, 1, 5);  

-- Multiplo Square Cafe Table with Square Base
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (5, 'multiplo_square_cafe_table_red.png', 800, 0, 2, 1),  
  (5, 'multiplo_square_cafe_table_blue.png', 500, 0, 2, 2),  
  (5, 'multiplo_square_cafe_table_green.png', 800, 0, 2, 3),  
  (5, 'multiplo_square_cafe_table_black.png', 870, 0, 2, 4),  
  (5, 'multiplo_square_cafe_table_white.png', 800, 1, 2, 5);  

-- GAX XW Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (15, 'gax_xw_table_red.png', 150, 0, 3, 1),  
  (15, 'gax_xw_table_blue.png', 190, 0, 3, 2),  
  (15, 'gax_xw_table_green.png', 150, 0, 3, 3),  
  (15, 'gax_xw_table_black.png', 150, 0, 3, 4),  
  (15, 'gax_xw_table_white.png', 150, 1, 3, 5);  

-- Rows Diagonal Dining Table with Glass Top
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (8, 'rows_diagonal_dining_table_red.png', 500, 0, 4, 1),  
  (8, 'rows_diagonal_dining_table_blue.png', 560, 0, 4, 2),  
  (8, 'rows_diagonal_dining_table_green.png', 580, 0, 4, 3),  
  (8, 'rows_diagonal_dining_table_black.png', 500, 0, 4, 4),  
  (8, 'rows_diagonal_dining_table_white.png', 100, 1, 4, 5);  

-- Orbital Curved Extendable Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (20, 'orbital_curved_extendable_dining_table_red.png', 580, 0, 5, 1),  
  (20, 'orbital_curved_extendable_dining_table_blue.png', 550, 0, 5, 2),  
  (20, 'orbital_curved_extendable_dining_table_green.png', 550, 0, 5, 3),  
  (20, 'orbital_curved_extendable_dining_table_black.png', 550, 0, 5, 4),  
  (20, 'orbital_curved_extendable_dining_table_white.png', 550, 1, 5, 5);  

-- Levante Extendable Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (10, 'levante_extendable_dining_table_red.png', 610, 0, 6, 1),  
  (10, 'levante_extendable_dining_table_blue.png', 600, 0, 6, 2),  
  (10, 'levante_extendable_dining_table_green.png', 600, 0, 6, 3),  
  (10, 'levante_extendable_dining_table_black.png', 600, 0, 6, 4),  
  (10, 'levante_extendable_dining_table_white.png', 600, 1, 6, 5);  

-- Prego Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (12, 'prego_dining_table_red.png', 450, 0, 7, 1),  
  (12, 'prego_dining_table_blue.png', 480, 0, 7, 2),  
  (12, 'prego_dining_table_green.png', 450, 0, 7, 3),  
  (12, 'prego_dining_table_black.png', 450, 0, 7, 4), (12, 'prego_dining_table_white.png', 450, 1, 7, 5);  

-- Tony Cafe Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (18, 'tony_cafe_table_red.png', 200, 0, 8, 1),  
  (18, 'tony_cafe_table_blue.png', 200, 0, 8, 2),  
  (18, 'tony_cafe_table_green.png', 200, 0, 8, 3),  
  (18, 'tony_cafe_table_black.png', 200, 0, 8, 4),  
  (18, 'tony_cafe_table_white.png', 200, 1, 8, 5);  

-- Carlina Round Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (14, 'carlina_round_dining_table_red.png', 350, 0, 9, 1),  
  (14, 'carlina_round_dining_table_blue.png', 350, 0, 9, 2),  
  (14, 'carlina_round_dining_table_green.png', 350, 0, 9, 3),  
  (14, 'carlina_round_dining_table_black.png', 350, 0, 9, 4),  
  (14, 'carlina_round_dining_table_white.png', 350, 1, 9, 5);  

-- Explorer Round Dining Table
INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  (16, 'explorer_round_dining_table_red.png', 400, 0, 10, 1),  
  (16, 'explorer_round_dining_table_blue.png', 400, 0, 10, 2),  
  (16, 'explorer_round_dining_table_green.png', 400, 0, 10, 3),  
  (16, 'explorer_round_dining_table_black.png', 400, 0, 10, 4),  
  (16, 'explorer_round_dining_table_white.png', 400, 1, 10, 5);  

INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
  -- Lollygagger Lounge Chair
  (15, 'lollygagger_lounge_chair_red.png', 550, 0, 11, 1),  
  (15, 'lollygagger_lounge_chair_blue.png', 560, 0, 11, 2),
  (15, 'lollygagger_lounge_chair_green.png', 570, 0, 11, 3),
  (15, 'lollygagger_lounge_chair_black.png', 580, 0, 11, 4),
  (15, 'lollygagger_lounge_chair_white.png', 590, 1, 11, 5),

  -- Amelia Club Chair
  (20, 'amelia_club_chair_red.png', 600, 0, 12, 1),
  (20, 'amelia_club_chair_blue.png', 610, 0, 12, 2),
  (20, 'amelia_club_chair_green.png', 620, 0, 12, 3),
  (20, 'amelia_club_chair_black.png', 630, 0, 12, 4),
  (20, 'amelia_club_chair_white.png', 640, 1, 12, 5),

  -- Montauk Club Chair
  (18, 'montauk_club_chair_red.png', 650, 0, 13, 1),
  (18, 'montauk_club_chair_blue.png', 660, 0, 13, 2),
  (18, 'montauk_club_chair_green.png', 670, 0, 13, 3),
  (18, 'montauk_club_chair_black.png', 680, 0, 13, 4),
  (18, 'montauk_club_chair_white.png', 690, 1, 13, 5),

  -- Moments Outdoor Lounge Chair
  (25, 'moments_outdoor_lounge_chair_red.png', 700, 0, 14, 1),
  (25, 'moments_outdoor_lounge_chair_blue.png', 710, 0, 14, 2),
  (25, 'moments_outdoor_lounge_chair_green.png', 720, 0, 14, 3),
  (25, 'moments_outdoor_lounge_chair_black.png', 730, 0, 14, 4),
  (25, 'moments_outdoor_lounge_chair_white.png', 740, 1, 14, 5),

  -- Amelia Hanging Chair
  (12, 'amelia_hanging_chair_red.png', 750, 0, 15, 1),
  (12, 'amelia_hanging_chair_blue.png', 760, 0, 15, 2),
  (12, 'amelia_hanging_chair_green.png', 770, 0, 15, 3),
  (12, 'amelia_hanging_chair_black.png', 780, 0, 15, 4),
  (12, 'amelia_hanging_chair_white.png', 790, 1, 15, 5),
-- Kiawah Hanging Chair
  (10, 'kiawah_hanging_chair_red.png', 800, 0, 16, 1),
  (10, 'kiawah_hanging_chair_blue.png', 810, 0, 16, 2),
  (10, 'kiawah_hanging_chair_green.png', 820, 0, 16, 3),
  (10, 'kiawah_hanging_chair_black.png', 830, 0, 16, 4),
  (10, 'kiawah_hanging_chair_white.png', 840, 1, 16, 5),

  -- Proust Outdoor Lounge Chair
  (15, 'proust_outdoor_lounge_chair_red.png', 850, 0, 17, 1),
  (15, 'proust_outdoor_lounge_chair_blue.png', 860, 0, 17, 2),
  (15, 'proust_outdoor_lounge_chair_green.png', 870, 0, 17, 3),
  (15, 'proust_outdoor_lounge_chair_black.png', 880, 0, 17, 4),
  (15, 'proust_outdoor_lounge_chair_white.png', 890, 1, 17, 5),

  -- Monet Outdoor Highback Chair
  (18, 'monet_outdoor_highback_chair_red.png', 900, 0, 18, 1),
  (18, 'monet_outdoor_highback_chair_blue.png', 910, 0, 18, 2),
  (18, 'monet_outdoor_highback_chair_green.png', 920, 0, 18, 3),
  (18, 'monet_outdoor_highback_chair_black.png', 930, 0, 18, 4),
  (18, 'monet_outdoor_highback_chair_white.png', 940, 1, 18, 5),

  -- BM5568 Deck Chair
  (22, 'bm5568_deck_chair_red.png', 950, 0, 19, 1),
  (22, 'bm5568_deck_chair_blue.png', 960, 0, 19, 2),
  (22, 'bm5568_deck_chair_green.png', 970, 0, 19, 3),
  (22, 'bm5568_deck_chair_black.png', 980, 0, 19, 4),
  (22, 'bm5568_deck_chair_white.png', 990, 1, 19, 5),

  -- Wailea Outdoor Swivel Chair
  (20, 'wailea_outdoor_swivel_chair_red.png', 1000, 0, 20, 1),
  (20, 'wailea_outdoor_swivel_chair_blue.png', 1010, 0, 20, 2),
  (20, 'wailea_outdoor_swivel_chair_green.png', 1020, 0, 20, 3),
  (20, 'wailea_outdoor_swivel_chair_black.png', 1030, 0, 20, 4),
  (20, 'wailea_outdoor_swivel_chair_white.png', 1040, 1, 20, 5);


-- 3 Lamp
 INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
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
  (22, 'Pi_LED_Round_Flush_Mount_white.png', 180, 1, 30, 5);

INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
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
  (22, 'Ridge_Outdoor_Sofa_blue.png', 350, 0, 33, 2),
  (24, 'Ridge_Outdoor_Sofa_green.png', 330, 0, 33, 3),
  (18, 'Ridge_Outdoor_Sofa_black.png', 340, 0, 33, 4),
  (26, 'Ridge_Outdoor_Sofa_white.png', 320, 1, 33, 5),

  (25, 'Salto_Sofa_red.png', 280, 0, 34, 1),
  (30, 'Salto_Sofa_blue.png', 310, 0, 34, 2),
  (28, 'Salto_Sofa_green.png', 290, 0, 34, 3),
  (20, 'Salto_Sofa_black.png', 300, 0, 34, 4),
  (35, 'Salto_Sofa_white.png', 280, 1, 34, 5),

  (20, 'PAROS_3_Seater_Sofa_red.png', 300, 0, 35, 1),
  (22, 'PAROS_3_Seater_Sofa_blue.png', 330, 0, 35, 2),
  (24, 'PAROS_3_Seater_Sofa_green.png', 310, 0, 35, 3),
  (18, 'PAROS_3_Seater_Sofa_black.png', 320, 0, 35, 4),
  (26, 'PAROS_3_Seater_Sofa_white.png', 300, 1, 35, 5),

  (15, 'Jack_Outdoor_3_Seater_Sofa_red.png', 280, 0, 36, 1),
  (18, 'Jack_Outdoor_3_Seater_Sofa_blue.png', 310, 0, 36, 2),
  (20, 'Jack_Outdoor_3_Seater_Sofa_green.png', 290, 0, 36, 3),
  (14, 'Jack_Outdoor_3_Seater_Sofa_black.png', 300, 0, 36, 4),
  (22, 'Jack_Outdoor_3_Seater_Sofa_white.png', 280, 1, 36, 5),

  (18, 'Bonan_Lounge_End_Sofa_red.png', 260, 0, 37, 1),
  (20, 'Bonan_Lounge_End_Sofa_blue.png', 290, 0, 37, 2),
  (22, 'Bonan_Lounge_End_Sofa_green.png', 270, 0, 37, 3),
  (16, 'Bonan_Lounge_End_Sofa_black.png', 280, 0, 37, 4),
  (24, 'Bonan_Lounge_End_Sofa_white.png', 260, 1, 37, 5),

  (15, 'Nisswa_Sofa_red.png', 240, 0, 38, 1),
  (18, 'Nisswa_Sofa_blue.png', 270, 0, 38, 2),
  (20, 'Nisswa_Sofa_green.png', 250, 0, 38, 3),
  (14, 'Nisswa_Sofa_black.png', 260, 0, 38, 4),
  (22, 'Nisswa_Sofa_white.png', 240, 1, 38, 5),

  (20, 'Jut_Sofa_red.png', 220, 0, 39, 1),
  (22, 'Jut_Sofa_blue.png', 250, 0, 39, 2),
  (24, 'Jut_Sofa_green.png', 230, 0, 39, 3),
  (18, 'Jut_Sofa_black.png', 240, 0, 39, 4),
  (26, 'Jut_Sofa_white.png', 220, 1, 39, 5),

  (25, 'Stone_Sofa_red.png', 330, 0, 40, 1),
  (30, 'Stone_Sofa_blue.png', 360, 0, 40, 2),
  (28, 'Stone_Sofa_green.png', 340, 0, 40, 3),
  (20, 'Stone_Sofa_black.png', 350, 0, 40, 4),
  (35, 'Stone_Sofa_white.png', 330, 1, 40, 5),

  (20, 'CLOE_Upholstered_Bed_red.png', 320, 0, 41, 1),
  (22, 'CLOE_Upholstered_Bed_blue.png', 350, 0, 41, 2),
  (24, 'CLOE_Upholstered_Bed_green.png', 330, 0, 41, 3),
  (18, 'CLOE_Upholstered_Bed_black.png', 340, 0, 41, 4),
  (26, 'CLOE_Upholstered_Bed_white.png', 320, 1, 41, 5);

  INSERT INTO Product_color (quantity, image, price, defaultal, product_id, color_id) VALUES
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