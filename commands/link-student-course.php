<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

/** @var Course */
$course = $entityManager->find(Course::class, $courseId);
/** @var Student */
$student = $entityManager->find(Student::class, $studentId);

$course->addStudent($student);

$entityManager->flush();
