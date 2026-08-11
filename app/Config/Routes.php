<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('test-db', 'Test::index');


$routes->group('pengajuan', function ($routes) {

    $routes->get('tahap1-keuangan', 'PengajuanController::tahap1');
    $routes->get('tahap2-usaha', 'PengajuanController::tahap2');
    $routes->get('tahap3-pinjaman', 'PengajuanController::tahap3');
    $routes->get('tahap4-review', 'PengajuanController::tahap4');

    // Memproses Data Saat Tombol "Next/Submit" Ditekan
    $routes->post('proses-tahap1', 'PengajuanController::prosesTahap1');
    $routes->post('proses-tahap2', 'PengajuanController::prosesTahap2');
    $routes->post('proses-tahap3', 'PengajuanController::prosesTahap3');
    $routes->post('proses-tahap4', 'PengajuanController::prosesTahap4'); // Final Submit!
});

// Endpoint rahasia untuk menerima balasan di belakang layar (Async Callback)
$routes->post('webhook/n8n', 'PengajuanController::callbackN8n');
