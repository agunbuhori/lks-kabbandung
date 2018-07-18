<?php

/**
 * Query builder
 *
 * @since 2017
 * @author Agun Buhori <agun.buhori1@gmail.com>
 * LKS Web Design Kabupaten Bandung 2017
 */

class Database extends PDO {

	private $databName;
	private $databHost;
	private $databUser;
	private $databPass;

	private $r;
	private $w;
	private $v;
	private $t;
	private $s;
	private $l;
	private $o;
	private $b;

	public function __construct() {
		$this->dbName = "juri";
		$this->dbHost = "localhost";
		$this->dbUser = "root";
		
		$this->dbPass = ""; parent::__construct("mysql:dbname={$this->dbName};host:{$this->dbHost}", $this->dbUser, $this->dbPass);
		parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}

   //data convertion (array)
	private function convert($data) {
		foreach($data as $k => $v) :
			$n[":".$k] = $v;
		endforeach;
		return $n;
	}

   //table insertion (table name, array)
	public function insert($t, $data) {
		$n = $this->convert($data);

		$c = implode(",",array_keys($data));
		$v = implode(",",array_keys($n));

		$q = parent::prepare("INSERT INTO {$t}({$c}) VALUES({$v})");
		$q->execute($n);
	}

   //free query (write command)
	public function run($c, $data=[]) {
		if(!empty($data)) :
			$data = $this->convert($data);
		endif;

		$q = parent::prepare($c);     
		$q->execute($data);

		$this->r = $q;
		return $this;
	}

   //get data from table
	public function get($t) {

		if(!empty($this->s)) :
			$s = $this->s;
		else :
			$s = "*";
		endif;

		$o = $this->o;
		$l = $this->l;
		$b = [];
		$n = null;
		if(!empty($this->w)) :
			$w = $this->w;
			$v = $this->v;

			$n .= " WHERE ".substr(implode("", $w),4);
			$a = implode(",", $v);
			$b = (array) json_decode("{".$a."}");
		endif;

		$this->s = null;
		$this->l = null;
		$this->o = null;
		$this->w = null;
		$this->v = null;

		$this->r = parent::prepare("SELECT {$s} FROM {$t}{$n}{$o}{$l}");
		$this->r->execute($b);

		return $this;
	}

   //return query result
	public function result() {
		return $this->r->fetchAll();
	}

   //return query num rows
	public function count() {
		return $this->r->rowCount();
	}

}
