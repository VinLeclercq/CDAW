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
