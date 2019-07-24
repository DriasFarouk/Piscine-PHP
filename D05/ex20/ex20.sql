SELECT f.id_genre,
        g.name AS name_genre,
        d.id_distrib,
        d.name AS name_distrib,
        f.title AS title_film
    FROM film f
        LEFT JOIN genre g ON f.id_genre = g.id_genre
        LEFT JOIN distrib d ON f.id_distrib = d.id_distrib
WHERE f.id_genre BETWEEN 4 AND 8;