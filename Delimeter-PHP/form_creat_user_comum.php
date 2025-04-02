<?php

include_once 'repository/UserRepository.php';
include_once 'model/UserComum.php';
include_once 'model/Endereco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $ocupacao = $_POST['ocupacao'];
    $historicoDoencas = $_POST['historicoDoencas'];
    $alergiasIntolerancias = $_POST['alergiasIntolerancias'];
    $medicamentos = $_POST['medicamentos'];
    $cirurgiasPrevia = $_POST['cirurgiasPrevia'];
    $imc =  $peso / ($altura * $altura);
    $circunferenciaCintura = $_POST['circunferenciaCintura'];
    $circunferenciaQuadril = $_POST['circunferenciaQuadril'];
    $habitosAlimentares = $_POST['habitosAlimentares'];
    $preferenciasAlimentares = $_POST['preferenciasAlimentares'];
    $usaSuplementos = $_POST['usaSuplementos'];
    $consumoAguaLitros = $_POST['consumoAguaLitros'];
    $atividadeFisica = $_POST['atividadeFisica'];
    $estiloDeVida = $_POST['estiloDeVida'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    $endereco = new Endereco($rua, $numero, $bairro, $cidade, $estado, $cep);
    $userComum = new UserComum($nome, $email, $password, $idade, $sexo, $dataNascimento, $endereco, $cpf, $peso, $altura,
                               $ocupacao, $historicoDoencas, $alergiasIntolerancias, $medicamentos, $cirurgiasPrevia,
                               $imc, $circunferenciaCintura, $circunferenciaQuadril, $habitosAlimentares, $preferenciasAlimentares,
                               $usaSuplementos, $consumoAguaLitros, $atividadeFisica, $estiloDeVida);
    $repository = new UserRepository();
    $repository->createUser($userComum);

    header("Location: login.php");
    exit;
}

require "header.php";
?>
    <div class="container">
        <h1>Cadastro de Cliente</h1>
        <form method="post" action="form_creat_user_comum.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" name="idade" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" required>
                    <option value="">Selecione</option>
                    <option value="masculino">MASCULINO</option>
                    <option value="feminino">FEMININO</option>
                    <option value="outro">OUTRO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" name="dataNascimento" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input type="number" name="peso" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="altura">Altura</label>
                <input type="number" name="altura" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="ocupacao">Ocupação</label>
                <input type="text" name="ocupacao" required>
            </div>
            <div class="form-group">
                <label for="historicoDoencas">Historico de doença</label>
                <input type="text" name="historicoDoencas" required>
            </div>
            <div class="form-group">
                <label for="alergiasIntolerancias">Alergias e Intolerancias</label>
                <input type="text" name="alergiasIntolerancias" required>
            </div>
            <div class="form-group">
                <label for="medicamentos">Medicamentos</label>
                <input type="text" name="medicamentos" required>
            </div>
            <div class="form-group">
                <label for="circunferenciaCintura">Circunferencia Cintura</label>
                <input type="number" name="circunferenciaCintura" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="circunferenciaQuadril">Circunferencia Quadril</label>
                <input type="number" name="circunferenciaQuadril" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="habitosAlimentares">Habitos Alimentares</label>
                <input type="text" name="habitosAlimentares" required>
            </div>
            <div class="form-group">
                <label for="preferenciasAlimentares">Preferências Alimentares</label>
                <input type="text" name="preferenciasAlimentares" required>
            </div>
            <div class="form-group">
                <label for="consumoAguaLitros">Consumo De Agua Litros</label>
                <input type="number" name="consumoAguaLitros" step="0.001" required>
            </div>
            <div class="form-group">
                <label for="atividadeFisica">Atividade física tipo</label>
                <input type="text" name="atividadeFisica" required>
            </div>
            <div class="form-group">
                <label for="usaSuplementos">Faz uso de suplementos</label>
                <select name="usaSuplementos" required>
                    <option value="">Selecione</option>
                    <option value="sim">SIM</option>
                    <option value="nao">NÃO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estiloDeVida">Estilo de vida ativo ou sedentário</label>
                <select name="estiloDeVida" required>
                    <option value="">Selecione</option>
                    <option value="ativo">ATIVO</option>
                    <option value="sedentario">SEDENTÁRIO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cirurgiasPrevia">Fez alguma cirurgia recente</label>
                <select name="cirurgiasPrevia" required>
                    <option value="">Selecione</option>
                    <option value="sim">SIM</option>
                    <option value="nao">NÃO</option>
                </select>
            </div>
            <div class="form-group">
                <h3>Endereço</h3>
                <label for="rua">Rua</label>
                <input type="text" name="rua" required>
            </div>
            <div class="form-group">
                <label for="numero">Numero</label>
                <input type="text" name="numero" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" required>
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
                <input type="text" name="cep" required>
            </div>
            <button type="submit">Criar Usuário</button>
        </form>
    </div>
<?php require "footer.php"; ?>