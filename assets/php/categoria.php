<?php 
include_once('conexao.php');
    /*===== CRIAR A CLASSE Categoria =====*/
class Categoria extends Conexao {
    public $conexao;
    public $con;
    public $sql;
    /*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct()
    {
        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    
       $this->Categoria();
    }
    /*===== CRIAR A FUNÇAO CATEGORIA =====*/
    public function Categoria(){
        if(isset($_POST['submit'])){
            $generosSelecionados = isset($_POST['genero']) ? $_POST['genero'] : [];
            $tamanhosSelecionados = isset($_POST['tamanhos']) ? $_POST['tamanhos'] : [];
            $departamentosSelecionados = isset($_POST['departamento']) ? $_POST['departamento'] : [];
            $marcasSelecionadas = isset($_POST['marcas']) ? $_POST['marcas'] : [];
            

            $where = "WHERE 1 = 1";

            if (!empty($generosSelecionados)) {
                $where .= " AND genero_produtos IN ('" . implode("', '", $generosSelecionados) . "')";
            }
            if (!empty($marcasSelecionadas)) {
                $where .= " AND marca_produtos IN ('" . implode("', '", $marcasSelecionadas) . "')";
            }
            if (!empty($tamanhosSelecionados)) {
                $where .= " AND (";
                foreach ($tamanhosSelecionados as $tamanho) {
                    $column = "quantidades{$tamanho}_tamanhos";
                    $where .= " $column != 0 AND";
                }
                $where = rtrim($where, "AND");
                $where .= ")";
            }
            
            if (!empty($departamentosSelecionados)) {
                $where .= " AND (";
                foreach ($departamentosSelecionados as $departamento) {
                    switch ($departamento) {
                        case 'Corrida':
                            $where .= " corrida_departamento = TRUE AND";
                            break;
                        case 'Caminhada':
                            $where .= " caminhada_departamento = TRUE AND";
                            break;
                        case 'Basquete':
                            $where .= " basquete_departamento = TRUE AND";
                            break;
                        case 'Futebol':
                            $where .= " futebol_departamento = TRUE AND";
                            break;
                        case 'Esportes':
                            $where .= " quadra_departamento = TRUE AND";
                            break;
                        case 'Automobilismo':
                            $where .= " automobilismo_departamento = TRUE AND";
                            break;
                        case 'Moda':
                            $where .= " moda_departamento = TRUE AND";
                            break;
                    }
                }
                $where = rtrim($where, "AND");
                $where .= ")";
                
            }
            
            $this->sql = "SELECT * FROM  bd_adoleta_storage.tb_produtos
            INNER JOIN bd_adoleta_storage.tb_tamanhos ON tb_produtos.id_tamanhos_produto = tb_tamanhos.id_tamanhos
            INNER JOIN bd_adoleta_storage.tb_departamento ON tb_produtos.id_departamento_produto = tb_departamento.id_departamento $where";
           
            // header("Location: Untitled-1.php");
            return $this->sql;
        } else {
            if (!isset($this->sql)) {
                $this->sql = "SELECT * FROM bd_adoleta_storage.tb_produtos";
                return $this->sql;
            }
        }
    }
}