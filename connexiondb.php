<?php
	class connexionDB 
	{
		private $host = 'localhost';
		private $name = 'GBAF';
		private $user = 'root';
		private $pass = 'root';
		private $connexion;

		function_construct($host=null, $name=null, $user=null) 
			{
				if($host!=null)
				$this->host=$host;
				$this->name=$name;
				$this->user=$user;
				$this->pass=$pass
			}
				try {
					$this->connexion=new PDO('mysql:host=' . 'dbname=' . $this->name, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8MB4', PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING));		
				} catch (PDOException $e) {
					echo 'erreur : Impossible de se connecter à la BDD !';
					die();
					
				}
			}
		public function connexionDB(){
			return $this->connexion;
		}	
		$DB=new connexionDB;
		$BDD=$DB->connexion();

?>

