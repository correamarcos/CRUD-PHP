<?php

require_once __DIR__.'/vendor/autoload.php';

use \App\Entity\Contato;

$contatos = Contato::getContatos();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';


?>
