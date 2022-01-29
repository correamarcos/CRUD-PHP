<main>

    <section>
        <a href="index.php">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </section>

    <h3 class="mt-3"><?=TITLE?></h3>

    <form method="post">
        
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=TITLE == 'Editar Contato' ? $obContato->nome :''?>">    
        </div>

        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?=TITLE == 'Editar Contato' ? $obContato->email :''?>">
        </div>

        <div class="form-group mt-3">
            <label>Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?=TITLE == 'Editar Contato' ?$obContato->telefone :''?>">
        </div>
        
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>

    </form>

</main>