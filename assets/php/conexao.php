<?php
/*===== DEFINIR PARAMETROS PARA CONEXAO =====*/
define('HOST', 'localhost');
define('DBNAME', 'bd_adoleta_storage');
define('USUARIO', 'root');
define('SENHA', '');
/*===== CRIAR CLASSE CONEXAO =====*/
class Conexao {
	/*===== CRIAR VARIAVEIS PARA CONEXAO =====*/
    private string $host;
    private string $dbname;
    private string $usuario;
    private string $senha;
    public $connect;
    /*===== CRIAR FUNCAO CONSTRUCT PARA PASSAR PARAMETROS DEFINIDOS=====*/
    public function __construct(){
        $this->host = HOST;
        $this->dbname = DBNAME;
        $this->usuario = USUARIO;
        $this->senha = SENHA;
        $this->Conexao();

    }
/*===== CRIAR FUNCAO CONEXAO =====*/
    private function Conexao(){
            $dsn = "mysql:host={$this->host}; dbname={$this->dbname}";
             /*===== TENTAR UMA CONEXAO COM O BANCO VIA PDO =====*/
        try {
            $this->connect = new PDO($dsn, $this->usuario, $this->senha);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->connect;
        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }

    }
}

?>