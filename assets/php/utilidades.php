<?php 
include_once('conexao.php');
    /*===== CRIAR A CLASSE UTILIDADES =====*/
class Utilidades extends Conexao {
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
                $where .= " AND genero_produtos IN ('" . implode("', '", $marcasSelecionadas) . "')";
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
                foreach ($departamentosSelecionados as $departamento) {
                    switch ($departamento) {
                        case 'Corrida':
                            $where .= " AND corrida_departamento = TRUE";
                            break;
                        case 'Caminhada':
                            $where .= " AND caminhada_departamento = TRUE";
                            break;
                        case 'Basquete':
                            $where .= " AND basquete_departamento = TRUE";
                            break;
                        case 'Futebol':
                            $where .= " AND futebol_departamento = TRUE";
                            break;
                        case 'Esportes':
                            $where .= " AND quadra_departamento = TRUE";
                            break;
                        case 'Automobilismo':
                            $where .= " AND automobilismo_departamento = TRUE";
                            break;
                        case 'Moda':
                            $where .= " AND moda_departamento = TRUE";
                            break;
                    }
                }
            }

            $this->sql = "SELECT tb_produtos.nome_produtos, tb_tamanhos.quantidades36_tamanhos, tb_departamento.corrida_departamento
            FROM bd_adoleta_storage.tb_produtos
            INNER JOIN bd_adoleta_storage.tb_tamanhos ON tb_produtos.id_tamanhos_produto = tb_tamanhos.id_tamanhos
            INNER JOIN bd_adoleta_storage.tb_departamento ON tb_produtos.id_departamento_produto = tb_departamento.id_departamento $where";

            return $this->sql;
        } else {
            $this->sql = "SELECT * FROM bd_adoleta_storage.tb_produtos;";
            return $this->sql;
        }
    }
}