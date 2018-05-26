<?php

class DB{

	/* Configure databse */
	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpassword = '';
	private $dbname = 'tinh';

	/* Const connect database */
	private $select;
	private $from;
	private $where;
	private $orderBy;
	private $join;
	private $limit;
	private $having;

	public function table($name){
		$this->from = $name;
		return $this;

	}

	public function connect(){
		$db = mysql_connect($this->dbhost,$this->dbuser,$this->dbpassword) or die("cant connect db");
		mysql_set_charset("utf8", $db);
		mysql_select_db($this->dbname,$db) or die("cant select db");
	}

	public function select($selects){
        $this->select = is_array($selects) ? $selects : func_get_args();
        return $this;
	}

	public function where($whereProp, $whereValue = null, $operator = null){
		$this->where = $whereProp .' '. $whereValue .' '. $operator;
		return $this;
	}

	public function orderBy($oderByField, $orderByDerection = 'DESC'){
		$this->orderBy = is_array($oderByField) ? $oderByField : func_get_args();
		return $this;
	}

	public function join($as, $joinCondition, $joinType = 'LEFT'){
		$this->join[] = [$as,$joinCondition, $joinType];
		return $this;
	}

	public function limit($limitField, $start = 0){
        $this->limit = [$start, $limitField];
        return $this;
	}

	public function having($havingProp, $havingValue = null, $operator = null){
		$this->having = $havingProp . $havingValue . $operator;
		return $this;
	}

	public function get(){
		$sql = 'SELECT ';
	    $this->connect();
		
		if(isset($this->select)){
			$sql .= implode(', ', $this->select);
		}else{
			$sql .= "*";
		}

		if(!isset($this->from)){
			return false;
		}else{
			$sql .= ' FROM '. $this->from.' ';
		}

		if(isset($this->where)){
			$sql .= 'WHERE '. ($this->where);
		}
		if(isset($this->join)){
		
			foreach ($this->join as $joins) {
				 $sql .= $joins[2]. ' JOIN '. $joins[0]. ' ON ' .$joins[1];
			}
		}
		$result = mysql_query($sql);
		$ava = mysql_fetch_array($result);
		return $ava;

	}

}