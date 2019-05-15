


create table Categorie(
	idCat integer auto_increment,
	libelle varchar(30),
	primary key(idCat));

create table Produits(
	prd_id integer auto_increment,
	prd_nom varchar(30),
	prd_qte integer,
	prd_pu float,
	prd_cat integer,
	primary key(prd_id),
	foreign key(prd_cat) references Categorie(idCat));
	
	
insert into Categorie(libelle) values("Alimentation");
insert into Categorie(libelle) values("Technologies");
insert into Categorie(libelle) values("Sport");
insert into Categorie(libelle) values("Musique");
insert into Categorie(libelle) values("Médias");
insert into Categorie(libelle) values("Transport");
insert into Categorie(libelle) values("Santé");
insert into Categorie(libelle) values("Art");

insert into Produits(prd_nom,prd_qte,prd_pu,prd_cat) values("pomme",52,1.52,1);
insert into Produits(prd_nom,prd_qte,prd_pu,prd_cat) values("boeuf",82,3,1);
insert into Produits(prd_nom,prd_qte,prd_pu,prd_cat) values("brocoli",14,9,1);




