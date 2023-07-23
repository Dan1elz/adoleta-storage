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
    genero_usuario VARCHAR(10) NOT NULL, 

    CEP_usuario VARCHAR(9) NOT NULL,
    rua_usuario VARCHAR(50) NOT NULL,
    numero_usuario VARCHAR(5) NOT NULL,
    complemento_usuario VARCHAR(100),
    bairro_usuario VARCHAR(50) NOT NULL,
    estado_usuario VARCHAR(2) NOT NULL,
    cidade_usuario VARCHAR(100) NOT NULL

);



CREATE TABLE tb_tamanhos(
    id_tamanhos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_produtos_tamanhos INT NOT NULL,
    quantidades36_tamanhos INT(5),
    quantidades37_tamanhos INT(5),
    quantidades38_tamanhos INT(5),
    quantidades39_tamanhos INT(5),
    quantidades40_tamanhos INT(5),
    quantidades41_tamanhos INT(5),
    quantidades42_tamanhos INT(5),
    quantidades43_tamanhos INT(5),
    quantidades44_tamanhos INT(5),
    quantidades45_tamanhos INT(5),
    quantidades46_tamanhos INT(5),
    quantidades47_tamanhos INT(5)
);

CREATE TABLE tb_departamento(
    id_departamento INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_produtos_departamento INT NOT NULL,
    corrida_departamento BOOLEAN,
    caminhada_departamento BOOLEAN,
    basquete_departamento BOOLEAN,
    futebol_departamento BOOLEAN,
    quadra_departamento BOOLEAN,
    automobilismo_departamento BOOLEAN,
    moda_departamento BOOLEAN
);
CREATE TABLE tb_produtos(
    id_produtos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cod_produtos VARCHAR(20) NOT NULL,
    nome_produtos VARCHAR(50) NOT NULL,
    precoAntigo_produtos VARCHAR(10),
    preco_produtos VARCHAR(10) NOT NULL,
    promocao_produtos VARCHAR(20),
    img1_produtos VARCHAR(100) NOT NULL,
    img2_produtos VARCHAR(100) NOT NULL,
    img3_produtos VARCHAR(100) NOT NULL,
    img4_produtos VARCHAR(100) NOT NULL,
    descricao_produtos VARCHAR(270), 
    genero_produtos VARCHAR(10),
    marca_produtos ENUM('Adidas', 'Asics', 'Mizuno', 'Nike', 'Puma', 'Olympikus') NOT NULL,
    id_departamento_produto INT,
    id_tamanhos_produto INT
);

ALTER TABLE tb_produtos ADD FOREIGN KEY (id_tamanhos_produto) REFERENCES tb_tamanhos(id_tamanhos);
ALTER TABLE tb_produtos ADD FOREIGN KEY (id_departamento_produto) REFERENCES tb_departamento(id_departamento);
ALTER TABLE tb_tamanhos ADD FOREIGN KEY (id_produtos_tamanhos) REFERENCES tb_produtos(id_produtos);
ALTER TABLE tb_departamento ADD FOREIGN KEY (id_produtos_departamento) REFERENCES tb_produtos(id_produtos);

CREATE TABLE tb_favoritos(
    id_favoritos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_usuario_favoritos INT NOT NULL,
    id_produtos_favoritos INT NOT NULL,
    FOREIGN KEY (id_usuario_favoritos) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_produtos_favoritos) REFERENCES tb_produtos(id_produtos)
);

CREATE TABLE tb_carrinho(
    id_carrinho INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_produtos_carrinho INT NOT NULL,
    id_usuario_carrinho INT NOT NULL,
    tamanho_carrinho INT NOT NULL,
    quantidade_carrinho INT NOT NULL,

    FOREIGN KEY(id_usuario_carrinho) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY(id_produtos_carrinho) REFERENCES tb_produtos(id_produtos)
);