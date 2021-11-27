# Requêtes utiles
- Création compte Utilisateur
```
INSERT INTO users (name, forename, email, password) VALUES('', '', '', '')
```

- Mise à jour profil
```
UPDATE users
SET name = '', forename = '', avatar_path = '', email = '', password = ''
WHERE id = x
```

- Rechercher média (nom, type, ordonner)
```
SELECT *
FROM media
WHERE name LIKE '%title%' AND type = ''
ORDER BY name ASC
```

- Marquer média comme vu
```
INSERT INTO watched (`ID_user`, `ID_media`, `date`) VALUES ('', '', 'xxxx-xx-xx');
```

- Aimer média
```
INSERT INTO liked (`ID_user`, `ID_media`) VALUES ('1', '1');
```

- Consulter historique visionnage par date
```
SELECT m.name, w.date
FROM media m, watched w 
WHERE m.id = w.ID_media AND w.ID_user = 'ID_USER'
ORDER BY w.date ASC; 
```

- Bloquer Utilisateur
```
UPDATE users 
SET blocked_date = CURDATE(), time_blocked = CURRENT_TIME() 
WHERE id = ''; 
```

- Créer playlist et ajouter médias
```
INSERT INTO playlist (`name`, `is_public`) VALUES ('', '');
INSERT INTO own (`ID_playlist`, `ID_user`) VALUES ('', '');
INSERT INTO belongs_to (`ID_media`, `ID_playlist`) VALUES ('', '')
```

- S'abonner à une playlist d'un autre User
```
INSERT INTO subscribe (`ID_playlist`, `ID_user`) VALUES ('', '');
```

- Ajouter commentaire à média
```
INSERT INTO comment (`title`, `content`, `ID_user`, `ID_media`) VALUES ('', '', '', '');
```







- Consulter nouveaux commentaires pas encore modérés
```
SELECT m.id, c.id, titre, texte
FROM Comment c, Moderation m
WHERE NOT m.id = c.id
```

- Consulter commentaires d'un utilisateur donné
```
SELECT *
FROM Comment
WHERE user_id = ''
```

- Promouvoir utilisateur
```
UPDATE User
SET is_moderator = true
WHERE id = ''
```

# Statistiques

- 10 médias les plus consultés
```
SELECT TOP 10 DISTINCT title, COUNT(title), m.id, w.media_id
FROM Media m, Watch w
WHERE m.id = w.media_id
ORDER BY COUNT(title) DESC
```

- Médias non consultés
```
SELECT title, m.id, w.media_id
FROM Media m, Watch w
WHERE m.id NOT IN w.media_id
```

- Nombre consultations par jour sur période donnée
```
SELECT COUNT(media_id)
FROM Watch
WHERE date BETWEEN
    CONVERT(datetime, 'xxxx-xx-xx')
    AND CONVERT(datetime, 'xxxx-xx-xx')
```

- Nombre commentaires sur période donnée
```
SELECT COUNT(id)
FROM Comment
WHERE date BETWEEN
    CONVERT(datetime, 'xxxx-xx-xx')
    AND CONVERT(datetime, 'xxxx-xx-xx')
```

- Top 100 utilisateur
    - Nombre lectures
        ```
        SELECT TOP 100 COUNT(w.media_id)
        FROM User u, Watch w
        WHERE w.user_id = u.id
        ORDER BY COUNT(w.media_id) DESC
        ```
    - Temps de lecture
        ```
        SELECT TOP 100 ADD(m.duration), u.name
        FROM User u, Watch w, Media m
        WHERE u.id = w.user_id
        AND m.id = w.media_id
        ORDER BY ADD(m.duration) DESC
        ```