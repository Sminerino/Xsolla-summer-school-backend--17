select distinct game from users as us where (select sum(amount) from payments where user_id=us.id)>100 and us.level>10;
