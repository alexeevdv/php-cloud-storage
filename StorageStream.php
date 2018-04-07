<?php

namespace alexeevdv\storage\stream;

/**
 * Class StorageStream
 * @package alexeevdv\storage\stream
 */
abstract class StorageStream
{
    /**
     * @var string
     */
    private $_name;

    protected static $_instances = [];

    public function register($name)
    {
        $this->setName($name);
        static::$_instances[$name] = $this;
        stream_wrapper_register($name, static::class);
    }

    public function getInstance()
    {
        return static::$_instances[$this->getName()];
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $url = parse_url($path);
        $this->setName($url['scheme']);
        $filename = substr($path, strlen($this->getName() . '://'));
        return $this->getInstance()->open($filename, $mode, $options, $opened_path);
    }

    public function stream_read($count)
    {
        return $this->getInstance()->read($count);
    }

    public function stream_eof()
    {
        return $this->getInstance()->eof();
    }

    abstract public function open($filename, $mode, $options, &$opened_path);

    abstract public function read($count);

    abstract public function eof();
}
