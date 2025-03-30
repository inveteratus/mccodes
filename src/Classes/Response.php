<?php

namespace App\Classes;

class Response extends \Slim\Psr7\Response
{
    public function withErrors(array $errors = []): self
    {
        $_SESSION['errors'] = $errors;

        return $this;
    }
}
