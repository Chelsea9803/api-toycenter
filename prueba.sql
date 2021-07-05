CREATE DATABASE prueba;
use prueba;

CREATE TABLE product (
	id int(10) NOT NULL auto_increment,
	name varchar(300) NOT NULL,
	price decimal(30,2) DEFAULT 0.00 NOT NULL,
	quantity decimal(30,2) DEFAULT 0.00 NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO product(id, name, price, quantity) VALUES (1, 'latop', 900.00, 3.00);
INSERT INTO product(id, name, price, quantity) VALUES (2, 'teclado', 1200.00, 5.00);
INSERT INTO product(id, name, price, quantity) VALUES (3, 'portatil', 3900.00, 5.00);
INSERT INTO product(id, name, price, quantity) VALUES (4, 'mause', 2700.00, 6.00);
INSERT INTO product(id, name, price, quantity) VALUES (5, 'bombillo', 1800.00, 79.00);
INSERT INTO product(id, name, price, quantity) VALUES (6, 'celular', 1500.00, 9.00);
INSERT INTO product(id, name, price, quantity) VALUES (7, 'pendrive', 600.00, 6.00);


