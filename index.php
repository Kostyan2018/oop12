<?php

class Teacher
{
  public function __construct(
      private string $name,
      private string $jobTitle,
      private ?string $subject = null
  ){}
  public function toString(): string
  {
    return 'Name: ' . $this->name . ', ' . 'Job title: ' . $this->jobTitle . ', ' .  'Subject: ' . $this->subject ;
  }

  /**
   * @return string|null
   */
  public function getSubject(): ?string
  {
    return $this->subject;
  }
  //getters and setters
  /**
   * @param string|null $subject
   */
  public function setSubject(?string $subject): void
  {
    $this->subject = $subject;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name): void
  {
      $this->name = $name;
  }

  /**
   * @return string
   */
  public function getJobTitle(): string
  {
    return $this->jobTitle;
  }

  /**
   * @param string $jobTitle
   */
  public function setJobTitle(string $jobTitle): void
  {
    $this->jobTitle = $jobTitle;
  }


}

class TeacherList {

  private array $teacherList;

  public function __construct($teacherList) {
    $this->teacherList = $teacherList;
  }

  public function addTeacher ($teacher): void
  {
    //return array_push($this->teacherList, $teacher);
    $this->teacherList[] = $teacher;
  }

  public function getTeachers(): array
  {
    return $this->teacherList;
  }
  public function deleteTeacherByName(Teacher $teacher): void {
    $this->teacherList = array_filter($this->teacherList, function (Teacher $t) use ($teacher){
      return $t->getName() !== $teacher->getName();
    });
  }

}

$evgen = new Teacher('Evgen', 'decan');
$nata = new Teacher('Nata', 'zavkaf', 'math');

$teacherList = [];
$tchrLst = new TeacherList($teacherList);

echo '<pre>';

$tchrLst->addTeacher($nata);
foreach ($tchrLst->getTeachers() as $teacher) {
  print_r($teacher->toString() . "<br>");
}
echo "------" . "<br>";

$tchrLst->addTeacher($evgen);
foreach ($tchrLst->getTeachers() as $teacher) {
  print_r($teacher->toString() . "<br>");
}
echo "------" . "<br>";

$evgen->setSubject("physics");

echo $evgen->toString();
echo '<br>'. '<br>' . 'after deletion from list: '. '<br>' . '<br>';

$tchrLst->deleteTeacherByName($nata);

array_map(function (Teacher $t){
  echo $t->toString();
  echo "<br>";

}, $tchrLst->getTeachers());









