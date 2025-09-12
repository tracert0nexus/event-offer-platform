<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\{Actions, Action, Crud};
use Symfony\Component\HttpFoundation\RedirectResponse;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configureFields(string $page): iterable {
        $state = ChoiceField::new('state')->setChoices([
            'received'=>'received','quoted'=>'quoted','accepted'=>'accepted',
            'rejected'=>'rejected','in_progress'=>'in_progress','invoiced'=>'invoiced','paid'=>'paid'
        ])->renderAsBadges([
            'received'=>'warning','quoted'=>'info','accepted'=>'success',
            'rejected'=>'danger','in_progress'=>'secondary','invoiced'=>'primary','paid'=>'success'
        ]);

        return [
            TextField::new('customerName'), TextField::new('customerEmail'),
            // <- HIER: ManyToOne Service als Dropdown/Autocomplete
            AssociationField::new('service')
                // nur nötig, wenn du kein __toString() hast:
                // ->setFormTypeOptions(['choice_label' => 'name'])
                // optional, wenn du viele Services hast:
                ->autocomplete(),
            MoneyField::new('budget')->setCurrency('CHF')->hideOnIndex(),
            TextEditorField::new('details')->onlyOnForms(),
            MoneyField::new('quoteAmount')->setCurrency('CHF'),
            MoneyField::new('invoiceAmount')->setCurrency('CHF'),
            $state,
            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
            yield CollectionField::new('media')
                ->useEntryCrudForm(MediaCrudController::class)
                ->setLabel('Anhänge')
        ];
    }




}
