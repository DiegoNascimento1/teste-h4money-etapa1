<?php
//Menu
include 'config/menu.php';
//Conexão
include_once 'config/db_connect.php';
//Verificar se possui parametro
if (isset($_GET['id'])) :
    //pegando id passado pelo parametro 
    $id = mysqli_escape_string($connect, $_GET['id']);
    //listando dados a partir do id
    $sql = "SELECT * FROM cliente WHERE id = '$id'";
    $dados = mysqli_query($connect, $sql);
    $lista = mysqli_fetch_array($dados);
endif;
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
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <h5>Editar Cliente</h5>
    <!-- Formulario -->
    <form action="config/edit.php" method="POST">
        <div class="row">
            <div class="form-group col-lg-1">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $lista['id']; ?>" readonly>
            </div>
            <div class="form-group col-lg-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome completo"
                    value="<?php echo $lista['nome']; ?>">
            </div>
            <div class="form-group col-lg-3">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe seu CPF"
                    value="<?php echo $lista['cpf']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Informe seu e-mail"
                value="<?php echo $lista['email']; ?>">
        </div>
        <div class="row">
            <div class="form-group col-lg-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe seu CEP"
                    value="<?php echo $lista['cep']; ?>">
            </div>
            <div class="form-group col-lg-9">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe seu endereço"
                    value="<?php echo $lista['endereco']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-2">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe seu numero"
                    value="<?php echo $lista['numero']; ?>">
            </div>
            <div class="form-group col-lg-4">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe seu bairro"
                    value="<?php echo $lista['bairro']; ?>">
            </div>
            <div class="form-group col-lg-4">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe sua Cidade"
                    value="<?php echo $lista['cidade']; ?>">
            </div>
            <div class="form-group col-lg-2">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe seu estado"
                    value="<?php echo $lista['uf']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" name="btn-edit" class="btn btn-primary">Atualizar</button>
            <a class="btn btn-danger ml-3" href="listCliente.php">
                Cancelar
            </a>
        </div>
    </form>
</main>
<?php
//Footer
include 'config/footer.php';
?>