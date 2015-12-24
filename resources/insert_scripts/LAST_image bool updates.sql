=============first for people
update images set keem_line = true where id in 
	(select images.id from images join people p on p.id = images.subject
	where p.keem_line = true)
;

update images set husband_line = true where id in 
  (select images.id from images join people p on p.id = images.subject
  where p.husband_line = true)
;

update images set kemler_line = true where id in 
  (select images.id from images join people p on p.id = images.subject
  where p.kemler_line = true)
;

update images set kaplan_line = true where id in 
  (select images.id from images join people p on p.id = images.subject
  where p.kaplan_line = true)
;

=================then for families
update images set keem_line = true where id in 
	(  select images.id from images join families f on f.id = images.family
  where f.keem_line = true)
;

update images set husband_line = true where id in 
	(  select images.id from images join families f on f.id = images.family
  where f.husband_line = true)
;

update images set kemler_line = true where id in 
	(  select images.id from images join families f on f.id = images.family
  where f.kemler_line = true)
;

update images set kaplan_line = true where id in 
	(  select images.id from images join families f on f.id = images.family
  where f.kaplan_line = true)
;

==============then for multi-person images

update images set keem_line = true where id in 
(select i.id from image_person ip 
  join people p on p.id = ip.person_id
join images i on i.id = ip.image_id
where p.keem_line = true)
;

update images set husband_line = true where id in 
(select i.id from image_person ip 
  join people p on p.id = ip.person_id
join images i on i.id = ip.image_id
where p.husband_line = true)
;

update images set kemler_line = true where id in 
(select i.id from image_person ip 
  join people p on p.id = ip.person_id
join images i on i.id = ip.image_id
where p.kemler_line = true)
;

update images set kaplan_line = true where id in 
(select i.id from image_person ip 
  join people p on p.id = ip.person_id
join images i on i.id = ip.image_id
where p.kaplan_line = true)
;

select id, kaplan_line, kemler_line, keem_line, husband_line, caption, * from images;

select * from images where kaplan_line <> true and kemler_line <> true and keem_line <> true and husband_line <> true;

update images set keem_line = false where id in (462, 464, 457, 417, 792, 512, 536, 538, 643, 786, 653, 860, 832, 850, 195, 351, 347, 399, 349, 381, 345, 384, 356, 382, 346, 182, 466, 459, 456, 727);

update images set husband_line = false where id  in (462, 464, 457, 417, 792, 512, 536, 538, 643, 786, 653, 860, 832, 850, 195, 710, 514, 798, 706, 503, 502, 707, 375, 348, 172, 173, 350, 175, 429, 174, 337, 353, 355, 352, 342, 466, 515, 404, 875, 459, 857, 403, 456, 729, 711, 665, 731, 217, 713, 772, 775, 777, 774, 776, 773, 767, 766, 879, 874, 881, 882, 883, 880, 727);


update images set kemler_line = false where id  in (457, 512, 536, 643, 653, 195, 196, 332, 189, 410, 333, 194, 203, 272, 206, 207, 268, 751, 41, 380, 44, 50, 15, 16, 473, 472, 567, 625, 626, 622, 553, 625, 839, 679, 785, 836, 841, 848, 846, 856, 840, 258, 885, 666, 763, 546, 760, 762, 815, 540, 511, 322, 284, 697, 696, 757, 153, 752, 885, 69, 154, 156, 847, 283, 741, 746, 742, 758, 285, 582, 751, 287, 286, 748, 226, 747, 743, 668, 656, 681, 739, 700, 671, 740, 630, 655, 629, 680, 806, 678, 805, 545, 544, 701, 565, 542, 670, 765, 733, 735, 736, 737, 795, 657, 734, 672, 658, 659, 674, 764, 673, 712, 796, 573, 863, 749, 709, 708, 787, 572, 686, 756, 667, 704, 754, 755, 687, 688, 744, 807, 893, 703, 702, 892, 891, 888, 889, 887, 886, 890, 864, 894 );

update images set kaplan_line = false where id  in (457, 512, 536, 643, 653, 195, 196, 332, 189, 410, 333, 194, 203, 272, 206, 207, 268, 143, 41, 380, 44, 50, 15, 16, 473, 472, 567, 625, 626, 622, 553, 625, 839, 679, 785, 836, 841, 848, 846, 856, 840, 258, 49, 223, 234,170, 280, 606, 92, 67, 599, 68, 133, 124, 596, 467, 123, 492, 792, 793, 532, 554, 646, 786);