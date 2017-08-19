
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS account;


DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS banks;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS credits;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS debits;

create table user(
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    PRIMARY KEY (id)

) engine=innodb;

create table banks(
    id INT NOT NULL AUTO_INCREMENT,
    bank_name VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(32),
    PRIMARY KEY (id)
) engine=innodb;

create table credits(
    id INT NOT NULL AUTO_INCREMENT,
    name_c  varchar(255),
    desc_c varchar(255),
    date_c  DATE,
    amount float,
    PRIMARY KEY (id)
) engine=innodb;



create table debits(
    id INT NOT NULL AUTO_INCREMENT,
    name_d  varchar(255),
    desc_d varchar(255),
    date_d DATE,
    amount float,
    PRIMARY KEY (id)
) engine=innodb;

create table account(
    id INT NOT NULL AUTO_INCREMENT,
    bank_id INT,
    user_id INT,
    acct_name VARCHAR(255),
    acct_type INT,
    acct_balance FLOAT,
    PRIMARY KEY (id),
    FOREIGN KEY (bank_id) REFERENCES banks(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
) engine=innodb;

create table transactions(
    id INT NOT NULL AUTO_INCREMENT,
    acct_id INT,
    exp_id INT,
    creds_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (acct_id) REFERENCES account(id),
    FOREIGN KEY (exp_id) REFERENCES debits(id),
    FOREIGN KEY (creds_id) REFERENCES credits(id)
) engine=innodb;


INSERT INTO user(first_name, last_name) 
VALUES('Sara','Conner'), 
      ('Joe', 'Bauer'), 
      ('Frank', 'Reynolds');

INSERT INTO banks(bank_name, address, phone) 
VALUES('First Bank','331 Dock Street, Ketchikan AK 99901','9072284474'), 
      ('Fidelity', '1518 6th Avenue, Seattle WA 98101', '8005432162');



INSERT INTO debits( date_d, name_d, desc_d, amount) 
VALUES('2017-06-06', 'Safeway','Groceries','66.33'), 
      ('2017-06-10','Verizon', 'Cellular phone', '80.70'), 
    ('2017-06-10','Chevron', 'Fuel automobile', '10.00'),
    ('2017-06-12','Wal-mart', 'Groceries', '72.00'),
    ('2017-06-18','Charter Communications','Internet service','61.99'), 
    ('2017-06-18', 'Safeway', 'Groceries', '55.09'), 
    ('2017-06-22','Safeway', 'Groceries', '33.60'), 
    ('2017-06-22','7-eleven', 'Convience store','1.27'), 
    ('2017-06-25', 'Ace Hardware', 'Hardware', '4.85'), 
    ('2017-06-25','Ace Hardware', 'Hardware', '32.99') ;


INSERT INTO credits( date_c, name_c, desc_c, amount) 
VALUES('2017-06-01','GOOG' ,'stock divedend, symbol= GOOG','163.33'), 
      ('2017-06-01','F' ,'stock divedend, symbol=F ','1122.00'),
      ('2017-06-10','US Dept of Agriculture' ,'salary' ,'1722.00'),

      ('2017-06-25','US Dept of Agriculture' ,'salary' ,'1722.00');
