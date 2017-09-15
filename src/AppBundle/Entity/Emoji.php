<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Emoji
 *
 * @ORM\Table(name="emoji")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmojiRepository")
 */
class Emoji
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="unicode", type="string", length=255, unique=true)
     */
    private $unicode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, unique=true)
     */
    private $description;

    /**
     * One Emoji has Many Translations.
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="emoji")
     */
    private $translations;


    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }


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
     * Set unicode
     *
     * @param string $unicode
     *
     * @return Emoji
     */
    public function setUnicode($unicode)
    {
        $this->unicode = $unicode;

        return $this;
    }

    /**
     * Get unicode
     *
     * @return string
     */
    public function getUnicode()
    {
        return $this->unicode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Emoji
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add translation
     *
     * @param \AppBundle\Entity\Translation $translation
     *
     * @return Emoji
     */
    public function addTranslation(\AppBundle\Entity\Translation $translation)
    {
        $this->translations[] = $translation;
        $translation->setEmoji($this);

        return $this;
    }

    /**
     * Remove translation
     *
     * @param \AppBundle\Entity\Translation $translation
     */
    public function removeTranslation(\AppBundle\Entity\Translation $translation)
    {
        $this->translations->removeElement($translation);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
