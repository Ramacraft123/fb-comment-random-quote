<?php

namespace App;

class Container
{
    private $config = [];
    private $instances = [];
    private $resolvers = [];

    public function __construct($config)
    {
        $this->config = $config;
    }
    
    public function set($key, $instance)
    {
        $this->instances[$key] = $instance;
    }

    public function setLazy($key, callable $resolver)
    {
        $this->resolvers[$key] = $resolver;
    }

    public function getConfig($key)
    {
        return $this->config[$key];
    }

    public function get($key)
    {
        if (!isset($this->resolvers[$key]) && !isset($this->instances[$key])) {
            throw new \Exception("Key {$key} doesnt exists in container");
        }

        if (isset($this->instances[$key])) {
            return $this->instances[$key];
        }

        if (isset($this->resolvers[$key])) {
            if (isset($this->instances[$key])) {
                return $this->instances[$key];
            }
            
            $instance = call_user_func($this->resolvers[$key], $this);
            $this->set($key, $instance);
            return $instance;
        }
    }
}