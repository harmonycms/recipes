<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\SettingModel;

/**
 * @MongoDB\Document
 */
class Setting extends SettingModel
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="App\Entity\SettingTag", cascade={"persist"})
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