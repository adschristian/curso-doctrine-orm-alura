<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$newName = $argv[2];

/** @var Student */
$student = $entityManager->find(Student::class, $id);
$student->setName($newName);

$entityManager->flush();

