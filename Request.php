<?php
namespace MVC;
class Request
{
    public $url;
    // Get Request URL
    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }
}
