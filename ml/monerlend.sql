-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2019 a las 18:33:43
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monerlend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `created_at`, `updated_at`) VALUES
(1, '', 'País de Residencia', '2019-08-11 09:08:14', '2019-08-11 09:08:14'),
(2, 'AF', 'Afganistán', '2019-08-11 09:08:14', '2019-08-11 09:08:14'),
(3, 'AX', 'Islas Gland', '2019-08-11 09:08:14', '2019-08-11 09:08:14'),
(4, 'AL', 'Albania', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(5, 'DE', 'Alemania', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(6, 'AD', 'Andorra', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(7, 'AO', 'Angola', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(8, 'AI', 'Anguilla', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(9, 'AQ', 'Antártida', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(10, 'AG', 'Antigua y Barbuda', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(11, 'AN', 'Antillas Holandesas', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(12, 'SA', 'Arabia Saudí', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(13, 'DZ', 'Argelia', '2019-08-11 09:08:15', '2019-08-11 09:08:15'),
(14, 'AR', 'Argentina', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(15, 'AM', 'Armenia', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(16, 'AW', 'Aruba', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(17, 'AU', 'Australia', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(18, 'AT', 'Austria', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(19, 'AZ', 'Azerbaiyán', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(20, 'BS', 'Bahamas', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(21, 'BH', 'Bahréin', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(22, 'BD', 'Bangladesh', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(23, 'BB', 'Barbados', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(24, 'BY', 'Bielorrusia', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(25, 'BE', 'Bélgica', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(26, 'BZ', 'Belice', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(27, 'BJ', 'Benin', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(28, 'BM', 'Bermudas', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(29, 'BT', 'Bhután', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(30, 'BO', 'Bolivia', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(31, 'BA', 'Bosnia y Herzegovina', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(32, 'BW', 'Botsuana', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(33, 'BV', 'Isla Bouvet', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(34, 'BR', 'Brasil', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(35, 'BN', 'Brunéi', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(36, 'BG', 'Bulgaria', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(37, 'BF', 'Burkina Faso', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(38, 'BI', 'Burundi', '2019-08-11 09:08:16', '2019-08-11 09:08:16'),
(39, 'CV', 'Cabo Verde', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(40, 'KY', 'Islas Caimán', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(41, 'KH', 'Camboya', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(42, 'CM', 'Camerún', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(43, 'CA', 'Canadá', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(44, 'CF', 'República Centroafricana', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(45, 'TD', 'Chad', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(46, 'CZ', 'República Checa', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(47, 'CL', 'Chile', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(48, 'CN', 'China', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(49, 'CY', 'Chipre', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(50, 'CX', 'Isla de Navidad', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(51, 'VA', 'Ciudad del Vaticano', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(52, 'CC', 'Islas Cocos', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(53, 'CO', 'Colombia', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(54, 'KM', 'Comoras', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(55, 'CD', 'República Democrática del Congo', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(56, 'CG', 'Congo', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(57, 'CK', 'Islas Cook', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(58, 'KP', 'Corea del Norte', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(59, 'KR', 'Corea del Sur', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(60, 'CI', 'Costa de Marfil', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(61, 'CR', 'Costa Rica', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(62, 'HR', 'Croacia', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(63, 'CU', 'Cuba', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(64, 'DK', 'Dinamarca', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(65, 'DM', 'Dominica', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(66, 'DO', 'República Dominicana', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(67, 'EC', 'Ecuador', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(68, 'EG', 'Egipto', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(69, 'SV', 'El Salvador', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(70, 'AE', 'Emiratos Árabes Unidos', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(71, 'ER', 'Eritrea', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(72, 'SK', 'Eslovaquia', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(73, 'SI', 'Eslovenia', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(74, 'ES', 'España', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(75, 'UM', 'Islas ultramarinas de Estados Unidos', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(76, 'US', 'Estados Unidos', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(77, 'EE', 'Estonia', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(78, 'ET', 'Etiopía', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(79, 'FO', 'Islas Feroe', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(80, 'PH', 'Filipinas', '2019-08-11 09:08:17', '2019-08-11 09:08:17'),
(81, 'FI', 'Finlandia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(82, 'FJ', 'Fiyi', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(83, 'FR', 'Francia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(84, 'GA', 'Gabón', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(85, 'GM', 'Gambia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(86, 'GE', 'Georgia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(87, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(88, 'GH', 'Ghana', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(89, 'GI', 'Gibraltar', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(90, 'GD', 'Granada', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(91, 'GR', 'Grecia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(92, 'GL', 'Groenlandia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(93, 'GP', 'Guadalupe', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(94, 'GU', 'Guam', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(95, 'GT', 'Guatemala', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(96, 'GF', 'Guayana Francesa', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(97, 'GN', 'Guinea', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(98, 'GQ', 'Guinea Ecuatorial', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(99, 'GW', 'Guinea-Bissau', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(100, 'GY', 'Guyana', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(101, 'HT', 'Haití', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(102, 'HM', 'Islas Heard y McDonald', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(103, 'HN', 'Honduras', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(104, 'HK', 'Hong Kong', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(105, 'HU', 'Hungría', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(106, 'IN', 'India', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(107, 'ID', 'Indonesia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(108, 'IR', 'Irán', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(109, 'IQ', 'Iraq', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(110, 'IE', 'Irlanda', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(111, 'IS', 'Islandia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(112, 'IL', 'Israel', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(113, 'IT', 'Italia', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(114, 'JM', 'Jamaica', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(115, 'JP', 'Japón', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(116, 'JO', 'Jordania', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(117, 'KZ', 'Kazajstán', '2019-08-11 09:08:18', '2019-08-11 09:08:18'),
(118, 'KE', 'Kenia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(119, 'KG', 'Kirguistán', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(120, 'KI', 'Kiribati', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(121, 'KW', 'Kuwait', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(122, 'LA', 'Laos', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(123, 'LS', 'Lesotho', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(124, 'LV', 'Letonia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(125, 'LB', 'Líbano', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(126, 'LR', 'Liberia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(127, 'LY', 'Libia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(128, 'LI', 'Liechtenstein', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(129, 'LT', 'Lituania', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(130, 'LU', 'Luxemburgo', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(131, 'MO', 'Macao', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(132, 'MK', 'ARY Macedonia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(133, 'MG', 'Madagascar', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(134, 'MY', 'Malasia', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(135, 'MW', 'Malawi', '2019-08-11 09:08:19', '2019-08-11 09:08:19'),
(136, 'MV', 'Maldivas', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(137, 'ML', 'Malí', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(138, 'MT', 'Malta', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(139, 'FK', 'Islas Malvinas', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(140, 'MP', 'Islas Marianas del Norte', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(141, 'MA', 'Marruecos', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(142, 'MH', 'Islas Marshall', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(143, 'MQ', 'Martinica', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(144, 'MU', 'Mauricio', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(145, 'MR', 'Mauritania', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(146, 'YT', 'Mayotte', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(147, 'MX', 'México', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(148, 'FM', 'Micronesia', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(149, 'MD', 'Moldavia', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(150, 'MC', 'Mónaco', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(151, 'MN', 'Mongolia', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(152, 'MS', 'Montserrat', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(153, 'MZ', 'Mozambique', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(154, 'MM', 'Myanmar', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(155, 'NA', 'Namibia', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(156, 'NR', 'Nauru', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(157, 'NP', 'Nepal', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(158, 'NI', 'Nicaragua', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(159, 'NE', 'Níger', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(160, 'NG', 'Nigeria', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(161, 'NU', 'Niue', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(162, 'NF', 'Isla Norfolk', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(163, 'NO', 'Noruega', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(164, 'NC', 'Nueva Caledonia', '2019-08-11 09:08:20', '2019-08-11 09:08:20'),
(165, 'NZ', 'Nueva Zelanda', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(166, 'OM', 'Omán', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(167, 'NL', 'Países Bajos', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(168, 'PK', 'Pakistán', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(169, 'PW', 'Palau', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(170, 'PS', 'Palestina', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(171, 'PA', 'Panamá', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(172, 'PG', 'Papúa Nueva Guinea', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(173, 'PY', 'Paraguay', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(174, 'PE', 'Perú', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(175, 'PN', 'Islas Pitcairn', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(176, 'PF', 'Polinesia Francesa', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(177, 'PL', 'Polonia', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(178, 'PT', 'Portugal', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(179, 'PR', 'Puerto Rico', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(180, 'QA', 'Qatar', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(181, 'GB', 'Reino Unido', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(182, 'RE', 'Reunión', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(183, 'RW', 'Ruanda', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(184, 'RO', 'Rumania', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(185, 'RU', 'Rusia', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(186, 'EH', 'Sahara Occidental', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(187, 'SB', 'Islas Salomón', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(188, 'WS', 'Samoa', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(189, 'AS', 'Samoa Americana', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(190, 'KN', 'San Cristóbal y Nevis', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(191, 'SM', 'San Marino', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(192, 'PM', 'San Pedro y Miquelón', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(193, 'VC', 'San Vicente y las Granadinas', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(194, 'SH', 'Santa Helena', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(195, 'LC', 'Santa Lucía', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(196, 'ST', 'Santo Tomé y Príncipe', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(197, 'SN', 'Senegal', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(198, 'CS', 'Serbia y Montenegro', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(199, 'SC', 'Seychelles', '2019-08-11 09:08:21', '2019-08-11 09:08:21'),
(200, 'SL', 'Sierra Leona', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(201, 'SG', 'Singapur', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(202, 'SY', 'Siria', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(203, 'SO', 'Somalia', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(204, 'LK', 'Sri Lanka', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(205, 'SZ', 'Suazilandia', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(206, 'ZA', 'Sudáfrica', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(207, 'SD', 'Sudán', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(208, 'SE', 'Suecia', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(209, 'CH', 'Suiza', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(210, 'SR', 'Surinam', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(211, 'SJ', 'Svalbard y Jan Mayen', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(212, 'TH', 'Tailandia', '2019-08-11 09:08:22', '2019-08-11 09:08:22'),
(213, 'TW', 'Taiwán', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(214, 'TZ', 'Tanzania', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(215, 'TJ', 'Tayikistán', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(216, 'IO', 'Territorio Británico del Océano Índico', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(217, 'TF', 'Territorios Australes Franceses', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(218, 'TL', 'Timor Oriental', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(219, 'TG', 'Togo', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(220, 'TK', 'Tokelau', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(221, 'TO', 'Tonga', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(222, 'TT', 'Trinidad y Tobago', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(223, 'TN', 'Túnez', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(224, 'TC', 'Islas Turcas y Caicos', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(225, 'TM', 'Turkmenistán', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(226, 'TR', 'Turquía', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(227, 'TV', 'Tuvalu', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(228, 'UA', 'Ucrania', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(229, 'UG', 'Uganda', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(230, 'UY', 'Uruguay', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(231, 'UZ', 'Uzbekistán', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(232, 'VU', 'Vanuatu', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(233, 'VE', 'Venezuela', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(234, 'VN', 'Vietnam', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(235, 'VG', 'Islas Vírgenes Británicas', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(236, 'VI', 'Islas Vírgenes de los Estados Unidos', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(237, 'WF', 'Wallis y Futuna', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(238, 'YE', 'Yemen', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(239, 'DJ', 'Yibuti', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(240, 'ZM', 'Zambia', '2019-08-11 09:08:23', '2019-08-11 09:08:23'),
(241, 'ZW', 'Zimbabue', '2019-08-11 09:08:23', '2019-08-11 09:08:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_resets_table', 1),
(54, '2019_08_04_161010_create_permission_tables', 1),
(55, '2019_08_09_205443_add_referred_by_column_to_users_table', 1),
(56, '2019_08_10_201738_countries', 1),
(57, '2019_08_11_055617_add_token_table_user', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 8),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11),
(3, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 16),
(3, 'App\\User', 17),
(3, 'App\\User', 18),
(3, 'App\\User', 19),
(3, 'App\\User', 20),
(3, 'App\\User', 21),
(3, 'App\\User', 22),
(3, 'App\\User', 23),
(3, 'App\\User', 24),
(3, 'App\\User', 25),
(3, 'App\\User', 26),
(3, 'App\\User', 27),
(3, 'App\\User', 28),
(3, 'App\\User', 29),
(3, 'App\\User', 30),
(3, 'App\\User', 31),
(3, 'App\\User', 32),
(3, 'App\\User', 33),
(3, 'App\\User', 34),
(3, 'App\\User', 35),
(3, 'App\\User', 36),
(3, 'App\\User', 37),
(3, 'App\\User', 38),
(3, 'App\\User', 39),
(3, 'App\\User', 40),
(3, 'App\\User', 41),
(3, 'App\\User', 42),
(3, 'App\\User', 43),
(3, 'App\\User', 44),
(3, 'App\\User', 45),
(3, 'App\\User', 46),
(3, 'App\\User', 47),
(3, 'App\\User', 48),
(3, 'App\\User', 49),
(3, 'App\\User', 50),
(3, 'App\\User', 51),
(3, 'App\\User', 52),
(3, 'App\\User', 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(2, 'role-create', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(3, 'role-edit', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(4, 'role-delete', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(2, 'Operador', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(3, 'C', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(4, 'C+', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(5, 'B', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(6, 'B+', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(7, 'A', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(8, 'A+', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(9, 'D', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13'),
(10, 'D-', 'web', '2019-08-11 09:03:13', '2019-08-11 09:03:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_mrl` int(10) UNSIGNED DEFAULT NULL,
  `referred_by` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `token_mrl`, `referred_by`, `username`, `country`, `email_verified_at`, `password`, `activation_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1565808001.png', 'Heriberto Sosa', 'sosaheriberto2001@gmail.com', 30, NULL, 'Admin', 'Venezuela', NULL, '$2y$10$vxKIVvT3/2Z6RTsltZy50uRBXvQhihW4659RwOCLSxAzZVJh/g7UW', NULL, 1, NULL, NULL, '2019-08-14 22:40:02'),
(2, 'user.png', 'Santiago David Sosa', '2001David@gmail.com', 0, NULL, 'Santiago', '233', NULL, '$2y$10$dAWSIvlzeRmpjwKlmBYcx.sCnwxKpBjI3OCACEAr9A5BI..RIQJve', NULL, 1, NULL, '2019-08-11 09:10:55', '2019-08-13 05:57:44'),
(38, 'user.png', 'Odra Oropeza', 'odra.oropeza16@gmail.com', 10, 1, 'odorao', 'Venezuela', NULL, '$2y$10$Sx1RuC.kefC/75zO2GP0jei6pZYXKRxbxnnUVoi28Y7tSa98kX5t2', NULL, 1, NULL, '2019-08-15 00:36:31', '2019-08-15 00:36:42'),
(39, 'user.png', 'Pedro garcias', 'pedro@correo.com', 50, 38, 'pedrogarcias', 'Filipinas', NULL, '$2y$10$sk3QQudf9D/UXYeRGIg7Jukmu.FUciJhO.3rfNKkTHElK41nmc3.m', NULL, 1, NULL, '2019-08-15 00:41:00', '2019-08-15 00:41:12'),
(53, 'user.png', 'heri', 'sosaheriberto2001+test@gmail.com', 0, 39, 'sosaheri', 'Venezuela', NULL, '$2y$10$qSi0TdXVQBz8pkO8zZ4GMeEi1QR.H8ErpSGjk0BX/8MMOi5Yk4Vni', NULL, 1, NULL, '2019-08-15 02:55:45', '2019-08-15 02:55:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
