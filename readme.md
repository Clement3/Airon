## Projet Airon

Application web développer avec le <a href="https://laravel.com/">Framework Laravel</a>.

> **Démo:**
> - [https://airon.herokuapp.com/](https://airon.herokuapp.com/).
> - Identifiant : demo@demo.com
> - Mot de passe : demo12345

## Détails de l'application

Mis à jour le lundi 1 mai 2017.

- Authentification.
- Catégories.
- Annonces.
- Favoris.
- Confirmation du compte.
- Profil.
- Contact.

## Ce qui reste à faire

- Évaluations des utilisateurs.
- Listing des annonces.
- Moteur de recherche (elasticsearch ou Algolia).
- Déposer des annonces (Système d'étapes et paiement).
- Traduction de l'application en Français.
- Système de paiement (Stripe/Paypal).
- Création du Wiki (Comment le site marche).
- Administration (ACL, Administration de certain modules).
- Testes unitaires.
- Changer le système d'upload.

## Installer l'application

- Cloner le repo.
- Renommer le fichier **.env.example** en **.env**.
- Configurer le fichier **.env** avec vos informations. 
- Créer la base de donnée avec la commande : **php artisan migrate**.
- Créer les pages du site avec la commande : **php artisan create:pages**.

## License

Le projet Airon est sous licence [MIT license](http://opensource.org/licenses/MIT).
