<?php

include_once 'User.php';
include_once 'Endereco.php';

class UserComum extends User {

    private $cpf;
    private $peso;
    private $altura;
    private $ocupacao;
    private $historicoDoencas;
    private $alergiasIntolerancias;
    private $medicamentos;
    private $cirurgiasPrevia;
    private $imc;
    private $circunferenciaCintura;
    private $circunferenciaQuadril;
    private $habitosAlimentares;
    private $preferenciasAlimentares;
    private $usaSuplementos;
    private $consumoAguaLitros;
    private $atividadeFisica;
    private $estiloDeVida;


    /**
     * @param $cpf
     */
    public function __construct() {
    }

    public static function createFromDatabase($data) {
        $user = new self();
        $endereco = new Endereco();

        $user->setId($data['id']);
        $user->setNome($data['nome']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setIdade($data['idade']);
        $user->setSexo($data['sexo']);
        $user->setDataNascimento($data['dataNascimento']);
        $user->setCpf($data['cpf']);
        $user->setPeso($data['peso']);
        $user->setAltura($data['altura']);
        $user->setOcupacao($data['ocupacao']);
        $user->setHistoricoDoencas($data['historicoDoencas']);
        $user->setalergiasIntolerancias($data['alergiasIntolerancias']);
        $user->setMedicamentos($data['medicamentos']);
        $user->setCirurgiasPrevia($data['cirurgiasPrevia']);
        $user->setImc($data['imc']);
        $user->setCircunferenciaCintura($data['circunferenciaCintura']);
        $user->setcircunferenciaQuadril($data['circunferenciaQuadril']);
        $user->setHabitosAlimentares($data['habitosAlimentares']);
        $user->setPreferenciasAlimentares($data['preferenciasAlimentares']);
        $user->setUsaSuplementos($data['usaSuplementos']);
        $user->setconsumoAguaLitros($data['consumoAguaLitros']);
        $user->setAtividadeFisica($data['atividadeFisica']);
        $user->setEstiloDeVida($data['estiloDeVida']);
        $endereco->setId($data['id']);
        $endereco->setRua($data['rua']);
        $endereco->setNumero($data['numero']);
        $endereco->setBairro($data['bairro']);
        $endereco->setCidade($data['cidade']);
        $endereco->setEstado($data['estado']);
        $endereco->setCep($data['cep']);
        $user->setEndereco($endereco);

        return $user;
    }

    public static function fromDatabase(array $data) {
        $userComum = new UserComum();

        // Atributos esperados (incluindo os herdados)
        $fields = [
            'id', 'nome', 'email', 'password', 'idade', 'sexo', 'dataNascimento','cpf',
            'peso', 'altura','ocupacao', 'historicoDoencas', 'alergiasIntolerancias', 'medicamentos',
            'cirurgiasPrevia', 'imc', 'circunferenciaCintura', 'circunferenciaQuadril', 'habitosAlimentares',
            'preferenciasAlimentares', 'usaSuplementos', 'consumoAguaLitros', 'atividadeFisica', 'estiloDeVida'];

        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $userComum->$field = $data[$field];
            }
        }
        echo  "Nome: ".$userComum->getNome()."<br>";
        return $userComum;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getOcupacao()
    {
        return $this->ocupacao;
    }

    /**
     * @param mixed $ocupacao
     */
    public function setOcupacao($ocupacao)
    {
        $this->ocupacao = $ocupacao;
    }

    /**
     * @return mixed
     */
    public function getHistoricoDoencas()
    {
        return $this->historicoDoencas;
    }

    /**
     * @param mixed $historicoDoencas
     */
    public function setHistoricoDoencas($historicoDoencas)
    {
        $this->historicoDoencas = $historicoDoencas;
    }

    /**
     * @return mixed
     */
    public function getAlergiasIntolerancias()
    {
        return $this->alergiasIntolerancias;
    }

    /**
     * @param mixed $alergiasIntolerancias
     */
    public function setAlergiasIntolerancias($alergiasIntolerancias)
    {
        $this->alergiasIntolerancias = $alergiasIntolerancias;
    }

    /**
     * @return mixed
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * @param mixed $medicamentos
     */
    public function setMedicamentos($medicamentos)
    {
        $this->medicamentos = $medicamentos;
    }

    /**
     * @return mixed
     */
    public function getCirurgiasPrevia()
    {
        return $this->cirurgiasPrevia;
    }

    /**
     * @param mixed $cirurgiasPrevia
     */
    public function setCirurgiasPrevia($cirurgiasPrevia)
    {
        $this->cirurgiasPrevia = $cirurgiasPrevia;
    }

    /**
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * @param mixed $imc
     */
    public function setImc($imc)
    {
        $this->imc = $imc;
    }

    /**
     * @return mixed
     */
    public function getCircunferenciaCintura()
    {
        return $this->circunferenciaCintura;
    }

    /**
     * @param mixed $circunferenciaCintura
     */
    public function setCircunferenciaCintura($circunferenciaCintura)
    {
        $this->circunferenciaCintura = $circunferenciaCintura;
    }

    /**
     * @return mixed
     */
    public function getCircunferenciaQuadril()
    {
        return $this->circunferenciaQuadril;
    }

    /**
     * @param mixed $circunferenciaQuadril
     */
    public function setCircunferenciaQuadril($circunferenciaQuadril)
    {
        $this->circunferenciaQuadril = $circunferenciaQuadril;
    }

    /**
     * @return mixed
     */
    public function getHabitosAlimentares()
    {
        return $this->habitosAlimentares;
    }

    /**
     * @param mixed $habitosAlimentares
     */
    public function setHabitosAlimentares($habitosAlimentares)
    {
        $this->habitosAlimentares = $habitosAlimentares;
    }

    /**
     * @return mixed
     */
    public function getPreferenciasAlimentares()
    {
        return $this->preferenciasAlimentares;
    }

    /**
     * @param mixed $preferenciasAlimentares
     */
    public function setPreferenciasAlimentares($preferenciasAlimentares)
    {
        $this->preferenciasAlimentares = $preferenciasAlimentares;
    }

    /**
     * @return mixed
     */
    public function getUsaSuplementos()
    {
        return $this->usaSuplementos;
    }

    /**
     * @param mixed $usaSuplementos
     */
    public function setUsaSuplementos($usaSuplementos)
    {
        $this->usaSuplementos = $usaSuplementos;
    }

    /**
     * @return mixed
     */
    public function getConsumoAguaLitros()
    {
        return $this->consumoAguaLitros;
    }

    /**
     * @param mixed $consumoAguaLitros
     */
    public function setConsumoAguaLitros($consumoAguaLitros)
    {
        $this->consumoAguaLitros = $consumoAguaLitros;
    }

    /**
     * @return mixed
     */
    public function getAtividadeFisica()
    {
        return $this->atividadeFisica;
    }

    /**
     * @param mixed $atividadeFisica
     */
    public function setAtividadeFisica($atividadeFisica)
    {
        $this->atividadeFisica = $atividadeFisica;
    }

    /**
     * @return mixed
     */
    public function getEstiloDeVida()
    {
        return $this->estiloDeVida;
    }

    /**
     * @param mixed $estiloDeVida
     */
    public function setEstiloDeVida($estiloDeVida)
    {
        $this->estiloDeVida = $estiloDeVida;
    }
}