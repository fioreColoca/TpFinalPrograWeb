<?php

class ListaUsuarioController
{
    private $render;
    private $usuarioModel;
    private $loginModel;

    public function __construct($render, $usuarioModel, $loginModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->loginModel = $loginModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        echo $this->render->render("view/listaUsuariosView.php", $data);

    }

    public function mostrarUsuarios()
    {

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["usuarios"] = $this->usuarioModel->mostrarUsuarios();

        echo $this->render->render("view/listaUsuariosView.php", $data);


    }


}