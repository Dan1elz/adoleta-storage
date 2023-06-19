<?php 
include_once('conexao.php');
    /*===== CRIAR A CLASSE POSTAGEM =====*/
class Postagem extends Conexao {
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
        if(isset($_POST['submit'])){
            /*===== RECEBER DADOS =====*/
            $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            $cod = filter_input(INPUT_POST,'codigo', FILTER_DEFAULT);

            $precoAntigo = filter_input(INPUT_POST, 'precoAntigo', FILTER_DEFAULT);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT);
            $promocao = filter_input(INPUT_POST, 'promocao', FILTER_DEFAULT);

            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
            $genero = filter_input(INPUT_POST, 'genero', FILTER_DEFAULT);
            $marca = filter_input(INPUT_POST, 'marca', FILTER_DEFAULT);

            $corrida = isset($_POST['Corrida']) ? true : false;
            $caminhada = isset($_POST['Caminhada']) ? true : false;
            $basquete = isset($_POST['Basquete']) ? true : false;
            $futebol = isset($_POST['Futebol']) ? true : false;
            $quadra = isset($_POST['Quadra']) ? true : false;
            $automobilismo = isset($_POST['Automobilismo']) ? true : false;
            $moda =  isset($_POST['Moda']) ? true : false;

            $tamanho36 = filter_input(INPUT_POST, 'tamanho36', FILTER_DEFAULT);
            $tamanho37 = filter_input(INPUT_POST, 'tamanho37', FILTER_DEFAULT);
            $tamanho38 = filter_input(INPUT_POST, 'tamanho38', FILTER_DEFAULT);
            $tamanho39 = filter_input(INPUT_POST, 'tamanho39', FILTER_DEFAULT);
            $tamanho40 = filter_input(INPUT_POST, 'tamanho40', FILTER_DEFAULT);
            $tamanho41 = filter_input(INPUT_POST, 'tamanho41', FILTER_DEFAULT);
            $tamanho42 = filter_input(INPUT_POST, 'tamanho42', FILTER_DEFAULT);
            $tamanho43 = filter_input(INPUT_POST, 'tamanho43', FILTER_DEFAULT);
            $tamanho44 = filter_input(INPUT_POST, 'tamanho44', FILTER_DEFAULT);
            $tamanho45 = filter_input(INPUT_POST, 'tamanho45', FILTER_DEFAULT);
            $tamanho46 = filter_input(INPUT_POST, 'tamanho46', FILTER_DEFAULT);
            $tamanho47 = filter_input(INPUT_POST, 'tamanho47', FILTER_DEFAULT);

            /*===== RECEBER IMAGENS, PEGANDO SEU ARQUIVO E SEU ARQUIVO TEMPORARIO =====*/
            $img1 = $_FILES['imagem1']['tmp_name'];
            $img2 = $_FILES['imagem2']['tmp_name'];
            $img3 = $_FILES['imagem3']['tmp_name'];
            $img4 = $_FILES['imagem4']['tmp_name'];

            /*===== SEPARAR O NOME E SUA EXTENSÃO =====*/
            $nomeimg1 = pathinfo($_FILES['imagem1']['name'], PATHINFO_FILENAME);
            $extensao1 = pathinfo($_FILES['imagem1']['name'], PATHINFO_EXTENSION);
            $nomeimg2 = pathinfo($_FILES['imagem2']['name'], PATHINFO_FILENAME);
            $extensao2 = pathinfo($_FILES['imagem2']['name'], PATHINFO_EXTENSION);
            $nomeimg3 = pathinfo($_FILES['imagem3']['name'], PATHINFO_FILENAME);
            $extensao3 = pathinfo($_FILES['imagem3']['name'], PATHINFO_EXTENSION);
            $nomeimg4 = pathinfo($_FILES['imagem4']['name'], PATHINFO_FILENAME);
            $extensao4 = pathinfo($_FILES['imagem4']['name'], PATHINFO_EXTENSION);
            /*===== REESCREVER SEU NOME JUNTO COM O TEMPO DE GRAVAÇÃO =====*/
            $novonome1 = md5($nomeimg1 . '-' . time()) . '.' . $extensao1;
            $novonome2 = md5($nomeimg2 . '-' . time()) . '.' . $extensao2;
            $novonome3 = md5($nomeimg3 . '-' . time()) . '.' . $extensao3;
            $novonome4 = md5($nomeimg4 . '-' . time()) . '.' . $extensao4;
            /*===== PEGAR O DIRETÓRIO QUE AS IMAGENS SERÃO ENVIADAS =====*/
            $diretorio = '../assets/images/produtos/';

            /*===== MOVER OS ARQUIVOS =====*/
            move_uploaded_file($img1, $diretorio . $novonome1);
            move_uploaded_file($img2, $diretorio . $novonome2);
            move_uploaded_file($img3, $diretorio . $novonome3);
            move_uploaded_file($img4, $diretorio . $novonome4);

            /*===== CÓDIGO DE CADASTRO NO BANCO =====*/
            $sql_code = "INSERT INTO bd_adoleta_storage.tb_produtos (
                cod_produtos,
                nome_produtos,
                precoAntigo_produtos,
                preco_produtos,
                promocao_produtos,
                img1_produtos,
                img2_produtos,
                img3_produtos,
                img4_produtos,
                descricao_produtos,
                genero_produtos,
                marca_produtos
            ) VALUES (
                '$cod',
                '$nome',
                '$precoAntigo',
                '$preco',
                '$promocao',
                '$novonome1',
                '$novonome2',
                '$novonome3',
                '$novonome4',
                '$descricao',
                '$genero',
                '$marca'
            );
            
            SET @id_produtos = LAST_INSERT_ID();
            
            INSERT INTO bd_adoleta_storage.tb_departamento (
                id_produtos_departamento,
                corrida_departamento,
                caminhada_departamento,
                basquete_departamento,
                futebol_departamento,
                quadra_departamento,
                automobilismo_departamento,
                moda_departamento
            ) VALUES (
                @id_produtos,
                '$corrida',
                '$caminhada',
                '$basquete',
                '$futebol',
                '$quadra',
                '$automobilismo',
                '$moda'
            );
            
            SET@id_departamento= LAST_INSERT_ID();
            
           INSERT INTO bd_adoleta_storage.tb_tamanhos (
                id_produtos_tamanhos,
                quantidades36_tamanhos,
                quantidades37_tamanhos,
                quantidades38_tamanhos,
                quantidades39_tamanhos,
                quantidades40_tamanhos,
                quantidades41_tamanhos,
                quantidades42_tamanhos,
                quantidades43_tamanhos,
                quantidades44_tamanhos,
                quantidades45_tamanhos,
                quantidades46_tamanhos,
                quantidades47_tamanhos
            ) VALUES (
                @id_produtos,
                '$tamanho36',
                '$tamanho37',
                '$tamanho38',
                '$tamanho39',
                '$tamanho40',
                '$tamanho41',
                '$tamanho42',
                '$tamanho43',
                '$tamanho44',
                '$tamanho45',
                '$tamanho46',
                '$tamanho47'
            );
            
            SET @id_tamanhos = LAST_INSERT_ID();
            
            UPDATE bd_adoleta_storage.tb_produtos
            SET id_departamento_produto = @id_departamento,
                id_tamanhos_produto = @id_tamanhos
            WHERE id_produtos = @id_produtos;";
            /*===== TENTAR CONEXÃO =====*/
            try{
                $sql_query1 = $this->con->prepare($sql_code);
                $sql_query1->execute();
                $sql_query1->closeCursor();
            }catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                header("Location: Untitled-8.php?cadastro=error");

            }
                header("Location: Untitled-8.php?cadastro=success");

            exit;            
        }
    }
}
?>