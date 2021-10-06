<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();
$name = $argv[1];
$course->setName($name);

$entityManager->persist($course);

$entityManager->flush();
