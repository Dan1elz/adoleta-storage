<?php 
include_once('conexao.php');
    /*===== CRIAR A CLASSE UTILIDADES =====*/
class Utilidades extends Conexao {
    public $conexao;
    public $con;
    /*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct()
    {
        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    
       
    }
    /*===== CRIAR A FUNÇAO PRODUTOS =====*/
    public function Cadastro(){



        
    }
}