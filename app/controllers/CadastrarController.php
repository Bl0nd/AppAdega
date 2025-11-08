<?php
class CadastrarController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Cadastrar clientes";

        $this->carregarViews('cadastrar', $dados);
    }

    public function salvar()
    {
        $url = API_BASE . 'cadastro';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_SPECIAL_CHARS);

            if (!$nome || !$cpf || !$senha) {
                http_response_code(400);
                echo json_encode(["erro" => "Todos os campos são obrigatórios!"]);
                return;
            }

            $postData = [
                'nome_cliente' => $nome,
                'email_cliente' => $email,
                'cpf_cliente' => $cpf,
                'senha_cliente' => $senha
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData)); // ou json_encode($postData) se API aceitar JSON

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Erro no cURL: ' . curl_error($ch);
            } else {
                $resultado = json_decode($response, true);
                $mensagem = $resultado['mensagem'] ?? 'Tudo Certo!';

                if ($mensagem === 'Tudo Certo!') {
                    header("Location:" . URL_BASE);
                    exit;
                } else {
                    echo "Erro: " . $mensagem;
                }
            }

            curl_close($ch);
        }
    }
}
