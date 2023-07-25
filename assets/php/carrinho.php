<?php
include_once('conexao.php');
/*===== CRIAR A CLASSE UTILIDADES =====*/
class Utilidades extends Conexao {
public $conexao;
public $con;
public $sql;
/*===== CRIAR A FUNÇAO CONSTRUCT PARA PUXAR A CONEXAO =====*/
    public function __construct() {
        parent::__construct();
        $this->conexao = new Conexao;
        $this->con = $this->conexao->connect;
    }
    public function GetProdutos() {
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

        




        $sql_carrinho = "SELECT * FROM bd_adoleta_storage.tb_carrinho
        INNER JOIN bd_adoleta_storage.tb_produtos ON tb_produtos.id_produtos = tb_carrinho.id_produtos_carrinho
        INNER JOIN bd_adoleta_storage.tb_tamanhos ON tb_tamanhos.id_produtos_tamanhos = tb_carrinho.id_produtos_carrinho
        WHERE id_usuario_carrinho = :usuario;";

        $carrinho = $this->con->prepare($sql_carrinho);
        $carrinho->bindParam(':usuario', $usuario);
    
        $carrinho->execute();
    
        $produtoCarrinho = $carrinho->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(array('error' => false, 'produto' => $produtoCarrinho));
        return;
    }

    public function DeletQuantidade() {
        $dados = json_decode(file_get_contents('php://input'), true);

        /*===== RECEBER DADOS =====*/
        $idCarrinho = $dados['idCarrinho'];
        $idProduto = $dados['idProduto'];
        $Tamanho = $dados['Tamanho'];
        $Quantidade = $dados['Quantidade'];

        $sql_Tamanhos = "UPDATE bd_adoleta_storage.tb_tamanhos 
            SET quantidades{$Tamanho}_tamanhos = quantidades{$Tamanho}_tamanhos + 1
            WHERE id_produtos_tamanhos = '$idProduto';";

        if($Quantidade > 1) {
            $Quantidade = $Quantidade - 1;
            $sql_Carrinho = "UPDATE bd_adoleta_storage.tb_carrinho
                SET quantidade_carrinho = $Quantidade
                WHERE id_carrinho = '$idCarrinho';";
            $message = "Quantidade Alterada com Sucesso!"; 

            try {
                $query_Carrinho = $this->con->prepare($sql_Carrinho);
                $query_Carrinho->execute();
    
                $query_Tamanhos = $this->con->prepare($sql_Tamanhos);
                $query_Tamanhos->execute();
            }catch (PDOException $e) {
                $retorno = "Connection failed: " . $e->getMessage();
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            echo json_encode(array('error' => false,'message' =>$message));
            return;
        }
        elseif ($Quantidade == 1) {
            
            $message = "Numero Limite Minimo Alcançado!";
            echo json_encode(array('error' => false,'message' =>$message));
            return;
        }
    }

    public function AddQuantidade() {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        /*===== RECEBER DADOS =====*/
        $idCarrinho = $dados['idCarrinho'];
        $idProduto = $dados['idProduto'];
        $Tamanho = $dados['Tamanho'];
        $Quantidade = $dados['Quantidade'];

        $sql_Select = "SELECT quantidades{$Tamanho}_tamanhos FROM bd_adoleta_storage.tb_tamanhos 
        WHERE id_produtos_tamanhos = $idProduto";

        $query_Select = $this->con->prepare($sql_Select);
        $query_Select->execute();
        $Select = $query_Select->fetch(PDO::FETCH_ASSOC);
        $TamanhoSelect = $Select["quantidades{$Tamanho}_tamanhos"];

        if($TamanhoSelect > 0) {       
            $Quantidade = $Quantidade + 1;
            $sql_Carrinho = "UPDATE bd_adoleta_storage.tb_carrinho
                SET quantidade_carrinho = $Quantidade
                WHERE id_carrinho = '$idCarrinho';";
            $message = "Quantidade Alterada com Sucesso!"; 

            $sql_Tamanhos = "UPDATE bd_adoleta_storage.tb_tamanhos 
                SET quantidades{$Tamanho}_tamanhos = quantidades{$Tamanho}_tamanhos - 1
                WHERE id_produtos_tamanhos = '$idProduto';";
            try {
                $query_Carrinho = $this->con->prepare($sql_Carrinho);
                $query_Carrinho->execute();

                $query_Tamanhos = $this->con->prepare($sql_Tamanhos);
                $query_Tamanhos->execute();
            }catch (PDOException $e) {
                $retorno = "Connection failed: " . $e->getMessage();
                echo json_encode(array('error' => true, 'message' => $retorno));
                return;
            }
            echo json_encode(array('error' => false,'message' =>$message));
            return;

        } else {
            $message = "Numero Limite Maximo Alcançado!";
            echo json_encode(array('error' => false,'message' =>$message));
            return;
        }
    }

    public function DeletProduto() {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        /*===== RECEBER DADOS =====*/
        $idCarrinho = $dados['idCarrinho'];
        $idProduto = $dados['idProduto'];
        $Tamanho = $dados['Tamanho'];
        $Quantidade = $dados['Quantidade'];

        $sql_Carrinho = "DELETE FROM bd_adoleta_storage.tb_carrinho
            WHERE id_carrinho = $idCarrinho;";

        $sql_Tamanhos = "UPDATE bd_adoleta_storage.tb_tamanhos 
            SET quantidades{$Tamanho}_tamanhos = quantidades{$Tamanho}_tamanhos + $Quantidade
            WHERE id_produtos_tamanhos = '$idProduto';";
        try {
            $query_Carrinho = $this->con->prepare($sql_Carrinho);
            $query_Carrinho->execute();

            $query_Tamanhos = $this->con->prepare($sql_Tamanhos);
            $query_Tamanhos->execute();
        }catch (PDOException $e) {
            $retorno = "Connection failed: " . $e->getMessage();
            echo json_encode(array('error' => true, 'message' => $retorno));
            return;
        }
        $message = "Produto Deletado con Sucesso!";
        echo json_encode(array('error' => false,'message' =>$message));
        return;
    }
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);
    $acao = $dados['acao'];

    if ($acao === 'GetProdutos') {

        $get = new Utilidades;
        $get->GetProdutos();
    }
    elseif($acao === 'DeletQuantidade') {
        $get = new Utilidades;
        $get->DeletQuantidade();
    }
    elseif($acao === 'AddQuantidade') {
        $get = new Utilidades;
        $get->AddQuantidade();
    }
    elseif($acao === 'DeletProduto') {
        $get = new Utilidades;
        $get->DeletProduto();
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