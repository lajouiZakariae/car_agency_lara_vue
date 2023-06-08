DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS Categories;
DROP TABLE IF EXISTS inventories;
DROP TABLE IF EXISTS leads;
DROP TABLE IF EXISTS users;


CREATE TABLE IF NOT EXISTS Users (
    id int AUTO_INCREMENT,
    full_name varchar(255) NOT NULL,
    username varchar(255) UNIQUE NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
	Primary key(id)
);
CREATE TABLE IF NOT EXISTS Categories (
    id int AUTO_INCREMENT,
    seller int references Users(id),
    name VARCHAR(255) UNIQUE NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
	Primary key(id)
);
CREATE TABLE inventories (
    id int AUTO_INCREMENT,
    seller int,
    inventory_name varchar(255) NOT NULL UNIQUE,
	Foreign key(seller) references users(id),
	Primary key(id)
);
CREATE TABLE cars (
	id int AUTO_INCREMENT,
	seller int NOT NULL ,
	category int NOT NULL ,
	inventory int NOT NULL ,
	make VARCHAR(255) NOT NULL,
	model VARCHAR(255) NOT NULL,
	price FLOAT NOT NULL,
	year VARCHAR(4) NOT NULL,
	ready_to_sell BOOLEAN NOT NULL,
	Foreign key(seller) references Users(id),
	Foreign key(category) references Categories(id),
	Foreign key(inventory) references Inventories(id),
	Primary key(id)
);
create table leads (
    id int AUTO_INCREMENT,
    created_at timestamp default current_timestamp ,
    email varchar(255) NOT NULL,
    phone_number varchar(255) NOT NULL,
    wanted_car int references cars(id),
	Primary key(id)
);

INSERT INTO users (full_name,email,username,password) VALUES ('admin admin','admin@at.com','admin','12345678');

INSERT INTO Categories
(seller,name,slug)
VALUES
(1,'sedan','sedan'),
(1,'hatch back','hatch-back'),
(1,'SUV','suv'),(1,"coupe","coupe");

-- INSERT INTO Categories (seller)
-- VALUES (1) ;

INSERT INTO inventories (seller,inventory_name) VALUES (1,'2021 inventory'),(1,'2022 inventory'),(1,'2023 inventory'),(1,"Main inventory");

-- INSERT INTO cars
-- (seller,inventory,category,name,made,year,price,ready_to_sell)
-- VALUES
-- (1,1,1,'g 65','Mercedes-benz',2022,54000,true),
-- (1,2,1,'7 series','Bmw',2020,80000,true),
-- (1,3,1,'Clio','Renault',2019,100000,false),
-- (1,1,1,'Camaro','Chevrolet',2005,90000,false);

-- INSERT INTO leads (email,phone_number,wanted_car)
-- VALUES ('el@gmail.com','+212689435732',1),('super@s.op','+2126439495401',2),('+lol@yahoo.co','+212600223344',3);