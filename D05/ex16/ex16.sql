SELECT COUNT(*) AS films
FROM film
WHERE (last_projection BETWEEN '2006-10-30' AND '2007-07-27')
OR (MONTH(last_projection) = 12 AND DAY(last_projection) = 24);