<?php

namespace App\Controller\Admin;

use App\Entity\Offreemploi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OffreemploiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offreemploi::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
