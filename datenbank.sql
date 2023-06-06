create database minishop;
use minishop; 


create table Benutzer(
benutzerId int primary key auto_increment,
Benutzername varchar(50) not null unique,
Passwort varchar(50) not null,
Email varchar(50) not null
);  


create table Kategorien(
KategorieID int primary key not null, 
KategorieName varchar(50) not null unique
); 


create table Produkte(
ArtikelID int primary key not null,
ArtikelName varchar(50) not null,
Beschreibung varchar(3000) not null,
Preis decimal(10,2) not null,
Dateipfad varchar(255);
KategorieID int not null
);

alter table Produkte add constraint ProdKatFK foreign key (KategorieID) references Kategorien(KategorieID);


create table Warenkorb(  -- Aktueller Warenkorb für einkauf ArtikelID int not null,
BenutzerID int not null, 
ArtikelID varchar(50) not null,
ArtikelName varchar(50) not null, 
Preis decimal(10,2) not null,
anzahl int not null,
Dateipfad varchar(255),
primary key (ArtikelID, BenutzerID) 
);  


-- Tab  gekaufte Produkte
create table gekaufteProdukte( 
BenutzerID int not null, 
ArtikelID varchar(50) not null,
Preis decimal(10,2) not null,
anzahl int not null,
primary key (ArtikelID, BenutzerID)
); 


insert into Kategorien values(1, 'Fußball'); 



insert into produkte values(1, 'Nike Fly','Blau/Weiss','69,99', 1, './Produkte/AdidasPredator.jpg', 'Fussballschuhe');
insert into produkte values(2, 'Adidas Predator','Schwarz/Pink','89,99', 1, './Produkte/AdidasPredator.jpg', 'Fussballschuhe');
insert into produkte values(3, 'Puma Future','Rot','79,99', 1, './Produkte/PumaFuture.jpg', 'Fussballschuhe');

insert into produkte values(4, 'Brazuca','WM 2014','129,99', 1, './Produkte/Brazuca.jpg', 'Fussball');
insert into produkte values(5, 'Jabulani','WM 2010','259,99', 1, './Produkte/Jabulani.jpg', 'Fussball');
insert into produkte values(6, 'Al Rihla','WM 2022','129,99', 1, './Produkte/AlRihla.jpg', 'Fussball');

insert into produkte values(7, 'Uhlsport Speed','Schwarz','89,99', 1, './Produkte/UhlsportSpeed.jpg', 'Handschuh');
insert into produkte values(8, 'Adidas Pro','Gelb/Rot','69,99', 1, './Produkte/AdidasPro.jpg', 'Handschuh');
insert into produkte values(9, 'Puma Grip','Orange','49,99', 1, './Produkte/PumaGrip.jpg', 'Handschuh');


















/*
 create table Warenkorb(
warenkorbID int primary key auto_increment,
benutzerId int not null, 
ArtikelID int not null, 
ArtikelName varchar(50) not null,
Preis decimal(10,2) not null,
Anzahl int not null,
unique (benutzerid, artikelid)
);

alter table Warenkorb add constraint WarenBenutzerFK foreign key (benutzerid) references Benutzer(benutzerId);
alter table Warenkorb add constraint WarenArtikelFK foreign key (ArtikelID) references Produkte(ArtikelID);
*/