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

        /*
        $dados = $this->select_BD();
        $sql = "SELECT pessoa ";

        $flag = 0;
        foreach($dados as $campo => $valor) {
            if($flag == 0) { $sql .= "$campo=:$campo"; }
            else { $sql .= ", $campo=:$campo"; }
            $flag = 1;
        }

        $sql .= " WHERE id=$id";

        $conn = $this->connection();
        $stmt = $conn->prepare($sql);

        foreach($dados as $campo => &$valor) {
            $stmt->bindParam($campo, $valor);
        }

        $stmt->execute();
        return $stmt;
        */
    }

      function insert_BD($dados)
    {
        /*
        
        $sql = "INSERT INTO pessoa(cpf, nome, endereco,telefone) VALUES(";
        $flag = 0;
        foreach ($dados as $campo => $valor) {
            if ($flag == 0) {
                $sql .= "'$valor'";
                $flag = 1;
            } else {
                $sql .= ", '$valor'";
            }
        }
        $sql .= ")";
        $conn = $this->connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt;
        */
    }
      function update_BD($dados, $id) {
        
        /*
        $sql = "UPDATE pessoa SET ";

        $flag = 0;
        foreach($dados as $campo => $valor) {
            if($flag == 0) { $sql .= "$campo=:$campo"; }
            else { $sql .= ", $campo=:$campo"; }
            $flag = 1;
        }

        $sql .= " WHERE id=$id";

        $conn = $this->connection();
        $stmt = $conn->prepare($sql);

        foreach($dados as $campo => &$valor) {
            $stmt->bindParam($campo, $valor);
        }

        $stmt->execute();
        return $stmt;
        */
    }

      function delete_BD($id) {

        var_dump($id);
 
        $conn = $this->connection();
        $stmt = $conn->prepare("DELETE FROM pessoa WHERE cpf=$id[0]");
        $stmt->execute();
     

        return $stmt;
    }

}
