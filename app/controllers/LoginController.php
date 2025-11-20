<?php

class LoginController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Login";

        $this->carregarViews('login', $dados);
    }

    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email_cliente'] ?? '';
            $senha = $_POST['senha_cliente'] ?? '';

            $url = API_BASE . "login";  // Define a URL da API de login

            $postData = http_build_query([ // Prepara os dados para enviar via POST
                "email_cliente" => $email,
                "senha_cliente" => $senha
            ]);

            $ch = curl_init($url); //Inicializa uma sessão cURL para fazer uma requisição HTTP para a URL da API

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Define que a resposta deve ser retornada como string
            curl_setopt($ch, CURLOPT_POST, true); // Define que será uma requisição POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  // Define os dados que serão enviados no corpo da requisição

            $response = curl_exec($ch); // Executa a requisição e guarda a resposta
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Pega o código HTTP da resposta (ex: 200, 404..)

            if ($response === false) { // Se a requisição falhar, mostra erro e redireciona para login
                $_SESSION['erro_login'] = "Erro ao conectar com o servidor";
                header("Location: " . URL_BASE . "index.php?url=login");
                exit;
            }

            curl_close($ch);
            $resultado = json_decode($response, true); // Converte a resposta JSON em array PHP

            if ($httpCode === 200) {
                $_SESSION['token'] = $resultado['Token']; // Salva o token e o ID do cliente na sessão
                // $_SESSION['id_cliente'] = $resultado['id_cliente'];
                header("Location: " . URL_BASE . "index.php?url=menu"); // Redireciona para o menu principal
                exit;
            } else {
                $_SESSION['erro_login'] = $resultado['mensagem'] ?? "Credenciais inválidas"; // Se o login falhar, mostra mensagem de erro e volta para login
                header("Location: " . URL_BASE . "index.php?url=login");
                exit;
            }
        }
    }

    //--REDEFINIR SENHA -------------------------------------------
    public function redefinirSenha($param = null)
    {
        $dados = array();
        $token = null;

        //Se o parâmetro vier como "token=5"
        if ($param && str_contains($param, '=')) {
            [$chave, $valor] = explode('=', $param, 2);
            if ($chave === 'token') {
                $token = $valor;
            }
        } else {
            $token = $param; //se vier só o valor sem "token="
        }

        $dados['titulo'] = "Redefinir Senha";
        $dados['token'] = $token;

        $this->carregarViews('redefinir_senha', $dados);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        header("Location:" . URL_BASE); 
        exit;
    }
}