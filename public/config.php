<?php

function readConfig(): array
{
    $config = [
        'hostname' => '{$e_db_hostname}',
        'username' => '{$e_db_username}',
        'password' => '{$e_db_password}',
        'database' => '{$e_db_database}',
        'persistent' => false,
        'driver' => 'mysqli',
        'code' => sha1(random_bytes(256)),
    ];

    foreach (explode("\n", trim(file_get_contents(__DIR__ . '/../.env'))) as $line) {
        if (!strlen($line) || str_starts_with($line, '#')) {
            continue;
        }
        [$key, $value] = explode('=', $line);
        switch ($key) {
            case 'MYSQL_DATABASE':
                $config['database'] = $value;
                break;
            case 'MYSQL_HOST':
                $config['hostname'] = $value;
                break;
            case 'MYSQL_PASSWORD':
                $config['password'] = $value;
                break;
            case 'MYSQL_USER':
                $config['username'] = $value;
                break;
        }
    }
    return $config;
}

$_CONFIG = readConfig();
