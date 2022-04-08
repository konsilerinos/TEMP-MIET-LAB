<?php

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User {
	public int $id;
	public string $name;
	public string $email;
	public string $password;
	private $creating_data;
	
	public function __conctructor(int $id, string $name, string $email, string $password) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->creating_data = strtotime("now");
	}
	
	public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
		
		$metadata->addPropertyConstraint('name', new Assert\NotBlank());
		
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
    }
	
	public function __getCreatingData() {
		return $this->creating_data;
	}
}

$user1 = new User(1, "Nikki Konsilerin", "konsilerin@mail.ru", "qwerty");
$user2 = new User(2, "Nikki Teressa", "teressa@mail.ru", "asdfgh");
$user3 = new User(3, "Nikki Ananas", "ananas@mail.ru", "zxcvbn");

$users = [$com1, $com2, $com3];

$validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();

foreach ($users as $curent_user) {
    $violations = $validator->validate($curent_user);
	
    if (count($violations1) > 0) {
		echo "Bad" . '<br>';
	}
	else {
		echo "Good" . '<br>';
	}
}
