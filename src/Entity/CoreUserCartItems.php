<?php

namespace Adteam\Core\Users\Balance;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreUserCartItems
 *
 * @ORM\Table(name="core_user_cart_items", uniqueConstraints={@ORM\UniqueConstraint(name="AK_cart", columns={"user_id", "product_id"})}, indexes={@ORM\Index(name="core_user_cart_ibfk_2", columns={"product_id"}), @ORM\Index(name="IDX_646F80F1A76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class CoreUserCartItems
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateAdded;

    /**
     * @var \Adteam\Core\Users\Balance\OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Users\Balance\OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;

    /**
     * @var \Adteam\Core\Users\Balance\CoreProducts
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Users\Balance\CoreProducts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $product;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return CoreUserCartItems
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return CoreUserCartItems
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set user
     *
     * @param \Adteam\Core\Users\Balance\OauthUsers $user
     *
     * @return CoreUserCartItems
     */
    public function setUser(\Adteam\Core\Users\Balance\OauthUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Adteam\Core\Users\Balance\OauthUsers
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set product
     *
     * @param \Adteam\Core\Users\Balance\CoreProducts $product
     *
     * @return CoreUserCartItems
     */
    public function setProduct(\Adteam\Core\Users\Balance\CoreProducts $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Adteam\Core\Users\Balance\CoreProducts
     */
    public function getProduct()
    {
        return $this->product;
    }
}

