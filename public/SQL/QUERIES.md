# Requêtes utiles
- Création compte Utilisateur
```
INSERT INTO User (login, name, firstname, avatar, email, password, role, block_date, unblock_date) VALUES('', '', '', '', '', '', '', NULL, NULL)
```

- Mise à jour profil
```
UPDATE User
SET name = '', firstname = '', avatar = '', email = '', password = ''
WHERE id = x
```

- Rechercher média (nom, type, ordonner)
```
SELECT *
FROM Media
WHERE title LIKE '%title%' AND type = ''
ORDER BY title ASC
```

- Marquer média comme vu
```
INSERT INTO Watch (user_id, media_id, date, is_like) VALUES( , , xxxx/xx/xx, )
```

- Aimer média
```
CF Marquer comme vu
```

- Consulter historique visionnage par date
```
SELECT m.title, m.director, w.date
FROM Media m, Watch w
WHERE w.user_id = '' AND w.media_id = ''
ORDER BY w.date ASC
```

- Bloquer Utilisateur
```
UPDATE User
SET blocked_date = CURDATE()
WHERE id = ''
```

- Créer playlist et ajouter médias
```
INSERT INTO Playlist(user_id, name, is_private) VALUES( , '', )
```

- S'abonner à une playlist d'un autre User
```
INSERT INTO Subscribed(user_id, playlist_id) VALUES( , )
```

- Ajouter commentaire à média
```
INSERT INTO Commentaire(title, content, nb_respones, id_parent_comment, is_signaled, id_user, id_media) VALUES('', '', NULL, , FALSE, , )
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