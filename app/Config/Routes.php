<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Halaman utama
$routes->get('/', 'Auth::login');

// Home
$routes->get('home', 'Home::index');

// Test database
$routes->get('test-db', 'Test::index');

// Register
$routes->get('register', 'Auth::register');

// Pengajuan
$routes->group('pengajuan', function ($routes) {

    // Halaman tahapan pengajuan
    $routes->get('tahap1-keuangan', 'PengajuanController::tahap1');
    $routes->get('tahap2-usaha', 'PengajuanController::tahap2');
    $routes->get('tahap3-pinjaman', 'PengajuanController::tahap3');
    $routes->get('tahap4-review', 'PengajuanController::tahap4');

    // Proses data saat tombol Next/Submit ditekan
    $routes->post('proses-tahap1', 'PengajuanController::prosesTahap1');
    $routes->post('proses-tahap2', 'PengajuanController::prosesTahap2');
    $routes->post('proses-tahap3', 'PengajuanController::prosesTahap3');
    $routes->post('proses-tahap4', 'PengajuanController::prosesTahap4');
});

// Endpoint callback n8n
$routes->post('webhook/n8n', 'PengajuanController::callbackN8n');