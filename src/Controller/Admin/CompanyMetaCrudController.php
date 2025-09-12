<?php

namespace App\Controller\Admin;

use App\Entity\CompanyMeta;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompanyMetaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompanyMeta::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('companyName');
        yield TextField::new('companySlogan');
        yield TextField::new('coreService');
        yield TextField::new('ownerEmail');
        yield TextField::new('ownerName');
        yield TextField::new('ownerStreet');
        yield TextField::new('ownerCity');
        yield TextField::new('iban');
        yield CollectionField::new('media', 'Logo')
            ->useEntryCrudForm(MediaCrudController::class)
            ->setFormTypeOptions(['by_reference' => false]) // erzwingt addMedium()/removeMedium()
            ->allowAdd()
            ->allowDelete();
    }

}
