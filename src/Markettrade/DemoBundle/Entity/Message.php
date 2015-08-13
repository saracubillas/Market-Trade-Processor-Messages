<?php

namespace Markettrade\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Markettrade\DemoBundle\Model\Message as MessageInterface;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Message implements MessageInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="currencyFrom", type="string", length=255)
     */
    private $currencyFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="currencyTo", type="string", length=255)
     */
    private $currencyTo;

    /**
     * @var float
     *
     * @ORM\Column(name="amountSell", type="float")
     */
    private $amountSell;

    /**
     * @var float
     *
     * @ORM\Column(name="amountBy", type="float")
     */
    private $amountBy;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timePlaced", type="datetime")
     */
    private $timePlaced;

    /**
     * @var string
     *
     * @ORM\Column(name="originatingCountry", type="string", length=255)
     */
    private $originatingCountry;


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
     * Set userId
     *
     * @param integer $userId
     * @return Message
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set currencyFrom
     *
     * @param string $currencyFrom
     * @return Message
     */
    public function setCurrencyFrom($currencyFrom)
    {
        $this->currencyFrom = $currencyFrom;
    
        return $this;
    }

    /**
     * Get currencyFrom
     *
     * @return string 
     */
    public function getCurrencyFrom()
    {
        return $this->currencyFrom;
    }

    /**
     * Set currencyTo
     *
     * @param string $currencyTo
     * @return Message
     */
    public function setCurrencyTo($currencyTo)
    {
        $this->currencyTo = $currencyTo;
    
        return $this;
    }

    /**
     * Get currencyTo
     *
     * @return string 
     */
    public function getCurrencyTo()
    {
        return $this->currencyTo;
    }

    /**
     * Set amountSell
     *
     * @param float $amountSell
     * @return Message
     */
    public function setAmountSell($amountSell)
    {
        $this->amountSell = $amountSell;
    
        return $this;
    }

    /**
     * Get amountSell
     *
     * @return float 
     */
    public function getAmountSell()
    {
        return $this->amountSell;
    }

    /**
     * Set amountBy
     *
     * @param float $amountBy
     * @return Message
     */
    public function setAmountBy($amountBy)
    {
        $this->amountBy = $amountBy;
    
        return $this;
    }

    /**
     * Get amountBy
     *
     * @return float 
     */
    public function getAmountBy()
    {
        return $this->amountBy;
    }

    /**
     * Set rate
     *
     * @param float $rate
     * @return Message
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    
        return $this;
    }

    /**
     * Get rate
     *
     * @return float 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set timePlaced
     *
     * @param \DateTime $timePlaced
     * @return Message
     */
    public function setTimePlaced($timePlaced)
    {
        $this->timePlaced = $timePlaced;
    
        return $this;
    }

    /**
     * Get timePlaced
     *
     * @return \DateTime 
     */
    public function getTimePlaced()
    {
        return $this->timePlaced;
    }

    /**
     * Set originatingCountry
     *
     * @param string $originatingCountry
     * @return Message
     */
    public function setOriginatingCountry($originatingCountry)
    {
        $this->originatingCountry = $originatingCountry;
    
        return $this;
    }

    /**
     * Get originatingCountry
     *
     * @return string 
     */
    public function getOriginatingCountry()
    {
        return $this->originatingCountry;
    }
}
