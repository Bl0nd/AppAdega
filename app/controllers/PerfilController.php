<?php
class PerfilController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Perfil";

        $this->carregarViews('perfil', $dados);
    }
}
