-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1

-- Temps de generació: 23-10-2024 a les 17:23:30
-- Versió del servidor: 10.4.32-MariaDB
-- Versió de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `mp07uf1`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `language` varchar(3) NOT NULL,
  `id_library` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `isbn`, `language`, `id_library`) VALUES
(1, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', '9780747532743', 'Spa', 3),
(2, 'El señor de los anillos: La comunidad del anillo', 'J.R.R. Tolkien', '9780618640157', 'Spa', 1),
(3, 'El hobbit', 'J.R.R. Tolkien', '9780345339683', 'Spa', 2),
(4, 'Crónicas de Narnia: El león, la bruja y el armario', 'C.S. Lewis', '9780064471046', 'Spa', 3),
(5, 'Juego de tronos', 'George R.R. Martin', '9780553573404', 'Spa', 2),
(6, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 1),
(7, 'Eragon', 'Christopher Paolini', '9780375826696', 'Spa', 5),
(8, 'El nombre del viento', 'Patrick Rothfuss', '9780756404741', 'Spa', 4),
(9, 'La rueda del tiempo: El ojo del mundo', 'Robert Jordan', '9780812511819', 'Spa', 5),
(10, 'Las crónicas de Dragonlance', 'Margaret Weis, Tracy Hickman', '9780786926817', 'Spa', 2),
(11, 'Harry Potter y el cáliz de fuego', 'J.K. Rowling', '9780439139601', 'Spa', 3),
(12, 'La espada de Shannara', 'Terry Brooks', '9780345314253', 'Spa', 2),
(13, 'El último deseo (Saga de Geralt de Rivia)', 'Andrzej Sapkowski', '9780316029186', 'Spa', 4),
(14, 'Elantris', 'Brandon Sanderson', '9780765311771', 'Spa', 2),
(15, 'La tierra larga', 'Terry Pratchett, Stephen Baxter', '9780062067753', 'Spa', 5),
(16, 'Cien años de soledad', 'Gabriel García Márquez', '9780060883287', 'Spa', 2),
(17, 'Don Quijote de la Mancha', 'Miguel de Cervantes', '9788491050098', 'Spa', 2),
(18, 'Mil novecientos ochenta y cuatro', 'George Orwell', '9780451524935', 'Eng', 1),
(19, 'Matar a un ruiseñor', 'Harper Lee', '9780060935467', 'Spa', 4),
(20, 'El amor en los tiempos del cólera', 'Gabriel García Márquez', '9780307389732', 'Spa', 3),
(21, 'La sombra del viento', 'Carlos Ruiz Zafón', '9788408172177', 'Spa', 2),
(22, 'The Great Gatsby', 'F. Scott Fitzgerald', '9780743273565', 'Eng', 3),
(23, 'Orgullo y prejuicio', 'Jane Austen', '9788491050104', 'Spa', 2),
(24, 'Fahrenheit 451', 'Ray Bradbury', '9781451673319', 'Eng', 5),
(25, 'El principito', 'Antoine de Saint-Exupéry', '9788498381492', 'Spa', 2),
(26, 'Hamlet', 'William Shakespeare', '9780140714548', 'Eng', 4),
(27, 'Crimen y castigo', 'Fiódor Dostoyevski', '9780140449136', 'Spa', 2),
(28, 'El extranjero', 'Albert Camus', '9788437604947', 'Spa', 1),
(29, 'Brave New World', 'Aldous Huxley', '9780060850524', 'Eng', 1),
(30, 'La metamorfosis', 'Franz Kafka', '9780805210576', 'Spa', 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `library`
--

INSERT INTO `library` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Biblioteca Central de Barcelona', 'Carrer de Mallorca, 45, 08029 Barcelona', '934123456'),
(2, 'Biblioteca Pública de Madrid', 'Calle Alcalá, 100, 28009 Madrid', '912345678'),
(3, 'Biblioteca Municipal de Sevilla', 'Avenida de la Constitución, 21, 41001 Sevilla', '955987654'),
(4, 'Biblioteca Valenciana', 'Plaza del Ayuntamiento, 5, 46002 Valencia', '963456789'),
(5, 'Biblioteca de Rubí', 'Carrer de la Llana, 15, 08191 Rubí', '937654321');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book-library` (`id_library`);

--
-- Índexs per a la taula `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la taula `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book-library` FOREIGN KEY (`id_library`) REFERENCES `library` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
