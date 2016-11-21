create table role(id_r SERIAL PRIMARY KEY, nom_r VARCHAR(255));

create table formation(id_for SERIAL PRIMARY KEY, nom_f VARCHAR(255));

create table module(id_m SERIAL PRIMARY KEY, nom_m VARCHAR(255), code_m VARCHAR(5), cm_g INTEGER, td_g INTEGER, tp_g INTEGER);

create table periode(id_p SERIAL PRIMARY KEY, dat_deb_p DATE, dat_fin_p DATE);

create table annee(id_a SERIAL PRIMARY KEY, dat_deb_a DATE, dat_fin_a DATE);

create table programme(id_prog SERIAL PRIMARY KEY, ppn BOOLEAN, prog_nom VARCHAR(255));

create table prog_for(id_prog INTEGER REFERENCES programme(id_prog), id_for INTEGER REFERENCES formation(id_for), PRIMARY KEY(id_for, id_prog));

create table for_annee(id_for INTEGER REFERENCES formation(id_for), id_a INTEGER REFERENCES annee(id_a), PRIMARY KEY(id_for, id_a));

create table utilisateur(id_u SERIAL PRIMARY KEY, nom VARCHAR(255), prenom VARCHAR(255), id_role INTEGER REFERENCES role(id_r), mail VARCHAR(255), mdp VARCHAR(255));

create table semestre(id_s SERIAL PRIMARY KEY, dat_deb_s DATE, dat_fin_s DATE, id_prog INTEGER REFERENCES programme(id_prog));

create table per_sem(id_per INTEGER REFERENCES periode(id_p), id_sem INTEGER REFERENCES semestre(id_s), PRIMARY KEY(id_sem, id_per));

create table per_MOD(id_per INTEGER REFERENCES periode(id_p), id_mod INTEGER REFERENCES MODULE(id_m), PRIMARY KEY(id_per, id_mod));

create table volume_horaire(id_module INTEGER REFERENCES module(id_m), id_utilisateur INTEGER REFERENCES utilisateur(id_u), PRIMARY KEY(id_utilisateur, id_module), cm INTEGER, td INTEGER, tp INTEGER);



