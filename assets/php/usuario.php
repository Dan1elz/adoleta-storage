<?php 
include_once('conexao.php');
    /*===== CRIAR A CLASSE USUARIO =====*/
class Usuario extends Conexao {
    public $conexao;
    public $con;
    /*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct()
    {
        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    
       
    }
    /*===== CRIAR A FUNÇAO CADASTRO =====*/
    public function Cadastro(){
        if(isset($_POST['submit']))
        {
             /*===== RECEBER DADOS =====*/
            $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            $sobrenome = filter_input(INPUT_POST, 'sobrenome',FILTER_DEFAULT);
            $email = filter_input(INPUT_POST, 'email',FILTER_DEFAULT);
            $CPF = filter_input(INPUT_POST, 'cpf',FILTER_DEFAULT);
            $data = filter_input(INPUT_POST, 'data',FILTER_DEFAULT);
            $telefone = filter_input(INPUT_POST, 'telefone',FILTER_DEFAULT);
            $senha = filter_input(INPUT_POST, 'senha',FILTER_DEFAULT);
            $senha2 = filter_input(INPUT_POST, 'senha2',FILTER_DEFAULT);

            $CEP = filter_input(INPUT_POST, 'cep',FILTER_DEFAULT);
            $rua = filter_input(INPUT_POST, 'rua',FILTER_DEFAULT);
            $numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
            $complemento = filter_input(INPUT_POST, 'complemento',FILTER_DEFAULT);
            $bairro = filter_input(INPUT_POST, 'bairro',FILTER_DEFAULT);
            $estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
            $cidade = filter_input(INPUT_POST, 'cidade',FILTER_DEFAULT);


             /*===== VERIFICAO DOS DADOS =====*/
            if(isset($_POST['genero1'])){   $genero = 1;} 
            elseif(isset($_POST['genero2'])){    $genero = 2;}
            elseif(isset($_POST['genero3'])){  $genero = 3;}
            else{
                $genero = 0;
            }

            if($senha == $senha2)
            {
                /*===== INSERIR DADOS E TENTAR CONEXÃO =====*/
                $sql_code = "INSERT INTO bd_adoleta_storage.tb_usuario(
                    nome_usuario,
                    sobrenome_usuario,
                    email_usuario,
                    CPF_usuario,
                    telefone_usuario,
                    data_usuario,
                    senha_usuario,
                    genero_usuario,
                    CEP_usuario,
                    rua_usuario,
                    numero_usuario,
                    complemento_usuario,
                    bairro_usuario,
                    estado_usuario,
                    cidade_usuario
                ) VALUES(
                    '$nome',
                    '$sobrenome',
                    '$email',
                    '$CPF',
                    '$telefone',
                    '$data',
                    '$senha',
                    '$genero',
                    '$CEP',
                    '$rua',
                    '$numero',
                    '$complemento',
                    '$bairro',
                    '$estado',
                    '$cidade'
                )";
                try{
                    $sql_query = $this->con->prepare($sql_code);
                    $sql_query->execute();
                }catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                #echo "<script> location.href='Untitled-4.php'; </script>";
                exit;
            }
            ?><script>alert("Dados não cadastrados");</script><?php
        }
    }
}
?>