DROP table leads;
create table leads (
    id serial primary key,
    created_at date default now(),
    email varchar(255) NOT NULL,
    phone_number varchar(255) NOT NULL,
    wanted_car int references cars(id)
);
-- @block
INSERT INTO leads (email,phone_number,wanted_car)
VALUES ('el@gmail.com','+212689435732',1),('super@s.op','+2126439495401',2),('+lol@yahoo.co','+212600223344',3);

-- @block
SELECT 
leads.*,
cars.model as model
FROM leads INNER JOIN cars ON leads.wanted_car = cars.id ORDER BY Leads.id;