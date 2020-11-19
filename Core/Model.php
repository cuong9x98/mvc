<?php
namespace MVC\Core;
class Model
{
    // Get value Model
    function getProperties()
    {
        return get_object_vars($this);
    }
}
