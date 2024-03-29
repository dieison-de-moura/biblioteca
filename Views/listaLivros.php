<?php
include 'head.php';
include '../Controllers/getData.php';

$livros = buscaLivros("SELECT * FROM livros;");

if (isset($_GET['next']) && $_GET['next'] == 'ok') {
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Cadastro realizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
} elseif (isset($_GET['next']) && $_GET['next'] == 'error') {
?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Infelizmente ocorreu um erro ao realizar o cadastro!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
}
?>
<div class="container margin-top-50">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Editora</th>
                <th scope="col">Idioma</th>
                <th scope="col">Autor</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($livros) && is_array($livros)) {
                foreach ($livros as $livro) { ?>

                    <tr>
                        <th scope="row"><?php echo $livro['id'] ?></th>
                        <td><?php echo $livro['titulo'] ?></td>
                        <td><?php echo $livro['editora'] ?></td>
                        <td><?php echo $livro['idioma'] ?></td>
                        <td><?php echo $livro['autor'] ?></td>
                        <td><a type="button" class="btn btn-info" href="cadastroLivro.php?id=<?php echo $livro['id'] ?>"> Editar</a></td>
                    </tr>


            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php';
?>