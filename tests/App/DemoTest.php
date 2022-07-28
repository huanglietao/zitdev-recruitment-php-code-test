<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;
use App\App\Demo;


class DemoTest extends TestCase {

    public function test_foo() {

        $req = new HttpRequest();
        $demo = new Demo('',$req);
        //$res = $demo->foo();
        $this->assertEquals("bar", $demo->foo());

    }


    public function test_get_user_info() {
        $req = new HttpRequest();
        $demo = new Demo($this,$req);
        $res = $demo->get_user_info();
        $this->assertIsArray($res);
        $this->assertArrayHasKey('id', $res);
        $this->assertArrayHasKey('username', $res);
        $this->assertIsInt($res['id']);
        $this->assertIsString($res['username']);
    }

    public function error($msg = 0) {
        $this->expectOutputString($msg);
    }
}