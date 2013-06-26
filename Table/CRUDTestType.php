<?php
/*
 * This file is part of the Qimnet update tracker Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDTestBundle\Table;

use Qimnet\TableBundle\Table\TableTypeInterface;
use Qimnet\TableBundle\Table\TableBuilderInterface;

class CRUDTestType implements TableTypeInterface
{
    public function buildTable(TableBuilderInterface $builder)
    {
        $builder
                ->add('id', 'crud_link')
                ->add('name', 'crud_link', array('is_link'=>true))
                ->add('type');
    }
}
