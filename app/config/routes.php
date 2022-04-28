<?php

return [
  '/' => [
    'controller' => 'main',
    'action' => 'main',
  ],
  '/admin/login' => [
    'controller' => 'admin',
    'action' => 'login',
  ],
  '/admin/logout' => [
    'controller' => 'admin',
    'action' => 'logout',
  ],
  '/admin' => [
    'controller' => 'admin',
    'action' => 'create',
  ],
  '/admin/add' => [
    'controller' => 'admin',
    'action' => 'add',
  ],
  '/delete' => [
    'controller' => 'main',
    'action' => 'delete',
  ],
];