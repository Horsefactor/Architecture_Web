<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.rEpYkl7' shared service.

return $this->privates['.service_locator.rEpYkl7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'security' => ['privates', 'security.helper', 'getSecurity_HelperService.php', true],
], [
    'security' => '?',
]);
