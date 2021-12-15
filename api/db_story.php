<?php
    class DB{
        protected $table;
        protected $dsn="mysql:host=localhost;charset=utf8;dbname=story";
        protected $pdo;

        public function __construct($table){
            $this->pdo=new PDO($this->dsn,'root','');
            $this->table=$table;
        }


        
    }


?>