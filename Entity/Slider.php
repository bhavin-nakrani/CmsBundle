<?php
/*
* This file is part of the OrbitaleCmsBundle package.
*
* (c) Alexandre Rock Ancelet <alex@orbitale.io>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Orbitale\CMS\Bundle\SlidersBundle\Entity;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Page
 * @ORM\Table(name="sliders")
 * @ORM\Entity(repositoryClass="Orbitale\CMS\Bundle\SlidersBundle\Repository\SliderRepository")
 */
class Slider {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"title"},unique=true)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(name="metaDescription", type="string", length=255, nullable=true)
     */
    private $metaDescription;

    /**
     * @var string
     * @ORM\Column(name="metaKeywords", type="string", length=255, nullable=true)
     */
    private $metaKeywords;

    /**
     * @var string
     * @ORM\Column(name="style", type="text", nullable=true)
     */
    private $style;

    /**
     * @var integer
     * @ORM\Column(name="transitionDuration", type="integer", nullable=false)
     */
    private $transitionDuration = 500;

    /**
     * @var boolean
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = true;

    /**
     * @var \Datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @var \Datetime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $updated;

    /**
     * @var boolean
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    protected $deleted = null;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $author = null;

    /**
     * @var Slide[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="Orbitale\CMS\Bundle\SlidersBundle\Entity\Slide", mappedBy="slider")
     */
    private $slides;

    public function __toString(){
        return $this->title ?: '';
    }

    public function __construct() {
        $this->slides = new ArrayCollection();
    }

    /**
     * @param boolean $active
     * @return $this
     */
    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * @param User $author
     * @return $this
     */
    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @param \Datetime $created
     * @return $this
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param boolean $deleted
     * @return $this
     */
    public function setDeleted($deleted) {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDeleted() {
        return $this->deleted;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMetaDescription() {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     * @return $this
     */
    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKeywords() {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     * @return $this
     */
    public function setMetaKeywords($metaKeywords) {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * @return Slide[]
     */
    public function getSlides() {
        return $this->slides;
    }

    /**
     * @param Slide[] $slides
     * @return $this
     */
    public function setSlides($slides) {
        $this->slides = $slides;
        return $this;
    }

    /**
     * @param Slide $slide
     * @return $this
     */
    public function addSlide(Slide $slide) {
        $this->slides->add($slide);
        return $this;
    }

    /**
     * @param Slide $slide
     * @return $this
     */
    public function removeSlide(Slide $slide) {
        $this->slides->remove($slide);
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getStyle() {
        return $this->style;
    }

    /**
     * @param string $style
     * @return $this
     */
    public function setStyle($style) {
        $this->style = $style;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransitionDuration() {
        return $this->transitionDuration;
    }

    /**
     * @param int $transitionDuration
     * @return $this
     */
    public function setTransitionDuration($transitionDuration) {
        $this->transitionDuration = $transitionDuration;
        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * @param \Datetime $updated
     * @return $this
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }

}
