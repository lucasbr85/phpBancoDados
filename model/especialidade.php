<?php
class Especialidade
{
    private $id_especialidade;
    private $especialidade;
    private $valor_dia;

    //ID --------------------
    public function getId()
    {
        return $this->id_especialidade;
    }

    public function setId($id)
    {
        $this->id_especialidade = $id;
    }

    //especialidade --------------------
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    public function setEspecialidade($especialidade)
    {
        $this->especialidade = $especialidade;
    }

    //Valor --------------------
    public function getValor_dia()
    {
        return $this->valor_dia;
    }

    public function setValor_dia($valor_dia)
    {
        $this->valor_dia = $valor_dia;
    }

    function add()
    {
        try {
            $sql = "insert into especialidade (especialidade, valor_dia) 
            values (:especialidade, :valor)";
            require_once("dao.php");
            $dao = new Dao;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":especialidade", getEspecialidade());
            $stman->bindParam(":valor", getValor_dia());
            $stman->execute();
            aviso("Cadastrado!");
        } catch (Exception $e) {
            erro("Erro ao cadastrar! " . $e->getMessage());
        }
    }

    function listAll()
    {
        $result = null;
        try {
            $sql = "select * from especialidade";
            require_once("dao.php");
            $dao = new Dao;
            $stman = $dao->conecta()->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            erro("Erro ao listar! " . $e->getMessage());
        }
        return $result;
    }
}
