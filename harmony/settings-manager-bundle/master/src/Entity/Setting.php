<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\SettingsManagerBundle\Model\Setting as BaseSetting;

/**
 * @ORM\Entity()
 * @ORM\Table(name="setting")
 */
class Setting extends BaseSetting
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection|SettingTag[]
     * @ORM\ManyToMany(targetEntity="App\Entity\SettingTag", cascade={"persist"}, fetch="EAGER")
     */
    protected $tags;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Setting
     */
    public function setId(int $id): Setting
    {
        $this->id = $id;

        return $this;
    }
}