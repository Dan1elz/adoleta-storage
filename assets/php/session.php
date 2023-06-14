<?php
    include_once('conexao.php');
   /*===== CRIAR A CLASSE SESSION =====*/
class Session extends Conexao {
    public $conexao;
    public $con;
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $cpf;
    public $telefone;
    public $data;
    public $genero;
    public $cep;
    public $rua;
    public $numero;
    public $complemento;
    public $bairro;
    public $estado;
    public $cidade;
    /*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct()
    {
       

        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['email_usuario'])) {
            $this->PuxarDados();
        }
    }
    /*===== CRIAR A FUNÇÃO PUXAR DADOS =====*/
    private function PuxarDados(){

        /*===== PUXAR DADOS DO USUARIO =====*/
        $id = $_SESSION['id_usuario'];
        $email = $_SESSION['email_usuario'];

        try {
            $sql_code = "SELECT * FROM bd_adoleta_storage.tb_usuario WHERE id_usuario = '$id' AND email_usuario = '$email'";
            $sql_query = $this->con->prepare($sql_code);
            $sql_query->execute();
            /*===== PASSAR TODOS OS DADOS PARA AS VARIAVEIS =====*/
            $usuario = $sql_query->fetch(PDO::FETCH_ASSOC);


            if ($usuario !== false) {
                $this->id = $usuario['id_usuario'];
                $this->nome = $usuario['nome_usuario'];
                $this->sobrenome = $usuario['sobrenome_usuario'];
                $this->email = $usuario['email_usuario'];
                $this->cpf = $usuario['CPF_usuario'];
                $this->telefone = $usuario['telefone_usuario'];
                $this->data = $usuario['data_usuario'];
                $this->genero = $usuario['genero_usuario'];

                $this->cep = $usuario['CEP_usuario'];
                $this->rua = $usuario['rua_usuario'];
                $this->numero = $usuario['numero_usuario'];
                $this->complemento = $usuario['complemento_usuario'];
                $this->bairro = $usuario['bairro_usuario'];
                $estado = $usuario['estado_usuario'];
                $this->cidade = $usuario['cidade_usuario'];

                switch($estado) {
                    case "AC":
                        $this->estado = "Acre";
                        break;
                    case "AL":
                        $this->estado = "Alagoas";
                        break;
                    case "AP":
                        $this->estado = "Amapá";
                        break;
                    case "AM":
                        $this->estado = "Amazonas";
                        break;
                    case "BA":
                        $this->estado = "Bahia";
                        break;
                    case "CE":
                        $this->estado = "Ceará";
                        break;
                    case "DF":
                        $this->estado = "Distrito Federal";
                        break;
                    case "ES":
                        $this->estado = "Espírito Santo";
                        break;
                    case "GO":
                        $this->estado = "Goiás";
                        break;
                    case "MA":
                        $this->estado = "Maranhão";
                        break;
                    case "MT":
                        $this->estado = "Mato Grosso";
                        break;
                    case "MS":
                        $this->estado = "Mato Grosso do Sul";
                        break;
                    case "MG":
                        $this->estado = "Minas Gerais";
                        break;
                    case "PA":
                        $this->estado = "Pará";
                        break;
                    case "PB":
                        $this->estado = "Paraíba";
                        break;
                    case "PR":
                        $this->estado = "Paraná";
                        break;
                    case "PE":
                        $this->estado = "Pernambuco";
                        break;
                    case "PI":
                        $this->estado = "Piauí";
                        break;
                    case "RJ":
                        $this->estado = "Rio de Janeiro";
                        break;
                    case "RN":
                        $this->estado = "Rio Grande do Norte";
                        break;
                    case "RS":
                        $this->estado = "Rio Grande do Sul";
                        break;
                    case "RO":
                        $this->estado = "Rondônia";
                        break;
                    case "RR":
                        $this->estado = "Roraima";
                        break;
                    case "SC":
                        $this->estado = "Santa Catarina";
                        break;
                    case "SP":
                        $this->estado = "São Paulo";
                        break;
                    case "SE":
                        $this->estado = "Sergipe";
                        break;
                    case "TO":
                        $this->estado = "Tocantins";
                        break;  
                }
            }   
            else{
                ?><script>alert("Registro nao encontrado");</script><?php
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            header("Location: Untitled-6.php?cadastro=error");
            exit;
        }  
    }
    public function sair()
    {
        if(isset($_POST['sair'])){
            /*===== DESTRUIR A SESSÃO E LEVAR DE VOLTA PARA O INDEX =====*/
            
            session_destroy();
            header('Location: index.php');
        }
    }
}

?>