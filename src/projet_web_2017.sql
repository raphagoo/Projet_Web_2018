#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Admin(
        Admin_id   int (4) Auto_increment  NOT NULL ,
        username   Varchar (60) NOT NULL ,
        password   Varchar (100) NOT NULL ,
        details_id Int ,
        PRIMARY KEY (Admin_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Details
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Details(
        details_id  int (11) Auto_increment  NOT NULL ,
        email       Varchar (80) ,
        address1    Varchar (50) ,
        address2    Varchar (50) ,
        country     Varchar (40) ,
        city        Varchar (80) ,
        zipCode     Varchar (40) ,
        phone       Varchar (25) ,
        firstName   Varchar (50) ,
        lastName    Varchar (50) ,
        customer_id Int ,
        Admin_id    Int ,
        PRIMARY KEY (details_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Customer
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Customer(
        customer_id int (11) Auto_increment  NOT NULL ,
        userName    Varchar (60) NOT NULL ,
        password    Varchar (100) NOT NULL ,
        details_id  Int ,
        PRIMARY KEY (customer_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Orders(
        Order_id    Int (11) Auto_increment NOT NULL ,
        date        Date NOT NULL ,
        totalPrice  Float NOT NULL ,
        amount      Int (8) ,
        customer_id Int (11),
        PRIMARY KEY (Order_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Product(
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
        qty         int (8) NOT NULL,
        Artist_name Varchar (100) ,
        PRIMARY KEY (Product_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Artist
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Artist(
        Artist_name Varchar (100) NOT NULL ,
        PRIMARY KEY (Artist_name )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#------------------------------------------------------------
# Table: DeliveryCompany
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DeliveryCompany(
        DeliveryCompany_id int (11) Auto_increment  NOT NULL ,
        company_name       Varchar (80) NOT NULL ,
        phone              Varchar (15) ,
        country            Varchar (60) NOT NULL ,
        zipcode            Varchar (40) NOT NULL ,
        address            Varchar (80) NOT NULL ,
        PRIMARY KEY (DeliveryCompany_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Delivery
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS Delivery(
        delivery_id        int (11) Auto_increment  NOT NULL ,
        delivery_state     int NOT NULL ,
        estimatedDate      Date NOT NULL ,
        DeliveryCompany_id Int  ,
        Order_id           int (11) ,
        PRIMARY KEY (delivery_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: OrderDetails
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OrderDetails(
        amount     Int ,
        Order_id   int (11) ,
        Product_id int (11),
        PRIMARY KEY (Order_id ,Product_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Admin ADD CONSTRAINT FK_Admin_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id)
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE Details ADD CONSTRAINT FK_Details_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE Details ADD CONSTRAINT FK_Details_Admin_id FOREIGN KEY (Admin_id) REFERENCES Admin(Admin_id)
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE Customer ADD CONSTRAINT FK_Customer_details_id FOREIGN KEY (details_id) REFERENCES Details(details_id)
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE Orders ADD CONSTRAINT FK_Orders_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE Product ADD CONSTRAINT FK_Product_Artist_name FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name)
ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE Delivery ADD CONSTRAINT FK_Delivery_DeliveryCompany_id FOREIGN KEY (DeliveryCompany_id) REFERENCES DeliveryCompany(DeliveryCompany_id)
ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE Delivery ADD CONSTRAINT FK_Delivery_Order_id FOREIGN KEY (Order_id) REFERENCES Orders(Order_id)
ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE OrderDetails ADD CONSTRAINT FK_OrderDetails_Order_id FOREIGN KEY (Order_id) REFERENCES Orders(Order_id)
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE OrderDetails ADD CONSTRAINT FK_OrderDetails_Product_id FOREIGN KEY (Product_id) REFERENCES Product(Product_id)
ON DELETE CASCADE ON UPDATE CASCADE;
