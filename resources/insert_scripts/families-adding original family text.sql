

ALTER TABLE families ADD original_family_text text;

update families set original_family_text = '7 generations back, ancestors of Keem line' where id = 132; 
update families set original_family_text = '6 generations back, ancestors of Reisdorf/Keem line' where id = 80; 
update families set original_family_text = '7 generations back, ancestors of Reisdorf/Keem line' where id = 145; 
update families set original_family_text = '5 generations back, ancestors of Suttell/Keem line' where id = 89; 
update families set original_family_text = '6 generations back, ancestors of Smith/Suttell/Keem line' where id = 104; 
update families set original_family_text = '6 generations back, ancestors of Smith/Suttell/Keem line' where id = 107; 
update families set original_family_text = '5 generations back, ancestors on the Husband line' where id = 172; 
update families set original_family_text = '4 generations back, ancestors on the Kobrin/Kaplan side' where id = 90; 
update families set original_family_text = '4 generations back, ancestors on the Kaplan/Kemler side' where id = 3; 
update families set original_family_text = '4 generations back, ancestors on the Kemler side' where id = 4; 


