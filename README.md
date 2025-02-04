### Description

Ce projet réalise le tableau de bord administrateur de la plateforme de gestion des stages d'une école d'enseignement supérieur.

## Fonctionnalités

- Consulter la liste des demandes de stage effectuées
- Traiter les candidatures (accepter ou refuser l'offre de stage après analyse des candidatures)
- Informer les candidats du résultat de leurs candidatures par mail
- Créer un nouveau service dans lequel affecter les éventuels candidats retenus
- Affecter un stagiaire dans un service donné)
- Archiver les dossiers de candidatures

### Installation et configuration
Comme il est réalisé en Laravel, il faut avoir installé Laravel sur votre hôte. Voir le [guide d'installation](https://laravel.com/docs/11.x/installation) sur le site officiel de Laravel [ici](https://laravel.com/docs/11.x/installation) 

Une fois php et Laravel correctement installés et configurés, il faut créer la base de données type MYSQL dans votre SGBD préféré(Wamp, MySQL,...).  Vous pouvez toutefois le changer dans la configuration du projet. Il s'agit d'éditer la ligne 13 (la variable d'environnement DB_DATABASE) du fichier *.env* situé à la racine du projet. NB: Le nom de votre bd doit être identique à celui de la valeur de la variable d'environnement DB_DATABASE.
Après création de la bd, il faut créer les différentes tables et relations entre elles dans cette bd. Pour ce faire, exécutez depuis le répertoire racine du projet, la commande
```php artisan migrate```

Vous pouvez également raffraîchir les données de votre base par la commande : 
```php artisan migrate:fresh```  

### Exécution

Enfin, exécutez l'application via la commande : 
```php artisan serve```
et suivez le lien disponible dans votre terminal
