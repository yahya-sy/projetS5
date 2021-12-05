<?php

namespace App\Controller\Admin;

use App\Entity\Reponseoffre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ReponseoffreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reponseoffre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('Nom'),
            TextField::new('Prenom'),
            TextField::new('Email'),
            TextField::new('Competences'),
            TextField::new('idoffre')
        ];
    }

}
