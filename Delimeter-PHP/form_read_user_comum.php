<?php

include_once 'repository/UserRepository.php';
include_once 'model/UserComum.php';
include_once 'model/Endereco.php';
include_once 'Autenticacao.php';

$autenticacao = new Autenticacao();

if (!$autenticacao->isLoggedIn()) {
    header(" Location: login.php");
    exit;
}

$repository = new UserRepository();
$user = new UserComum();
$user = $repository->findByIdEndereco($_SESSION['user_id'] ? $_SESSION['user_id'] : $_POST['id']);

require "header.php";
?>
    <div class="container">
        <h1>Cadastro de Cliente</h1>
        <form method="post" action="dashboard.php" >
            <input type="hidden" name="id" value="<?php echo $user->getId();?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $user->getNome();?>"  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $user->getEmail();?>"  required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" value="<?php echo $user->getPassword();?>"  required>
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" name="idade" value="<?php echo $user->getIdade();?>"  required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" name="sexo" value="<?php echo $user->getSexo();?>"  required>
            </div>
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="text" name="dataNascimento" value="<?php echo $user->getDataNascimento();?>"  required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" value="<?php echo $user->getCpf();?>"  required>
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input type="number" name="peso" step="0.01" value="<?php echo $user->getPeso();?>"  required>
            </div>
            <div class="form-group">
                <label for="altura">Altura</label>
                <input type="number" name="altura" step="0.01" value="<?php echo $user->getAltura();?>"  required>
            </div>
            <div class="form-group">
                <label for="ocupacao">Ocupação</label>
                <input type="text" name="ocupacao" value="<?php echo $user->getOcupacao();?>"  required>
            </div>
            <div class="form-group">
                <label for="historicoDoencas">Historico de doença</label>
                <input type="text" name="historicoDoencas" value="<?php echo $user->getHistoricoDoencas();?>"  required>
            </div>
            <div class="form-group">
                <label for="alergiasIntolerancias">Alergias e Intolerancias</label>
                <input type="text" name="alergiasIntolerancias" value="<?php echo $user->getAlergiasIntolerancias();?>"  required>
            </div>
            <div class="form-group">
                <label for="medicamentos">Medicamentos</label>
                <input type="text" name="medicamentos" value="<?php echo $user->getMedicamentos();?>"  required>
            </div>
            <div class="form-group">
                <label for="circunferenciaCintura">Circunferencia Cintura</label>
                <input type="number" name="circunferenciaCintura" step="0.01" value="<?php echo $user->getCircunferenciaCintura();?>"  required>
            </div>
            <div class="form-group">
                <label for="circunferenciaQuadril">Circunferencia Quadril</label>
                <input type="number" name="circunferenciaQuadril" step="0.01" value="<?php echo $user->getCircunferenciaQuadril();?>"  required>
            </div>
            <div class="form-group">
                <label for="habitosAlimentares">Habitos Alimentares</label>
                <input type="text" name="habitosAlimentares" value="<?php echo $user->getHabitosAlimentares();?>"  required>
            </div>
            <div class="form-group">
                <label for="preferenciasAlimentares">Preferências Alimentares</label>
                <input type="text" name="preferenciasAlimentares" value="<?php echo $user->getPreferenciasAlimentares();?>"  required>
            </div>
            <div class="form-group">
                <label for="consumoAguaLitros">Consumo De Agua Litros</label>
                <input type="number" name="consumoAguaLitros" step="0.001" value="<?php echo $user->getConsumoAguaLitros();?>"  required>
            </div>
            <div class="form-group">
                <label for="atividadeFisica">Atividade física tipo</label>
                <input type="text" name="atividadeFisica" value="<?php echo $user->getAtividadeFisica();?>" required>
            </div>
            <div class="form-group">
                <label for="usaSuplementos">Faz uso de suplementos</label>
                <input type="text" name="usaSuplementos" value="<?php echo $user->getUsaSuplementos();?>" required>
            </div>
            <div class="form-group">
                <label for="estiloDeVida">Estilo de vida ativo ou sedentário</label>
                <input type="text" name="estiloDeVida" value="<?php echo $user->getEstiloDeVida();?>" required>
            </div>
            <div class="form-group">
                <label for="cirurgiasPrevia">Fez alguma cirurgia recente</label>
                <input type="text" name="cirurgiasPrevia" value="<?php echo $user->getCirurgiasPrevia();?>" required>
            </div>
            <div class="form-group">
                <h3>Endereço</h3>
                <input type="hidden" name="endereco_id" value="<?php echo $user->getEndereco()->getId();?>" >
                <label for="rua">Rua</label>
                <input type="text" name="rua" value="<?php echo $user->getEndereco()->getRua();?>"  required>
            </div>
            <div class="form-group">
                <label for="numero">Numero</label>
                <input type="text" name="numero" value="<?php echo $user->getEndereco()->getNumero();?>"  required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" value="<?php echo $user->getEndereco()->getBairro();?>"  required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" value="<?php echo $user->getEndereco()->getCidade();?>"  required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" name="estado" value="<?php echo $user->getEndereco()->getEstado();?>" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" value="<?php echo $user->getEndereco()->getCep();?>"  required>
            </div>
            <button type="submit">VOLTAR</button>
        </form>
    </div>
<?php require "footer.php"; ?>