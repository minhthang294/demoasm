<?php 

class DBConnector
{
	
	public function  runQuery($sql) {
		$conn = pg_connect("host=ec2-54-221-201-212.compute-1.amazonaws.com port=5432 dbname=d5u0nk79uihrb1 user=extywghbvulcof password=7c62610cc93f176e19f60fda465381d46f564e4164b3bdfda4355f399254a5c8");
		$result = pg_query($conn,$sql);
		$rows = pg_fetch_all($result); 
		return $rows;
	}
	public function execStatement($sql) {
		$conn = pg_connect("host=ec2-54-221-201-212.compute-1.amazonaws.com port=5432 dbname=d5u0nk79uihrb1 user=extywghbvulcof password=7c62610cc93f176e19f60fda465381d46f564e4164b3bdfda4355f399254a5c8");
		$result = pg_query($conn,$sql);
	}
}
 ?>