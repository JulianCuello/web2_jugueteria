<?php
abstract class model
{

    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    }

    private function _deploy(){
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
            -- phpMyAdmin SQL Dump
            -- version 5.2.1
            -- https://www.phpmyadmin.net/
            --
            -- Servidor: 127.0.0.1
            -- Tiempo de generación: 16-10-2023 a las 22:35:44
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
            -- Base de datos: `pelicula`
            --
            
            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla `actor`
            --
            
            CREATE TABLE `actor` (
              `id_actor` int(45) NOT NULL,
              `actor` varchar(45) NOT NULL,
              `material` varchar(45) NOT NULL,
              `origen` varchar(45) NOT NULL,
              `motor` varchar(45) NOT NULL,
              `imagenactor` varchar(60) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla `actor`
            --
            
            INSERT INTO `actor` (`id_actor`, `actor`, `material`, `origen`, `motor`, `imagenactor`) VALUES
            (1, 'motor', 'aluminio', 'Italia', 'diesel', 'img/motor.jpg'),
            (2, 'Interior', 'plastico', 'China', 'no aplica', 'img/interior.jpg'),
            (3, 'carroceria', 'chapa', 'Taiwan', 'no aplica', 'img/carroceria.jpg'),
            (4, 'suspension', 'metal', 'China', 'nafta-diesel', 'img/suspension.jpg'),
            (5, 'frenos', 'asbesto', 'China', 'nafta-diesel', 'img/frenos.jpg'),
            (6, 'refrigeracion', 'aluminio', 'China', 'nafta', 'img/refrigeracion.png');
            
            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla `pelicula`
            --
            
            CREATE TABLE `pelicula` (
              `id_pelicula` int(45) NOT NULL,
              `idCodigoProducto` int(45) NOT NULL,
              `nombreProducto` varchar(45) NOT NULL,
              `precio` int(45) NOT NULL,
              `marca` varchar(45) NOT NULL,
              `img` varchar(60) NOT NULL,
              `id_actor` int(45) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla `pelicula`
            --
            
            INSERT INTO `pelicula` (`id_pelicula`, `idCodigoProducto`, `nombreProducto`, `precio`, `marca`, `img`, `id_actor`) VALUES
            (1, 7087808, 'Filtro', 3700, 'Fiat', 'img/filtro.jpg', 1),
            (57, 552212, 'Panel puerta izquierda', 23000, 'Renault', 'img/panelpuerta.jpg', 2),
            (58, 55771100, 'parabrisas', 54000, 'Fiat', 'img/parabrisas.jpg', 3),
            (59, 958710, 'Amortiguador', 33000, 'Citroen', 'img/amortiguador.jpg', 4),
            (60, 5681222, 'disco freno', 55100, 'Fiat', 'img/frenos.jpg', 5),
            (61, 88510303, 'radiador agua', 80000, 'Renault', 'img/refrigeracion.png', 1),
            (62, 55001321, 'optica delantera', 230000, 'Mercedes', 'img/optica.jpg', 3),
            (64, 5540321, 'filtro', 2500, 'Peugeot', 'img/filtro.jpg', 1);
            
            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla `usuarios`
            --
            
            CREATE TABLE `usuarios` (
              `id` int(45) NOT NULL,
              `email` varchar(50) NOT NULL,
              `password` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla `usuarios`
            --
            
            INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
            (1, 'webadmin@gmail.com', '$2y$10\$VREXc/mCCVwmfcEY5HtAneei9ak2RLmhciQTj.0U4K2BJ9ALR2PqK');
            
            --
            -- Índices para tablas volcadas
            --
            
            --
            -- Indices de la tabla `actor`
            --
            ALTER TABLE `actor`
              ADD PRIMARY KEY (`id_actor`);
            
            --
            -- Indices de la tabla `pelicula`
            --
            ALTER TABLE `pelicula`
              ADD PRIMARY KEY (`id_pelicula`),
              ADD KEY `id_actor` (`id_actor`);
            
            --
            -- Indices de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
              ADD PRIMARY KEY (`id`);
            
            --
            -- AUTO_INCREMENT de las tablas volcadas
            --
            
            --
            -- AUTO_INCREMENT de la tabla `actor`
            --
            ALTER TABLE `actor`
              MODIFY `id_actor` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
            
            --
            -- AUTO_INCREMENT de la tabla `pelicula`
            --
            ALTER TABLE `pelicula`
              MODIFY `id_pelicula` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
            
            --
            -- AUTO_INCREMENT de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
              MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
            
            --
            -- Restricciones para tablas volcadas
            --
            
            --
            -- Filtros para la tabla `pelicula`
            --
            ALTER TABLE `pelicula`
              ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`) ON UPDATE CASCADE;
            COMMIT;
            
            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
            END;
            $this->db->query($sql);
        }
    }
}
