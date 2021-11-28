# Jalon 2
### Erwan Merly - Vinciane Leclercq

Le jalon 2 est la seconde étape à réaliser dans le contexte du module CDAW.
Cette étape comprend la réalisation du CRUD (Create Read Update Delete) de la médiatech sur laravel ainsi que les diagrammes MCD et MLD de la base de données.

## Diagrammes
Les diagrammes se trouve dans le dossier catalogue sous le nom de ``MCD_MLD.drawio.pdf``.

## CRUD
Pour accéder au CRUD il faut suivre les étapes suivantes:

### Connexion  à la base de données
Il y a deux manières possible pour se connecter à la base de données
- Importer le fichier ``catalogue/medias.sql``
ou
- Dans phpMyAdmin (connexion en root/root), créer la base de données ``medias`` de type ``utf8_general_ci``
- Dans un des terminal, entrer:
```shell
php artisan migrate
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=FilmSeeder 
```
### Accéder au CRUD
Une fois dans connecter à votre base de données, enter dans votre navigateur l'adresse suivante: ``http://localhost:8080/catalogue/public/films``

A partir de cette page vous pouvez:
- créer (Create) un nouveau film en cliquant sur le bouton "Nouveau film".
- voir (Read) les différents films.
- Modifier (Update) un film en cliquant sur le bouton "Modifier" sous un film.
- Supprimer (Delete) un film en cliquant sur le bouton "Supprimer" sous un film.


# Jalon 3
### Erwan Merly - Vinciane Leclercq

Le jalon 3 est la troisième étape à réaliser dans le contexte du module CDAW.
Cette étape comprend la mise en place des systèmes suivants :
- Connexion/déconnexion
- Création de compte 
- Routes publiques et protégées 
- Tests

## Au préalable
Penser à créer la base de données comme vu dans le jalon 2.

## Tests
Les tests sont lanceables via les commandes suivantes :
``php artisan test --filter MediaTest``
``php artisan test --filter RouteTest``

## Connexion et inscription
Accessible via la barre de navigation sur la page ``php artisan test --filter ExampleTest`` **(page d'accueil du site)**.
Elle ramène vers une page secondaire. Le retour au menu principal se fait via le clique sur le logo.

## Déconnexion et profil
Une fois connecté la barre de navigation se met à jour. Ainsi, on retrouve les informations sur l'utilisateur connecté et on peut se déconnecter ainsi qu'accéder à son profil pour faire des modifications.

## Routes publiques et protégée
L'ajout de média est possible depuis la page d'accueil. Néanmoins, étant protégée par la connexion, il est nécessaire d'être identifiée pour y avoir accès (de même pour l'accès au profil).
Enfin, la barre de navigation utilise les fonctionnalités de Livewire pour se modifier dynamiquement en fonction de la session en cours.