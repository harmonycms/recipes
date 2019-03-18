<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\SettingsManagerBundle\Model\SettingTag as BaseSettingTag;

/**
 * @ORM\Entity()
 * @ORM\Table(name="setting_tag")
 */
class SettingTag extends BaseSettingTag
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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