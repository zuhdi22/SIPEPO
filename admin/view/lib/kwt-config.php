<?php
Class KwtConfig{
	function __Construct(){
		$this->dbhost = 'localhost';
		$this->dbuser = 'root';
		$this->dbpass = '';
		$this->dbName = 'durrotua_dbsantri';
		$this->conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);
		$this->kwNumPattern = "/PPDA/".$this->Tanggal('romawi')."/".$this->Tanggal('th');
	}
}
?>
