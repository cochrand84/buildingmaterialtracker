CREATE DATABASE admin_lakeside;

use admin_lakeside;

CREATE TABLE tickets (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(15),
    lastname VARCHAR(15),
    date DATETIME(15),
    address VARCHAR(15),
    city VARCHAR(15),
    state VARCHAR(15),
    phone VARCHAR(15),
    cellphone VARCHAR(15),
    color VARCHAR(15),
    gauge VARCHAR(15),
    coil1 VARCHAR(15), 
    coil2 VARCHAR(15),
    del VARCHAR(15),  
    pickuptimetime VARCHAR(15),
    qty1 VARCHAR(15),
    length1 VARCHAR(15),
    desc1 VARCHAR(15),
    qty2 VARCHAR(15),
    length2 VARCHAR(15),
    desc2 VARCHAR(15),
    qty3 VARCHAR(15),
    length3 VARCHAR(15),
    desc3 VARCHAR(15),
    qty4 VARCHAR(15),
    length4 VARCHAR(15),
    desc4 VARCHAR(15),
    qty5 VARCHAR(15),
    length5 VARCHAR(15),
    desc5 VARCHAR(15)
);

CREATE TABLE images (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	image1 longblob NOT NULL,
	created datetime,
	rand INT(100)
);

CREATE TABLE vertracker (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	ver FLOAT(5),
	date_time datetime
);