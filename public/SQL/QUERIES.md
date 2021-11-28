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
SELECT m.name, u.forename, u.name, c.title, c.content
FROM comment c, users u, media m

WHERE c.id NOT IN (
    SELECT ID_comment
    FROM moderate
	)
AND u.id = c.ID_user
AND m.id = c.ID_media
```

- Consulter commentaires d'un utilisateur donné
```
SELECT * 
FROM comment 
WHERE ID_user = 1; 
```

- Promouvoir utilisateur
```
UPDATE users 
SET is_modo = true 
WHERE id = 1; 
```

# Statistiques

- 10 médias les plus consultés
```
SELECT DISTINCT m.name, COUNT(m.name) compte
FROM media m, watched w
WHERE m.id = w.ID_media
GROUP BY m.name
ORDER BY compte DESC
LIMIT 10
```

- Médias non consultés
```
SELECT m.name
FROM media m
WHERE m.id NOT IN (SELECT ID_media FROM watched)
```

- Nombre consultations par jour sur période donnée
```
SELECT COUNT(w.ID_media) count
FROM watched w
WHERE w.date >= '2020-01-01'
AND w.date <= '2021-12-31'
```

- Nombre commentaires sur période donnée
```
SELECT COUNT(c.id) count
FROM comment c
WHERE c.created_at >= '2020-01-01'
AND c.created_at <= '2021-12-31'
```

- Top 100 utilisateur
    - Nombre lectures
        ```
        SELECT u.forename, u.name, COUNT(w.ID_media) count 
        FROM users u, watched w
        WHERE w.ID_user = u.id
        GROUP BY u.id
        ORDER BY COUNT(w.ID_media) DESC
        LIMIT 100
        ```
    - Temps de lecture
        ```
        SELECT u.forename, u.name, SUM(m.duration_time) somme
        FROM users u, watched w, media m
        WHERE w.ID_user = u.id
        AND w.ID_media = m.id
        GROUP BY u.id
        ORDER BY somme DESC
        LIMIT 100
        ```