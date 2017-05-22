<?php 

namespace App\Exceptions;

class PageNotFoundException extends \Exception 
{
    public function __construct($message)
    {
        parent::__construct($message, 404);
    }
}