<?php

namespace App\Form;

use App\Entity\Demandeprojet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeprojetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom',null, array(
                'label' => 'Prénom : ',
                'attr' => array('style' => 'width: 200px')
            ))
            ->add('Nom',null, array(
                'label' => 'Nom : ',
                'attr' => array('style' => 'width: 200px')
            ))
            ->add('adresse',null, array(
                'label' => 'Adresse : ',
                'attr' => array('style' => 'width: 400px')
            ))
            ->add('Intitule',null, array(
                'label' => 'Intitulé : ',
                'attr' => array('style' => 'width: 400px')
            ))
            ->add('Description', null, array(
                'label' => 'Description : ',
                'attr' => array('style' => 'height:400px')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demandeprojet::class,
        ]);
    }
}
