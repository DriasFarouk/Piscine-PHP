SELECT UPPER(u.last_name) as 'NAME', u.first_name, s.price 
FROM member m 
INNER JOIN subscription s 
ON s.id_sub = m.id_sub 
INNER JOIN user_card u 
ON m.id_user_card = u.id_user 
WHERE s.price > 42 
ORDER BY 'NAME', u.first_name;