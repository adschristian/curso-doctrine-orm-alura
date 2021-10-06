<?php


use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Repository\StudentRepository;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

/** @var StudentRepository */
$studentRepository = $entityManager->getRepository(Student::class);
/** @var Student[] */
$students = $studentRepository->findCoursesByStudent();

foreach ($students as $student) {
    $phones = $student
        ->getPhones()
        ->map(fn (Phone $phone) => $phone->getNumber())
        ->toArray();

    echo "Student: {$student->getId()} - {$student->getName()}\n";
    echo "Phones: " . implode(', ', $phones) . "\n";

    /** @var Course[] */
    $courses = $student->getCourses();
    echo "Courses:\n";
    foreach ($courses as $course) {
        echo "\t{$course->getId()} - {$course->getName()}\n";
    }

    echo PHP_EOL;
}
