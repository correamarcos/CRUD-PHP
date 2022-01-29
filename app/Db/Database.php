<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    /**
     * Dados para conexão com Banco de Dados;
     * @var string;
     */
    const HOST = 'localhost';
    const NAME = 'crudsimples';
    const USER = 'root';
    const PASS = '';

    /**
     * Nome da tabela manipulada;
     * @var string;
     */
    private $table;

    /**
     * Instanciar conexão com banco de dados;
     * @var PDO;
     */
    private $connection;

    /**
     * Define a tabela e instancia conexão;
     * @param string;
     */
    public function __construct($tabl = null){
        $this->table = $tabl;
        $this->setConnection();
    }

    /**
     * Cria conexão com banco de dados;
     */
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Metodo para executar queries dentro do banco de dados
     * @param string $query
     * @param array  $params
     * @return PDOStatement
     */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Metodo para inserir dados no banco
     * @param array $values [ field => value]
     * @return integer;
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        //EXECUTA O INSERT E RETORNA ID
        $this->execute($query,array_values($values));
        return $this->connection->lastInsertId();
    }

    /**
     * Metodo para realiza uma consulta no banco de dados
     * @param string $where;
     * @param string $order;
     * @param string $limit;
     * @return PDOStatement;
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA E EXECUTA A QUERY 
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->execute($query);        
    }

    /**
     * Metodo para realizar atualizações no banco de dados
     * @param string $where;
     * @param array $values [ field => values];
     * @return boolean;
     */
    public function update($where, $values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA E EXECUTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        $this->execute($query,array_values($values));
        
        return true;        
    }

    /**
     * Metodo para exclui dados do banco
     * @param string $where;
     * @return boolean;
     */
    public function delete($where){
        //MONTA E EXECUTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);

        return true;
    }

}

?>
