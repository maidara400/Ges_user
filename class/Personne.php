<?php
    class Personne{
        private $nom;
        private $prenom;
        private $age;

        public function __construct($nom,$prenom,$age) {
            $this->setNom($nom);
            $this->setNom($prenom);
            $this->setNom($age);
        }

        public function setNom($nom){
            if(!empty($nom) && strlen($nom) > 3){
                $this->nom = $nom ;
            }else{
                throw new Exception('Le nom doit contenir minimum 3 lettres');
            }
        }


        public function setPrenom($prenom){
            if(!empty($prenom) && strlen($prenom) > 3){
                $this->prenom = $prenom ;
            }else{
                throw new Exception('Le prenom doit contenir minimum 3 lettres');
            }
        }


        public function setAge($age){
            if(is_numeric($age) && $age > 0 ){
                $this->age = $age ;
            }else{
                throw new Exception('L age doit est un numerique et superieur a 0');
            }
        }

        public function getNom(){
            return $this->nom ;
        }

        public function getPrenom(){
            return $this->prenom ;
        }

        public function getAge(){
            return $this->age ;
        }

        public function affichage(){
            echo "Nom : ".$this->getNom()." Prenom : ".$this->getPrenom()." Age : ".$this->getAge() ;
        }
      

    }

?>
