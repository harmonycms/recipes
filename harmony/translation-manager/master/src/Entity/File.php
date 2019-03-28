<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\FileInterface;
use Harmony\Extension\TranslationManager\Model\File as FileModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Harmony\Extension\TranslationManager\Entity\FileRepository")
 * @ORM\Table(
 *     name="translation_manager_file",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="hash_idx", columns={"hash"})
 *     }
 * )
 * @UniqueEntity(fields={"hash"})
 * @ORM\HasLifecycleCallbacks()
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class File extends FileModel implements FileInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Translation", mappedBy="file", cascade={"persist"})
     * @var Collection $translations
     */
    protected $translations;

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
     * @ORM\PrePersist()
     * @throws \Exception
     */
    public function prePersist()
    {
        $this->createdAt = new DateTime("now");
        $this->updatedAt = new DateTime("now");
    }

    /**
     * @ORM\PreUpdate()
     * @throws \Exception
     */
    public function preUpdate()
    {
        $this->updatedAt = new DateTime("now");
    }
}
