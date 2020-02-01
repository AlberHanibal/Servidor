INSERT INTO `comenta` (`post_id`, `usuario_login`, `fecha`, `texto`) VALUES(1, 'admin', '2020-02-01 20:05:21', 'Bastante bien');
INSERT INTO `comenta` (`post_id`, `usuario_login`, `fecha`, `texto`) VALUES(1, 'Victor', '2020-02-01 20:04:23', 'Muy buena serie!! :D');
INSERT INTO `comenta` (`post_id`, `usuario_login`, `fecha`, `texto`) VALUES(4, 'admin', '2020-02-01 20:05:03', 'Not bad');

INSERT INTO `like` (`post_id`, `usuario_login`) VALUES(1, 'admin');
INSERT INTO `like` (`post_id`, `usuario_login`) VALUES(1, 'Victor');
INSERT INTO `like` (`post_id`, `usuario_login`) VALUES(3, 'Victor');
INSERT INTO `like` (`post_id`, `usuario_login`) VALUES(4, 'admin');
INSERT INTO `like` (`post_id`, `usuario_login`) VALUES(4, 'Victor');

INSERT INTO `post` (`id`, `fecha`, `resumen`, `texto`, `foto`, `categoria_post_id`, `usuario_login`) VALUES(1, '2020-01-20 11:00:00', 'Este verano pasado me vi por segunda vez la serie Digimon Adventure Tri y me gustaría contaros de qué va.', 'Las películas se desarrollan tres años después de los acontecimientos de Digimon Adventure 02 y se centra en los ocho \"niños elegidos\" originales y sus compañeros digimon. Una misteriosa anomalía ha infectado el mundo Digimon haciendo que estos se vuelvan hostiles y creando distorsiones en el mundo humano. Esto lleva a los niños elegidos a luchar contra los digimon infectados mientras hacen frente a sus responsabilidades y problemas de adolescentes, a ellos se les une otro niño elegido, Meiko Mochizuki y su compañera Meicoomon. ', 'DigimonAdventureTri.jpg', 0, 'AlberHanibal');
INSERT INTO `post` (`id`, `fecha`, `resumen`, `texto`, `foto`, `categoria_post_id`, `usuario_login`) VALUES(3, '2020-02-01 19:18:39', 'Ansatsu Kyoushitsu o Clases de Asesinatos', 'Una criatura ha destruido el 70% de la Luna, dejándola en una fase creciente perpetua, además, este ser anuncia a los seres humanos que, en un año, la Tierra correrá la misma suerte a menos que los estudiantes de la clase 3-E del instituto Kunugigaoka, donde da lecciones sobre asesinato, consigan matarlo, una hazaña que tendría, además, una recompensa del gobierno japonés de diez mil millones de yenes.', 'AnsatsuKyoushitsu.jpg', 0, 'AlberHanibal');
INSERT INTO `post` (`id`, `fecha`, `resumen`, `texto`, `foto`, `categoria_post_id`, `usuario_login`) VALUES(4, '2020-02-01 19:20:35', 'Grupo de Kpop del League of Legends. KDA', 'Un cuarteto femenino de animación K-Pop dejó a todo el mundo sin habla durante la final de ‘League of Legends’ en Corea del Sur.', 'kda.jpg', 1, 'AlberHanibal');

INSERT INTO `sigue` (`usuario_login_seguidor`, `usuario_login_seguido`) VALUES('Victor', 'AlberHanibal');

INSERT INTO `usuario` (`login`, `password`, `rol_id`, `nombre`, `email`) VALUES('admin', '$2y$10$cCQL4XycIvYGfSUrjFuClexW9cfgVSBpb3V9uXDjunOvj.DBjewCa', 1, 'Alberto Colmenar', 'albercc@admin.com');
INSERT INTO `usuario` (`login`, `password`, `rol_id`, `nombre`, `email`) VALUES('AlberHanibal', '$2y$10$t1t0RL7uzgUdZRNgx/Zzp.plidkw8uQwQ5VdZGrHdfcgWyvKNZQzG', 0, 'Alberto', 'alberhanibal@asd.com');
INSERT INTO `usuario` (`login`, `password`, `rol_id`, `nombre`, `email`) VALUES('Victor', '$2y$10$QIStDb2YisQIMQnliN44h.tDU.Hyb0JywJrpo5Ws3UsxWcP0c0nEe', 0, 'Víctor Fernández', 'victor@gmail.com');