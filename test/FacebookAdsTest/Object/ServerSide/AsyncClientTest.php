<?php
/**
 * Copyright (c) 2014-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace FacebookAdsTest\Object\ServerSide;

use FacebookAdsTest\AbstractUnitTestCase;
use FacebookAds\Object\ServerSide\AsyncClient;
use FacebookAds\Api;

Api::init(null, null, 'access-token', false);

class AsyncClientTest extends AbstractUnitTestCase {
  public function testSingleton() {
    $client1 = AsyncClient::getInstance()->getClient();
    $client2 = AsyncClient::getInstance()->getClient();

    $this->assertEquals($client1, $client2);
  }

  public function testRequestOptions() {
    $config = AsyncClient::getInstance()->getClient()->getConfig();

    $this->assertSame(10, $config['connect_timeout']);
    $this->assertSame(60, $config['timeout']);
    $this->assertSame(Api::instance()->getHttpClient()->getCaBundlePath(), $config['verify']);
  }
}
