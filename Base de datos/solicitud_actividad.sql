-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 03:55 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `solicitud_actividad`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad_comp`
--

CREATE TABLE IF NOT EXISTS `actividad_comp` (
  `Num_actividad` int(11) NOT NULL,
  `Nombre_actividad` varchar(45) NOT NULL,
  PRIMARY KEY (`Num_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividad_comp`
--

INSERT INTO `actividad_comp` (`Num_actividad`, `Nombre_actividad`) VALUES
(0, 'Guitarra'),
(1, 'Karate'),
(2, 'Home'),
(3, 'zart'),
(4, 'aaa'),
(5, 'salto'),
(6, 'Other'),
(7, 'Crafts'),
(8, 'Jumping'),
(9, 'samba'),
(10, 'Gimnasia'),
(11, 'adadad'),
(12, 'bici'),
(13, 'agent'),
(14, 'counter'),
(15, 'argen');

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `Clave_carrera` varchar(25) NOT NULL,
  `Nombre_carrera` varchar(45) NOT NULL,
  PRIMARY KEY (`Clave_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`Clave_carrera`, `Nombre_carrera`) VALUES
('1', 'Sistemas'),
('14', 'NONO'),
('15', 'Robotica'),
('22', 'Mecatronica'),
('4', 'Ingenieria en Informatica'),
('6', 'Licenciatura en Biologia'),
('7', 'Ingles 3');

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `Clave_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL,
  `trabajador_RFC_trabajador` varchar(20) NOT NULL,
  PRIMARY KEY (`Clave_departamento`),
  KEY `fk_Departamento_trabajador1_idx` (`trabajador_RFC_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`Clave_departamento`, `nombre_departamento`, `trabajador_RFC_trabajador`) VALUES
(1, 'Exterior', 'rtete5353514'),
(2, 'Recursos anonymous', 'KOD123445'),
(3, 'Otros', 'GDOU6574TY'),
(5, 'Recursos financieros', 'rtete5353514'),
(6, 'Deportes', '4444444'),
(9, 'Servicios escolares', '4444444'),
(43445, 'Lenguas extranjeras', 'GDOU6574TY'),
(122333, 'Recursos', 'rtrr545646556');

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `Num_control` int(11) NOT NULL,
  `Nombre_estudiante` varchar(45) NOT NULL,
  `Apellido_p_estudiante` varchar(45) NOT NULL,
  `Apellido_m_estudiante` varchar(45) NOT NULL,
  `Semestre` varchar(10) NOT NULL,
  `Firma` varchar(45) DEFAULT NULL,
  `Carrera_Clave` varchar(25) NOT NULL,
  PRIMARY KEY (`Num_control`),
  KEY `fk_Estudiante_Carrera1_idx` (`Carrera_Clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`Num_control`, `Nombre_estudiante`, `Apellido_p_estudiante`, `Apellido_m_estudiante`, `Semestre`, `Firma`, `Carrera_Clave`) VALUES
(8888888, 'Greg', 'List', 'Dist', 'I', NULL, '6'),
(13425678, 'Eden', 'Hazard', 'Perez', 'III', NULL, '6'),
(15161665, 'Nefta', 'Cab', 'Torr', 'II', NULL, '7'),
(15930169, 'lucas alberto', 'alonso', 'cruz', 'VIII', NULL, '6'),
(15930185, 'Alondra', 'Jaimes', 'Gutierrez', 'V', NULL, '4'),
(15930194, 'Jorge Luis', 'Ocampo', 'Millan', 'V', NULL, '4'),
(15930200, 'Jose Ramon', 'Ortiz', 'Lopez', 'V', NULL, '4'),
(15930203, 'Karina', 'Rayo', 'Alcantara', 'V', NULL, '4'),
(15930208, 'Jorge Luis', 'Roque', 'Pineda', 'V', NULL, '4'),
(15930210, 'Carlos Alberto', 'Ruiz', 'Gutierrez', 'V', NULL, '4'),
(15930216, 'Hernan', 'Santana', 'Benitez', 'V', NULL, '4'),
(15930219, 'Marco Antonio', 'Valle', 'Toledo', 'V', NULL, '4'),
(15930221, 'Agustin', 'Vivas', 'Pineda', 'V', NULL, '4'),
(15930268, 'Palola', 'Rubi', 'Benitez', 'I', NULL, '6'),
(76152654, 'Alan', 'Alcantar', 'Medrano', 'VII', NULL, '4');

-- --------------------------------------------------------

--
-- Table structure for table `instituto`
--

CREATE TABLE IF NOT EXISTS `instituto` (
  `Clave_instituto` varchar(15) NOT NULL,
  `Nombre_instituto` varchar(45) NOT NULL,
  PRIMARY KEY (`Clave_instituto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instituto`
--

INSERT INTO `instituto` (`Clave_instituto`, `Nombre_instituto`) VALUES
('', ''),
('12DIT005B', 'Instituto Tecnologico De Ciudad Altamirano'),
('12erer3', 'Texas Univ'),
('13556', 'UNAM'),
('13HTGFHR', 'Tec de Mnte'),
('5553ttt541', 'Tecnologico de Cutzamala'),
('5t5t5t55', 'Harvard'),
('777y7y7', 'North Garner'),
('gthy676', 'Prowler Univ'),
('ru5y7yt', 'Angus Univ'),
('t7756u', 'Holly Springs'),
('TETE5T2T353', 'CBTA.288'),
('ttrt566t', 'Cambridge');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `RFC_instructor` varchar(20) NOT NULL,
  `Nombre_instructor` varchar(45) DEFAULT NULL,
  `Apellido_p_instructor` varchar(45) DEFAULT NULL,
  `Apellido_m_instructor` varchar(45) DEFAULT NULL,
  `Actividad_comp` int(11) NOT NULL,
  PRIMARY KEY (`RFC_instructor`),
  KEY `fk_Instructor_Actividad_comp1_idx` (`Actividad_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`RFC_instructor`, `Nombre_instructor`, `Apellido_p_instructor`, `Apellido_m_instructor`, `Actividad_comp`) VALUES
('', 'gggg', 'hhhh', 'dddd', 1),
('7778778hf', 'Juna', 'Lili', 'Bent', 9),
('rtr5545', 'James', 'Rodriguez', 'Jese', 3),
('tuiopk666', 'Oscar', 'Ben', 'Jack', 5),
('ytewyt', 'no', 'si', 'nose', 0);

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT,
  `Asunto` varchar(45) NOT NULL,
  `Lugar` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Estudiante_Num_control` int(11) NOT NULL,
  `Instructor_RFC` varchar(20) NOT NULL,
  `Departamento_Clave` int(11) NOT NULL,
  `Instituto_Clave` varchar(15) NOT NULL,
  PRIMARY KEY (`Folio`),
  KEY `fk_Solicitud_Estudiante1_idx` (`Estudiante_Num_control`),
  KEY `fk_Solicitud_Instructor1_idx` (`Instructor_RFC`),
  KEY `fk_Solicitud_Departamento1_idx` (`Departamento_Clave`),
  KEY `fk_Solicitud_Instituto1_idx` (`Instituto_Clave`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=131314 ;

--
-- Dumping data for table `solicitud`
--

INSERT INTO `solicitud` (`Folio`, `Asunto`, `Lugar`, `Fecha`, `Estudiante_Num_control`, `Instructor_RFC`, `Departamento_Clave`, `Instituto_Clave`) VALUES
(6, 'Asunto', 'Lugar', '2017-06-06', 15930203, '7778778hf', 5, '13556'),
(7, 'Por que si', 'Anonymous', '2018-09-12', 15930268, 'rtr5545', 43445, 'gthy676'),
(666, 'Acreditacion', 'Itca', '2017-10-25', 13425678, 'tuiopk666', 2, '13HTGFHR'),
(123312, 'nose', 'nada', '2012-03-13', 13425678, 'tuiopk666', 5, '12DIT005B'),
(131313, 'Incognita', 'Parq de princess', '2016-03-28', 15930185, '', 1, '12erer3');

-- --------------------------------------------------------

--
-- Table structure for table `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `RFC_trabajador` varchar(20) NOT NULL,
  `Nombre_trabajador` varchar(45) NOT NULL,
  `Apellido_p_trabajador` varchar(45) NOT NULL,
  `Apellido_m_trabajador` varchar(45) NOT NULL,
  `clave_presupuestal` int(11) DEFAULT NULL,
  PRIMARY KEY (`RFC_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trabajador`
--

INSERT INTO `trabajador` (`RFC_trabajador`, `Nombre_trabajador`, `Apellido_p_trabajador`, `Apellido_m_trabajador`, `clave_presupuestal`) VALUES
('3425tr', 'Baskin', 'Robins', 'Tailer', 4444),
('4444444', 'Jonsons', 'Krkit', 'Baites', 66666),
('GDOU6574TY', 'Tom', 'Hillfiger', 'Jerry', 5555),
('GOVL120945643', 'Hazard', 'Eden', 'Smith', 1500),
('KOD123445', 'Rice', 'Krispies', 'Treats', 967890),
('rtete5353514', 'Angel', 'Di', 'Di', 2000),
('rtrr545646556', 'Julio', 'Cesar', 'Cesar', 100000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_trabajador1` FOREIGN KEY (`trabajador_RFC_trabajador`) REFERENCES `trabajador` (`RFC_trabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Carrera1` FOREIGN KEY (`Carrera_Clave`) REFERENCES `carrera` (`Clave_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_Instructor_Actividad_comp1` FOREIGN KEY (`Actividad_comp`) REFERENCES `actividad_comp` (`Num_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_Solicitud_Departamento1` FOREIGN KEY (`Departamento_Clave`) REFERENCES `departamento` (`Clave_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Estudiante1` FOREIGN KEY (`Estudiante_Num_control`) REFERENCES `estudiante` (`Num_control`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Instituto1` FOREIGN KEY (`Instituto_Clave`) REFERENCES `instituto` (`Clave_instituto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Instructor1` FOREIGN KEY (`Instructor_RFC`) REFERENCES `instructor` (`RFC_instructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
