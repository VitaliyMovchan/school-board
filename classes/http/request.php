<?php

namespace classes\http;

/**
 * Class Request
 * @package classes\http
 *
 * @property mixed $uri
 * @property mixed $query
 */
class Request
{
    const URL_SEPARATOR = '/';
    
    /**
     * @var mixed $uri
     */
    public $uri;
    
    /**
     * @var mixed $query
     */
    public $query;
    
    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->query = $_SERVER['QUERY_STRING'];
    }
    
    /**
     * @return array
     */
    public function parseUri(): array
    {
        $path = parse_url($this->uri, PHP_URL_PATH);
        return explode(self::URL_SEPARATOR, $path);
    }
    
    /**
     * @return array
     */
    public function parseQuery(): array
    {
        $params = [];
        parse_str($this->query, $params);
        return $params;
    }
}
