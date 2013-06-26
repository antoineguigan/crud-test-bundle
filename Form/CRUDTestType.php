<?php
/*
 * This file is part of the Qimnet update tracker Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CRUDTestType extends AbstractType
{

    public function getName()
    {
        return 'crud_test';
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('name')
            ->add('type','choice', array('choices'=>  range(0, 3)));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=>'Qimnet\CRUDTestBundle\Entity\CrudTest'
        ));
    }

}
