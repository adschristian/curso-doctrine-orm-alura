<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function findCoursesByStudent()
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.phones', 'p')
            ->join('s.courses', 'c')
            ->addSelect('p')
            ->addSelect('c')
            ->getQuery();

        return $query->getResult();
    }
}
