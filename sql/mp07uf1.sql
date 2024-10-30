-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Temps de generació: 28-10-2024 a les 20:07:36
=======
-- Temps de generació: 28-10-2024 a les 20:08:33
>>>>>>> 76e1bec8eee66eb1efeea48d7af00a7a6697f9d9
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
(2, 'El señor de los anillos: La comunidad del anillo', 'J.R.R. Tolkien', '9780618640157', 'Spa', 4),
(3, 'El hobbit', 'J.R.R. Tolkien', '9780345339683', 'Spa', 3),
(4, 'Juego de tronos', 'George R.R. Martin', '9780553573404', 'Spa', 5),
(5, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 4),
(6, 'Eragon', 'Christopher Paolini', '9780375826696', 'Spa', 5),
(7, 'El nombre del viento', 'Patrick Rothfuss', '9780756404741', 'Spa', 1),
(8, '1984', 'George Orwell', '9780451524935', 'Eng', 2),
(9, 'The Great Gatsby', 'F. Scott Fitzgerald', '9780743273565', 'Eng', 1),
(10, 'El principito', 'Antoine de Saint-Exupéry', '9788498381492', 'Spa', 1),
(11, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', '9780747532743', 'Spa', 3),
(12, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', '9780747532743', 'Spa', 5),
(13, 'El señor de los anillos: La comunidad del anillo', 'J.R.R. Tolkien', '9780618640157', 'Spa', 5),
(14, 'El hobbit', 'J.R.R. Tolkien', '9780345339683', 'Spa', 5),
(15, 'El hobbit', 'J.R.R. Tolkien', '9780345339683', 'Spa', 3),
(16, 'El hobbit', 'J.R.R. Tolkien', '9780345339683', 'Spa', 2),
(17, 'Juego de tronos', 'George R.R. Martin', '9780553573404', 'Spa', 4),
(18, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 2),
(19, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 5),
(20, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 1),
(21, 'La princesa prometida', 'William Goldman', '9780156035156', 'Spa', 3),
(22, 'Eragon', 'Christopher Paolini', '9780375826696', 'Spa', 3),
(23, 'El nombre del viento', 'Patrick Rothfuss', '9780756404741', 'Spa', 2),
(24, 'El nombre del viento', 'Patrick Rothfuss', '9780756404741', 'Spa', 1),
(25, '1984', 'George Orwell', '9780451524935', 'Eng', 3),
(26, '1984', 'George Orwell', '9780451524935', 'Eng', 2),
(27, '1984', 'George Orwell', '9780451524935', 'Eng', 4),
(28, 'The Great Gatsby', 'F. Scott Fitzgerald', '9780743273565', 'Eng', 2),
(29, 'El principito', 'Antoine de Saint-Exupéry', '9788498381492', 'Spa', 1),
(30, 'El principito', 'Antoine de Saint-Exupéry', '9788498381492', 'Spa', 2);

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
