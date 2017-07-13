<?php

spl_autoload_register(function ($className) {
    include getClassPath($className) . '.php';
});

function getClassPath(string $className): string
{
    $registeredClasses = [
        'App\Controller' => 'Controller',
        'App\Model\ModelAbstract' => 'model/ModelAbstract',
        'App\Model\Student' => 'model/Student',
        'App\Model\Family' => 'model/Family',
        'App\Repository\RepositoryAbstract' => 'repository/RepositoryAbstract',
        'App\Repository\StudentRepository' => 'repository/StudentRepository',
        'App\Repository\FamilyRepository' => 'repository/FamilyRepository'
    ];

    return $registeredClasses[$className];
}
