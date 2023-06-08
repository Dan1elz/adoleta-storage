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
            $genero = filter_input(INPUT_POST,'genero',FILTER_DEFAULT);

            $CEP = filter_input(INPUT_POST, 'cep',FILTER_DEFAULT);
            $rua = filter_input(INPUT_POST, 'rua',FILTER_DEFAULT);
            $numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
            $complemento = filter_input(INPUT_POST, 'complemento',FILTER_DEFAULT);
            $bairro = filter_input(INPUT_POST, 'bairro',FILTER_DEFAULT);
            $estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
            $cidade = filter_input(INPUT_POST, 'cidade',FILTER_DEFAULT);

            $cidade_formatada = str_replace("'", "", $cidade);
             /*===== VERIFICAR DADOS  REPETIDOS =====*/
            $sql_email = "SELECT * FROM bd_adoleta_storage.tb_usuario WHERE email_usuario = '$email';";
            $email_query = $this->con->prepare($sql_email);
            $email_query->execute();
            $quantidade1 = $email_query->rowCount();

            $sql_cpf = "SELECT * FROM bd_adoleta_storage.tb_usuario WHERE CPF_usuario = '$CPF';";
            $cpf_query = $this->con->prepare($sql_cpf);
            $cpf_query->execute();
            $quantidade2 = $cpf_query->rowCount();


            $sql_telefone = "SELECT * FROM bd_adoleta_storage.tb_usuario WHERE telefone_usuario = '$telefone';";
            $telefone_query = $this->con->prepare($sql_telefone);
            $telefone_query->execute();
            $quantidade3 = $telefone_query->rowCount();


            if($quantidade1 >= 1 )
            {
                header("Location: Untitled-6.php?cadastro=error1");
            }
            else if($quantidade2 >= 1 )
            {
                header("Location: Untitled-6.php?cadastro=error2");
            }
            else if($quantidade3 >= 1 )
            {
                header("Location: Untitled-6.php?cadastro=error3");
            }
            else{
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
                    '$cidade_formatada'
                );";
                try{
                    $sql_query = $this->con->prepare($sql_code);
                    $sql_query->execute();
                }catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                    header("Location: Untitled-6.php?cadastro=error");
                    
                }
                header("Location: Untitled-6.php?cadastro=success");

                exit;
            }
        }
    }
    /*===== CRIAR A FUNÇAO LOGIN =====*/
    public function Login(){
        if (isset($_POST['submit'])){
            session_start();
              /*===== RECEBER DADOS =====*/
            $email = $_POST['email'];
            $senha = $_POST['password'];
             /*===== SELECIONA DADOS DO USUARIO =====*/
            $sql_code = "SELECT * FROM bd_adoleta_storage.tb_usuario WHERE email_usuario = '$email' AND senha_usuario = '$senha';";
            $sql_query = $this->con->prepare($sql_code) or die("Falha na execução do código SQL: " . $sql_query->errorInfo());
            $sql_query->execute();

            /*===== VERIFICAR QUANTODS DADOS EXISTEM =====*/
            $quantidade = $sql_query->rowCount();

            if ($quantidade == 1) {
                $usuario = $sql_query->fetch(PDO::FETCH_ASSOC);
                /*===== DADOS USUARIO =====*/
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['email_usuario'] = $usuario['email_usuario'];
                
                header("Location: untitled-7.php");
            }/*===== CASO FOR DIFERENTE DE UM, DESTRUIR SESSÃO =====*/
            else if($quantidade != 1) {
                session_destroy();
                header("Location: untitled-4.php?error");
            }
        }
    }
}
?>