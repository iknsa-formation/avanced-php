create table article (
    id integer auto_increment not null,
    titre varchar(62),
    auteur varchar(62),
    message text,
    primary key (id)
)