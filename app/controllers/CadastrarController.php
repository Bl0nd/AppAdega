<?php
class CadastrarController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Cadastrar clientes";

        $this->carregarViews('cadastrar', $dados); // Carrega a view 'cadastrar.php' passando os dados
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados = [  // Pega os dados enviados pelo formulário, Usa o operador ?? para evitar erros caso algum campo venha vazio
                'nome' => $_POST['nome_cliente'] ?? '',
                'email' => $_POST['email_cliente'] ?? '',
                'cpf' => $_POST['cpf_cliente'] ?? '',
                'senha' => $_POST['senha_cliente'] ?? '',
                'endereco' => $_POST['endereco'] ?? '',
                'data_nascimento' => $_POST['data_nascimento'] ?? '',
            ];
            $url = API_BASE . 'cadastro';

            $ch = curl_init($url); // Inicializa o CURL para fazer a requisição
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/x-www-form-urlencoded"
            ]);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Pega o código HTTP retornado pela API (201, 400, etc.)
            curl_close($ch);

            $resultado = json_decode($response, true);

            if ($httpCode === 201) {
                $_SESSION['sucesso'] = $resultado['mensagem'] ?? "Cliente cadastrado com sucesso !";
                header("Location: " . URL_BASE . "index.php?url=login");
                exit;
            } else {
                $_SESSION['erroCad'] = $resultado['erroCad'] ?? "Erro ao cadastrar o Cliente";
                header("Location: " . URL_BASE . "index.php?url=cadastrar");
                exit;
            }
        } else {
            header("Location: " . URL_BASE . "index.php?url=cadastrar");
            exit;
        }
    }
}
