<?php

namespace App\Controllers;

use Config\Database;

class Test extends BaseController
{
    public function index()
    {
        try {
            $db = Database::connect();

            if ($db->initialize()) {
                echo "✅ Database berhasil terkoneksi";
            } else {
                echo "❌ Database gagal terkoneksi";
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}