# Jalon 2
## Erwan Merly - Vinciane Leclercq

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
## Erwan Merly - Vinciane Leclercq

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


# Jalon 4
## Erwan Merly - Vinciane Leclercq

Ce jalon correspond au rendu final du projet de CDAW. L'objectif était de réaliser une base de données de médias en ligne sous forme d'un site internet (i.e. IMDB, TheMovieDB, AniList...). On s'est ici intéressé exclusivement aux films et aux séries.

## Mise en place en local

**Se placer dans le dossier ``public/catalogue`` une fois le conteneur lancé.**

Pour cela, il faut penser à regénérer le dossier ``vendor`` via la commande ``composer install`` puis ``composer update`` afin de récupérer les dernières dépendances du fichier ``composer.json``.

Ensuite, il faut ensuite se connecter à PHPMyAdmin sur l'adresse suivante : ``localhost:8081`` et créer une nouvelle base ``medias`` de type ``utf8_general_ci``.

Vient donc le temps de générer les tables avec la commande ``php artisan migrate``. Une fois les tables générées, on récupère les données de la base distante avec les Seeder crée par nos soins : ``php artisan db:seed --class=MediaSeeder``. Cette opération peut prendre 2 bonnes minutes.

Une fois cette opération finalisée, on peut accéder au site internet sur l'URL suivant : ``localhost:8080/catalogue/public/medias``.

## Fonctionnalités implémentées

Voice une liste des fonctionnalités disponibles : ****(G)*** précise les fonctionnalités accéssibles aux visiteurs*

### Session
- Connexion ***(G)***
- Inscription ***(G)***
- Déconnexion
- Voir son profil
- Modification de son profil **(WIP)**
 
### Contenu
- Voir la liste des médias ***(G)***
- Voir la liste des films ***(G)***
- Voir la liste des séries ***(G)***
    - Triables par ordre alphabétique et date de sortie ***(G)***
- Voir les playlists *publiques* ***(G)***

### Recherche (contenant le texte entré)
- Recherche de films ***(G)***
- Recherche de séries ***(G)***
- Recherche d'une personne (acteur, réalisateur) ***(G)***
- Recherche de playlist ***(G)***
    - **Ne sont pas triables**

### Médias
- Accéder aux détails d'un média ***(G)***
    - Varaiable selon le type (film ou série)
- Modification des informations d'un média
- Suppression d'un média
- Ajout d'un média

### Personnes
- Accéder aux détails d'une personne ***(G)***
    - Liste des films qu'iel à réaliser ou jouer dedans
- Modification des informations de la personne
- Suppression d'une personne
- Ajout d'une personne

### Commentaire
- Accéder aux commentaires sur un média ***(G)***
- Poster un commentaire sur un média
- Supprimer **son propre** commentaire

### Playlist
- Consultation de playlists ***(G)***
- Création d'une playlist *à soi*
- Suppression d'une playlist *à soi*
- Modification d'une playlist *à soi*
- Ajout de média dans une playlist *à soi*
- Suppression de média dans une playlist *à soi*
- Accès aux détails d'une playlist ***(G)***
- Abonnement à une playlist **publique** (via liste ou recherche)
- Désabonnement à une playlist

### Non implémentées mais tables présentes et relation dans le modèle

- Marquer un média comme "vu" à une date
- Marquer un média comme "aimé"
- Signaler un utilisateur
- Modérer un utilisateur
- Modérer des commentaires
- Promouvoir modérateur

## Problématiques

Durant notre projet, nous avons rencontré plusieurs difficultés :
- Utilisation du framework et sa configuration
    - Pensée précise pour Fortify et JetStream pour le profil
    - Réinstallation en local après obtention de plugins (Scout)
- Prise en main du CSS et du HTML afin d'avoir un modèle esthétique, pratique et cohérent avec notre vision
- Manque de temps (Eparpillement de notre part ? Trop grandes attentes ?)
- Peu de présence de JavaScript et de place où l'utiliser (nécessaire ?)

<u>Lien vers la vidéo YouTube de présentation :</u> youtube.com/