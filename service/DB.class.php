<!-- PDO.class.php -->
<?php
// универсальный класс работы с базой данных
class DB {
	const DB_HOST ='localhost';
	const DB_NAME ='brand_shop';
	const DB_USER ='root';
	const DB_PASS ='';

	protected static $instance = null;

	private function __construct(){}

	// \PDO - это обращение к оригинальному классу pdo
	public static function instance()
	{
		if (self::$instance == null) {
			$options = array(
				PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
				PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO:: ATTR_EMULATE_PREPARES => TRUE,
			);

			$connectString = 'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';';
			self::$instance = new PDO($connectString,self::DB_USER,self::DB_PASS, $options);
		}

		return self::$instance;
	}

	private static function sql($sql, $args =[]){
		
		$stmt = self::instance()->prepare($sql);
		$stmt -> execute($args);
		return $stmt;
	}

	public static function Select($sql, $args=[]) {
		return self::sql($sql,$args)->fetchAll();
	}

	static function getRow($sql,$args=[])
	{
		return self::sql($sql,$args)->fetch();

	}


	static function Insert($sql,$args=[])
	{	
		self::sql($sql,$args);
		return self::instance()->lastInsertId();

	}

	static function Update($sql,$args=[])
	{	
		$stmt = self::sql($sql,$args);
		return $stmt->rowCount();

	}

	static function Delete($sql,$args=[])
	{	
		$stmt = self::sql($sql,$args);
		return $stmt->rowCount();

	}


}



// db::getInstance()-> Select(
// 	'SELECT * FROM goods WHERE category_id = :category_id';
// 	['category_id'=>$categoryId]
	

// )





?>