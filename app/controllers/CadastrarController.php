<?
class CadastrarController extends Controller
{
    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Cadastrar clientes";

        $this->carregarViews('cadastrar', $dados);
    }
}
