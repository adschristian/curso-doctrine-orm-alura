<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$className = Student::class;
$dql = "SELECT COUNT(student) FROM $className student";
$query = $entityManager->createQuery($dql);

$total = $query->getSingleScalarResult();

echo "Total: $total\n";
