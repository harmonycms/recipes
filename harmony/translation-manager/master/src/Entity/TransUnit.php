<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\TransUnitInterface;
use Harmony\Extension\TranslationManager\Model\Translation;
use Harmony\Extension\TranslationManager\Model\TransUnit as TransUnitModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Harmony\Extension\TranslationManager\Entity\TransUnitRepository")
 * @ORM\Table(
 *     name="translation_manager_trans_unit",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="key_domain_idx", columns={"key_name", "domain"})
 *     }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"key", "domain"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TransUnit extends TransUnitModel implements TransUnitInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int $id
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Translation", mappedBy="transUnit", cascade={"all"})
     * @var Collection $translations
     */
    protected $translations;

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
