<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    /**
     * Méthode permettant un paramétrage affiné des champs proposés.
     * Permet également l'affichage des Entités liées,
     * suivant le(s) paramètre(s) défini(s) dans la méthode __toString de celle-ci.
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('username', 'Nom d\'utilisateur'),
            EmailField::new('email', 'E-mail'),
            // TextareaField::new('password', 'Mot de passe (crypté)'),
            ArrayField::new('roles', 'Rôles'),
            TextareaField::new('description', 'Description'),
            DateTimeField::new('createdAt', 'Créé le'),
            DateTimeField::new('lastConnectionAt', 'Dernière connexion'),
            DateTimeField::new('updatedAt', 'Modifié le'),
            TextField::new('updatedBy', 'Modifié par'),
        ];
    }
}
