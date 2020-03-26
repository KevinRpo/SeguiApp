CREATE DATABASE SeguiApp;
USE SeguiApp;

CREATE TABLE tbl_administrador(
    Identificacion  VARCHAR(10) PRIMARY KEY,
    nombres_admin   VARCHAR(50),
    apellidos       VARCHAR(50),
    email           VARCHAR(50),
    telefono        VARCHAR(15),   
    rol             VARCHAR(15) NOT NULL,
    clave           VARCHAR(255) NOT NULL,
    confirmar_clave VARCHAR(255),
    estatus         INT(1)
);

CREATE TABLE tbl_asignar_aprendiz(
    id      INT(11) PRIMARY KEY 

);

CREATE TABLE tbl_aprendiz(
    id_a                VARCHAR(10) PRIMARY KEY,        
    nombres             VARCHAR(50),
    apellidos           VARCHAR(50),
    email               VARCHAR(50),
    telefono            VARCHAR(15),
    rol                 VARCHAR(15),
    clave               VARCHAR(255) NOT NULL,
    confirmar_clave     VARCHAR(255) NOT NULL,
    estatus             int(1),
    numero_ficha        VARCHAR(10),
    NIT                 VARCHAR(15),
    FOREIGN KEY (NIT) REFERENCES tbl_empresa(NIT)
);

CREATE TABLE tbl_empresa(
    NIT             VARCHAR(15) PRIMARY KEY,   
    nombre          VARCHAR(25),
    direccion       VARCHAR(20),
    telefono        VARCHAR(15),
    nombre_jefe     VARCHAR(75),
    email           VARCHAR(50)
);

CREATE TABLE tbl_instructor(
    id_instructor       VARCHAR(10) PRIMARY KEY,
    nombres             VARCHAR(50),
    apellidos           VARCHAR(50),
    email               VARCHAR(50),
    telefono            VARCHAR(15),
    programa            VARCHAR(40),
    clave               VARCHAR(255) NOT NULL,
    confirmar_clave     VARCHAR(255) NOT NULL,
    rol                 VARCHAR(15),
    estatus             INT(1),
    Identificacion      VARCHAR(10),
    FOREIGN KEY(Identificacion) REFERENCES tbl_administrador(Identificacion)
);

CREATE TABLE tbl_citacion(
    id_citacion         INT(10) PRIMARY KEY, 
    fecha               DATE,
    hora                TIME,
    id_a                VARCHAR(10),
    id_instructor       VARCHAR(10),
    FOREIGN KEY(id_instructor) REFERENCES tbl_instructor(id_instructor)
);

CREATE TABLE tbl_informe(
    id_informe      INT PRIMARY KEY,
    archivo         VARCHAR(255),
    id_instructor   VARCHAR(10),
    FOREIGN KEY(id_instructor) REFERENCES tbl_instructor(id_instructor)
);

CREATE TABLE tbl_asignar_aprendiz(
    id_asignar                      INT(11) PRIMARY KEY,
    id_aprendiz                     VARCHAR(10) UNIQUE,
    nombre_aprendiz                 VARCHAR(20),
    apellidos_aprendiz              VARCHAR(40),
    ficha_aprendiz                  INT(10),
    direccion_empresa_aprendiz      VARCHAR (50),
    id_instructor                   VARCHAR(10) UNIQUE,
    nombre_instructor               VARCHAR(20),
    apellidos_instructor            VARCHAR(40),
    telefono_instructor             VARCHAR(15),
    correo_instructor               VARCHAR(50) UNIQUE,
    identificacion                  VARCHAR(10)
);

ALTER TABLE tbl_asignar_aprendiz ADD FOREIGN KEY(identificacion) REFERENCES tbl_administrador(identificacion);