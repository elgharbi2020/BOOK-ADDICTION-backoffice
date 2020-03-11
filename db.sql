create table categories(
    id int AUTO_INCREMENT,
    name varchar(100),
    constraint pk_categories PRIMARY KEY (id)
);

create table authors(
    id int AUTO_INCREMENT,
    name varchar(100),
    constraint pk_authors PRIMARY KEY (id)
);

create table books(
    id int AUTO_INCREMENT,
    name varchar(100) UNIQUE,
    description text,
    resume text,
    price real,
    discount int,
    release_date date,
    idauthor int ,
    idcategory int ,
    image varchar(255),
    constraint pk_books PRIMARY KEY (id),
    constraint fk_books_authors FOREIGN KEY (idauthor) REFERENCES authors(id),
    constraint fk_books_categories FOREIGN KEY (idcategory) REFERENCES categories(id)
);

create table users(
    id int AUTO_INCREMENT,
    firstname varchar(50),
    lastname varchar(50),
    email varchar(250) UNIQUE,
    role varchar(50),
    password varchar(50),
    constraint pk_admins PRIMARY KEY(id)
);

ALTER TABLE users
ADD UNIQUE (email);