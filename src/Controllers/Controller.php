<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;

class Controller
{
    protected Database $db;
    protected View $view;

    public function __construct()
    {
        $this->db = new Database(
            dsn: "mysql:host={$_ENV['MYSQL_HOST']};charset=utf8mb4;dbname={$_ENV['MYSQL_DATABASE']}",
            user: $_ENV['MYSQL_USER'],
            password: $_ENV['MYSQL_PASSWORD']
        );

        $this->view = new View();
    }
}
