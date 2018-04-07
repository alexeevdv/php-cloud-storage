<?php

namespace alexeevdv\storage\stream;

use alexeevdv\storage\stream\traits\StreamWrapperTrait;

/**
 * Class HttpStorageStream
 * @package alexeevdv\storage\stream
 */
class HttpStorageStream extends StorageStream
{
    use StreamWrapperTrait;

    /**
     * @var string
     */
    private $_baseUrl;

    public function __construct($baseUrl = null)
    {
        $this->setBaseUrl($baseUrl);
    }

    public function open($filename, $mode, $options, &$opened_path)
    {
        $uri = $this->getBaseUrl() . '/' . $filename;
        $this->_actualStream = fopen($uri, $mode);
        return !!$this->_actualStream;
    }

    public function setBaseUrl($url)
    {
        $this->_baseUrl = $url;
    }

    public function getBaseUrl()
    {
        return $this->_baseUrl;
    }
}
