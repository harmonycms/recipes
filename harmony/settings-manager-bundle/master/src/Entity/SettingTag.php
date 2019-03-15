<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\SettingsManagerBundle\Model\TagModel;

/**
 * @ORM\Entity()
 * @ORM\Table(name="setting_tag")
 */
class SettingTag extends TagModel
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