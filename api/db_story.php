<?php
    class DB{
        protected $table;
        protected $dsn="mysql:host=localhost;charset=utf8;dbname=survey";
        protected $pdo;

        public function __construct($table){
            $this->pdo=new PDO($this->dsn,'root','');
            $this->table=$table;
        }
        public function all(){
            $sql = "SELECT * FROM $this->table";
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        }

        
    }


?>