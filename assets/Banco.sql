CREATE DATABASE bd_adoleta_storage;

CREATE TABLE tb_usuario(
	id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_usuario VARCHAR(20) NOT NULL,
    sobrenome_usuario VARCHAR(20) NOT NULL,
    email_usuario VARCHAR(100) NOT NULL,
    CPF_usuario VARCHAR(14) NOT NULL,
    telefone_usuario VARCHAR(14) NOT NULL,
    data_usuario DATE NOT NULL,
    senha_usuario VARCHAR(32) NOT NULL,
    genero_usuario VARCHAR(1) NOT NULL,

    CEP_usuario VARCHAR(9) NOT NULL,
    rua_usuario VARCHAR(50) NOT NULL,
    numero_usuario VARCHAR(5) NOT NULL,
    complemento_usuario VARCHAR(100),
    bairro_usuario VARCHAR(50) NOT NULL,
    estado_usuario VARCHAR(2) NOT NULL,
    cidade_usuario VARCHAR(100) NOT NULL

);