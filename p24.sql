-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 20:17:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p24`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `num` varchar(15) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `numTel` varchar(15) NOT NULL,
  `ciudad` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`codigo`, `nombre`, `colonia`, `calle`, `num`, `cp`, `numTel`, `ciudad`) VALUES
('ALM001', 'Almacen Everest', 'Colinas', 'Manzano', '458', '22059', '664-897-5669', 'TIJ'),
('ALM002', 'Almacen Valles', 'Acapulco', 'Laurel', '153', '22365', '664-852-9698', 'ROS'),
('ALM003', 'Almacen Oasis', 'Lomas', 'Azahar', '726', '22487', '664-875-9887', 'MXL'),
('ALM004', 'Almacen Jardines', 'Cedro', 'Encino', '986', '22587', '664-256-9514', 'ENS'),
('ALM005', 'Almacen Terranova', 'Terrazas', 'Granada', '485', '22015', '664-987-8978', 'TIJ'),
('ALM006', 'Almacen Esmeralda', 'Residencial', 'Olmo', '684', '22364', '664-852-9876', 'MXL'),
('ALM007', 'Almacen Imperio', 'Arrandas', 'Ciruelo', '654', '22481', '664-985-9668', 'MXL'),
('ALM008', 'Almacen Amapolas', 'Palmas', 'Acacia', '489', '22581', '664-951-6889', 'ENS'),
('ALM009', 'Almacen Elegance', 'Balcones', 'Maple', '259', '22698', '664-987-3206', 'ROS'),
('ALM010', 'Almacen Montes', 'Primavera', 'Pino', '214', '22478', '664-951-0066', 'TIJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `limiteCarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo`, `nombre`, `limiteCarga`) VALUES
(1, 'Miniexcavadora', 9000),
(2, 'Excavadora', 32000),
(3, 'Dragas', 400000),
(4, 'Compactadora', 20220),
(5, 'Tractores', 101720),
(6, 'Minicargadores', 1225),
(7, 'Retroexcavadoras', 11000),
(8, 'Camiones mecánicos', 30000),
(9, 'Cargadores de Ruedas', 30000),
(10, 'Motoniveladora', 73344),
(11, 'Cargadores de Oruga', 28985),
(12, 'Camion Minero', 623690);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apPat` varchar(30) NOT NULL,
  `apMat` varchar(30) DEFAULT NULL,
  `numTel` varchar(15) NOT NULL,
  `almacen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`codigo`, `nombre`, `apPat`, `apMat`, `numTel`, `almacen`) VALUES
(1, 'Alejandro', 'Suarez', 'Ignacio', '664-115-4457', 'ALM001'),
(2, 'Jorge Manuel', 'Gonzales', '  ', '664-224-5566', 'ALM010'),
(3, 'Carlos', 'Padilla', 'Mendoza', '664-333-6677', 'ALM003'),
(4, 'Yahir', 'Lopez', 'Santos', '664-442-7788', 'ALM006'),
(5, 'Jesus ', 'De torres', 'Soto', '664-551-8899', 'ALM005'),
(6, 'Silvia', 'Gomez', 'Ortiz', '664-660-0001', 'ALM001'),
(7, 'Andres', 'Torres', 'Valle', '664-778-1112', 'ALM010'),
(8, 'Marta Alejandra', 'Hernandez', 'Salgado', '664-889-2223', 'ALM002'),
(9, 'Ricardo', 'Diaz', 'Garcia', '664-999-3334', 'ALM004'),
(10, 'Ian ', 'Fernandez', 'Cabrera', '664-000-4445', 'ALM002'),
(11, 'Alexander', 'Rios', 'Molina', '664-111-5556', 'ALM001'),
(12, 'Juan', 'Cruz', 'Dominguez', '664-222-6667', 'ALM009'),
(13, 'Roberto', 'Herrera', 'Guerrero', '664-333-7778', 'ALM007'),
(14, 'Elena', 'Gonzalez', 'Lopez', '664-444-8889', 'ALM008'),
(15, 'Oscar', 'Mendoza', 'Ramos', '664-555-9990', 'ALM009'),
(16, 'Evelyn', 'Sanchez', 'Vega', '664-666-0001', 'ALM003'),
(17, 'Hector', 'Mora', 'Velasco', '664-777-1112', 'ALM002'),
(18, 'Sofia', 'Reyes', 'Gomez', '664-888-2223', 'ALM001'),
(19, 'Manuel', 'Lara', 'Perez', '664-999-3334', 'ALM004'),
(20, 'Isabel', 'Ortega', 'Diaz', '664-000-4445', 'ALM005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `codigo` varchar(5) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`codigo`, `nombre`) VALUES
('ENS', 'Ensenada'),
('MXL', 'Mexicali'),
('ROS', 'Rosarito'),
('TIJ', 'Tijuana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apPat` varchar(30) NOT NULL,
  `apMat` varchar(30) DEFAULT NULL,
  `numTel` varchar(15) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `num` varchar(10) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `aval` int(11) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigo`, `nombre`, `apPat`, `apMat`, `numTel`, `colonia`, `calle`, `num`, `cp`, `aval`, `usuario`) VALUES
(1, 'Juan', 'Perez', 'Lopez', '664-5874-698', 'Centro', 'Reforma', '456', '22102', 2, 'juanis23'),
(2, 'Maria', 'Gutierrez', 'Hernandez', '664-1234-567', 'Libertad', 'Juarez', '789', '22345', 1, 'mariag'),
(3, 'Carlos', 'Rodriguez', 'Mendoza', '664-9876-543', 'Obrera', 'Madero', '321', '22001', 3, 'carlosr'),
(4, 'Ana', 'Lopez', 'Santos', '664-5643-789', 'Cacho', 'Colima', '987', '22222', 1, 'annis'),
(5, 'Javier', 'Ramirez', 'Soto', '664-8765-432', 'Hipodromo', 'Insurgentes', '654', '22110', 2, 'javierr'),
(6, 'Silvia', 'Gomez', 'Ortiz', '664-2345-678', 'Zonaeste', 'Gral.Palacios', '234', '22015', 3, 'silviag'),
(7, 'Luis', 'Torres', 'Valle', '664-7654-321', 'Playas', 'Costa Azul', '876', '22333', 1, 'luist'),
(8, 'Marta', 'Hernandez', 'Salgado', '664-8765-234', 'SantaFe', 'Santa Rosa', '543', '22123', 2, 'martah'),
(9, 'Pedro', 'Diaz', 'Garcia', '664-3456-789', 'LaMesa', 'Zaragoza', '321', '22456', 3, 'pedrod'),
(10, 'Nicolas', 'Fernandez', 'Cabrera', '664-9876-543', 'Centro', 'Benito Juarez', '654', '22122', 1, 'lauraf'),
(11, 'Arturo', 'Rios', 'Molina', '664-1234-567', 'Olivar', 'Rio Tijuana', '789', '22015', 2, 'arturo'),
(12, 'Diana', 'Cruz', 'Dominguez', '664-2345-678', 'Fundadores', 'Sanchez Taboada', '234', '22111', 3, 'dianac'),
(13, 'Sergio', 'Herrera', 'Guerrero', '664-8765-432', 'SanAntonio', 'Guerrero', '876', '22322', 1, 'robertoh'),
(14, 'Elena', 'Gonzalez', 'Lopez', '664-8765-234', 'Hipodromo', 'Madero', '543', '22444', 2, 'elenagi'),
(15, 'Oscar', 'Juarez', 'Ramos', '664-3456-789', 'Cacho', 'Reforma', '321', '22123', 3, 'oscarr'),
(16, 'Jacob', 'Ignacio', 'Vega', '664-9876-543', 'Zonaeste', 'Colima', '654', '22334', 1, 'carmenss'),
(17, 'Mario', 'Cazarez', 'Velasco', '664-1234-567', 'SantaFe', 'Juarez', '789', '22002', 2, 'hectormm'),
(18, 'Sofia', 'Gomez', 'Gomez', '664-2345-678', 'LaMesa', 'Insurgentes', '234', '22133', 3, 'sofiarr'),
(19, 'Steve', 'Diaz', 'Perez', '664-8765-432', 'Fundadores', 'Costa Azul', '876', '22211', 1, 'ricardoll'),
(20, 'David', 'Martinez', 'Diaz', '664-8765-234', 'SanAntonio', 'Santa Rosa', '543', '22145', 2, 'isabell'),
(26, 'Juanito', 'Suarez', 'Capulin', '(664) 826-2092', 'Juarez', 'Juanes', '666', '22205', NULL, 'juanito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `codigo` int(11) NOT NULL,
  `horaEntrega` time NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apPat` varchar(30) NOT NULL,
  `apMat` varchar(30) DEFAULT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `num` varchar(10) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `chofer` int(11) DEFAULT NULL,
  `reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`codigo`, `horaEntrega`, `nombre`, `apPat`, `apMat`, `colonia`, `calle`, `num`, `cp`, `chofer`, `reserva`) VALUES
(1, '10:00:00', 'Oscar', 'Santos', 'Gomez', 'Altos', 'Madero', '678', '22983', 1, 1),
(2, '11:30:00', 'Luis', 'Torres', 'Valle', 'Centro', 'Reforma', '123', '22102', 2, 2),
(3, '14:45:00', 'Marta', 'Hernandez', 'Salgado', 'Cedros', 'Olmo', '567', '22456', 3, 3),
(4, '09:15:00', 'Pedro', 'Diaz', 'Garcia', 'Libertad', 'Juarez', '890', '22345', 4, 4),
(5, '12:00:00', 'Laura', 'Fernandez', 'Cabrera', 'Amapolas', 'Pino', '234', '22678', 5, 5),
(6, '16:30:00', 'Arturo', 'Rios', 'Molina', 'Primavera', 'Encino', '789', '22456', 6, 6),
(7, '08:45:00', 'Thiago', 'Cruz', 'Cruz', 'Residencial', 'Azahar', '345', '22789', 7, 7),
(8, '13:15:00', 'Roberto', 'Herrera', 'Guerrero', 'Lomas', 'Laurel', '901', '22456', 8, 8),
(9, '10:30:00', 'Elena', 'Gonzalez', 'Lopez', 'Balcones', 'Ciruelo', '567', '22345', 9, 9),
(10, '15:00:00', 'Oscar', 'Mendoza', 'Ramos', 'Terrazas', 'Granada', '123', '22015', 10, 10),
(11, '11:45:00', 'Julian', 'Sanchez', 'Parra', 'Palmas', 'Acacia', '890', '22581', 11, 11),
(12, '17:30:00', 'Hector', 'Mora', 'Velasco', 'Acapulco', 'Laurel', '234', '22365', 12, 12),
(13, '09:00:00', 'Benjamin', 'Reyes', ' ', 'Residencial', 'Olmo', '567', '22364', 13, 13),
(14, '14:15:00', 'Ricardo', 'Lara', 'Perez', 'Arrandas', 'Ciruelo', '901', '22481', 14, 14),
(15, '12:30:00', 'Isabel', 'Ortega', 'Diaz', 'Lomas', 'Laurel', '345', '22456', 15, 15),
(16, '18:00:00', 'Juan', 'Perez', 'Lopez', 'Centro', 'Reforma', '678', '22102', 16, 16),
(17, '10:15:00', 'Maria', 'Gutierrez', 'Hernandez', 'Cedros', 'Olmo', '123', '22456', 17, 17),
(18, '14:45:00', 'Carlos', 'Rodriguez', 'Mendoza', 'Libertad', 'Juarez', '890', '22345', 18, 18),
(19, '09:30:00', 'Ana', 'Lopez', 'Santos', 'Amapolas', 'Pino', '567', '22678', 19, 19),
(20, '15:00:00', 'Erick', 'Juarez', 'Suarez', 'Primavera', 'Encino', '234', '22456', 20, 20),
(21, '07:00:00', 'Alejandro', 'Suarez', 'Ignacio', 'Bajos', 'Juanes', '689', '22005', 1, 30),
(22, '08:00:00', 'Alejandro', 'Suarez', 'Ignacio', 'Altos', 'Encinos', '6898', '22006', 1, 31),
(23, '07:00:00', 'Alejandro', 'Suarez', 'Ignacio', 'Guaycura', 'Av.paseso del guaycura', '42', '22216', 1, 32),
(24, '08:00:00', 'Jorge Manuel', 'Gonzales', ' ', 'Palacio', 'Morelos', '589', '22050', 2, 33),
(25, '07:00:00', 'Jorge Manuel', 'Gonzales', ' ', 'Juarez', 'Abedules', '289', '22060', 2, 34),
(26, '08:00:00', 'Jorge Manuel', 'Gonzales', ' ', 'Madero', 'Rosas', '7895', '22180', 2, 35),
(27, '07:00:00', 'Carlos', 'Padilla', 'Mendoza', 'Arcenal', 'Municion', '389', '22097', 3, 36),
(28, '08:00:00', 'Carlos', 'Padilla', 'Mendoza', 'Revolucion', 'Patria', '256', '22074', 3, 37),
(29, '07:00:00', 'Carlos', 'Padilla', 'Mendoza', 'Abejas', 'Lirio', '8962', '22041', 3, 38),
(30, '00:00:00', 'yo', 'yo', 'yo', '', 'yo', '55', '5555', NULL, 38),
(31, '00:00:00', 'hola', 'capibara', 'capibara', '', 'vicente guerrero', '9408', '22204', NULL, 39),
(32, '00:00:00', 'Daniela', 'Llanes', 'Quiroz', '', 'Juan', '500', '22207', NULL, 40),
(33, '00:00:00', 'Juanito', 'Capulin', 'Herrera', '', 'Fenix', '666', '22204', NULL, 41),
(34, '00:00:00', 'ggg', 'ggg', 'ggg', '', '7t6t', '5855858', '63636', NULL, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusmaquina`
--

CREATE TABLE `estatusmaquina` (
  `codigo` varchar(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estatusmaquina`
--

INSERT INTO `estatusmaquina` (`codigo`, `descripcion`) VALUES
('DISP', 'Disponible'),
('MANT', 'En mantenimiento'),
('RES', 'En reserva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusreserva`
--

CREATE TABLE `estatusreserva` (
  `codigo` varchar(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estatusreserva`
--

INSERT INTO `estatusreserva` (`codigo`, `descripcion`) VALUES
('CAM', 'En camino'),
('CAN', 'Cancelado'),
('ENT', 'Entregada'),
('FIN', 'Finalizado'),
('PEN', 'Pendiente'),
('PRO', 'En proceso'),
('REC', 'Recoleccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `folio` int(11) NOT NULL,
  `fechaAct` date DEFAULT NULL,
  `fechaSigMan` date DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`folio`, `fechaAct`, `fechaSigMan`, `descripcion`, `maquina`) VALUES
(1, '2022-05-15', '2023-09-15', 'Mantenimiento preventivo', 1),
(2, '2022-06-20', '2023-10-20', 'Reemplazo de piezas', 2),
(3, '2022-08-05', '2023-12-05', 'Inspección y ajuste general', 4),
(4, '2022-09-14', '2024-01-14', 'Mantenimiento preventivo', 5),
(5, '2022-10-22', '2024-02-22', 'Reemplazo de filtros', 6),
(6, '2022-11-30', '2024-03-30', 'Lubricación y engrase', 7),
(7, '2022-12-18', '2024-04-18', 'Inspección eléctrica', 8),
(8, '2023-01-05', '2024-05-05', 'Mantenimiento correctivo', 9),
(9, '2023-02-09', '2024-06-09', 'Reemplazo de correas', 10),
(10, '2023-03-15', '2024-07-15', 'Revisión general', 11),
(11, '2023-04-20', '2024-08-20', 'Cambio de aceite', 12),
(12, '2023-05-10', '2024-09-10', 'Alineación y balanceo', 13),
(13, '2023-06-05', '2024-10-05', 'Verificación de frenos', 14),
(14, '2023-07-14', '2024-11-14', 'Mantenimiento preventivo', 15),
(15, '2023-08-22', '2024-12-22', 'Lubricación de componentes', 16),
(16, '2023-09-30', '2025-01-30', 'Inspección de sistemas hidráulicos', 17),
(17, '2023-10-18', '2025-02-18', 'Cambio de neumáticos', 18),
(18, '2023-11-05', '2025-03-05', 'Revisión de sistemas eléctricos', 19),
(19, '2024-01-09', '2025-05-09', 'Mantenimiento correctivo', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `codigo` int(11) NOT NULL,
  `precioDia` float NOT NULL,
  `numSerie` varchar(17) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `almacen` varchar(10) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `estatusM` varchar(20) NOT NULL,
  `extraImagenes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`codigo`, `precioDia`, `numSerie`, `imagen`, `almacen`, `modelo`, `estatusM`, `extraImagenes`) VALUES
(1, 150, 'MSK2345678', '3009D.jpeg', 'ALM001', 1, 'RES', '[\"extra1.jpeg\",\"extra2.jpeg\",\"extra3.jpeg\"]'),
(2, 200, 'HJD4567890', 'DD25B.jpeg', 'ALM002', 3, 'MANT', '[\"extra10.jpeg\",\"extra11.jpeg\",\"extra12.jpg\"]'),
(3, 220, 'KLO7890123', '205NXT.webp', 'ALM004', 4, 'DISP', '[\"extra13.jpg\",\"extra14.jpeg\",\"extra15.jpeg\"]'),
(4, 190, 'WER3456789', 'HC60.webp', 'ALM001', 9, 'MANT', '[\"extra28.jpg\",\"extra29.jpg\",\"extra30.jpg\"]'),
(5, 210, 'TGH9012345', 'GD511A-2.jpg', 'ALM002', 2, 'MANT', '[\"extra7.jpg\",\"extra8.jpg\",\"extra9.jpg\"]'),
(6, 180, 'PLK5678901', 'L220H.jpg', 'ALM003', 6, 'MANT', '[\"extra19.jpeg\",\"extra20.jpg\",\"extra21.jpg\"]'),
(7, 230, 'UYI2345678', 'D375A-6R.jpeg', 'ALM004', 7, 'RES', '[\"extra22.jpg\",\"extra23.jpeg\",\"extra24.jpg\"]'),
(8, 195, 'QWE6789012', '785D.jpeg', 'ALM001', 8, 'RES', '[\"extra25.jpeg\",\"extra26.jpeg\",\"extra27.jpeg\"]'),
(9, 150, 'R2F7PQ1Y8N', '320GC.jpg', 'ALM005', 11, 'DISP', '[\"extra31.jpeg\",\"extra32.jpeg\",\"extra33.webp\"]'),
(10, 190, 'LK9J4H6G2I', 'M315.jpeg', 'ALM005', 12, 'DISP', '[\"extra34.jpeg\",\"extra35.jpeg\",\"extra36.jpeg\"]'),
(11, 200, 'X3ZVU5O1WM', '826K.jpg', 'ALM006', 13, 'DISP', '[\"extra37.jpeg\",\"extra38.jpg\",\"extra39.jpeg\"]'),
(12, 210, 'E8DCB2A5ZX', 'CT160.jpeg', 'ALM006', 14, 'DISP', '[\"extra40.webp\",\"extra41.jpg\",\"extra42.jpg\"]'),
(13, 165, 'YTN6K9L7RM', '1CTX.webp', 'ALM006', 15, 'DISP', '[\"extra43.jpg\",\"extra44.webp\",\"extra45.jpg\"]'),
(14, 110, 'U2P3O9GK1L', 'TM320.jpg', 'ALM007', 16, 'DISP', '[\"extra46.jpg\",\"extra47.jpg\",\"extra48.jpg\"]'),
(15, 210, 'M7NB5Z3XVC', 'HD405-7.jpeg', 'ALM007', 17, 'DISP', '[\"extra49.jpeg\",\"extra50.jpeg\",\"extra51.jpeg\"]'),
(16, 220, 'W1Q8R6J4SD', 'HD605-7E0.jpg', 'ALM008', 18, 'DISP', '[\"extra52.jpg\",\"extra53.jpeg\",\"extra54.jpeg\"]'),
(17, 135, 'F9A2C7E3LP', 'MT100.jpg', 'ALM009', 19, 'DISP', '[\"extra55.jpg\",\"extra56.jpeg\",\"extra57.jpeg\"]'),
(18, 177, 'I9R3G7F4OB', 'T770.webp', 'ALM010', 20, 'DISP', '[\"extra58.webp\",\"extra59.jpeg\",\"extra60.jpg\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `codigo` varchar(5) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`codigo`, `nombre`) VALUES
('BOB', 'Bobcat & Company'),
('CAT', 'Caterpillar'),
('DEE', 'Deere & Company'),
('DYN', 'Dynapac'),
('HIT', 'Hitachi'),
('JBC', 'JCB'),
('KOM', 'Komatsu'),
('LIE', 'Liebherr'),
('TER', 'Terex Corporation'),
('VOL', 'Volvo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `num` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `anoFabricacion` int(11) NOT NULL,
  `capacidadCarga` float NOT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `marca` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`num`, `nombre`, `descripcion`, `anoFabricacion`, `capacidadCarga`, `imagen`, `categoria`, `marca`) VALUES
(1, '300.9D', 'La Miniexcavadora Cat 300.9D proporciona potencia y rendimiento en un tamaño compacto para que pueda trabajar en las aplicaciones más estrechas. Su capacidad de pasar por entradas reducidas la convierte en una máquina excelente para trabajos de demolición en interiores.', 2010, 935, '', 1, 'CAT'),
(2, 'GD511A-2', 'Excavadora de alto rendimiento', 2010, 10800, '', 10, 'KOM'),
(3, 'DD25B', 'Excavadora', 2015, 2359, '', 4, 'VOL'),
(4, '205 NXT', 'La JCB 205 NXT incorpora un sistema telemático de avanzada, JCB LiveLink, que lo mantiene actualizado sobre el estado, el mantenimiento y la seguridad de la máquina', 2015, 22500, '', 2, 'JBC'),
(5, '980H', 'Cargadora con gran capacidad', 2018, 8000, '', 9, 'CAT'),
(6, 'L220H', 'La L220 de la nueva serie H es más eficiente, productiva e inteligente que sus predecesoras de la serie G. Consiga un consumo de combustible hasta un 15% más eficiente gracias a su potente motor, al sistema OptiShift de segunda generación y al nuevo freno seco de estacionamiento. En cuanto a su productividad, esta ha aumentado hasta un 10%, ya que la L220H incorpora mejoras, como su transmisión y su convertidor de torsión nuevos, así como una versión revisada de su relación de transmisión.', 2017, 33100, '', 9, 'VOL'),
(7, 'D375A-6R', 'Compactadora de suelo vibratorio', 2008, 70235, '', 11, 'KOM'),
(8, '785D', 'Cat® Water Solutions lo ayuda a reducir eficazmente el polvo del camino de acarreo para mejorar la seguridad y aumentar la productividad en su sitio de trabajo, cantera o mina. Un camión, un tanque y un sistema de suministro de agua totalmente integrados, conectados con niveles escalables de tecnología ayudan a resolver los problemas de riego excesivo e insuficiente con especial atención en las operaciones sostenibles.', 2014, 121133, '', 12, 'CAT'),
(9, 'HC 60', 'La grúa tiene una capacidad máxima de elevación de 60 toneladas, con una longitud máxima de pluma de 160 pies. Cuenta con funciones de subida/bajada y caída libre en tres tambores, una capacidad de tracción de 32,400 libras y una velocidad máxima de línea de 500 pies por minuto. La cabina del operador es cómoda y silenciosa, y la máquina tiene una buena transportabilidad con un peso de transporte de 64,720 libras. El sistema hidráulico facilita la instalación y extracción del contrapeso.', 2019, 14699, '', 3, 'TER'),
(10, 'L90F', 'La potente cargadora de ruedas Volvo L90F fue diseñada para una variedad de aplicaciones que incluyen graveras que incluyen graveras, puertos, terminales de mercancías, industrias y almacenes de troncos. La Cinemática TP de Volvo, el portaimplementos hidráulico y los implementos originales Volvo hacen que la flexible L90F sea más que una todoterreno.', 2019, 17000, '', 9, 'VOL'),
(11, '320 GC', 'La Excavadora 320GC Cat® equilibra la productividad con las funciones de las tecnologías fáciles de utilizar, una nueva cabina cómoda, un consumo de combustible reducido de hasta un 20% e intervalos de mantenimiento más largos, que reducen los costos de mantenimiento hasta en un 20% para ofrecer una excavadora de bajo costo por hora para aplicaciones de servicio mediano a ligero.', 2019, 20300, NULL, 2, 'CAT'),
(12, 'M315', 'La Excavadora de Ruedas Cat® M315 ofrece el mejor rendimiento con hasta un 15 % más par de giro y opciones de tecnología para aumentar la productividad. Ahorre tiempo y dinero con hasta un 10 % de ahorros en los costos de mantenimiento, intervalos de servicio más prolongados y mantenimiento diario a nivel del suelo. Con la M315 obtiene la potencia que necesita para trabajar más tiempo y generar ganancias. ', 1999, 15700, NULL, 2, 'CAT'),
(13, '826K', 'Diseñado específicamente para aplicaciones de rellenos sanitarios, el Compactador de Rellenos Sanitarios Cat 826K ofrece un nivel de confiabilidad, rendimiento, seguridad, comodidad del operador, facilidad de servicio y eficiencia que solo puede provenir de los más de 35 años de liderazgo en la industria. La protección probada en el campo y las tecnologías integradas proporcionan una disponibilidad máxima y un rendimiento optimizado del relleno sanitario.', 2020, 40917, NULL, 4, 'CAT'),
(14, 'CT160', 'Los rodillos vibratorios en tándem JCB CT160-80/100 son fáciles de usar, fáciles de mantener, fáciles de mantener seguros y fáciles de lograr mayor productividad.', 2022, 1790, NULL, 4, 'JBC'),
(15, '1CXT', 'La 1CX ha sido siempre una máquina compacta y muy versatil, ofreciendo el desempeño de un minicargador y una minoexcavadora en un solo paquete. Ahora le damos la opción de ir sobre orugas con la 1CXT para reducción de daños a la superficie, escalada superlaitva, poder de empuje excepcional, estabilidad incomparable y desempeño mejorado en suelo suave.', 2018, 4342, NULL, 7, 'JBC'),
(16, 'TM320', 'Se equipan con un motor potente, 4WD permanente, servocontroles y muchos otros beneficios. Con dirección articulada, alcance telescópico y una amplia gama de accesorios, la JCB TM320 es una máquina supremamente productiva. En resumen, la TM320 combina las características de una pala cargadora de ruedas con los beneficios de una pluma telescópica para brindar una gran versatilidad en cualquier sitio.', 2019, 1750, NULL, 9, 'JBC'),
(17, 'HD405-7', 'Komatsu HD405-7 Camión dúmper de obras Komatsu son robustos y fiables que ofrecen una ergonomía excepcional al operador al tiempo que ofrecen una excelente eficiencia de acarreo para la producción máxima.', 2011, 74480, NULL, 8, 'KOM'),
(18, 'HD605-7E0', 'Con una distancia mayor entre ejes de las ruedas, una rodadura ancha y un centro de gravedad bajo excepcional, el HD605-7E0 transporta la carga a mayor velocidad para una mayor producción, y ofrece mayor comodidad de conducción en terrenos irregulares.', 2015, 46943, NULL, 8, 'KOM'),
(19, 'MT100', 'No se necesitan carretillas, palas y otras herramientas manuales en las obras cuando se tiene el minicargador con orugas MT100 de Bobcat®. Esta máquina atraviesa porterías, puertas y otros espacios angostos con facilidad, y además brinda potencia con su gran capacidad de operación nominal de 1.000-lb., su asombrosa fuerza de rompimiento y su increíble altura de elevación.', 2023, 1538, NULL, 6, 'BOB'),
(20, 'T770', 'Con 3.35 m (11 pies) de elevación vertical, el® cargador compacto con orugas T770 Bobcat es ideal para cargar camiones, trituradoras y tolvas al igual que para muchos otros trabajos. Su trayectoria de elevación vertical permite colocar la carga con facilidad y realizar las tareas exigentes.', 2022, 4684, NULL, 11, 'BOB'),
(21, 'T870', 'El T870 es el cargador compacto con orugas® más grande que ha tenido Bobcat. Con una altura de elevación de 3.6 m (12 pies), T870 es el cargador compacto con orugas de mayor elevación del mercado. Es ideal si va a cargar en vagones de heno, mezcladoras de mortero o camiones con ejes en tándem con tableros laterales. Permite apilar con facilidad ladrillos, bloques y otros materiales en estibas.', 2018, 5751, NULL, 11, 'BOB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `montoPago` float DEFAULT NULL,
  `concepto` varchar(30) NOT NULL,
  `saldo` float DEFAULT NULL,
  `reserva` int(11) NOT NULL,
  `numPago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`folio`, `fecha`, `montoPago`, `concepto`, `saldo`, `reserva`, `numPago`) VALUES
(1, '2022-05-05', 2070, 'Pago 1', 0, 1, 1),
(2, '2022-05-15', 1590, 'Pago 1', 0, 2, 1),
(3, '2022-07-15', 2650, 'Pago 1', 0, 3, 1),
(4, '2022-08-20', 1480, 'Pago 1', 0, 4, 1),
(5, '2023-09-25', 2330, 'Pago 1', 0, 5, 1),
(6, '2022-11-20', 1800, 'Pago 1', 0, 6, 1),
(7, '2022-12-05', 2120, 'Pago 1', 0, 7, 1),
(8, '2023-01-30', 2110, 'Pago 1', 0, 8, 1),
(9, '2023-02-15', 2540, 'Pago 1', 0, 9, 1),
(10, '2023-04-05', 1745, 'Pago 1', 0, 10, 1),
(11, '2023-05-05', 2640, 'Pago 1', 0, 11, 1),
(12, '2023-06-10', 1325, 'Pago 1', 0, 12, 1),
(13, '2023-06-20', 2110, 'Pago 1', 0, 13, 1),
(14, '2023-07-05', 1745, 'Pago 1', 0, 14, 1),
(15, '2023-07-20', 2540, 'Pago 1', 0, 15, 1),
(16, '2023-08-05', 1480, 'Pago 1', 0, 16, 1),
(17, '2023-08-20', 2120, 'Pago 1', 0, 17, 1),
(18, '2023-09-05', 1800, 'Pago 1', 0, 18, 1),
(19, '2023-09-20', 2110, 'Pago 1', 0, 19, 1),
(20, '2023-10-05', 2430, 'Pago 1', 0, 20, 1),
(21, '2023-11-30', 170, 'Pago 1', 2174, 30, 1),
(22, '2023-11-30', 170, 'Pago 1', 2464, 31, 1),
(23, '2023-11-30', 170, 'Pago 1', 2961, 32, 1),
(24, '2023-11-30', 170, 'Pago 1', 2700, 33, 1),
(25, '2023-11-30', 170, 'Pago 1', 2932, 34, 1),
(26, '2023-11-30', 170, 'Pago 1', 1990, 35, 1),
(27, '2023-11-30', 170, 'Pago 1', 2048, 36, 1),
(28, '2023-11-30', 170, 'Pago 1', 1787, 37, 1),
(29, '2023-11-30', 170, 'Pago 1', NULL, 38, 1),
(30, '2023-11-30', 50, 'Prueba', NULL, 38, 2),
(31, '2023-11-30', 68, 'Prueba', NULL, 38, 3),
(32, '2023-11-30', 50, 'Prueba', 2680, 39, 1),
(33, '2023-11-30', 100, 'Prueba', 2619, 41, 1),
(34, '2023-11-30', 2619, 'Prueba', 0, 41, 2),
(35, '2023-11-30', 10, 'Prueba', 2926, 42, 1),
(36, '2023-11-30', 26, 'Prueba', 2900, 42, 2),
(37, '2023-12-01', 500, 'Pago1', 2400, 42, 3),
(38, '2023-12-01', 500, 'Pago Inicial', 1102, 44, 1);

--
-- Disparadores `pagos`
--
DELIMITER $$
CREATE TRIGGER `calculoPagos` BEFORE INSERT ON `pagos` FOR EACH ROW begin
    declare numeroPagoActual int;
    declare saldoActual decimal;
    declare saldoRestante decimal;
    declare montoPago decimal;
    declare msg varchar(150);
    set saldoRestante= (select min(saldo) from pagos where reserva = new.reserva);

    if(saldoRestante= 0)then
        set msg = 'El reserva que estas tratando de pagar, ya se encuentra pagado';
        signal sqlstate '45000' set message_text = msg;
    else
        set numeroPagoActual = (select max(numPago) from pagos where reserva = new.reserva);
        if(numeroPagoActual is null) then
            set numeroPagoActual = 1;
        else
            set numeroPagoActual = numeroPagoActual + 1;
        end if;
        set montoPago = new.montoPago;
        if(numeroPagoActual = 1) then
            set saldoRestante= (select total from reservas where folio = new.reserva);
            set saldoActual = saldoRestante- montoPago;
        else
            set saldoRestante= (select min(saldo) from pagos where reserva = new.reserva);
            set saldoActual = saldoRestante- montoPago;
        end if;
        set
            new.numPago = numeroPagoActual,
            new.saldo = saldoActual,
            new.fecha = CURRENT_TIMESTAMP;
		end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`codigo`, `descripcion`) VALUES
(1, 'Solo tendra lectura'),
(2, 'Solo tendra acceso a las reservas.'),
(3, 'Tiene acceso a todo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rep_rentas`
--

CREATE TABLE `rep_rentas` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apPat` varchar(30) NOT NULL,
  `apMat` varchar(30) DEFAULT NULL,
  `numTel` varchar(15) NOT NULL,
  `almacen` varchar(10) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rep_rentas`
--

INSERT INTO `rep_rentas` (`codigo`, `nombre`, `apPat`, `apMat`, `numTel`, `almacen`, `usuario`) VALUES
(1, 'Fernando', 'Uriarte', 'Sosa', '664 5879 125', 'ALM001', 'ferdo12'),
(2, 'Leticia', 'Ramirez', 'Gomez', '664 1234 567', 'ALM002', 'letty23'),
(3, 'Roberto', 'Gonzalez', 'Cruz', '664 9876 543', 'ALM003', 'roberg'),
(4, 'Elena', 'Mendoza', 'Martinez', '664 5643 789', 'ALM004', 'elenam'),
(5, 'Javier', 'Torres', 'Santos', '664 8765 432', 'ALM001', 'javiers'),
(6, 'Lorena', 'Perez', 'Diaz', '664 2345 678', 'ALM002', 'lorenap'),
(7, 'Hector', 'Diaz', 'Gomez', '664 7654 321', 'ALM003', 'hectord'),
(8, 'Marta', 'Sanchez', 'Velasco', '664 8765 234', 'ALM004', 'martas'),
(9, 'Adrian', 'Mora', 'Gutierrez', '664 3456 789', 'ALM001', 'adrianm'),
(10, 'Laura', 'Gutierrez', 'Ramirez', '664 9876 543', 'ALM002', 'lauragr'),
(11, 'Arturo', 'Rodriguez', 'Ortiz', '664 1234 567', 'ALM003', 'arturor'),
(12, 'Diana', 'Gomez', 'Hernandez', '664 2345 678', 'ALM004', 'dianag'),
(13, 'Brayan', 'Lopez', 'Salgado', '664 8765 432', 'ALM001', 'brayanl'),
(14, 'Karen', 'Gonzalez', 'Molina', '664 8765 234', 'ALM002', 'kareng'),
(15, 'Oscar', 'Mendoza', 'Ramos', '664 3456 789', 'ALM003', 'oscarm'),
(16, 'Carmen', 'Sanchez', 'Vega', '664 9876 543', 'ALM004', 'carmens'),
(17, 'Manuel', 'Mora', 'Velasco', '664 1234 567', 'ALM001', 'manuelm'),
(18, 'Sofia', 'Reyes', 'Gomez', '664 2345 678', 'ALM002', 'sofiar'),
(19, 'Ricardo', 'Lara', 'Perez', '664 8765 432', 'ALM003', 'ricardol'),
(20, 'Isabel', 'Ortega', 'Diaz', '664 8765 234', 'ALM004', 'isabelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `folio` int(11) NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `fechaInicial` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaDevolucion` date NOT NULL,
  `costoTransporte` float DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `subtotal` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `estatusR` varchar(20) NOT NULL,
  `rep_rtas` int(11) DEFAULT NULL,
  `almacen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`folio`, `fechaSolicitud`, `fechaInicial`, `fechaFinal`, `fechaEntrega`, `fechaDevolucion`, `costoTransporte`, `descripcion`, `subtotal`, `iva`, `total`, `cliente`, `estatusR`, `rep_rtas`, `almacen`) VALUES
(1, '2022-05-05', '2022-05-10', '2022-05-15', '2022-05-10', '2022-05-12', 1200, 'Reserva 1', 750, 120, 2070, 1, 'FIN', 1, 'ALM001'),
(2, '2022-05-15', '2022-05-20', '2022-05-25', '2022-05-20', '2022-06-27', 900, 'Reserva 2', 500, 90, 1590, 2, 'FIN', 2, 'ALM002'),
(3, '2022-07-15', '2022-07-20', '2022-07-25', '2022-07-20', '2022-07-27', 1500, 'Reserva 3', 1000, 150, 2650, 3, 'FIN', 3, 'ALM003'),
(4, '2022-08-20', '2022-08-25', '2022-08-30', '2022-08-25', '2022-09-02', 800, 'Reserva 4', 600, 80, 1480, 4, 'FIN', 4, 'ALM004'),
(5, '2022-09-25', '2022-09-30', '2022-10-05', '2022-09-30', '2022-10-02', 1300, 'Reserva 5', 900, 130, 2330, 5, 'FIN', 5, 'ALM001'),
(6, '2022-11-20', '2022-11-25', '2022-11-30', '2022-11-25', '2022-12-02', 1000, 'Reserva 6', 700, 100, 1800, 6, 'FIN', 6, 'ALM002'),
(7, '2022-12-05', '2022-12-10', '2023-12-15', '2022-12-10', '2023-12-18', 1200, 'Reserva 7', 800, 120, 2120, 7, 'FIN', 7, 'ALM003'),
(8, '2023-01-30', '2023-02-05', '2023-02-10', '2023-02-05', '2023-02-12', 1100, 'Reserva 8', 900, 110, 2110, 8, 'FIN', 8, 'ALM004'),
(9, '2023-02-15', '2023-02-20', '2023-02-25', '2023-02-20', '2023-02-27', 1400, 'Reserva 9', 1200, 140, 2540, 9, 'FIN', 9, 'ALM001'),
(10, '2023-04-05', '2023-04-10', '2023-04-15', '2023-04-10', '2023-04-18', 950, 'Reserva 10', 700, 95, 1745, 10, 'FIN', 10, 'ALM002'),
(11, '2023-05-25', '2023-05-30', '2023-06-05', '2023-05-30', '2023-06-07', 1600, 'Reserva 11', 1300, 160, 2640, 11, 'FIN', 11, 'ALM003'),
(12, '2023-06-10', '2023-06-15', '2023-06-20', '2023-06-15', '2023-06-22', 750, 'Reserva 12', 500, 75, 1325, 12, 'FIN', 12, 'ALM004'),
(13, '2023-06-20', '2023-06-25', '2023-06-30', '2023-06-25', '2023-07-03', 1100, 'Reserva 13', 900, 110, 2110, 13, 'CAN', 13, 'ALM001'),
(14, '2023-07-05', '2023-07-10', '2023-07-15', '2023-07-10', '2023-07-17', 950, 'Reserva 14', 700, 95, 1745, 14, 'FIN', 14, 'ALM002'),
(15, '2023-07-20', '2023-07-25', '2023-07-30', '2023-07-25', '2023-08-03', 1400, 'Reserva 15', 1200, 140, 2540, 15, 'FIN', 15, 'ALM003'),
(16, '2023-08-05', '2023-08-10', '2023-08-15', '2023-08-10', '2023-08-17', 800, 'Reserva 16', 600, 80, 1480, 16, 'ENT', 16, 'ALM004'),
(17, '2023-08-20', '2023-08-25', '2023-08-30', '2023-08-25', '2023-09-03', 1200, 'Reserva 17', 800, 120, 2120, 17, 'ENT', 17, 'ALM001'),
(18, '2023-09-05', '2023-09-10', '2023-09-15', '2023-09-10', '2024-09-17', 1000, 'Reserva 18', 700, 100, 1800, 18, 'PEN', 18, 'ALM002'),
(19, '2023-09-20', '2023-09-25', '2023-09-30', '2023-09-30', '2023-10-03', 1100, 'Reserva 19', 900, 110, 2110, 19, 'PEN', 19, 'ALM003'),
(20, '2023-10-05', '2023-10-10', '2023-10-15', '2023-10-10', '2023-10-17', 1300, 'Reserva 20', 1100, 130, 2430, 20, 'PEN', 20, 'ALM004'),
(29, '2023-11-30', '2023-12-05', '2023-12-10', '2023-12-05', '2023-12-12', 1300, 'Reserva 30', 0, 0, 0, 1, 'PEN', 1, 'ALM010'),
(30, '2023-11-30', '2023-12-15', '2023-12-20', '2023-12-15', '2023-12-22', 1300, 'Reserva 31', 900, 144, 2344, 1, 'PEN', 1, 'ALM010'),
(31, '2023-11-30', '2023-12-25', '2023-12-30', '2023-12-25', '2024-01-01', 1300, 'Reserva 32', 1150, 184, 2634, 1, 'PEN', 1, 'ALM010'),
(32, '2023-11-30', '2024-01-05', '2024-01-10', '2024-01-05', '2024-01-12', 2000, 'Reserva 33', 975, 156, 3131, 2, 'PEN', 2, 'ALM009'),
(33, '2023-11-30', '2024-01-15', '2024-01-20', '2024-01-15', '2024-01-22', 2000, 'Reserva 34', 750, 120, 2870, 2, 'PEN', 2, 'ALM009'),
(34, '2023-11-30', '2024-01-25', '2024-01-30', '2024-01-25', '2024-02-01', 2000, 'Reserva 35', 950, 152, 3102, 2, 'PEN', 2, 'ALM009'),
(35, '2023-11-30', '2024-02-05', '2024-02-10', '2024-02-05', '2024-02-12', 1000, 'Reserva 36', 1000, 160, 2160, 3, 'PEN', 3, 'ALM008'),
(36, '2023-11-30', '2024-02-15', '2024-02-20', '2024-02-15', '2024-02-22', 1000, 'Reserva 37', 1050, 168, 2218, 3, 'PEN', 3, 'ALM008'),
(37, '2023-11-30', '2024-02-25', '0000-00-00', '2024-02-25', '2024-03-01', 1000, 'Reserva 38', 825, 132, 1957, 3, 'PEN', 3, 'ALM008'),
(38, '2023-11-30', '0000-00-00', '2023-12-09', '2023-12-02', '0000-00-00', 677, 'y', 1400, 224, 2301, 4, 'PEN', NULL, NULL),
(39, '2023-11-30', '0000-00-00', '2023-12-12', '2023-12-02', '0000-00-00', 677, 'fsdfsfsafasf', 1770, 283.2, 2730.2, 4, 'PEN', NULL, NULL),
(40, '2023-11-30', '0000-00-00', '2023-12-06', '2023-12-04', '0000-00-00', 677, 'Se ocupa en fa', 1240, 198.4, 2115.4, 4, 'PEN', NULL, NULL),
(41, '2023-11-30', '0000-00-00', '2023-12-10', '2023-12-02', '0000-00-00', 677, 'Primera reserva', 1760, 281.6, 2718.6, 26, 'FIN', NULL, NULL),
(42, '2023-11-30', '0000-00-00', '2023-12-13', '2023-12-02', '0000-00-00', 677, 'tt', 1947, 311.52, 2935.52, 26, 'PEN', NULL, NULL),
(43, '2023-12-01', '2023-12-02', '2023-12-07', '2023-12-02', '2023-12-09', 500, 'holaprueba 1', 2835, 453.6, 3788.6, 4, 'PEN', 4, NULL),
(44, '2023-12-01', '2023-12-01', '2023-12-05', '2023-12-01', '2023-12-07', 500, 'Para construccion de unos cimientos', 950, 152, 1602, 4, 'PEN', 4, NULL);

--
-- Disparadores `reservas`
--
DELIMITER $$
CREATE TRIGGER `inicializarReserva` BEFORE INSERT ON `reservas` FOR EACH ROW begin
    set new.fechaSolicitud = CURRENT_TIMESTAMP; 
    set new.fechaDevolucion = DATE_ADD(NEW.fechaFinal, INTERVAL 2 DAY);
	set new.fechaEntrega = new.fechaInicial;
    set new.subtotal = 0;
    set new.iva = 0;
    set new.total = 0;
    set new.estatusR = 'PEN';
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `re_maq`
--

CREATE TABLE `re_maq` (
  `reserva` int(11) NOT NULL,
  `maquina` int(11) NOT NULL,
  `cantDias` int(11) NOT NULL,
  `importeRenta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `re_maq`
--

INSERT INTO `re_maq` (`reserva`, `maquina`, `cantDias`, `importeRenta`) VALUES
(1, 1, 5, 750),
(2, 2, 5, 1200),
(3, 4, 5, 1540),
(4, 5, 5, 1140),
(5, 6, 5, 1470),
(6, 7, 5, 1290),
(7, 8, 5, 1150),
(8, 9, 5, 1365),
(9, 10, 5, 1440),
(10, 11, 5, 1350),
(11, 12, 5, 1620),
(12, 13, 5, 1225),
(13, 14, 5, 1694),
(14, 15, 5, 1140),
(15, 16, 5, 1470),
(16, 17, 5, 1290),
(17, 18, 5, 1150),
(18, 19, 5, 1365),
(19, 10, 5, 1500),
(30, 6, 5, 900),
(31, 7, 5, 1150),
(32, 8, 5, 975),
(33, 9, 5, 750),
(34, 10, 5, 950),
(35, 11, 5, 1000),
(36, 12, 5, 1050),
(37, 13, 5, 825),
(38, 11, 7, 1400),
(38, 14, 5, 550),
(39, 18, 10, 1770),
(40, 10, 2, 380),
(40, 12, 2, 420),
(40, 16, 2, 440),
(41, 3, 8, 1760),
(42, 18, 11, 1947),
(43, 5, 5, 1050),
(43, 6, 5, 900),
(43, 18, 5, 885),
(44, 4, 5, 950);

--
-- Disparadores `re_maq`
--
DELIMITER $$
CREATE TRIGGER `calcularColumnasReserva` BEFORE INSERT ON `re_maq` FOR EACH ROW BEGIN
    DECLARE totalNEW FLOAT;
    DECLARE subtotalNEW FLOAT;
    DECLARE ivaNEW FLOAT;

    SET subtotalNEW = new.importeRenta + (SELECT subtotal
                                          FROM reservas
                                          WHERE folio = new.reserva);
    SET ivaNEW = subtotalNEW * 0.16;
    SET totalNEW = subtotalNEW + ivaNEW + (SELECT costoTransporte
                                           FROM reservas
                                           WHERE folio = new.reserva);

    UPDATE reservas
    SET
        subtotal = subtotalNEW,
        iva = ivaNEW,
        total = totalNEW
    WHERE folio = new.reserva;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcularImporteRenta` BEFORE INSERT ON `re_maq` FOR EACH ROW begin
    
    DECLARE precioRentaMaq float;

    SET precioRentaMaq = (SELECT precioDia
                        FROM maquinas
                		WHERE codigo = new.maquina);  
    SET new.importeRenta = new.cantDias * precioRentaMaq;
		
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `codigo` varchar(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`codigo`, `descripcion`) VALUES
('ADMIN', 'Es el administrador'),
('CLI', 'Es el cliente'),
('VEND', 'Es el vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_pri`
--

CREATE TABLE `user_pri` (
  `tipo_Usu` varchar(5) NOT NULL,
  `privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_pri`
--

INSERT INTO `user_pri` (`tipo_Usu`, `privilegio`) VALUES
('ADMIN', 3),
('CLI', 1),
('VEND', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nickname` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `tipo_Usu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `correo`, `contrasena`, `tipo_Usu`) VALUES
('admin', 'admin@rmp.com', 'pass123', 'ADMIN'),
('adrianm', 'adrianm@gmail.com', 'adrianm', 'VEND'),
('annis', 'annis@gmail.com', 'annis', 'CLI'),
('arturo', 'arturo@gmail.com', 'arturo', 'CLI'),
('arturor', 'arturor@gmail.com', 'arturor', 'VEND'),
('brayanl', 'brayanl@gmail.com', 'brayanl', 'VEND'),
('carlosr', 'carlosr@gmail.com', 'carlosr', 'CLI'),
('carmens', 'carmens@gmail.com', 'carmens', 'VEND'),
('carmenss', 'carmenss@gmail.com', 'carmenss', 'CLI'),
('dianac', 'dianac@gmail.com', 'dianac', 'CLI'),
('dianag', 'dianag@gmail.com', 'dianag', 'VEND'),
('elenagi', 'elenagi@gmail.com', 'elenagi', 'CLI'),
('elenam', 'elenam@gmail.com', 'elenam', 'VEND'),
('ferdo12', 'ferdo12@gmail.com', 'ferdo123', 'VEND'),
('hectord', 'hectord@gmail.com', 'hectord', 'VEND'),
('hectormm', 'hectormm@gmail.com', 'hectormm', 'CLI'),
('isabell', 'isabell@gmail.com', 'isabell', 'CLI'),
('isabelo', 'isabelo@gmail.com', 'isabelo', 'VEND'),
('javers', 'javers@gmail.com', 'javers', 'VEND'),
('javierr', 'javierr@gmail.com', 'javierr', 'CLI'),
('juanis23', 'juanis23@gmail.com', 'juanis23', 'CLI'),
('juanito', 'juanito1@gmail.com', 'juanito', 'CLI'),
('kareng', 'kareng@gmail.com', 'kareng', 'VEND'),
('lauraf', 'lauraf@gmail.com', 'lauraf', 'CLI'),
('lauragr', 'lauragr@gmail.com', 'lauragr', 'VEND'),
('letty23', 'letty23@gmail.com', 'letty23', 'VEND'),
('lorenap', 'lorenap@gmail.com', 'lorenap', 'VEND'),
('luist', 'luist@gmail.com', 'luist', 'CLI'),
('manuelm', 'manuelm@gmail.com', 'manuelm', 'VEND'),
('mariag', 'mariag@gmail.com', 'mariag', 'CLI'),
('martah', 'martah@gmail.com', 'martah', 'CLI'),
('martas', 'martas@gmail.com', 'martas', 'VEND'),
('oscarm', 'oscarm@gmail.com', 'oscarm', 'VEND'),
('oscarr', 'oscarr@gmail.com', 'oscarr', 'CLI'),
('pedrod', 'pedrod@gmail.com', 'pedrod', 'CLI'),
('ricardol', 'ricardol@gmail.com', 'ricardol', 'VEND'),
('ricardoll', 'ricardoll@gmail.com', 'ricardoll', 'CLI'),
('roberg', 'roberg@gmail.com', 'roberg', 'VEND'),
('robertoh', 'robertoh@gmail.com', 'robertoh', 'CLI'),
('silviag', 'silviag@gmail.com', 'silviag', 'CLI'),
('sofiar', 'sofiar@gmail.com', 'sofiar', 'VEND'),
('sofiarr', 'sofiarr@gmail.com', 'sofiarr', 'CLI');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_infomaquinas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_infomaquinas` (
`codigo` int(11)
,`numSerie` varchar(17)
,`precioDia` float
,`almacen` varchar(10)
,`imagen` varchar(150)
,`extraImagenes` varchar(500)
,`modelo` varchar(30)
,`marca` varchar(30)
,`descripcion` text
,`anio` int(11)
,`capacidad` float
,`categoria` varchar(50)
,`limite` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_infomaquinas`
--
DROP TABLE IF EXISTS `v_infomaquinas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_infomaquinas`  AS SELECT `maq`.`codigo` AS `codigo`, `maq`.`numSerie` AS `numSerie`, `maq`.`precioDia` AS `precioDia`, `maq`.`almacen` AS `almacen`, `maq`.`imagen` AS `imagen`, `maq`.`extraImagenes` AS `extraImagenes`, lcase(`mo`.`nombre`) AS `modelo`, lcase(`mar`.`nombre`) AS `marca`, `mo`.`descripcion` AS `descripcion`, `mo`.`anoFabricacion` AS `anio`, `mo`.`capacidadCarga` AS `capacidad`, lcase(`cat`.`nombre`) AS `categoria`, `cat`.`limiteCarga` AS `limite` FROM (((`maquinas` `maq` join `modelos` `mo` on(`maq`.`modelo` = `mo`.`num`)) join `categorias` `cat` on(`mo`.`categoria` = `cat`.`codigo`)) join `marcas` `mar` on(`mo`.`marca` = `mar`.`codigo`)) WHERE `maq`.`estatusM` = 'DISP' ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `ciudad` (`ciudad`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `almacen` (`almacen`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `FK_clientes_aval` (`aval`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estatusmaquina`
--
ALTER TABLE `estatusmaquina`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estatusreserva`
--
ALTER TABLE `estatusreserva`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `maquina` (`maquina`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `almacen` (`almacen`),
  ADD KEY `modelo` (`modelo`),
  ADD KEY `estatusM` (`estatusM`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`num`),
  ADD KEY `marca` (`marca`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `reserva` (`reserva`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `rep_rentas`
--
ALTER TABLE `rep_rentas`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `almacen` (`almacen`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `estatusR` (`estatusR`),
  ADD KEY `rep_rtas` (`rep_rtas`),
  ADD KEY `almacen` (`almacen`);

--
-- Indices de la tabla `re_maq`
--
ALTER TABLE `re_maq`
  ADD PRIMARY KEY (`reserva`,`maquina`),
  ADD KEY `maquina` (`maquina`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `user_pri`
--
ALTER TABLE `user_pri`
  ADD PRIMARY KEY (`tipo_Usu`,`privilegio`),
  ADD KEY `privilegio` (`privilegio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nickname`),
  ADD KEY `tipo_Usu` (`tipo_Usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rep_rentas`
--
ALTER TABLE `rep_rentas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD CONSTRAINT `almacenes_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudades` (`codigo`);

--
-- Filtros para la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD CONSTRAINT `choferes_ibfk_1` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`codigo`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_clientes_aval` FOREIGN KEY (`aval`) REFERENCES `clientes` (`codigo`),
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nickname`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`codigo`),
  ADD CONSTRAINT `maquinas_ibfk_2` FOREIGN KEY (`modelo`) REFERENCES `modelos` (`num`),
  ADD CONSTRAINT `maquinas_ibfk_3` FOREIGN KEY (`estatusM`) REFERENCES `estatusmaquina` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

