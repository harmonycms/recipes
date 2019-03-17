<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\DomainModel;

/**
 * @MongoDB\Document
 */
class SettingDomain extends DomainModel
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}