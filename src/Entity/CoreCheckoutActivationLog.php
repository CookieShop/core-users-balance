<?php

namespace Adteam\Core\Users\Balance;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreCheckoutActivationLog
 *
 * @ORM\Table(name="core_checkout_activation_log", indexes={@ORM\Index(name="core_audit_logs_ibfk_2", columns={"requested_by"})})
 * @ORM\Entity
 */
class CoreCheckoutActivationLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var \Adteam\Core\Users\Balance\OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Users\Balance\OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="requested_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $requestedBy;


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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CoreCheckoutActivationLog
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return CoreCheckoutActivationLog
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set requestedBy
     *
     * @param \Adteam\Core\Users\Balance\OauthUsers $requestedBy
     *
     * @return CoreCheckoutActivationLog
     */
    public function setRequestedBy(\Adteam\Core\Users\Balance\OauthUsers $requestedBy = null)
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    /**
     * Get requestedBy
     *
     * @return \Adteam\Core\Users\Balance\OauthUsers
     */
    public function getRequestedBy()
    {
        return $this->requestedBy;
    }
}

