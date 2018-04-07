<?php

namespace alexeevdv\storage\stream;
use alexeevdv\storage\stream\traits\StreamProxyTrait;


/**
 * Class CombinedStorageStream
 * @package alexeevdv\storage\stream
 */
class CombinedStorageStream extends StorageStream
{
    use StreamProxyTrait;

    /**
     * @var StorageStream[]
     */
    private $_storages = [];

    public function __construct(array $storages = null)
    {
        if ($storages !== null) {
            $this->setStorages($storages);
        }
    }

    public function open($filename, $mode, $options, &$opened_path)
    {
        /**
         * @var string $mount
         * @var StorageStream $storage
         */
        foreach ($this->getStorages() as $mount => $storage) {

            if (strpos($filename, $mount) === 0) {
                $this->_actualStream = $storage;

                return $storage->open(substr($filename, strlen($mount)), $mode, $options, $opened_path);
            }
        }
        return false;
    }

    /**
     * @param StorageStream[] $storages
     */
    public function setStorages(array $storages)
    {
        $this->_storages = $storages;
    }

    /**
     * @return StorageStream[]
     */
    public function getStorages()
    {
        return $this->_storages;
    }
}
