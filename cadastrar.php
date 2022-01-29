<?php

require_once __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Contato');

use \App\Entity\Contato;
$obContato = new Contato;

    //VALIDACAO DO POST
    if(isset($_POST['nome'],$_POST['email'],$_POST['telefone'])){


        $obContato->nome = $_POST['nome'];
        $obContato->email = $_POST['email'];
        $obContato->telefone = $_POST['telefone'];
        $obContato->cadastrar();

        header('location: index.php?status=success');
        exit;
    }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';


?>
