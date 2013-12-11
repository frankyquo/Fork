CREATE TABLE MsRole (
	roleId INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	roleName VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE MsUser (
    userId INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(128) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
	roleId INTEGER NOT NULL,
	FOREIGN KEY (roleId) REFERENCES MsRole(roleId) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsApplication (
	applicationId INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	applicationName VARCHAR(128) NOT NULL UNIQUE,
	applicationController VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE MsModule (
	moduleId INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	moduleName VARCHAR(128) NOT NULL,
	moduleAction VARCHAR(128) NOT NULL,
	applicationId INTEGER NOT NULL,
	FOREIGN KEY (applicationId) REFERENCES MsApplication(applicationId) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE AccessRight (
	accessId INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	roleId INTEGER NOT NULL,
	moduleId INTEGER NOT NULL,
	FOREIGN KEY (roleId) REFERENCES MsRole(roleId) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (moduleId) REFERENCES MsModule(moduleId) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO MsRole (roleName) VALUES ('Administrator');
INSERT INTO MsRole (roleName) VALUES ('Inventory');
INSERT INTO MsRole (roleName) VALUES ('Supervisor');
INSERT INTO MsRole (roleName) VALUES ('Buruh');
INSERT INTO MsRole (roleName) VALUES ('QC');
INSERT INTO MsRole (roleName) VALUES ('Manager');
INSERT INTO MsRole (roleName) VALUES ('Pengeluaran');

INSERT INTO MsUser (email, password, roleId) VALUES ('jacky@testing.com', 'hello', 1);
INSERT INTO MsUser (email, password, roleId) VALUES ('franky@testing.com', 'hello', 2);

INSERT INTO MsApplication (applicationName, applicationController) VALUES ('User Management', 'user');

INSERT INTO MsModule (moduleName, moduleAction, applicationId) VALUES ('Add User', 'addUser', 1);
INSERT INTO MsModule (moduleName, moduleAction, applicationId) VALUES ('Update User', 'updateUser', 1);
INSERT INTO MsModule (moduleName, moduleAction, applicationId) VALUES ('Delete User', 'deleteUser', 1);
INSERT INTO MsModule (moduleName, moduleAction, applicationId) VALUES ('Add Role', 'addRole', 1);
INSERT INTO MsModule (moduleName, moduleAction, applicationId) VALUES ('Edit Role Access', 'editAccess', 1);

INSERT INTO AccessRight (roleId, moduleId) VALUES (1, 1);
INSERT INTO AccessRight (roleId, moduleId) VALUES (1, 2);
INSERT INTO AccessRight (roleId, moduleId) VALUES (1, 3);
INSERT INTO AccessRight (roleId, moduleId) VALUES (1, 4);
INSERT INTO AccessRight (roleId, moduleId) VALUES (1, 5);