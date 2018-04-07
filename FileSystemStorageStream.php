<?php

namespace alexeevdv\storage\stream;
use alexeevdv\storage\stream\traits\StreamWrapperTrait;

/**
 * Class FileSystemStorageStream
 * @package alexeevdv\storage\stream
 */
class FileSystemStorageStream extends StorageStream
{
    use StreamWrapperTrait;

    /**
     * @var string
     */
    private $_baseDir;

    public function __construct($baseDir = null)
    {
        return $this->setBaseDir($baseDir);
    }

    public function open($filename, $mode, $options, &$opened_path)
    {
        $uri = $this->getBaseDir() . '/' . $filename;
        $this->_actualStream = fopen($uri, 'r');
        return !!$this->_actualStream;
    }

    public function setBaseDir($dir)
    {
        $this->_baseDir = $dir;
    }

    public function getBaseDir()
    {
        return $this->_baseDir;
    }
}
