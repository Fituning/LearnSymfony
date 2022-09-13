<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }


    public function configureFields(string $pageName): iterable
    {
        echo "<script>console.log('Debug Objects: " . $pageName . "' );</script>";

        if($pageName == "new"){
            return [
                IdField::new('id')->hideOnForm(),
                TextField::new('firstName'),
                TextField::new("lastName"),
                ChoiceField::new('gender')->setChoices([
                    "Male" => "M",
                    "Female" => "F",
                    "Undefine" => "ø"
                ]),
                AssociationField::new("articles")->hideOnForm(),
            ];
        }else{
            return [
                IdField::new('id')->hideOnForm(),
                TextField::new('firstName'),
                TextField::new("lastName"),
                ChoiceField::new('gender')->setChoices([
                    "Male" => "M",
                    "Female" => "F",
                    "Undefine" => "ø"
                ]),
                AssociationField::new("articles")->hideOnForm(),
            ];
        }
    }

}
