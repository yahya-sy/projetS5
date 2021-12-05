<?php

namespace App\Form;

use App\Entity\Reponseoffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseoffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom', null, array(
                'label' => 'Prénom : ',
                'attr' => array('style' => 'width: 200px')
            ))
            ->add('Nom', null, array(
                'label' => 'Nom : ',
                'attr' => array('style' => 'width: 200px')
            ))
            ->add('email', null, array(
                'label' => 'Email : ',
                'attr' => array('style' => 'width: 200px')
            ))
            ->add('Competences', null, array(
                'label' => 'Competences : ',
                'attr' => array('style' => 'height:400px')
            ))
            ->add('idoffre', null, array(
                'label' => 'Offre : '
            ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponseoffre::class,
        ]);
    }
}
