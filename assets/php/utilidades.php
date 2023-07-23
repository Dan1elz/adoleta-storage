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
    }
    public function Favoritar(){
        $dados = json_decode(file_get_contents('php://input'), true);
        if(isset($dados['idProduto'])){
            session_start();

            if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario'])) {
                /*===== CASO NÃO EXISTIREM, DESTRUIR SESSÃO =====*/
                session_destroy();
                $retorno = "Sessão não existente!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            
             /*===== RECEBER DADOS =====*/
            $usuario = $_SESSION['id_usuario'];
            $produto = $dados['idProduto'];
            
            /*===== VERIFICAR DADOS REPETIDOS =====*/
            $sql_favorito = "SELECT * FROM bd_adoleta_storage.tb_favoritos 
            WHERE id_usuario_favoritos = '$usuario' AND id_produtos_favoritos = '$produto';";
            $favorito = $this->con->prepare($sql_favorito);
            $favorito->execute();
            $quantidade = $favorito->rowCount();

             /*===== CASO EXISTIR, RETORNAR ERRO =====*/
             if ($quantidade >= 1) {
                $retorno = "Produto Já Favoritado!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            else {
                /*===== INSERIR DADOS E TENTAR CONEXÃO =====*/
                $sql = "INSERT INTO bd_adoleta_storage.tb_favoritos (id_usuario_favoritos, id_produtos_favoritos) 
                VALUES ('$usuario','$produto')";

                try {
                    $sql_query = $this->con->prepare($sql);
                    $sql_query->execute();
                } catch (PDOException $e) {
                    $retorno = "Connection failed: " . $e->getMessage();
                    echo json_encode(array('error' => true, 'message' => $retorno));
                    return;
                }
                $retorno = "Dados Cadastrados com Sucesso.";
                echo json_encode(array('Sucess' => true, 'message' => $retorno));
                return;
            }
        }
        else {
            $retorno = "Erro: Informações incompletas.";
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
    }
    public function Desfavoritar(){
        $dados = json_decode(file_get_contents('php://input'), true);
        if(isset($dados['idProduto'])){
            session_start();

            if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario'])) {
                /*===== CASO NÃO EXISTIREM, DESTRUIR SESSÃO =====*/
                session_destroy();
                $retorno = "Sessão não existente!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            
             /*===== RECEBER DADOS =====*/
            $usuario = $_SESSION['id_usuario'];
            $produto = $dados['idProduto'];

            /*===== VERIFICAR DADOS REPETIDOS =====*/
            $sql_favorito = "SELECT * FROM bd_adoleta_storage.tb_favoritos 
            WHERE id_usuario_favoritos = '$usuario' AND id_produtos_favoritos = '$produto';";
            $favorito = $this->con->prepare($sql_favorito);
            $favorito->execute();
            $quantidade = $favorito->rowCount();

             /*===== CASO EXISTIR, DELETAR DADOS =====*/
             if ($quantidade >= 1) {
                $sql_code ="DELETE FROM bd_adoleta_storage.tb_favoritos 
                WHERE id_usuario_favoritos = '$usuario' AND id_produtos_favoritos = '$produto';";

                try {
                    $sql_query = $this->con->prepare($sql_code);
                    $sql_query->execute();
                } catch (PDOException $e) {
                    $retorno = "Connection failed: " . $e->getMessage();
                    echo json_encode(array('error' => true, 'message' => $retorno));
                    return;
                }

                $retorno = "Dados Deletados com Sucesso.";
                echo json_encode(array('Sucess' => true, 'message' => $retorno));
                return;

            }
            else{
                $retorno = "Dado Não Existe!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }

        }
        else {
            $retorno = "Erro: Informações incompletas.";
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
    }
    public function Atualizar(){
        $dados = json_decode(file_get_contents('php://input'), true);
        if (isset($dados['idProduto'])) {
            session_start();

            if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario'])) {
                /*===== CASO NÃO EXISTIREM, DESTRUIR SESSÃO =====*/
                session_destroy();
                $retorno = "Sessão não existente!";
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }

            /*===== RECEBER DADOS =====*/
            $usuario = $_SESSION['id_usuario'];
            $produto = $dados['idProduto'];

            $sql_favorito = "SELECT * FROM bd_adoleta_storage.tb_favoritos 
            WHERE id_usuario_favoritos = :usuario AND id_produtos_favoritos = :produto;";
            $favorito = $this->con->prepare($sql_favorito);
            $favorito->bindParam(':usuario', $usuario);
            $favorito->bindParam(':produto', $produto);
            $favorito->execute();

            $produtoFavoritado = $favorito->fetch(PDO::FETCH_ASSOC);

            echo json_encode(array('error' => false, 'produto' => $produtoFavoritado));
            return;
        } else {
            echo json_encode(array('error' => true, 'message' => 'ID do produto não especificado.'));
            return;
        }
    }

    public function GetProdutos(){
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['email_usuario'])) {
            /*===== CASO NÃO EXISTIREM, DESTRUIR SESSÃO =====*/
            session_destroy();
            $retorno = "Sessão não existente!";
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
    
        /*===== RECEBER DADOS =====*/
        $usuario = $_SESSION['id_usuario'];
    
        $sql_favorito = "SELECT * FROM bd_adoleta_storage.tb_favoritos
                INNER JOIN bd_adoleta_storage.tb_produtos ON tb_produtos.id_produtos = tb_favoritos.id_produtos_favoritos
                WHERE id_usuario_favoritos = :usuario;";
    
        $favorito = $this->con->prepare($sql_favorito);
        $favorito->bindParam(':usuario', $usuario);
    
        $favorito->execute();
    
        $produtoFavoritado = $favorito->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(array('error' => false, 'produto' => $produtoFavoritado));
        return;
    }
    public function GetTamanhos(){
        $dados = json_decode(file_get_contents('php://input'), true);
        if(isset($dados['idProduto'])){
        
            $produto = $dados['idProduto'];


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
            try {
                $sql_query = $this->con->prepare($sql_tamanho);
                $sql_query->execute();
                $tamanhos = $sql_query->fetch(PDO::FETCH_ASSOC);
                $valores = explode(',', $tamanhos['tamanho']);

                
            } catch (PDOException $e) {
                $retorno = "Connection failed: " . $e->getMessage();
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            echo json_encode(array('error' => false, 'produto' => $valores));
                return;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);
    $acao = $dados['acao'];

    if ($acao === 'favoritar') {
        $fav = new Utilidades;
        $fav->Favoritar();
    } 
    elseif ($acao === 'desfavoritar') {
        $fav = new Utilidades;
        $fav->Desfavoritar();
    }
    elseif ($acao === 'verificar') {
        $fav = new Utilidades;
        $fav->Atualizar();
    }
    elseif($acao === 'GetProdutos'){
        $fav = new Utilidades;
        $fav->GetProdutos();
    }
    elseif($acao === 'GetTamanhos'){
        $fav = new Utilidades;
        $fav->GetTamanhos();
    }
    else {
        $retorno = "Ação desconhecida";
        echo json_encode(array('error' => true, 'message' => $retorno));
    }
} else {
    $retorno = "Metodo Desconhecido";
    echo json_encode(array('error' => true, 'message' => $retorno));
}