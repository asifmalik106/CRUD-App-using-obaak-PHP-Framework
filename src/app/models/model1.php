<?php
include 'system/Model.php';
class model1 extends Model
{

	public function getData()
	{
		$sql 	= "SELECT * FROM info ORDER BY id DESC";
		return $this->db->fetch($sql);
	}

	public function submitData($name, $email, $phone){
		$sql = "INSERT INTO info (name, email, phone) VALUES('$name','$email', '$phone')";
		return $this->db->execute($sql);
	}

	public function isUnique($name, $email, $phone){
		$sql = "SELECT * FROM info";
		$result = $this->db->fetch($sql);
		while($row = $result->fetch_assoc()){
			if($name==$row['name']&&$email==$row['email']&&$phone==$row['phone']){
				return False;
			}
		}
		return TRUE;
	}
}
