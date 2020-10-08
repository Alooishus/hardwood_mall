

create table vendors (
    vendor_id       INT             NOT NULL    AUTO_INCREMENT,
    vend_name       VARCHAR(20),

    PRIMARY KEY (vendor_id)
);

create table skid (
    skid_id         VARCHAR(20)             NOT NULL,
    vendor_id       INT,
    species         VARCHAR(20),
    thickness       DECIMAL(10,2),
    edge            VARCHAR(5),
    square_foot     DECIMAL(10,2),
    date_received   DATE,
    skid_price      DECIMAL(10,2),
    bund_price      DECIMAL(10,2),
    LOCATION        VARCHAR(10),
    date_counted    DATE,
    
    PRIMARY KEY (skid_id),
	  FOREIGN KEY (vendor_id) REFERENCES vendors(vendor_id)
);

create table bundle (
    bundle_id       INT             NOT NULL    AUTO_INCREMENT,
    skid_id         VARCHAR(20),
    width           DECIMAL(10,2),
    bundle_qty      DECIMAL(10,2),
    visible         BOOLEAN       DEFAULT 1,

    PRIMARY KEY (bundle_id),
        FOREIGN KEY (skid_id) REFERENCES skid(skid_id)
);

create table employee (
	emp_id			  INT				NOT NULL	AUTO_INCREMENT,
	emp_fname		  VARCHAR(20),
	emp_lname		  VARCHAR(20),
  emp_username  VARCHAR(20),
	emp_password	VARCHAR(255),
	
	PRIMARY KEY (emp_id)
);

create table customer (
	cust_id		    INT				NOT NULL	AUTO_INCREMENT,
	cust_fname		VARCHAR(20),
	cust_lname		VARCHAR(20),
	cust_phone		VARCHAR(20),
	cust_email		VARCHAR(30),
	
	PRIMARY KEY (cust_id)
);

create table invoice (
	invoice_id		INT				NOT NULL	AUTO_INCREMENT,
	emp_id			  INT,
	cust_id		    INT,
  inv_date      DATE,
	
	PRIMARY KEY (invoice_id),
	    FOREIGN KEY (emp_id) REFERENCES employee(emp_id),
	    FOREIGN KEY (cust_id) REFERENCES customer(cust_id)
);

create table invoice_line (
	invoice_id		INT,
	skid_id			  VARCHAR(20),
	quantity		  INT,
	line_price		DECIMAL(10,2),
  paid_status        BOOLEAN       DEFAULT 0,
	
	PRIMARY KEY (invoice_id, skid_id),
	    FOREIGN KEY	(invoice_id) REFERENCES invoice(invoice_id),
	    FOREIGN KEY (skid_id) REFERENCES skid(skid_id)
);

INSERT INTO vendors 
  (vendor_id, vend_name) 
VALUES 
  (1, "Vendor A"),
  (2, "Vendor B"),
  (3, "Vendor C");

INSERT INTO skid
  (skid_id, LOCATION, species, thickness, edge, square_foot, skid_price, bund_price, date_counted, date_received, vendor_id)
VALUES
  ('MS-1560', 'a12', 'Appalachian Maple', '.75', 'SE', '123', '3.32', '4.95', '2019-10-14', '2018-1-1', 1),
  ('MS-1556', 'd43', 'Ash', '.75', 'SE', '240', '3.30', '3.55', '2019-10-14', '2018-1-1', 1),
  ('MS-1561', 'a12', 'Beech', '.75', 'SE', '84', '2.62', '3.95', '2019-11-10', '2017-2-2', 2),
  ('MS-1570', 'b12', 'Cherry', '.75', 'SE', '368', '3.40', '3.95', '2019-10-14', '2018-1-1', 1),
  ('MS-1557', 'd43', 'Hard Maple', '.75', 'SE', '315', '4.09', '4.45', '2019-10-14', '2018-1-1', 2),
  ('MS-1555', 'd43', 'Hickory', '.75', 'SE', '361', '3.37', '3.65', '2019-10-14', '2018-1-1', 1),
  ('MS-1460', 'f15', 'Red Oak', '.75', 'SE', '283', '3.92', '5.20', '2019-10-14', '2018-1-1', 1),
  ('MS-1579', 'f15', 'Red Oak', '.75', 'SE', '182', '2.95', '3.55', '2019-10-14', '2018-1-1', 1),
  ('MS-15581', 'd43', 'Red Oak', '.75', 'SE', '100', '3.20', '3.45', '2019-10-14', '2018-1-1', 3),
  ('MS-15582', 'd43', 'Red Oak', '.75', 'SE', '191', '3.54', '3.85', '2019-10-14', '2018-1-1', 1),
  ('MS-1536', 'd43', 'White Oak', '.75', 'SE', '754', '3.47', '3.60', '2019-10-14', '2018-1-1', 1),
  ('MS-1571', 'b12', 'White Oak', '.75', 'SE', '140', '3.14', '3.65', '2019-10-14', '2018-1-1', 1);

INSERT INTO bundle
  (bundle_id, skid_id, width, bundle_qty, visible)
VALUES
  (1, 'MS-1560', 5, 7, 1),
  (2, 'MS-1556', 3.25, 5, 1),
  (3, 'MS-1556', 4, 9, 1),
  (4, 'MS-1561', 4, 6, 1),
  (5, 'MS-1570', 3, 5, 1),
  (6, 'MS-1570', 5, 15, 1),
  (7, 'MS-1557', 3, 15, 1),
  (8, 'MS-1555', 4, 16, 1),
  (9, 'MS-1555', 3, 5, 1),
  (10, 'MS-1555', 2.25, 2, 1),
  (11, 'MS-1460', 1.5, 3, 1),
  (12, 'MS-1460', 3, 3, 1),
  (13, 'MS-1460', 3.5, 2, 1),
  (14, 'MS-1460', 5, 7, 1),
  (15, 'MS-1460', 7, 1.67, 1),
  (16, 'MS-1579', 4, 13, 1),
  (17, 'MS-15581', 3.25, 1, 1),
  (18, 'MS-15581', 5, 1, 1),
  (19, 'MS-15581', 1.25, 5, 1),
  (20, 'MS-15581', 2.25, 1, 1),
  (21, 'MS-15582', 1.75, 1, 1),
  (22, 'MS-15582', 1.5, 7, 1),
  (23, 'MS-15582', 3, 5, 1),
  (24, 'MS-1536', 2.25, 16, 1),
  (25, 'MS-1536', 3, 22, 1),
  (26, 'MS-1536', 3.25, .5, 1),
  (27, 'MS-1536', 4, 2, 1),
  (28, 'MS-1571', 4, 10, 1);

INSERT INTO employee
    (emp_id, emp_fname, emp_lname, emp_username, emp_password)
VALUES
    (1, 'Joe', 'Kolesar', 'jkolesar', '$2y$10$z1Yfo80qYvGaZs.4nHeOPunmCRndDnaO/NayJQASfYj0GMfmax8Uu');

INSERT INTO customer
    (cust_id, cust_fname, cust_lname, cust_phone, cust_email)
VALUES
    (1, 'Tom', 'Sawyer', '867-5309', 'tsawyer@old.com');

INSERT INTO invoice
    (invoice_id, emp_id, cust_id, inv_date)
VALUES
    (1, 1, 1, '2019-10-10'),
    (2, 1, 1, '2019-10-11'),
    (3, 1, 1, '2019-10-12'),
    (4, 1, 1, '2019-10-13');

INSERT INTO invoice_line
    (invoice_id, skid_id, quantity, line_price, paid_status)
VALUES
    (1, 'MS-1560', 1, '408.36', 0),
    (2, 'MS-1556', 1, '792.00', 0),
    (3, 'MS-1557', 1, '1288.35', 0),
    (4, 'MS-1561', 1, '220.08', 0);
