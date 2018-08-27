<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2018/8/28
 * Time: 1:34
 */

namespace Kilingzhang\Tests;

use Faker\Factory;
use Faker\Generator;
use Kilingzhang\QQ\CoolQ\QQ;
use Kilingzhang\QQ\Core\Protocols\GuzzleProtocol;
use Kilingzhang\QQ\Core\Response;
use PHPUnit\Framework\TestCase;

class CoolQTest extends TestCase
{

    /**
     * @var \Kilingzhang\QQ\Core\QQ
     */
    private $QQ;
    /**
     * @var Generator
     */
    private $faker;
    private $devQQ = '';
    private $url = '127.0.0.1:5700';
    private $accessToken = '';
    private $secret = '';

    public function setUp()
    {
        $this->QQ = new QQ(new  GuzzleProtocol($this->url, $this->accessToken, $this->secret));
        $this->faker = Factory::create();
    }

    public function testSendPrivateMsg()
    {
        $text = $this->faker->text;
        $response = $this->QQ->sendPrivateMsg($this->devQQ, $text, false);
        $this->assertInstanceOf(Response::class, $response);
    }
}