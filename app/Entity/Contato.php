<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Contato{

    /**
     * Identificador unico do Contato;
     * @var integer;
     */
    public $id;

    /**
     * Nome do Contato;
     * @var string;
     */
    public $nome;

    /**
     * Email do Contato;
     * @var string;
     */
    public $email;

    /**
     * Telefone do contato;
     * @var string;
     */
    public $telefone;

    /**
     * Metodo para cadastrar um novo contato;
     * @return boolean;
     */
    public function cadastrar(){
        //INSERIR CONTATO NO BANCO
        $obDatabase = new Database('contatos');
        $this->id = $obDatabase->insert([
                                            'nome'=> $this->nome,
                                            'email'=> $this->email,
                                            'telefone'=> $this->telefone
                                        ]);

        return true;
    }

    /**
     * Metodo para atualizar o contato no banco
     * @return boolean;
     */
    public function atualizar(){
        return (new Database('contatos'))->update('id = '.$this->id,[
                                                                        'nome'=> $this->nome,
                                                                        'email'=> $this->email,
                                                                        'telefone'=> $this->telefone
                                                                    ]);
    }

    /**
     * Metodo para excluir o contato do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('contatos'))->delete('id='.$this->id);
    }

    /**
    * Metodo para buscar dados no banco de dados
    *@param string $where;
    *@param string $order;
    *@param string $limit;
    *@return array;
    */
    public static function getContatos($where = null, $order = null, $limit = null){
        return (new Database('contatos'))->select($where,$order,$limit)
                                         ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
    * Metodo para buscar um contato com base no id
    *@param integer $id;
    *@return Contato;
    */
    public static function getContato($id){
        $obContato = new Database('contatos');                                       
        return $obContato->select('id = '.$id)->fetchObject(self::class);
    }

}

?>
