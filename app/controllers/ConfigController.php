<?php
class ConfigController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Configurações";

        $this->carregarViews('config', $dados);
    }
}
