
--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ficha` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `region` varchar(30) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroprograma`
--

CREATE TABLE `centro_programa` (
  `id` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `NIT` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `razonSocial` varchar(10) NOT NULL,
  `nombre_jefe_inmediato` varchar(50) NOT NULL,
  `apellido_jefe_inmediato` varchar(50) NOT NULL,
  `telefono_jefe_inmediato` varchar(30) NOT NULL,
  `email_jefe_inmediato` varchar(30) NOT NULL,
  `cargo_jefe_inmediato` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregables`
--

CREATE TABLE `entregables` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFinal` time NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `inicioLectiva` date NOT NULL,
  `finLectiva` date NOT NULL,
  `inicioProductiva` date NOT NULL,
  `finProductiva` date NOT NULL,
  `jornada` varchar(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructorficha`
--

CREATE TABLE `instructor_ficha` (
  `id` int(11) NOT NULL,
  `id_ficha` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunionaprendiz`
--

CREATE TABLE `reunion_aprendiz` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `inicio` datetime NOT NULL,
  `final` datetime NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `momentoEleccion` varchar(30) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `id_aprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `tipoDocumento` varchar(3) NOT NULL,
  `numeroIdentificacion` varchar(10) NOT NULL,
  `numeroCelular` bigint(10) NOT NULL,
  `numeroFijo` int(7) DEFAULT NULL,
  `emailPersonal` varchar(30) NOT NULL,
  `emailSena` varchar(30) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado` varchar(8) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuario_rol` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AprendizUsuario` (`id_usuario`),
  ADD KEY `AprendizFicha` (`id_ficha`),
  ADD KEY `AprendizEmpresa` (`id_empresa`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centroprograma`
--
ALTER TABLE `centro_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centroprogramaPrograma` (`id_programa`),
  ADD KEY `centroprogramaCentro` (`id_centro`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregables`
--
ALTER TABLE `entregables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_ficha` (`id_ficha`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FichaPrograma` (`id_programa`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `InstructorCentro` (`id_centro`),
  ADD KEY `InstructorUsuario` (`id_usuario`);

--
-- Indices de la tabla `instructorficha`
--
ALTER TABLE `instructor_ficha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `InstructorFichaFicha` (`id_ficha`),
  ADD KEY `InstructorFichaInstructor` (`id_instructor`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reunionaprendiz`
--
ALTER TABLE `reunion_aprendiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_instructor` (`id_instructor`),
  ADD KEY `FK_id_aprendiz` (`id_aprendiz`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsuarioRolUsuario` (`id_usuario`),
  ADD KEY `UsuarioRolRol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centroprograma`
--
ALTER TABLE `centro_programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregables`
--
ALTER TABLE `entregables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructorficha`
--
ALTER TABLE `instructor_ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reunionaprendiz`
--
ALTER TABLE `reunion_aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariorol`
--
ALTER TABLE `usuario_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `AprendizEmpresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `AprendizFicha` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id`),
  ADD CONSTRAINT `AprendizUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `centroprograma`
--
ALTER TABLE `centro_programa`
  ADD CONSTRAINT `centroprogramaCentro` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id`),
  ADD CONSTRAINT `centroprogramaPrograma` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `entregables`
--
ALTER TABLE `entregables`
  ADD CONSTRAINT `FK_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `FichaPrograma` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `InstructorCentro` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id`),
  ADD CONSTRAINT `InstructorUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `instructorficha`
--
ALTER TABLE `instructor_ficha`
  ADD CONSTRAINT `InstructorFichaFicha` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id`),
  ADD CONSTRAINT `InstructorFichaInstructor` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id`);

--
-- Filtros para la tabla `reunionaprendiz`
--
ALTER TABLE `reunion_aprendiz`
  ADD CONSTRAINT `FK_id_aprendiz` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id`),
  ADD CONSTRAINT `FK_id_instructor` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id`);

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `UsuarioRolRol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `UsuarioRolUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

