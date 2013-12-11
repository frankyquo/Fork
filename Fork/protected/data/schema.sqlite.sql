CREATE TABLE MsUser (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL
);

INSERT INTO MsUser (email, password) VALUES ('franky@testing.com', 'hello');
INSERT INTO MsUser (email, password) VALUES ('jacky@testing.com', 'hello');