<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\SettingsManagerBundle\Model\SettingDomain as BaseSettingDomain;

/**
 * @ORM\Entity()
 * @ORM\Table(name="setting_domain")
 */
class SettingDomain extends BaseSettingDomain
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