<?php

class Registros
{
	private $MDB;
	private $Query;
	public $Registro;

	public function Run($var1,$var2)
	{
		$this->Query = $var1;
		$this->MDB = $var2;
	}

	public function Fetch()
	{
		switch ($this->MDB)
		{
			case 'MySQL':
				$this->Registro = @mysqli_fetch_array($this->Query);
				break;
			case 'PgSQL':
				$this->Registro = @pg_fetch_array($this->Query, NULL, PGSQL_BOTH);
				break;
			case 'ODBC':
			case 'MSSQL':
				$this->Registro = @odbc_fetch_array($this->Query);
				break;
			default:break;
		}

		if($this->Registro){return true;}
		else{return false;}
	}
}

class Conexion
{
	private $MDB;
	private $DBName;
	private $Con;
	public $Error;
	public $Numero=0;

	function __construct($var1="MySQL",$var2="")
	{
		$this->MDB = $var1;
		$this->DBName = $var2;
		$this->Connect();
	}

	private function Connect()
	{
		switch ($this->MDB)
		{
			case 'MySQL':
				//@mysqli_connect(servidor, usuario, contraseña, nombre_bd , puerto)
				$this->Con = @mysqli_connect('localhost', 'test', 'test01', $this->DBName,3306);
				break;
			case 'PgSQL':
				$this->DBName = $this->DBName!=""? " dbname=" . $this->DBName: null;
				$this->Con = @pg_connect("host=localhost user=postgres password=test01".$this->DBName);
				break;
			case 'ODBC':
				$this->Con = @odbc_connect("DRIVER={Microsoft Access Driver (*.mdb)};DBQ={$this->DBName};",'','');
				break;
			case 'MSSQL':
				$this->Con = @odbc_connect("Driver={SQL Server}; Server=127.0.0.1; charset=UTF-8;",
					'uruario',
					'contraseña');
				break;
			default:break;
		}

		if ($this->Con){ return true; }
		else { return false; }
	}

	public function Exec($var)
	{
		$data;
		if(!$this->Con){ return; }
		switch ($this->MDB)
		{
			case 'MySQL':
				$data = @mysqli_query($this->Con, $var);
				$this->Error = @mysqli_error($this->Con);
				$this->Numero = @mysqli_num_rows($data);
				break;
			case 'PgSQL':
				$data = @pg_query($this->Con, $var);
				$this->Error = @pg_last_error($this->Con);
				$this->Numero = @pg_num_rows($data);
				break;
			case 'ODBC':
			case 'MSSQL':
				$data = @odbc_exec($this->Con,$var);
				$this->Error = @odbc_errormsg($this->Con);
				$this->Numero = @odbc_num_rows($data);
				break;
			default:break;
		}

		$Reg = new Registros();
		if($data)
		{
			$Reg->Run($data,$this->MDB);
			return $Reg;
		}
		else
		{
			return false;
		}
	}
}
