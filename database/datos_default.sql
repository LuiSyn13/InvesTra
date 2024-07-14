-- TIPO VARIABLE

INSERT INTO tipovariable (idtipovariable, nomtipovariable) VALUES (NULL, 'Dependiente'), (NULL, 'Independiente');


-- TIPO PLANEAMIENTO

INSERT INTO tipoplaneamiento (idtipoplaneamiento, nomtipoplaneamiento) VALUES (NULL, 'General'), (NULL, 'Específico');


-- TIPO APORTE

INSERT INTO tipoaporte (idtipoaporte, nomaporte) VALUES (NULL, 'Sintomas'), (NULL, 'Causas'), (NULL, 'Pronosticos'), (NULL, 'Control Pronosticos');


-- TIPO ANTECEDENTE

INSERT INTO tipoantecedente (idtipoantecedente, nomtipoantecedente) VALUES (NULL, 'Internacional'), (NULL, 'Nacional'), (NULL, 'Local');


-- DENOMINACION

INSERT INTO denominacion (iddenominacion, nomdenominacion) VALUES (NULL, 'Est'), (NULL, 'Bach'), (NULL, 'Mag'), (NULL, 'Dr');


-- CONDICION

INSERT INTO condicion (idcondicion, nomcondicion) VALUES (NULL, 'Alumno'), (NULL, 'Egresado');


-- CARRERA

INSERT INTO carrera (idcarrera, nomcarrera) VALUES (NULL, 'Ing. Electronica'), (NULL, 'Ing. de Sistemas'), (NULL, 'Ing. Industrial'), (NULL, 'Ing. Informatica'), (NULL, 'Otro');

-- ESPECIALIDAD

INSERT INTO especialidad (idespecialidad, nomespecialidad) VALUES (NULL, Otro)