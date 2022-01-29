<?php

require_once __DIR__.'/vendor/autoload.php';

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
    if(isset($_POST['excluir'])){

        $obContato->excluir();

        header('location: index.php?status=success');
        exit;
    }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';

?>
