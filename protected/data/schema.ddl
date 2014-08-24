CREATE TABLE IF NOT EXISTS lib_author
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  update_time TIMESTAMP NULL,
  PRIMARY KEY ( id )
);

CREATE TABLE IF NOT EXISTS lib_customer
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  update_time TIMESTAMP NULL,
  PRIMARY KEY ( id )
);

CREATE TABLE IF NOT EXISTS lib_book
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  update_time TIMESTAMP NULL,
  PRIMARY KEY ( id )
);

CREATE TABLE IF NOT EXISTS lib_book_author
(
  book_id INT NOT NULL,
  author_id INT NOT NULL,
  PRIMARY KEY ( book_id, author_id ),
  CONSTRAINT lib_book_author_author_fkey FOREIGN KEY ( author_id ) REFERENCES lib_author( id ),
  CONSTRAINT lib_book_author_book_fkey FOREIGN KEY ( book_id ) REFERENCES lib_book( id )
);

CREATE TABLE IF NOT EXISTS lib_book_customer
(
  book_id INT NOT NULL,
  customer_id INT NOT NULL,
  PRIMARY KEY ( book_id, customer_id ),
  CONSTRAINT lib_book_customer_customer_fkey FOREIGN KEY ( customer_id ) REFERENCES lib_customer( id ),
  CONSTRAINT lib_book_customer_book_fkey FOREIGN KEY ( book_id ) REFERENCES lib_book( id )
);
