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

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Page
 * @ORM\Table(name="slides")
 * @ORM\Entity()
 * @Gedmo\Uploadable(allowOverwrite=false, appendNumber=true, allowedTypes={"image/jpeg","image/png","image/gif","image/bmp"}, path="%kernel.root_dir%/../web/upload/slides/")
 */
class Slide {

    const IMAGE_BACKGROUND = 0;
    const IMAGE_BEFORE_TEXT = 1;
    const IMAGE_AFTER_TEXT = 2;

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
     * @Gedmo\Slug(fields={"title"}, unique=false, updatable=true)
     */
    private $slug;

    /**
     * @var integer
     * @ORM\Column(name="slideOrder", type="integer")
     */
    private $order;

    /**
     * @var string
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(name="additionnalClass", type="string", length=255)
     */
    private $additionnalClass;

    /**
     * @var integer
     * @ORM\Column(name="x", type="integer", nullable=true)
     */
    private $x = null;

    /**
     * @var integer
     * @ORM\Column(name="y", type="integer", nullable=true)
     */
    private $y = null;

    /**
     * @var integer
     * @ORM\Column(name="z", type="integer", nullable=true)
     */
    private $z = null;

    /**
     * @var integer
     * @ORM\Column(name="rotate", type="integer", nullable=true)
     */
    private $rotate = null;

    /**
     * @var integer
     * @ORM\Column(name="rotateX", type="integer", nullable=true)
     */
    private $rotateX = null;

    /**
     * @var integer
     * @ORM\Column(name="rotateY", type="integer", nullable=true)
     */
    private $rotateY = null;

    /**
     * @var integer
     * @ORM\Column(name="rotateZ", type="integer", nullable=true)
     */
    private $rotateZ = null;

    /**
     * @var integer
     * @ORM\Column(name="height", type="string", length=255, nullable=true)
     */
    private $height;

    /**
     * @var integer
     * @ORM\Column(name="width", type="string", length=255, nullable=true)
     */
    private $width;

    /**
     * @var integer
     * @ORM\Column(name="borderRadius", type="string", length=255, nullable=true)
     */
    private $borderRadius;

    /**
     * @var integer
     * @ORM\Column(name="fontSize", type="string", length=255, nullable=true)
     */
    private $fontSize;

    /**
     * @var integer
     * @ORM\Column(name="textColor", type="string", length=255, nullable=true)
     */
    private $textColor;

    /**
     * @var integer
     * @ORM\Column(name="backgroundColor", type="string", length=255, nullable=true)
     */
    private $backgroundColor;

    /**
     * @var boolean
     * @ORM\Column(name="imagePosition", type="string")
     */
    private $imagePosition = 'background';

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
     * @var Slider
     * @ORM\ManyToOne(targetEntity="Orbitale\CMS\Bundle\SlidersBundle\Entity\Slider", inversedBy="slides")
     * @ORM\JoinColumn(name="slider_id", nullable=false)
     */
    private $slider;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    public function __toString() {
        return $this->title ? : '';
    }

    /**
     * Get id
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get title
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set title
     * @param string $title
     * @return Slide
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get order
     * @return integer
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Set order
     * @param integer $order
     * @return Slide
     */
    public function setOrder($order) {
        $this->order = $order;

        return $this;
    }

    /**
     * Get content
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set content
     * @param string $content
     * @return Slide
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get x
     * @return integer
     */
    public function getX() {
        return $this->x;
    }

    /**
     * Set x
     * @param integer $x
     * @return Slide
     */
    public function setX($x) {
        $this->x = $x;

        return $this;
    }

    /**
     * Get y
     * @return integer
     */
    public function getY() {
        return $this->y;
    }

    /**
     * Set y
     * @param integer $y
     * @return Slide
     */
    public function setY($y) {
        $this->y = $y;

        return $this;
    }

    /**
     * Get z
     * @return integer
     */
    public function getZ() {
        return $this->z;
    }

    /**
     * Set z
     * @param integer $z
     * @return Slide
     */
    public function setZ($z) {
        $this->z = $z;

        return $this;
    }

    /**
     * Get rotate
     * @return integer
     */
    public function getRotate() {
        return $this->rotate;
    }

    /**
     * Set rotate
     * @param integer $rotate
     * @return Slide
     */
    public function setRotate($rotate) {
        $this->rotate = $rotate;

        return $this;
    }

    /**
     * Get rotateX
     * @return integer
     */
    public function getRotateX() {
        return $this->rotateX;
    }

    /**
     * Set rotateX
     * @param integer $rotateX
     * @return Slide
     */
    public function setRotateX($rotateX) {
        $this->rotateX = $rotateX;

        return $this;
    }

    /**
     * Get rotateY
     * @return integer
     */
    public function getRotateY() {
        return $this->rotateY;
    }

    /**
     * Set rotateY
     * @param integer $rotateY
     * @return Slide
     */
    public function setRotateY($rotateY) {
        $this->rotateY = $rotateY;

        return $this;
    }

    /**
     * Get rotateZ
     * @return integer
     */
    public function getRotateZ() {
        return $this->rotateZ;
    }

    /**
     * Set rotateZ
     * @param integer $rotateZ
     * @return Slide
     */
    public function setRotateZ($rotateZ) {
        $this->rotateZ = $rotateZ;

        return $this;
    }

    /**
     * Get active
     * @return boolean
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set active
     * @param boolean $active
     * @return Slide
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get created
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set created
     * @param \DateTime $created
     * @return Slide
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get updated
     * @return \DateTime
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set updated
     * @param \DateTime $updated
     * @return Slide
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get deleted
     * @return \DateTime
     */
    public function getDeleted() {
        return $this->deleted;
    }

    /**
     * Set deleted
     * @param \DateTime $deleted
     * @return Slide
     */
    public function setDeleted($deleted) {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get slider
     * @return Slider
     */
    public function getSlider() {
        return $this->slider;
    }

    /**
     * Set slider
     * @param Slider $slider
     * @return Slide
     */
    public function setSlider(Slider $slider) {
        $this->slider = $slider;

        return $this;
    }

    /**
     * @param string $slug
     * @return Slide
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * @param string $additionnalClass
     * @return Slide
     */
    public function setAdditionnalClass($additionnalClass) {
        $this->additionnalClass = $additionnalClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionnalClass() {
        return $this->additionnalClass;
    }

    /**
     * @param int $backgroundColor
     * @return Slide
     */
    public function setBackgroundColor($backgroundColor) {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return int
     */
    public function getBackgroundColor() {
        return $this->backgroundColor;
    }

    /**
     * @param int $borderRadius
     * @return Slide
     */
    public function setBorderRadius($borderRadius) {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * @return int
     */
    public function getBorderRadius() {
        return $this->borderRadius;
    }

    /**
     * @param int $fontSize
     * @return Slide
     */
    public function setFontSize($fontSize) {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getFontSize() {
        return $this->fontSize;
    }

    /**
     * @param int $height
     * @return Slide
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @param int $textColor
     * @return Slide
     */
    public function setTextColor($textColor) {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * @return int
     */
    public function getTextColor() {
        return $this->textColor;
    }

    /**
     * @param int $width
     * @return Slide
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * Set imagePosition
     * @param boolean $imagePosition
     * @throws \InvalidArgumentException
     * @return Slide
     */
    public function setImagePosition($imagePosition) {
        $imagePosition = (int) $imagePosition;
        if ($imagePosition !== self::IMAGE_BACKGROUND
         && $imagePosition !== self::IMAGE_AFTER_TEXT
         && $imagePosition !== self::IMAGE_BEFORE_TEXT
        ) {
            throw new \InvalidArgumentException('Image position must be set.');
        }

        $this->imagePosition = $imagePosition;

        return $this;
    }

    /**
     * Get imagePosition
     * @return boolean
     */
    public function getImagePosition() {
        return $this->imagePosition;
    }

    /**
     * Set image
     * @param Media $image
     * @return Slide
     */
    public function setImage(Media $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     * @return Media
     */
    public function getImage() {
        return $this->image;
    }

    public function getDatas() {
        $data = array();

        if (null !== $this->x) { $data['x'] = $this->x; }
        if (null !== $this->y) { $data['y'] = $this->y; }
        if (null !== $this->z) { $data['z'] = $this->z; }
        if (null !== $this->rotate) { $data['rotate'] = $this->rotate; }
        if (null !== $this->rotateX) { $data['rotateX'] = $this->rotateX; }
        if (null !== $this->rotateY) { $data['rotateY'] = $this->rotateY; }
        if (null !== $this->rotateZ) { $data['rotateZ'] = $this->rotateZ; }

        return $data;
    }

    public function imageIsBackground() {
        return ((int) $this->imagePosition) === self::IMAGE_BACKGROUND;
    }

    public function imageAfterText() {
        return ((int) $this->imagePosition) === self::IMAGE_AFTER_TEXT;
    }

    public function imageBeforeText() {
        return ((int) $this->imagePosition) === self::IMAGE_BEFORE_TEXT;
    }
}
