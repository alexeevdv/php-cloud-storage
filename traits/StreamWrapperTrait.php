<?php

namespace alexeevdv\storage\stream\traits;

/**
 * Class StreamWrapperTrait
 * @package alexeevdv\storage\stream\traits
 */
trait StreamWrapperTrait
{
    /**
     * @var resource
     */
    private $_actualStream;

    /**
     * @param integer $count
     * @return bool|string
     */
    public function read($count)
    {
        return fread($this->_actualStream, $count);
    }

    /**
     * @return bool
     */
    public function eof()
    {
        return feof($this->_actualStream);
    }
}
