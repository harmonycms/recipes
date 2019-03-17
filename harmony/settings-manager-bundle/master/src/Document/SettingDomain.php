<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\SettingDomain as BaseSettingDomain;

/**
 * @MongoDB\Document
 */
class SettingDomain extends BaseSettingDomain
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