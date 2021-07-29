drop database if exists bddInstaTicket ; 
create database bddInstaTicket; 
use bddInstaTicket; 



create table membre (	
	idmembre int(3) not null auto_increment, 
	nom varchar(50),
	prenom varchar(50),
	adresse varchar(50),
	tel varchar(20),
	email varchar(100), 
	droits enum("user", "admin"),
	mdp varchar(255), 
	primary key(idmembre)
);

create table genre (
	idgenre int(3) not null auto_increment, 
	nom varchar(50), 
	primary key(idgenre)
);
create table artiste (
	idartiste int(3) not null auto_increment,
	nom varchar(50),
	photo_artiste text,
	idgenre int(3) not null, 
	primary key(idartiste),
	foreign key(idgenre) references genre(idgenre)
);

create table lieu (
	idlieu int(3) not null auto_increment,
	nom varchar(50),
	adresse varchar(50),
	capacite int(4),
	primary key(idlieu)
);

create table concert (
	idconcert int(3) not null auto_increment,
	titre varchar(50),
	image text,
	dateconcert date,
	descriptionconcert text,
	prix decimal(10,2),
	idartiste int(3) not null,
	idlieu int(3) not null,
	primary key(idconcert),
	foreign key(idartiste) references artiste(idartiste),
	foreign key(idlieu) references lieu(idlieu)
);

create table ticket_historique (
	idticket int(3) not null auto_increment,
	dateachat date,
	nbticket int(3),
	idmembre int(3) not null,
	idconcert int(3) not null,
	primary key(idticket),
	foreign key(idmembre) references membre(idmembre),
	foreign key(idconcert) references concert(idconcert)
);
create table commentaire (
	idcomment int(3) not null auto_increment, 
	datecomment date,
	contenu text, 
	note int(1), 
	idconcert int(3) not null,
	idmembre int(3) not null,
	primary key(idcomment), 
	foreign key(idconcert) references concert(idconcert), 
	foreign key(idmembre) references membre(idmembre)
);
create table reservation_salle(
	idreservation int(3) not null auto_increment,
	nom varchar(100),
	prenom varchar(100),
	email varchar(200),
	entite enum("Organisme", "Association", "Artiste"),
	datedemande date,
	
	idlieu int(3) not null,
	message text,
	primary key (idreservation),
	foreign key(idlieu) references lieu(idlieu)
);

create table myguests (
	idmyguests int(3) not null auto_increment,
	nom varchar(100),
	email varchar(50),
	message text,
	primary key(idmyguests)
);

insert into membre values (null, "Mongrolle", "Raphaël", "3 rue de clery", "0101010101", "r@gmail.com", "admin", "1234"),
			(null, "Dupont", "franck", "3 rue de paris", "0202020202", "d@gmail.com", "user", "1234"), (null, "Michel", "Mick", "3 rue de Lyon", "0303030303", "m@gmail.com", "user", "1234"),
			(null, "Federer", "Roger", "3 rue de la concorde", "0505050505", "f@gmail.com", "admin", "1234");
insert into genre values (null , "Classique"), (null , "Pop"), (null , "Rock"), (null , "Rap"), (null , "Electronique"), (null , "Autre");
insert into artiste values(null, "Rene", "photoRene.png", 1), (null, "Jacques", "photoJacques.png", 2);
insert into lieu values (null, "Salle 1 InstaTicket", "3 rue de clery", 250);
insert into concert values (null, "Rene fait son Show", "https://www.ville-de-salles.com/wp-content/uploads/2016/03/image-concert.jpg", "2020-05-05", "Nouveau Concert de rene", 25, 1, 1),
			(null, "Jacques", "https://cdn.radiofrance.fr/s3/cruiser-production/2020/06/44596e32-e897-4e91-94b0-0b7c3339f7d1/870x489_95438567_1653751264748526_5788465361988878336_n.jpg", "2020-05-05", "Nouveau Concert de Jacques", 20, 2, 1);
insert into ticket_historique values(null, "2020-05-05", 2, 2, 1), (null, "2020-05-05", 3, 3, 2);
insert into commentaire values (null, "2020-05-05", "Trés beau concert", 10, 1, 3),
	(null, "2020-05-05", "Super !", 10, 2, 2);
insert into reservation_salle values(null, "AssocParis12", "xxx", "assos12@gmail.com", "Association", "2021-05-05", 1, "Bonjour, Nous souhaiterions louer la salle....");


select * from membre;
select * from genre;
select * from artiste;
select * from lieu;
select * from concert;
select * from ticket_historique;
select * from commentaire;
select * from reservation_salle;

create view les_tickets_historique as (
	select * from ticket_historique
);

create view concert_recent as (
	select c.idconcert, c.titre, c.image, c.dateconcert, c.descriptionconcert, c.prix, c.idlieu, a.idartiste, a.nom, a.photo_artiste, a.idgenre
	from concert c, artiste a
	where c.idartiste = a.idartiste
	order by dateconcert
	limit 3
);

delimiter $
create procedure deleteMembre (IN p_idMembre int(3))
	begin
		delete from commentaire where idmembre = p_idMembre;
		delete from ticket_historique where idmembre = p_idMembre;
		delete from membre where idmembre = p_idMembre;
	end $
delimiter ;

delimiter $
create procedure deleteConcert (IN p_idConcert int(3))
	begin
		delete from commentaire where idconcert = p_idConcert;
		delete from ticket_historique where idconcert = p_idConcert;
		delete from concert where idconcert = p_idConcert;
	end $
delimiter ;

delimiter $
create procedure deleteArtiste (IN p_idArtiste int(3))
	begin
		delete from concert where idartiste = p_idArtiste;
		delete from artiste where idartiste= p_idArtiste;
	end $
delimiter ;
