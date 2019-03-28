<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\TransUnitInterface;
use Harmony\Extension\TranslationManager\Model\Translation;
use Harmony\Extension\TranslationManager\Model\TransUnit as TransUnitModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @UniqueEntity(fields={"key", "domain"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TransUnit extends TransUnitModel implements TransUnitInterface
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add translations
     *
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation)
    {
        $translation->setTransUnit($this);

        $this->translations[] = $translation;
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
