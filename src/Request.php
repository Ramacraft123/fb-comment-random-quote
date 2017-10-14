<?php

namespace App;

class Request
{
    private $postVariables;
    private $getVariables;
    private $requestUri;
    private $requestMethod;

    public function __construct($server, $get, $post)
    {
        $this->postVariables = $post;
        $this->getVariables = $get;
        $this->requestUri = strtolower($server['REQUEST_URI']);
        $this->requestMethod = strtolower($server['REQUEST_METHOD']);
    }

    public function post($key = null)
    {
        if (is_null($key)) {
            return $this->postVariables;
        }

        if (!isset($this->postVariables[$key])) {
            return null;
        }

        return $this->postVariables[$key];
    }

    public function get($key = null)
    {
        if (is_null($key)) {
            return $this->getVariables;
        }

        if (!isset($this->getVariables[$key])) {
            return null;
        }

        return $this->getVariables[$key];
    }

    public function uri()
    {
        return urldecode($this->requestUri);
    }

    public function method()
    {
        return $this->requestMethod;
    }

    public function segment($number)
    {
        $explodedUri = explode("/", $this->uri());
        return $explodedUri[$number];
    }

    public static function createFromGlobal($server, $get, $post)
    {
        return new self($server, $get, $post);
    }
}