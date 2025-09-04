<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Media::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field::new('file')
            ->setFormType(\Vich\UploaderBundle\Form\Type\VichImageType::class) // für Bilder; sonst VichFileType
            ->setFormTypeOptions(['required'=>false, 'allow_delete'=>true, 'download_uri'=>true])
            ->onlyOnForms();

        yield ImageField::new('fileName')
            ->setBasePath('/uploads/media')
            ->onlyOnIndex()
            ->setLabel('Vorschau/Link');
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
