<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$student = new Student();
$student->setName($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $phoneNumber = $argv[$i];
    $phone = new Phone();
    $phone->setNumber($phoneNumber);

    $student->addPhone($phone);
}

$entityManager->persist($student);

$entityManager->flush();
