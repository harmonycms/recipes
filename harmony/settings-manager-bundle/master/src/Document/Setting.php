<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\Setting as BaseSetting;

/**
 * @MongoDB\Document
 */
class Setting extends BaseSetting
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="App\Document\SettingTag", cascade={"persist"})
     */
    protected $tags;

    /**
     * Get the value of id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}