CREATE TABLE USUARIOS (
ID_USU INT PRIMARY KEY AUTO_INCREMENT,
USUARIO VARCHAR(50),
EMAIL VARCHAR(50),
SENHA VARCHAR(255),
DATA_CADASTRO DATETIME,
DATA_ULTIMO_LOGIN DATETIME
)