<?php

namespace Afup\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of RegistrationFormType
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lastname', null, array(
            'label' => 'Nom'
        ));
        $builder->add('firstname', null, array(
            'label' => 'Prénom'
        ));
                
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'afup_user_registration';
    }
}