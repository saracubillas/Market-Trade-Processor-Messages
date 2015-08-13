<?php

namespace Markettrade\DemoBundle\Tests\Fixtures\Entity;

use Markettrade\DemoBundle\Entity\Message;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadMessageData implements FixtureInterface
{
    static public $messages = [];

    public function load(ObjectManager $manager)
    {

//        {"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}

        $message = new Message();
        $message->setUserId(123456);
        $message->setCurrencyFrom('EUR');

        $manager->persist($message);
        $manager->flush();

        self::$messages[] = $message;
    }
}
