<?php

class ErroController extends Controller
{
    public function index()
    {
        echo '<div style="display:flex; flex-direction:column; justify-content:center; align-items:center; height:100vh; text-align:center; font-family:Arial, sans-serif;">
        <h1 style="font-size:3em; font-weight:bold; margin:0; color:#c00;">Página não encontrada !</h1>
        <p style="font-size:1.2em; color:#333;">Verifique a URL ou tente novamente.</p></div> ';
    }
}
