<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="comment_ibfk_1", columns={"user_id"})})
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"user-list", "comment-list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     * @Groups({"user-list", "comment-list"})
     */
    private $description;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_dt_tm", type="datetime", nullable=false)
     * @Groups({"user-list", "comment-list"})
     */
    private $createDtTm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_dt_tm", type="datetime", nullable=false)
     * @Groups({"user-list", "comment-list"})
     */
    private $updateDtTm = '0000-00-00 00:00:00';

    /**
     * @var boolean
     *
     * @ORM\Column(name="delete_flag", type="boolean", nullable=true)
     * @Groups({"comment-list"})
     */
    private $deleteFlag;
    
    /**
     * @var \User\Entity\User
     *
     * @ORM\OneToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     * @Groups({"comment-list"})     
     */    
    private $user;

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
     * Set firstName
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createDtTm
     *
     * @param \DateTime $createDtTm
     * @return User
     */
    public function setCreateDtTm($createDtTm)
    {
        $this->createDtTm = $createDtTm;

        return $this;
    }

    /**
     * Get createDtTm
     *
     * @return \DateTime 
     */
    public function getCreateDtTm()
    {
        return $this->createDtTm;
    }

    /**
     * Set updateDtTm
     *
     * @param \DateTime $updateDtTm
     * @return User
     */
    public function setUpdateDtTm($updateDtTm)
    {
        $this->updateDtTm = $updateDtTm;

        return $this;
    }

    /**
     * Get updateDtTm
     *
     * @return \DateTime 
     */
    public function getUpdateDtTm()
    {
        return $this->updateDtTm;
    }

    /**
     * Set deleteFlag
     *
     * @param boolean $deleteFlag
     * @return User
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return boolean 
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return User
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}