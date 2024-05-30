<?php

// ...

use App\Controllers\News; // Add this line
use App\Controllers\Pages;
use App\Controllers\Email;

$routes->get('news', [News::class, 'index']);           // Add this line
$routes->get('news/(:segment)', [News::class, 'show']); // Add this line

$routes->get('email', 'Email::index');
$routes->get('email/newemail', 'Email::newemail');
$routes->post('email/create', 'Email::create'); // Route for handling form submission


$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);