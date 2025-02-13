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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $endereco = new Endereco();
    $userComum = new UserComum();

    $endereco = new Endereco();
    $endereco->setId($_POST['endereco_id']);
    $endereco->setRua($_POST['rua']);
    $endereco->setNumero($_POST['numero']);
    $endereco->setBairro($_POST['bairro']);
    $endereco->setCidade($_POST['cidade']);
    $endereco->setEstado($_POST['estado']);
    $endereco->setCep($_POST['cep']);

    $userComum = new UserComum();
    $userComum->setId($_POST['id']);
    $userComum->setNome($_POST['nome']);
    $userComum->setEmail($_POST['email']);
    $userComum->setPassword($_POST['password']);
    $userComum->setIdade($_POST['idade']);
    $userComum->setSexo($_POST['sexo']);
    $userComum->setDataNascimento($_POST['dataNascimento']);
    $userComum->setCpf($_POST['cpf']);
    $userComum->setPeso($_POST['peso']);
    $userComum->setAltura($_POST['altura']);
    $userComum->setOcupacao($_POST['ocupacao']);
    $userComum->setHistoricoDoencas($_POST['historicoDoencas']);
    $userComum->setAlergiasIntolerancias($_POST['alergiasIntolerancias']);
    $userComum->setMedicamentos($_POST['medicamentos']);
    $userComum->setCirurgiasPrevia($_POST['cirurgiasPrevia']);
    $userComum->setImc($_POST['peso'] / ($_POST['altura'] * $_POST['altura']));
    $userComum->setCircunferenciaCintura($_POST['circunferenciaCintura']);
    $userComum->setCircunferenciaQuadril($_POST['circunferenciaQuadril']);
    $userComum->setHabitosAlimentares($_POST['habitosAlimentares']);
    $userComum->setPreferenciasAlimentares($_POST['preferenciasAlimentares']);
    $userComum->setUsaSuplementos($_POST['usaSuplementos']);
    $userComum->setConsumoAguaLitros($_POST['consumoAguaLitros']);
    $userComum->setAtividadeFisica($_POST['atividadeFisica']);
    $userComum->setEstiloDeVida($_POST['estiloDeVida']);
    $userComum->setEndereco($endereco);

    $repository->update($userComum);

    header("Location: dashboard.php");
    exit;
}

require "header.php";
?>
    <div class="container">
        <h1>Cadastro de Cliente</h1>
        <form method="post" action="form_update_user_comum.php" >

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
                <select name="sexo" value="<?php echo $user->getSexo();?>"  required>
                    <option value="">Selecione</option>
                    <option value="masculino">MASCULINO</option>
                    <option value="feminino">FEMININO</option>
                    <option value="outro">OUTRO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" name="dataNascimento" value="<?php echo $user->getDataNascimento();?>"  required>
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
                <input type="text" name="atividadeFisica" value="<?php echo $user->getAtividadeFisica();?>"  required>
            </div>
            <div class="form-group">
                <label for="usaSuplementos">Faz uso de suplementos</label>
                <select name="usaSuplementos" value="<?php echo $user->getUsaSuplementos();?>"  required>
                    <option value="">Selecione</option>
                    <option value="sim">SIM</option>
                    <option value="nao">NÃO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estiloDeVida">Estilo de vida ativo ou sedentário</label>
                <select name="estiloDeVida" value="<?php echo $user->getEstiloDeVida();?>"  required>
                    <option value="">Selecione</option>
                    <option value="ativo">ATIVO</option>
                    <option value="sedentario">SEDENTÁRIO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cirurgiasPrevia">Fez alguma cirurgia recente</label>
                <select name="cirurgiasPrevia" value="<?php echo $user->getCirurgiasPrevia();?>"  required>
                    <option value="">Selecione</option>
                    <option value="sim">SIM</option>
                    <option value="nao">NÃO</option>
                </select>
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
                <select name="estado" value="<?php echo $user->getEndereco()->getEstado();?>"  required>
                    <option value="">Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" value="<?php echo $user->getEndereco()->getCep();?>"  required>
            </div>
            <button type="submit">Criar Usuário</button>
        </form>
    </div>
<?php require "footer.php"; ?>