<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\TagModel;

/**
 * @MongoDB\Document
 */
class SettingTag extends TagModel
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