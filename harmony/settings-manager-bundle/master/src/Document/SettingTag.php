<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\SettingsManagerBundle\Model\SettingTag as BaseSettingTag;

/**
 * @MongoDB\Document
 */
class SettingTag extends BaseSettingTag
{

}