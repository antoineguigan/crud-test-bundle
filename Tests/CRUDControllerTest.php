<?php
/*
 * This file is part of the Qimnet CRUD Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDBundle\Tests\Functional;

use Qimnet\CRUDTestBundle\Test\CRUDTestCase;


class CRUDControllerTest extends CRUDTestCase
{
    public function getCreateData()
    {
        return array(
            array(array('crud_test[name]'=>'test','crud_test[type]'=>1)),
        );
    }
    protected function getConfigName()
    {
        return 'crud_test';
    }
}
