#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        Admin_id   int (11) Auto_increment  NOT NULL ,
        pseudo     Varchar (30) ,
        password   Varchar (50) ,
        details_id Int ,
        PRIMARY KEY (Admin_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Details
#------------------------------------------------------------

CREATE TABLE Details(
        details_id  int (11) Auto_increment  NOT NULL ,
        firstname   Varchar (50) ,
        lastname    Varchar (50) ,
        email       Varchar (80) ,
        address1    Varchar (50) ,
        address2    Varchar (50) ,
        country     Varchar (40) ,
        city        Varchar (80) ,
        zipCode     Int ,
        phone       Varchar (25) ,
        customer_id Int ,
        Admin_id    Int ,
        PRIMARY KEY (details_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Customer
#------------------------------------------------------------

CREATE TABLE Customer(
        customer_id int (11) Auto_increment  NOT NULL ,
        pseudo      Varchar (50) ,
        password    Varchar (80) ,
        details_id  Int ,
        PRIMARY KEY (customer_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE Orders(
        Order_id    Int NOT NULL ,
        date        Date ,
        totalPrice  Float ,
        amount      Int ,
        customer_id Int ,
        PRIMARY KEY (Order_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Delivery
#------------------------------------------------------------

CREATE TABLE Delivery(
        delivery_id int (11) Auto_increment  NOT NULL ,
        name        Varchar (100) ,
        Order_id    Int NOT NULL ,
        PRIMARY KEY (delivery_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE Product(
        Product_id    int (11) Auto_increment  NOT NULL ,
        name          Varchar (255) ,
        description   Varchar (255) ,
        price         Float ,
        stockNumber   Int ,
        votes         Int ,
        Category      Varchar (70) ,
        Artist_name   Varchar (100) NOT NULL ,
        amount        Int ,
        Order_id      Int NOT NULL ,
        supplier_name Varchar (150) NOT NULL ,
        PRIMARY KEY (Product_id )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Artist
#------------------------------------------------------------

CREATE TABLE Artist(
        Artist_name Varchar (100) NOT NULL ,
        PRIMARY KEY (Artist_name )
)ENGINE=InnoDB charset='utf8';


#------------------------------------------------------------
# Table: Supplier
#------------------------------------------------------------

CREATE TABLE Supplier(
        supplier_name Varchar (150) NOT NULL ,
        PRIMARY KEY (supplier_name )
)ENGINE=InnoDB charset='utf8';

ALTER TABLE Admin ADD CONSTRAINT FK_Admin_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id);
ALTER TABLE Details ADD CONSTRAINT FK_Details_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);
ALTER TABLE Details ADD CONSTRAINT FK_Details_Admin_id FOREIGN KEY (Admin_id) REFERENCES Admin(Admin_id);
ALTER TABLE Customer ADD CONSTRAINT FK_Customer_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id);
ALTER TABLE Orders ADD CONSTRAINT FK_Orders_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);
ALTER TABLE Delivery ADD CONSTRAINT FK_Delivery_Order_id FOREIGN KEY (Order_id) REFERENCES Orders(Order_id);
ALTER TABLE Product ADD CONSTRAINT FK_Product_Artist_name FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name);
ALTER TABLE Product ADD CONSTRAINT FK_Product_Order_id FOREIGN KEY (Order_id) REFERENCES Orders(Order_id);
ALTER TABLE Product ADD CONSTRAINT FK_Product_supplier_name FOREIGN KEY (supplier_name) REFERENCES Supplier(supplier_name);
