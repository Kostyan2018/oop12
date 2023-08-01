<?php

$teacherList = [];

class Teacher
{
  public function __construct(
      private string $name,
      private string $jobTitle,
      private ?string $subject = null
  ){}

  public function setName($name): void
  {
      $this->name = $name;
  }

}
$evgen = new Teacher('Evgen', 'decan');
$nata = new Teacher('Nata', 'zavkaf', 'math');

echo '<pre>';
print_r($evgen);
print_r($nata);

class TeacherList {
    public array $teacherList = [] ;
    public function __construct ($teacherList){
        $this->teacherList = [];
    }



}

