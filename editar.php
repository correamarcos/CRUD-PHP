<?php

require_once __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Contato');

use \App\Entity\Contato;

//VALIDACAO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA O CONTATO
$obContato = Contato::getContato($_GET['id']);

//VALIDACAO DO CONTATO
if (!$obContato instanceof Contato) {
    header('location: index.php?status=error');
    exit;
}

    //VALIDACAO DO POST
    if(isset($_POST['nome'],$_POST['email'],$_POST['telefone'])){

        $obContato->nome = $_POST['nome'];
        $obContato->email = $_POST['email'];
        $obContato->telefone = $_POST['telefone'];
        $obContato->atualizar();

        header('location: index.php?status=success');
        exit;
    }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';


?>
