<?php
class BD
{
    private $DB_NOME = "aula2dwii";
    private $DB_USUARIO = "renan";
    private $DB_SENHA = "renan123456789";
    private $DB_CHARSET = "utf8";
    
    public function connection()
    {
        $str_conn = "mysql:host=localhost;dbname=" . $this->DB_NOME;
        return new PDO(
            $str_conn,
            $this->DB_USUARIO,
            $this->DB_SENHA,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->DB_CHARSET)
        );
    }
    public function select()
    {
        $conn = $this->connection();
        $stmt = $conn->prepare("SELECT * FROM pessoa LIMIT 3");
        $stmt->execute();
        return $stmt;
    }
}
$obj = new BD();
$pessoa = $obj->select();
while ($objPessoa = $pessoa->fetchObject()) {
    echo "<h4>"
        .$objPessoa->id." - " 
        .$objPessoa->cpf." - " 
        .$objPessoa->nome." - " 
        .$objPessoa->endereco." - " 
        .$objPessoa->telefone.
    "</h4>";
}
