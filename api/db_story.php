<?php
    class DB{
        protected $table;
        protected $dsn="mysql:host=localhost;charset=utf8;dbname=survey";
        // protected $dsn="mysql:host=localhost;charset=utf8;dbname=s1100404";
        protected $pdo;

        public function __construct($table){
            $this->pdo=new PDO($this->dsn,'root','');
            // $this->pdo=new PDO($this->dsn,'s1100404','s1100404');
            $this->table=$table;
        }
        public function all(){
            $sql = "SELECT * FROM $this->table";
            // return $sql;
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        }

        
    }


?>