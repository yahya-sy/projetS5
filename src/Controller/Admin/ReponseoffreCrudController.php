<?php

namespace App\Controller\Admin;

use App\Entity\Reponseoffre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReponseoffreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reponseoffre::class;
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
