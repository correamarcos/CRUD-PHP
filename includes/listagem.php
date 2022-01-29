<?php

use App\Entity\Contato;

$mensagem = '';
if (isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Operação efetuada com Sucesso!</div>';
            break;
        
            case 'error':
                $mensagem = '<div class="alert alert-danger">Falha ao efetuar a operação!</div>';
                break;
    }
}

$resultados = '';
    foreach($contatos as $contato){
        $resultados .= '<tr>
                            <td>'.$contato->id.'</td>
                            <td>'.$contato->nome.'</td>
                            <td>'.$contato->email.'</td>
                            <td>'.$contato->telefone.'</td>
                            <td>
                                <a href="editar.php?id='.$contato->id.'"><button type="button" class="btn btn-primary">Editar</button></a>
                                <a href="excluir.php?id='.$contato->id.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="5" class="text-center">Nenhum contato encontrado</td>
                                                       </tr>';
?>

<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo Contato</button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Opções</th>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>

    </section>

</main>
