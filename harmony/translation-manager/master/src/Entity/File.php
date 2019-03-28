<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\FileInterface;
use Harmony\Extension\TranslationManager\Model\File as FileModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @UniqueEntity(fields={"hash"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class File extends FileModel implements FileInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime("now");
    }
}
