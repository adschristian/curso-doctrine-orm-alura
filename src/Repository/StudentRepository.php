<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function findCoursesByStudent()
    {
        $entityManager = $this->getEntityManager();
        $className = Student::class;
        $dql = "SELECT s, p, c FROM $className s JOIN s.phones p JOIN s.courses c";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
