<?php

	// Enable display of PHP errors
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	$mode = !empty($argv[1]) ? $argv[1] : 'both';
	$times = !empty($argv[2]) ? $argv[2] : 1000;
	$host = 'localhost';
	$dbname = 'articlestest';
	$user = 'root';
	$passwd = 'sword';
	$lorem_ipsum = file_get_contents('lorem-ipsum.txt');
	$paragraphs = explode("\n\n", $lorem_ipsum);
	$metadata = explode(' ', $paragraphs[0]);

	function generate_article() {
		global $paragraphs;

		$article = $paragraphs[0];
		$random_paragraphs = $paragraphs;
		array_shift($random_paragraphs);
		shuffle($random_paragraphs);

		for ($i = 0, $il = rand(6, count($random_paragraphs)); $i < $il; $i++) {
			$article .= "\n\n" . $random_paragraphs[$i];
		}

		return $article;
	}

	function generate_string() {
		global $metadata;

		$string = '';

		for ($i = 0; $i < 5; $i++) {
			$string .= (($i > 0) ? ' ' : '') . $metadata[$i];
		}

		foreach (array_rand($metadata, rand(5, 10)) as $key) {
			$string .= ' ' . $metadata[$key];
		}

		return $string;
	}

	function generate_xml($id) {
		$data = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><page/>');
		$data->title = generate_string();
		$data->keywords = generate_string();
		$data->description = generate_string();
		$data->date = generate_string();
		$data->body = generate_article();
		$data->asXML('./xml/' . $id . '.xml');
	}

	if (!file_exists('xml') and !mkdir('xml', 0755)) exit('Unable to create XML directory.');
	$open_mysql = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $passwd);
	$open_sqlite = new PDO('sqlite:sqlite.db');

	$create  = 'CREATE TABLE IF NOT EXISTS articles'
		. '(id INTEGER PRIMARY KEY,'
		. 'title TEXT,'
		. 'keywords TEXT,'
		. 'description TEXT,'
		. 'date TEXT,'
		. 'body TEXT)';

	$open_mysql->exec($create);
	$open_sqlite->exec($create);

	function generate_sql($id, $prepare) {
		$prepared_array = array(
			'id' => $id,
			'title' => generate_string(),
			'keywords' => generate_string(),
			'description' => generate_string(),
			'date' => generate_string(),
			'body' => generate_article(),
		);

		try {
			$prepare->execute($prepared_array);
		} catch (PDOException $error) {
			exit($error->getMessage());
		}
	}

	function write_xml($num) {
		echo $num . ' XML files written to disk in ...';
		$xml_start = microtime(true);

		for ($i = 1; $i <= $num; $i++) {
			generate_xml($i);
		}

		$xml_end = round(microtime(true) - $xml_start, 5) . ' Seconds.';
		echo "\r" . $num . ' XML files written to disk in ' . $xml_end . "\n";
	}

	function write_sql($db, $num, $sql) {
		echo $num . ' ' . $sql . ' entries written to database in ...';
		$sql_start = microtime(true);
		$write  = 'INSERT INTO articles VALUES'
			. '(:id,'
			. ' :title,'
			. ' :keywords,'
			. ' :description,'
			. ' :date,'
			. ' :body)';

		$prepare = $db->prepare($write);

		$db->beginTransaction();
		for ($i = 1; $i <= $num; $i++) {
			generate_sql($i, $prepare);
		}
		$db->commit();

		$sql_end = round(microtime(true) - $sql_start, 5) . ' Seconds.';
		echo "\r" . $num . ' ' . $sql . ' entries written to database in ' . $sql_end . "\n";
	}

	function read_xml() {
		$xml_articles = array();
		$xml_start = microtime(true);
		$files = glob('./xml/*.xml');
		$num = count($files);
		echo $num . ' XML files read from disk in ...';

		foreach ($files as $value) {
			$xml_articles[] = simplexml_load_string(file_get_contents($value));
		}

		$xml_end = round(microtime(true) - $xml_start, 5) . ' Seconds.';
		echo "\r" . $num . ' XML files read from disk in ' . $xml_end . "\n";
	}

	function read_sql($db, $sql) {
		echo 'Reading ' . $sql . ' entries read from database ...';
		$sql_articles = array();
		$sql_start = microtime(true);
		$result = $db->query('SELECT * FROM articles') or exit('SQL query fail!');
		$num = 0;

		while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
			foreach ($rows as $key => $row) {
				if ($key == 'id') continue;

				$sql_articles[$rows['id']][$key] = $row;
			}

			$num++;
		}

		$sql_end = round(microtime(true) - $sql_start, 5) . ' Seconds.';
		echo "\r" . $num . ' ' . $sql . ' entries read from database in ' . $sql_end . "\n";
	}

	echo "\n";

	switch ($mode) {
		case 'read': {
			read_xml();
			read_sql($open_sqlite, 'SQLite');
			read_sql($open_mysql, 'MySQL');
			break;
		}

		case 'write': {
			write_xml($times);
			write_sql($open_sqlite, $times, 'SQLite');
			write_sql($open_mysql, $times, 'MySQL');
			break;
		}

		case 'both': {
			write_xml($times);
			write_sql($open_sqlite, $times, 'SQLite');
			write_sql($open_mysql, $times, 'MySQL');
			echo "\n";
			read_xml();
			read_sql($open_sqlite, 'SQLite');
			read_sql($open_mysql, 'MySQL');
			break;
		}

		default: {
			exit('No such action.');
		}
	}

	echo "\n";

?>
