<?php
	$host = 'localhost';
	$db   = 'test';
	$user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	$file = "text.xml";

	if ($handle = fopen($file, "r")) {
		$data = fread($handle, filesize($file));

		try {
			$pdo = new PDO($dsn, $user, $pass);
			$statement = $pdo->prepare("INSERT INTO test (text,howManyQuotes) values (?,1);");
            $statement->execute([$data]);
            $pdo->prepare("INSERT INTO s VALUES 10;");
		} catch (PDOException $ex) {
			echo "Błąd";
		}
	}
?>