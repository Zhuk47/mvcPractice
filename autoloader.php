<?php

spl_autoload_register(function ($className) {
    include getClassPath($className) . '.php';
});

function getClassPath(string $className): string
{
    $registeredClasses = [
        'Controller' => 'Controller',
        'ModelAbstract' => 'model/ModelAbstract',
        'Student' => 'model/Student',
        'RepositoryAbstract' => 'repository/RepositoryAbstract',
        'StudentRepository' => 'repository/StudentRepository'
    ];

    return $registeredClasses[$className];
}
