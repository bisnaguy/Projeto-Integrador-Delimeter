<?php

include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../model/UserComum.php';
include_once __DIR__ . '/../model/Endereco.php';

class UserRepository {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createUser(UserComum $userComum) {
        //inserir o endereço primeiro do usuario
        $sqlEndereco =  "INSERT INTO enderecos (rua, numero, bairro, cidade, estado, cep) 
                                VALUES (:rua, :numero, :bairro, :cidade, :estado, :cep)";
        $stmtEndereco = $this->conn->prepare($sqlEndereco);
        $stmtEndereco->bindValue(':rua', $userComum->getEndereco()->getRua());
        $stmtEndereco->bindValue(':numero', $userComum->getEndereco()->getNumero());
        $stmtEndereco->bindValue(':bairro', $userComum->getEndereco()->getBairro());
        $stmtEndereco->bindValue(':cidade', $userComum->getEndereco()->getCidade());
        $stmtEndereco->bindValue(':estado', $userComum->getEndereco()->getEstado());
        $stmtEndereco->bindValue(':cep', $userComum->getEndereco()->getCep());
        $stmtEndereco->execute();
        $enderecoId = $this->conn->lastInsertId();

        //inseria o usuarioComum junto com o id_endereco
        $sqlUserComum = "INSERT INTO userComum (nome, email, password, idade, sexo, dataNascimento, endereco_id,
                                cpf, peso, altura, ocupacao, historicoDoencas, alergiasIntolerancias, medicamentos,
                                cirurgiasPrevia, imc, circunferenciaCintura, circunferenciaQuadril, habitosAlimentares,
                                preferenciasAlimentares, usaSuplementos, consumoAguaLitros, atividadeFisica, estiloDeVida) 
                                VALUES (:nome, :email, :password, :idade, :sexo, :dataNascimento, :endereco_id,
                                        :cpf, :peso, :altura, :ocupacao, :historicoDoencas, :alergiasIntolerancias, :medicamentos,
                                        :cirurgiasPrevia, :imc, :circunferenciaCintura, :circunferenciaQuadril, :habitosAlimentares,
                                        :preferenciasAlimentares, :usaSuplementos, :consumoAguaLitros, :atividadeFisica, :estiloDeVida)";
        $stmtUserComum = $this->conn->prepare($sqlUserComum);
        $stmtUserComum->bindValue(':nome', $userComum->getNome());
        $stmtUserComum->bindValue(':email', $userComum->getEmail());
        $stmtUserComum->bindValue(':password', password_hash($userComum->getPassword(), PASSWORD_DEFAULT));
        $stmtUserComum->bindValue(':idade', $userComum->getIdade());
        $stmtUserComum->bindValue(':sexo', $userComum->getSexo());
        $stmtUserComum->bindValue(':dataNascimento', $userComum->getDataNascimento());
        $stmtUserComum->bindValue(':endereco_id', $enderecoId);
        $stmtUserComum->bindValue(':cpf', $userComum->getCpf());
        $stmtUserComum->bindValue(':peso', $userComum->getPeso());
        $stmtUserComum->bindValue(':altura', $userComum->getAltura());
        $stmtUserComum->bindValue(':ocupacao', $userComum->getOcupacao());
        $stmtUserComum->bindValue(':historicoDoencas', $userComum->getHistoricoDoencas());
        $stmtUserComum->bindValue(':alergiasIntolerancias', $userComum->getAlergiasIntolerancias());
        $stmtUserComum->bindValue(':medicamentos', $userComum->getMedicamentos());
        $stmtUserComum->bindValue(':cirurgiasPrevia', $userComum->getCircunferenciaCintura());
        $stmtUserComum->bindValue(':imc', $userComum->getImc());
        $stmtUserComum->bindValue(':circunferenciaCintura', $userComum->getCircunferenciaCintura());
        $stmtUserComum->bindValue(':circunferenciaQuadril', $userComum->getCircunferenciaQuadril());
        $stmtUserComum->bindValue(':habitosAlimentares', $userComum->getHabitosAlimentares());
        $stmtUserComum->bindValue(':preferenciasAlimentares', $userComum->getPreferenciasAlimentares());
        $stmtUserComum->bindValue(':usaSuplementos', $userComum->getUsaSuplementos());
        $stmtUserComum->bindValue(':consumoAguaLitros', $userComum->getConsumoAguaLitros());
        $stmtUserComum->bindValue(':atividadeFisica', $userComum->getAtividadeFisica());
        $stmtUserComum->bindValue(':estiloDeVida', $userComum->getEstiloDeVida());
        $stmtUserComum->execute();
    }

    public function findByEmail($email){
        $sql = "SELECT u.*, e.* FROM userComum u 
                INNER JOIN enderecos e 
                ON u.endereco_id = e.id 
                WHERE u.email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $endereco = new Endereco($data['rua'], $data['numero'],
                $data['bairro'], $data['cidade'], $data['estado'], $data['cep']);
            return new UserComum($data['nome'],  $data['email'], $data['idade'], $data['sexo'],
                $data['dataNascimento'], $endereco, $data['cpf'], $data['peso'], $data['altura'],
                $data['ocupacao'], $data['historicoDoencas'], $data['alergiasIntolerancias']);
        }
        return null;
    }

    public function findByEmailPassword($email) {
        $sql = "SELECT * FROM userComum WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return UserComum::createFromDatabase($data);
        }
        return null;
    }

    public function findById($id) {
        $sql = "SELECT * FROM userComum WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return UserComum::createFromDatabase($data);
        }
        return null;
    }

    public function findByIdEndereco($id) {
        $sql = "SELECT u.*, e.*
                FROM userComum u
                INNER JOIN enderecos e
                ON u.endereco_id = e.id
                WHERE u.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return UserComum::createFromDatabase($data);
        }
        return null;
    }

    public function update(UserComum $userComum) {

        $sqlUser = "UPDATE userComum AS u
                  INNER JOIN enderecos AS e ON u.endereco_id = e.id
                  SET 
                      u.nome = :nome,
                      u.email = :email,
                      u.password = :password,
                      u.idade = :idade,
                      u.sexo = :sexo,
                      u.dataNascimento = :dataNascimento,
                      u.cpf = :cpf,
                      u.peso = :peso,
                      u.altura = :altura,
                      u.ocupacao = :ocupacao,
                      u.historicoDoencas = :historicoDoencas,
                      u.alergiasIntolerancias = :alergiasIntolerancias,
                      u.medicamentos = :medicamentos,
                      u.cirurgiasPrevia = :cirurgiasPrevia,
                      u.imc = :imc,
                      u.circunferenciaCintura = :circunferenciaCintura,
                      u.circunferenciaQuadril = :circunferenciaQuadril,
                      u.habitosAlimentares = :habitosAlimentares,
                      u.preferenciasAlimentares = :preferenciasAlimentares,
                      u.usaSuplementos = :usaSuplementos,
                      u.consumoAguaLitros = :consumoAguaLitros,
                      u.atividadeFisica = :atividadeFisica,
                      u.estiloDeVida = :estiloDeVida,
                      e.rua = :rua,
                      e.numero = :numero,
                      e.bairro = :bairro,
                      e.cidade = :cidade,
                      e.estado = :estado,
                      e.cep = :cep
                  WHERE u.id = :id";

        $stmtUserComum = $this->conn->prepare($sqlUser);

        $stmtUserComum->bindValue(':id', $userComum->getId());
        $stmtUserComum->bindValue(':nome', $userComum->getNome());
        $stmtUserComum->bindValue(':email', $userComum->getEmail());
        $stmtUserComum->bindValue(':password', $userComum->getPassword());
        $stmtUserComum->bindValue(':idade', $userComum->getIdade());
        $stmtUserComum->bindValue(':sexo', $userComum->getSexo());
        $stmtUserComum->bindValue(':dataNascimento', $userComum->getDataNascimento());
        $stmtUserComum->bindValue(':cpf', $userComum->getCpf());
        $stmtUserComum->bindValue(':peso', $userComum->getPeso());
        $stmtUserComum->bindValue(':altura', $userComum->getAltura());
        $stmtUserComum->bindValue(':ocupacao', $userComum->getOcupacao());
        $stmtUserComum->bindValue(':historicoDoencas', $userComum->getHistoricoDoencas());
        $stmtUserComum->bindValue(':alergiasIntolerancias', $userComum->getAlergiasIntolerancias());
        $stmtUserComum->bindValue(':medicamentos', $userComum->getMedicamentos());
        $stmtUserComum->bindValue(':cirurgiasPrevia', $userComum->getCirurgiasPrevia());
        $stmtUserComum->bindValue(':imc', $userComum->getImc());
        $stmtUserComum->bindValue(':circunferenciaCintura', $userComum->getCircunferenciaCintura());
        $stmtUserComum->bindValue(':circunferenciaQuadril', $userComum->getCircunferenciaQuadril());
        $stmtUserComum->bindValue(':habitosAlimentares', $userComum->getHabitosAlimentares());
        $stmtUserComum->bindValue(':preferenciasAlimentares', $userComum->getPreferenciasAlimentares());
        $stmtUserComum->bindValue(':usaSuplementos', $userComum->getUsaSuplementos());
        $stmtUserComum->bindValue(':consumoAguaLitros', $userComum->getConsumoAguaLitros());
        $stmtUserComum->bindValue(':atividadeFisica', $userComum->getAtividadeFisica());
        $stmtUserComum->bindValue(':estiloDeVida', $userComum->getEstiloDeVida());

        $endereco = $userComum->getEndereco();
        $stmtUserComum->bindValue(':rua', $endereco->getRua());
        $stmtUserComum->bindValue(':numero', $endereco->getNumero());
        $stmtUserComum->bindValue(':bairro', $endereco->getBairro());
        $stmtUserComum->bindValue(':cidade', $endereco->getCidade());
        $stmtUserComum->bindValue(':estado', $endereco->getEstado());
        $stmtUserComum->bindValue(':cep', $endereco->getCep());

        $stmtUserComum->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM userComum WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}