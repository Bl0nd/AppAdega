<?php

class MenuController extends Controller
{
    public function index()
    {
        $url = API_BASE . 'listarprodutos'; // endpoint da API

        // Inicializa o cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Executa a requisição
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Erro no cURL: ' . curl_error($ch);
            return;
        }

        curl_close($ch);

        // Decodifica o JSON recebido da API
        $produtos = json_decode($response, true);

        $dados = [
            'titulo' => 'Menu da Adega',
            'produtos' => $produtos
        ];

        $this->carregarViews('menu', $dados);
    }
}
