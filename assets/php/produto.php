<?php
include_once('conexao.php');
/*===== CRIAR A CLASSE UTILIDADES =====*/
class Utilidades extends Conexao {
public $conexao;
public $con;
public $sql;
/*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct(){
        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    }

    public function GetProdutos(){
        $dados = json_decode(file_get_contents('php://input'), true);
        if(isset($dados['idProduto'])){
            $produto = $dados['idProduto'];

            $sql = "SELECT * FROM bd_adoleta_storage.tb_produtos WHERE tb_produtos.id_produtos = $produto;";
            $sql_tamanho = "SELECT id_tamanhos, tamanho
            FROM (
                SELECT id_tamanhos,
                    CONCAT_WS(',', 
                        CASE WHEN quantidades36_tamanhos != 0 THEN '36' END,
                        CASE WHEN quantidades37_tamanhos != 0 THEN '37' END,
                        CASE WHEN quantidades38_tamanhos != 0 THEN '38' END,
                        CASE WHEN quantidades39_tamanhos != 0 THEN '39' END,
                        CASE WHEN quantidades40_tamanhos != 0 THEN '40' END,
                        CASE WHEN quantidades41_tamanhos != 0 THEN '41' END,
                        CASE WHEN quantidades42_tamanhos != 0 THEN '42' END,
                        CASE WHEN quantidades43_tamanhos != 0 THEN '43' END,
                        CASE WHEN quantidades44_tamanhos != 0 THEN '44' END,
                        CASE WHEN quantidades45_tamanhos != 0 THEN '45' END,
                        CASE WHEN quantidades46_tamanhos != 0 THEN '46' END,
                        CASE WHEN quantidades47_tamanhos != 0 THEN '47' END
                    ) AS tamanho
                FROM tb_tamanhos
                WHERE id_produtos_tamanhos = '$produto'
            ) AS subquery
            WHERE tamanho IS NOT NULL;";
            $sql_departamento ="SELECT id_departamento, tamanho
            FROM (
                SELECT id_departamento,
                    CONCAT_WS(',', 
                        CASE WHEN corrida_departamento = 1 THEN 'Corrida' END,
                        CASE WHEN caminhada_departamento = 1 THEN 'Caminhada' END,
                        CASE WHEN basquete_departamento = 1 THEN 'Basquete' END,
                        CASE WHEN futebol_departamento = 1 THEN 'Futebol' END,
                        CASE WHEN quadra_departamento = 1 THEN 'Quadra' END,
                        CASE WHEN automobilismo_departamento = 1 THEN 'Automobilismo' END,
                        CASE WHEN moda_departamento = 1 THEN 'Moda' END
                    ) AS tamanho
                FROM tb_departamento
                WHERE id_produtos_departamento = '$produto'
            ) AS subquery
            WHERE tamanho IS NOT NULL;";

            try{
            $sql_query = $this->con->prepare($sql);
            $sql_query->execute();
            $produto = $sql_query->fetchAll(PDO::FETCH_ASSOC);

            $query_tamanho = $this->con->prepare($sql_tamanho);
            $query_tamanho->execute();
            $tamanhos = $query_tamanho->fetch(PDO::FETCH_ASSOC);
            $valores_tamanhos = explode(',', $tamanhos['tamanho']);


            $query_departamento = $this->con->prepare($sql_departamento);
            $query_departamento->execute();
            $departamento = $query_departamento->fetch(PDO::FETCH_ASSOC);
            $valores_departamento = explode(',', $departamento['tamanho']);
            }catch (PDOException $e) {
                $retorno = "Connection failed: " . $e->getMessage();
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            echo json_encode(array('error' => false, 'produto' => $produto, 'tamanho' =>$valores_tamanhos, 'departamento' => $valores_departamento));
            return;
        }
        else {
            $retorno = "Erro: Informações incompletas.";
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
    }
    public function PostCompra(){

        $dados = json_decode(file_get_contents('php://input'), true);

        if(isset($dados['idProduto']) || isset($dados['Tamanho'])){
            session_start();
            if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario'])) {
                /*===== CASO NÃO EXISTIREM, DESTRUIR SESSÃO =====*/
                session_destroy();
                $retorno = "Sessão não existente!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }

            $idProduto = $dados['idProduto'];
            $idUsuario = $_SESSION['id_usuario'];
            $Tamanho = $dados['Tamanho'];


            $sql_Anterior = "SELECT * FROM bd_adoleta_storage.tb_tamanhos
                WHERE id_produtos_tamanhos = $idProduto AND quantidades{$Tamanho}_tamanhos != 0";

            $sql_Anterior_query = $this->con->prepare($sql_Anterior);
            $sql_Anterior_query->execute();
            $resultado = $sql_Anterior_query->fetch(PDO::FETCH_ASSOC);

            $Anterior = $resultado["quantidades{$Tamanho}_tamanhos"];

            $sql_verificacao = "SELECT * FROM bd_adoleta_storage.tb_carrinho 
                WHERE id_produtos_carrinho = '$idProduto' AND id_usuario_carrinho = '$idUsuario' AND tamanho_carrinho = '$Tamanho';";

            $sql_verificacao_query = $this->con->prepare($sql_verificacao);
            $sql_verificacao_query->execute();
            $q = $sql_verificacao_query->rowCount();
            $Quantidade_resultado = $sql_verificacao_query->fetch(PDO::FETCH_ASSOC);
            

            if($q != 0){
                $Quantidade = $Quantidade_resultado['quantidade_carrinho'] + 1;
                $sql_update = "UPDATE bd_adoleta_storage.tb_carrinho
                    SET quantidade_carrinho = '$Quantidade'
                    WHERE id_produtos_carrinho = '$idProduto' AND id_usuario_carrinho = '$idUsuario' AND tamanho_carrinho = '$Tamanho';";
            } else {
                $Quantidade = 1;
                $sql = "INSERT INTO bd_adoleta_storage.tb_carrinho (
                    id_produtos_carrinho,id_usuario_carrinho,tamanho_carrinho,quantidade_carrinho
                    ) VALUES ('$idProduto','$idUsuario','$Tamanho','$Quantidade')";
        
            }
            $Atual = $Anterior - 1;
            $sql_Tamanho = "UPDATE bd_adoleta_storage.tb_tamanhos 
                SET quantidades{$Tamanho}_tamanhos = $Atual
                WHERE id_produtos_tamanhos = '$idProduto';";


            $sql_consulta = "SELECT id_tamanhos, tamanho
                        FROM (
                            SELECT id_tamanhos,
                                CONCAT_WS(',', 
                                    CASE WHEN quantidades36_tamanhos != 0 THEN '36' END,
                                    CASE WHEN quantidades37_tamanhos != 0 THEN '37' END,
                                    CASE WHEN quantidades38_tamanhos != 0 THEN '38' END,
                                    CASE WHEN quantidades39_tamanhos != 0 THEN '39' END,
                                    CASE WHEN quantidades40_tamanhos != 0 THEN '40' END,
                                    CASE WHEN quantidades41_tamanhos != 0 THEN '41' END,
                                    CASE WHEN quantidades42_tamanhos != 0 THEN '42' END,
                                    CASE WHEN quantidades43_tamanhos != 0 THEN '43' END,
                                    CASE WHEN quantidades44_tamanhos != 0 THEN '44' END,
                                    CASE WHEN quantidades45_tamanhos != 0 THEN '45' END,
                                    CASE WHEN quantidades46_tamanhos != 0 THEN '46' END,
                                    CASE WHEN quantidades47_tamanhos != 0 THEN '47' END
                                ) AS tamanho
                            FROM tb_tamanhos
                            WHERE id_produtos_tamanhos = '$idProduto'
                        ) AS subquery
                        WHERE tamanho IS NOT NULL;";

            try{
                if($q != 0){
                    $sql_update_query = $this->con->prepare($sql_update);
                    $sql_update_query->execute();
                }else{
                    $sql_query = $this->con->prepare($sql);
                    $sql_query->execute();
                }
                $sql_Tamanho_query = $this->con->prepare($sql_Tamanho);
                $sql_Tamanho_query->execute();

                $sql_Consulta_query = $this->con->prepare($sql_consulta);
                $sql_Consulta_query->execute();
                $resultado2 = $sql_Consulta_query->fetch(PDO::FETCH_ASSOC);
                $valores_tamanhos = explode(',', $resultado2['tamanho']);
            }
            catch (PDOException $e) {
                $retorno = "Connection failed: " . $e->getMessage();
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }

            echo json_encode(array('error' => false,'produto' => 'Cadastrado com Sucesso!','inicial'=>$Anterior,'quantidade' =>$valores_tamanhos));
            return;
        }
        else{
            $retorno = "Erro: Informações incompletas.";
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);
    $acao = $dados['acao'];

    if ($acao === 'GetProdutos') {

        $get = new Utilidades;
        $get->GetProdutos();
    }
    elseif($acao === 'PostCompra'){
        $get = new Utilidades;
        $get->PostCompra();
    }
    else {
        $retorno = "Ação desconhecida";
        echo json_encode(array('error' => true, 'message' => $retorno));
    }
} else {
    $retorno = "Metodo Desconhecido";
    echo json_encode(array('error' => true, 'message' => $retorno));
}


?>