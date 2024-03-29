<?php
class BD
{
    private $DB_NOME = "aula2dwii";
    private $DB_USUARIO = "renan";
    private $DB_SENHA = "renan123456789";
    private $DB_CHARSET = "utf8";

    function connection()
    {
        $str_conn = "mysql:host=localhost;dbname=" . $this->DB_NOME;
        return new PDO(
            $str_conn,
            $this->DB_USUARIO,
            $this->DB_SENHA,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->DB_CHARSET)
        );
    }
    function select_BD()
    {
        $conn = $this->connection();
        $stmt = $conn->prepare("SELECT * FROM pessoa LIMIT 10");
        $stmt->execute();

        $stmt->execute();
        return $stmt;
    }

    function select_where_BD($id)
    {
        $sql = "SELECT cpf,nome,endereco,telefone from pessoa WHERE cpf=$id";

        $conn = $this->connection();
        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt;
    }

    function insert_BD($pessoas)
    {

        $sql = "INSERT INTO pessoa(cpf,nome, endereco,telefone)
         VALUES (";

        $sql .= " '" . $pessoas['cpf'] . "','"
            . $pessoas['nome'] . "','"
            . $pessoas['endereco'] . "','"
            . $pessoas['telefone'] . "')";


        $conn = $this->connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    function update_BD($dados, $id)
    {

        $sql = "UPDATE pessoa SET ";

        foreach ($dados as $pessoas) {
            $sql .= " nome='" . $pessoas['nome'] . "',endereco='"
                . $pessoas['endereco'] . "',telefone='"
                . $pessoas['telefone'] . "'";
        }

        $sql .= " WHERE cpf=$id";

        $conn = $this->connection();
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        return $stmt;
    }

    function delete_BD($id)
    {

        $conn = $this->connection();
        $stmt = $conn->prepare("DELETE FROM pessoa WHERE cpf=$id");
        $stmt->execute();

        return $stmt;
    }
}
