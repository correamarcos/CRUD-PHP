<main>

    <h3 class="mt-3">Excluir Contato</h3>

    <form method="post">
        
        <div class="form-group">
            <p>Voce deseja realmente excluir a vaga <strong><?=$obContato->nome?></strong>?</p>
        </div>
        
        <div class="form-group mt-3">
        <a href="index.php">
            <button class="btn btn-warning" type="button">Cancelar</button>
        </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>

    </form>

</main>