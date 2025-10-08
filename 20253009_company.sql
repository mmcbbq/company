DROP DATABASE if exists company;
CREATE DATABASE company;
use company;

create table employees
(
    id    int auto_increment PRIMARY KEY,
    fname varchar(255),
    lname varchar(255)
);


INSERT INTO employees(fname, lname)
values ('Peter', 'Pan'),
       ('Donald', 'Trump'),
       ('George', 'Busch');

create table department
(
    id int auto_increment PRIMARY KEY ,
    name varchar(255)
);
INSERT INTO department( name)
values ('department'),
       ('dep'),
       ('artment');


ALTER TABLE department add column is_hiring bool default '0';
ALTER TABLE department add column work_mode varchar(255) default 'onsite';
