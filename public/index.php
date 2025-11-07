<?php

session_start();

// Inclui o arquivo de configuração do sistema, que pode conter conexões com o banco de dados, constantes e outras configurações essenciais.
require_once('../config/config.php');

// Cria uma instância da classe Rotas, responsável por gerenciar as rotas do sistema.
$caminho = new Rotas();

// Chama o método 'execultar()' para processar a URL e direcionar a requisição para o controlador correto.
$caminho->executar();
