DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(100) NOT NULL,
  `cedula_identidad` varchar(20) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_identidad` (`cedula_identidad`)
) ENGINE=InnoDB AUTO_INCREMENT=573 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `cedula_identidad` varchar(20) NOT NULL,
  `salario_base` decimal(10,2) NOT NULL,
  `faltas` int(11) DEFAULT 0,
  `descuento_faltas` decimal(10,2) DEFAULT 0.00,
  `cesta_tickets` decimal(10,2) DEFAULT 0.00,
  `bono` decimal(10,2) DEFAULT 0.00,
  `jabon` decimal(10,2) DEFAULT 0.00,
  `deducciones` decimal(10,2) DEFAULT 0.00,
  `salario_neto` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `empleados_id` (`empleado_id`),
  KEY `cedula_identidad` (`cedula_identidad`),
  KEY `fecha_pago` (`fecha_pago`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Unico del usuario',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre De Usuario',
  `apellido` varchar(50) NOT NULL COMMENT 'Apellido del usuario\r\n\r\n',
  `usuario` varchar(50) NOT NULL COMMENT 'Nombre de usuario para iniciar sección\r\n',
  `correo` varchar(50) NOT NULL COMMENT 'Correo Electrónico del usuario ',
  `contrasena` varchar(255) NOT NULL COMMENT 'Contraseña del usuario',
  `rol` enum('Administrador','Empleado') NOT NULL COMMENT 'Rol del usuario en el sistema: Administrador o Empleado',
  `fecha` date DEFAULT NULL COMMENT 'Fecha de registro del usuario\r\n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` VALUES ('1', 'fernandos', 'herrera', 'admin', 'henriquezjosue384@gmail.com', '$2y$10$Rts67XtUL8lBbXM6YEwol.akScW2dnJ7dgpbMn.JmEjDPzPTX4I2i', 'Administrador', '2024-11-04');
INSERT INTO `usuarios` VALUES ('8', 'miguel', 'Rodriguez', 'usuario', 'henriquezjosue384@gmail.com', '$2y$10$NL/G4nnj.kDcpynSQfC4/.wFtKcUhsD5vMgTnXc9i2nannlgMQCmK', 'Empleado', '2024-12-11');
INSERT INTO `usuarios` VALUES ('9', 'DASDASD', 'ASDASD', 'ASDASDDASDASD', 'ASDASDQ@GMAIL.COM', '$2y$10$ql86.eonfNseHZqE6VhgQ.34MoaoF4odHaIP5Nw7IllXnbr/pO1hu', 'Empleado', '2025-03-05');


