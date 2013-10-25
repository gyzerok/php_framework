<?php

class Response {

    private $body;

    public function body($string = NULL)
    {
        if ($string) $this->body = $string;

        return $this->body;
    }
}