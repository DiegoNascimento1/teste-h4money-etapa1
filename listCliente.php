<?php
//Menu
include 'config/menu.php';
//Conexão
include_once 'config/db_connect.php';
$sql = "SELECT * FROM cliente";
$dados = mysqli_query($connect, $sql);
$qtd = mysqli_num_rows($dados);
?>
<!-- Menu lateral -->
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listCliente.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <!-- Mensagem de alerta -->
    <?php 
            //Iniciar sessão
            session_start();
            if (isset($_SESSION['mensagem'])) : ?>
    <div class="alert alert-dark" role="alert">
        <?php
                echo $_SESSION['mensagem'];
                ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php 
            endif;
            session_unset(); ?>
    <!-- Titulo -->
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <!-- Subtitulo e botão cadastrar-->
    <div class="row">
        <div class="col">
            <h4>Lista de Clientes</h4>
        </div>
        <div class="col text-right">
            <div class="mb-3">
                <a class="btn btn-alert-light" href="createCliente.php">
                    Cadastrar +
                </a>
            </div>
        </div>
    </div>
    <!-- Tabela de dados -->
    <?php
            if($qtd > 0):
                ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>CPF</th>
                    <th colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($lista = mysqli_fetch_array($dados)) :
                ?>
                <tr>
                    <td><?php echo $lista['id']; ?></td>
                    <td><?php echo $lista['nome']; ?></td>
                    <td><?php echo $lista['email']; ?></td>
                    <td><?php echo $lista['endereco']; ?></td>
                    <td><?php echo $lista['cpf']; ?></td>
                    <!-- Botoes das açoes -->
                    <td class="text-center">
                        <a class="btn btn-primary" href="editCliente.php?id=<?php echo $lista['id']; ?>">
                            Editar
                        </a>
                    </td>
                    <td class="text-center">
                        <!-- Botão excluir com modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deleteModal<?php echo $lista['id']; ?>">
                            Excluir
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal<?php echo $lista['id']; ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Deseja realmente
                                            excluir
                                            o cliente <?php echo $lista['nome']; ?>?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="config/delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $lista['id']; ?>">
                                            <button type="submit" class="btn btn-success"
                                                name="btn-delete">Confirmar</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- Mensagem caso não haja clientes cadastrados -->
        <?php 
                else: ?>
        <div class="border-top pt-4 text-center">
            Não há clientes cadastrados
        </div>
        <?php endif; ?>
    </div>
</main>
<?php
//Footer
include 'config/footer.php';
?>