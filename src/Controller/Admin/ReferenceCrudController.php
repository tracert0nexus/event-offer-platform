<?php

namespace App\Controller\Admin;

use App\Entity\Reference;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReferenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reference::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield BooleanField::new('isPublic')->setLabel('Öffentlich');
        yield TextField::new('description');
        yield CollectionField::new('media', 'Anhänge')
            ->useEntryCrudForm(MediaCrudController::class)
            ->setFormTypeOptions(['by_reference' => false]) // erzwingt addMedium()/removeMedium()
            ->allowAdd()
            ->allowDelete();
    }
}
