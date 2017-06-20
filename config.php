<?php 
	class DatabaseConnection 
	{
		
		function __construct()
		{
			global $pdo;
			try {

				$pdo = new PDO('mysql:host=localhost; dbname=ooplogin', 'root', '');

			} catch (PDOException $e) {

				exit('Database error');
				
			}
		}
	}

 ?>