use db;

create table benutzer
(
	    benutzerkennung int auto_increment
	        primary key,
		    benutzername    varchar(255)                         not null,
		    passwort_hash   varchar(255)                         not null,
		    rolle           enum ('admin', 'lehrer', 'schueler') not null
	);

	create table fach
	(
		    fachkennung int auto_increment
		        primary key,
			    name        varchar(255) not null
		);

		create table hausaufgabe
		(
			    hausaufgabenkennung int auto_increment
			        primary key,
				    titel               varchar(255)         not null,
				    beschreibung        text                 null,
				    faelligkeitsdatum   datetime             null,
				    erledigt            tinyint(1) default 0 not null,
				    fachkennung         int                  not null,
				    benutzerkennung     int                  not null,
				    constraint hausaufgabe_ibfk_1
				        foreign key (fachkennung) references fach (fachkennung),
					    constraint hausaufgabe_ibfk_2
					        foreign key (benutzerkennung) references benutzer (benutzerkennung)
					);

					create index benutzerkennung
					    on hausaufgabe (benutzerkennung);

					create index fachkennung
					    on hausaufgabe (fachkennung);

					create table lehrkraft
					(
						    lehrkraftkennung int auto_increment
						        primary key,
							    name             varchar(255)         not null,
							    aktiv            tinyint(1) default 1 not null
						);

						create table lehrkraft_fach
						(
							    lehrkraftkennung int not null,
							    fachkennung      int not null,
							    primary key (lehrkraftkennung, fachkennung),
							    constraint lehrkraft_fach_ibfk_1
							        foreign key (lehrkraftkennung) references lehrkraft (lehrkraftkennung),
								    constraint lehrkraft_fach_ibfk_2
								        foreign key (fachkennung) references fach (fachkennung)
								);

								create index fachkennung
								    on lehrkraft_fach (fachkennung);
