<?php

namespace alexeevdv\storage\stream\traits;

use alexeevdv\storage\stream\StorageStream;

/**
 * Trait StreamProxyTrait
 * @package alexeevdv\storage\stream\traits
 */
trait StreamProxyTrait
{
    /**
     * @var StorageStream
     */
    private $_actualStream;

    /**
     * @param integer $count
     * @return bool|string
     */
    public function read($count)
    {
        return $this->_actualStream->read($count);
    }

    /**
     * @return bool
     */
    public function eof()
    {
        return $this->_actualStream->eof();
    }
}
