<?php

spl_autoload_register(function ($className) {
    include getClassPath($className) . '.php';
});

function getClassPath(string $className): string
{
    $registeredClasses = [
        'App\Controller' => 'Controller',
        'App\Model\ModelAbstract' => 'model/ModelAbstract',
        'App\Model\Team' => 'model/Team',
        'App\Model\Sponsor' => 'model/Sponsor',
        'App\Repository\RepositoryAbstract' => 'repository/RepositoryAbstract',
        'App\Repository\TeamRepository' => 'repository/TeamRepository',
        'App\Repository\SponsorRepository' => 'repository/SponsorRepository'
    ];

    return $registeredClasses[$className];
}
