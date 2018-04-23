#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        Admin_id   int (11) Auto_increment  NOT NULL ,
        username   Varchar (30) NOT NULL ,
        password   Varchar (50) NOT NULL ,
        details_id Int ,
        PRIMARY KEY (Admin_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Details
#------------------------------------------------------------

CREATE TABLE Details(
        details_id  int (11) Auto_increment  NOT NULL ,
        email       Varchar (80) NOT NULL ,
        address1    Varchar (50) NOT NULL ,
        address2    Varchar (50) ,
        country     Varchar (40) NOT NULL ,
        city        Varchar (80) ,
        zipCode     Int ,
        phone       Varchar (25) ,
        firstName   Varchar (50) NOT NULL ,
        lastName    Varchar (50) NOT NULL ,
        customer_id Int ,
        Admin_id    Int ,
        PRIMARY KEY (details_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Customer
#------------------------------------------------------------

CREATE TABLE Customer(
        customer_id int (11) Auto_increment  NOT NULL ,
        userName    Varchar (50) NOT NULL ,
        password    Varchar (80) NOT NULL ,
        details_id  Int ,
        PRIMARY KEY (customer_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE Orders(
        Order_id    Int NOT NULL ,
        date        Date NOT NULL ,
        totalPrice  Float NOT NULL ,
        amount      Int ,
        customer_id Int ,
        PRIMARY KEY (Order_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE Product(
        Product_id  int (11) Auto_increment  NOT NULL ,
        name        Varchar (255) NOT NULL ,
        description Varchar (255) NOT NULL ,
        price       Float NOT NULL ,
        Theme       Varchar (40) NOT NULL ,
        Category    Varchar (70) NOT NULL ,
        picturePath Varchar (200) NOT NULL ,
        color       Varchar (50) NOT NULL ,
        width       Float NOT NULL ,
        height      Float NOT NULL ,
        Artist_name Varchar (100) NOT NULL ,
        PRIMARY KEY (Product_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artist
#------------------------------------------------------------

CREATE TABLE Artist(
        Artist_name Varchar (100) NOT NULL ,
        PRIMARY KEY (Artist_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ProductOrder
#------------------------------------------------------------

CREATE TABLE ProductOrder(
        amount     Int ,
        Order_id   Int NOT NULL ,
        Product_id Int NOT NULL ,
        PRIMARY KEY (Order_id ,Product_id )
)ENGINE=InnoDB;

ALTER TABLE Admin ADD CONSTRAINT FK_Admin_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id);
ALTER TABLE Details ADD CONSTRAINT FK_Details_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);
ALTER TABLE Details ADD CONSTRAINT FK_Details_Admin_id FOREIGN KEY (Admin_id) REFERENCES Admin(Admin_id);
ALTER TABLE Customer ADD CONSTRAINT FK_Customer_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id);
ALTER TABLE Orders ADD CONSTRAINT FK_Orders_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);
ALTER TABLE Product ADD CONSTRAINT FK_Product_Artist_name FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name);
ALTER TABLE ProductOrder ADD CONSTRAINT FK_ProductOrder_Order_id FOREIGN KEY (Order_id) REFERENCES Orders(Order_id);
ALTER TABLE ProductOrder ADD CONSTRAINT FK_ProductOrder_Product_id FOREIGN KEY (Product_id) REFERENCES Product(Product_id);
