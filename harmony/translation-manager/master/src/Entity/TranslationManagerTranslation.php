<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\TranslationInterface;
use Harmony\Extension\TranslationManager\Model\Translation as TranslationModel;
use Harmony\Extension\TranslationManager\Model\TransUnit;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Harmony\Extension\TranslationManager\EntityRepository\TranslationRepository")
 * @ORM\Table(
 *     name="translation_manager_translations",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="trans_unit_locale_idx", columns={"trans_unit_id", "locale"})
 *     }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"transUnit", "locale"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TranslationManagerTranslation extends TranslationModel implements TranslationInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int $id
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TranslationManagerTransUnit", inversedBy="translations")
     * @ORM\JoinColumn(name="trans_unit_id", referencedColumnName="id")
     * @var TransUnit $transUnit
     */
    protected $transUnit;

    /**
     * @ORM\Column(name="modified_manually", type="boolean")
     * @var boolean $modifiedManually
     */
    protected $modifiedManually = false;

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
     * Set transUnit
     *
     * @param TransUnit $transUnit
     */
    public function setTransUnit(TransUnit $transUnit)
    {
        $this->transUnit = $transUnit;
    }

    /**
     * Get transUnit
     *
     * @return TransUnit
     */
    public function getTransUnit()
    {
        return $this->transUnit;
    }

    /**
     * @ORM\PrePersist()
     * @throws \Exception
     */
    public function prePersist()
    {
        $now             = new DateTime("now");
        $this->createdAt = $now;
        $this->updatedAt = $now;
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
