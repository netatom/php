<?php
class Member {
	private $id;
	private $last_name;
	private $first_name;
	private $email;
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	
	public function getLast_name(){
		return $this->last_name;
	}
	public function setLast_name($last_name){
		$this->last_name = $last_name;
	}
	
	public function getFirst_name(){
		return $this->first_name;
	}
	public function setFirst_name($first_name){
		$this->first_name = $first_name;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
}

$member = new Member;

$member->setId("ID");
$member->setLast_name("Hong");
$member->setFirst_name("Gildong");
$member->setEmail("abc@def.com");

print $member->getId()."<br/>";
print $member->getLast_name()."<br/>";
print $member->getFirst_name()."<br/>";
print $member->getEmail()."<br/>";
?>