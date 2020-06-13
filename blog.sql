-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 05:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(36, 'Ciberseguridad'),
(1, 'Conspiración'),
(29, 'Pandemia'),
(32, 'Redes'),
(26, 'Tecnologia'),
(31, 'Videojuegos');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_text` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_timestamp`, `comment_text`, `user_id`, `new_id`) VALUES
(36, '2020-06-10 16:36:48', 'Wow!', 31, 93),
(37, '2020-06-10 16:37:30', 'Muy bueno', 31, 92),
(38, '2020-06-10 18:58:43', 'Apple puro marketing, guauf guauf', 37, 93),
(39, '2020-06-10 18:59:08', 'A mi se me cayó ese al agua y murió :c', 37, 90),
(40, '2020-06-10 19:00:31', 'Ojalá don cangrejo me pagara lo suficiente para comprarlo jajajaja', 38, 92),
(41, '2020-06-10 19:01:11', 'Doge Muñoz eres un hater! Viva apple ', 38, 93),
(42, '2020-06-10 19:01:26', 'Fiuuu necesito uno de esos!', 38, 91),
(43, '2020-06-10 19:02:15', 'Quedense en sus casitas', 39, 96),
(44, '2020-06-10 19:02:54', 'Haganle caso a laslo, saludos!', 1, 96),
(45, '2020-06-10 19:03:18', 'Yo tambien jajajaja', 1, 91),
(46, '2020-06-10 19:07:14', 'Yo tengo 5 de esos jijiij', 40, 92);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_fullname` varchar(120) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_text` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_fullname`, `contact_email`, `contact_text`) VALUES
(30, 'Patricio estrella', 'patoestrella@gmail.com', 'Hola muy lindo el blog'),
(34, 'Ricardo Muñoz', 'diefranrv@hotmail.com', 'Muy buen trabajo.');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_title` varchar(120) NOT NULL,
  `new_body` varchar(2048) DEFAULT NULL,
  `new_image` varchar(120) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `new_timestamp`, `new_title`, `new_body`, `new_image`, `state_id`, `category_id`, `author_id`) VALUES
(84, '2020-06-09 11:00:00', 'El CEO de Brave se disculpa por el ‘error’ con los códigos de afiliado', 'Quizás no te hayas enterado, pero este fin de semana el navegador web Brave, conocido por estar diseñado para proteger la privacidad de sus usuarios, fue el objeto de una polémica que llevó incluso a la incitación al boicot: el hallazgo por parte de un usuario de enlaces de afiliado al acceder a sitios de criptodivisas.\r\n\r\nEs decir, al ir navegando con Brave y entrar en dichos sitios, los enlaces se transformaban automáticamente en enlaces de afiliado, lo que suele suponer que quien redirige -en este caso, el navegador y la compañía detrás de este- recibirá beneficios económicos derivados de los posibles gastos que efectúe el usuario. Se trata de una táctica muy común en toda Internet, pero si ha sido motivo de queja en esta ocasión es debido a que no se realizaba de manera transparente, al menos informando al usuario previamente.', '/news-images/CAjSsJLT8RIpOyUqZnNQBKwbPXWxh9cF.png', 2, 26, 1),
(89, '2020-06-10 01:55:25', 'La RTX 3080 va a tener un precio muy alto, vemos por qué', 'Las GeForce RTX 30 han sido objeto de numerosas filtraciones, de hecho hace nada vimos la imagen de un supuesto prototipo de la RTX 3080. Al principio dicha imagen fue seriamente cuestionada, pero poco a poco ha ido ganando credibilidad hasta llegar a un punto en el que algunas fuentes se atreven a dar por hecho que ese será el nuevo diseño que tendrá el sistema de refrigeración del modelo de referencia.\r\n\r\nTodavía no hay nada oficial por parte de NVIDIA, así que debemos ser cautos, pero según VideoCardz la compañía habría iniciado una investigación contra los fabricantes  Foxconn y BYD (Build Your Dreams) para encontrar al culpable de la filtración. Sé lo que estáis pensando, ¿de verdad es ese el diseño que utilizará NVIDIA? No puedo responderos con un sí rotundo, pero sí que puedo deciros que es real y que ha sido, como mínimo, uno de los que está considerando el gigante verde, es decir, un candidato a diseño final.', '/news-images/SM65UPp9fEH8kjQvtzcOKmueBs0lVor7.jpg', 1, 26, 1),
(90, '2020-06-10 01:56:20', 'Motorola One Fusion+, un gama media que esconde la cámara y cuida la batería', 'NOTICIASMotorola One Fusion+, un gama media que esconde la cámara y cuida la bateríaPublicado el 9 junio, 2020 por Isidro Ros Motorola One Fusion+\r\nLa compañía de las alas ha estado bastante activa durante las últimas semanas, una tendencia que ha mantenido con el Motorola One Fusion+, un smartphone de gama media que comparte catálogo con los Moto G Fast y Motorola Moto G Pro, ya que todos ellos apuntan a la gama media.\r\n\r\nEl Motorola One Fusion+ se presenta con un diseño bastante interesante que, ciertamente, no es nada habitual en el sector de gama media. Si os fijáis en las imágenes os daréis cuenta de que los bordes de pantalla se han reducido de forma notable, y que la cámara frontal se ha integrado en el interior del smartphone para eliminar por completo cualquier muesca o isleta en la pantalla.\r\n\r\nComo sabrán la mayoría de nuestros lectores otros fabricantes integran la cámara en isletas circulares «flotantes», aunque algunos siguen recurriendo a la clásica muesca superior, ya sea en horizontal en el conocido como «gota de agua». Apple, y su iPhone 11, es uno de los mejores ejemplos.', '/news-images/IsDH4rSnj7iewfuVKMXE9kPUmBtL3gGA.jpg', 1, 1, 1),
(91, '2020-06-10 01:56:50', 'Samsung 870 QVO de 8 TB, un SSD «económico» y de alta capacidad con memoria QLC', 'El Samsung 870 QVO de 8 TB es un claro ejemplo del valor que ofrece la memoria QLC a la hora de reducir el coste por gigabyte en las unidades SSD de consumo general, un sector donde el grado de exigencia a nivel de fiabilidad, resistencia a ciclos de escritura y vida útil es menos marcado si hacemos una comparación directa con el sector profesional.\r\n\r\nAmazon ha listado el Samsung 870 QVO de 8 TB con un precio de 899,99 dólares, una cifra bastante buena, ya que se traduce en un coste aproximado de 11 centavos de dólar por gigabyte. Es cierto que todavía nos movemos en un nivel muy alejado de los discos duros tradicionales, ya que a día de hoy podemos encontrar unidades HDD de 8 TB a 7.200 RPM con un precio medio de entre 200 y 250 dólares (desde poco más de 200 euros en España), pero debemos recordar también que entre un HDD y un SSD hay un mundo de diferencia en términos de rendimiento, y también en lo que respecta a latencias y tiempos de acceso.', '/news-images/UrYz3IAoBktTXMswb9nSVgldN8KpLPac.jpg', 1, 26, 1),
(92, '2020-06-10 01:57:31', 'Chuwi AeroBook Pro: pequeño pero resultón', 'Siempre me ha llamado la atención el segmento de mercado de los portátiles económicos y, sin duda, el Chuwi AeroBook Pro es un ejemplo perfecto. Claro que, en realidad, podríamos afirmar lo mismo de todos los ordenadores portátiles de este fabricante. Y aún más, si estableceemos una comparación entre todos ellos, este modelo en particular se situaría entre las posiciones más elevadas de la tabla.\r\n\r\nSea como fuere, este fabricante chino acaba de anunciar la llegada, el próximo de 18 de junio, del Chuwi AeroBook Pro, un dispositivo que, como ya viene siendo habitual en este fabricante,será comercializado a través de su tienda oficial en Aliexpress. El precio a fecha de salida, salvo cambios de última hora, será de 499 dólares, unos 493 euros.', '/news-images/ePv0GJl8TzwjqxrQ53bAsdpIyhVSLUDR.jpg', 1, 26, 1),
(93, '2020-06-10 01:57:54', 'Apple abandonará Intel y anunciará sus propios procesadores ARM en la WWDC20', 'No es ningún secreto que Apple lleva mucho tiempo preparando sus primeros Mac con procesadores de diseño propio y arquitectura ARM. Hace unas horas, la prestigiosa Bloomberg ha filtrado que harán en gran anuncio durante la conferencia de desarrolladores, dentro de un par de semanas.\r\n\r\nLa información proporcionada por la fuente habla únicamente de «anuncio» así que es probable que Apple enseñe su roadmap junto con el plan de transición y, de paso, de tiempo suficiente al ecosistema de desarrolladores para preparar el software. Cómo ocurrió hace años con el salto de PowerPC a Intel, será necesario un tiempo donde puedan convivir las dos plataformas. Sería toda una sorpresa ver hardware con ARM tan pronto y, como sabemos, no es habitual que Apple tire de prototipos o producto no final.', '/news-images/6R1akrIL8TjZipPSqgUsh5Q7e3YXmKWB.jpg', 1, 26, 1),
(94, '2020-06-10 10:31:00', 'Microsoft amplía el despliegue de Windows 10 2004', 'El despliegue de Windows 10 2004 se está produciendo de una manera gradual y no llegará (de manera oficial) a todos los usuarios en semanas o meses desde el lanzamiento. Microsoft ha dejado a un lado la estrategia agresiva de actualizaciones anteriores y ahora los lanzamientos se producen de forma progresiva. Los motivos del cambio son conocidos: intentar limitar los errores del sistema.\r\n\r\nLa compañía ha actualizado la página del estado de lanzamiento del sistema añadiendo una novedad, la posibilidad de instalar el sistema desde Windows Update. Pero todavía no automáticamente, sino para usuarios de las versiones 1903 y 1909, que busquen activamente utilizando la opción «Buscar actualizaciones».', '/news-images/oLQdr2jCmbfVzv1xgGuJH4FPZ8kDXayq.jpg', 3, 1, 1),
(96, '2020-06-10 13:42:00', 'Transporte público y coronavirus: Google Maps te informará al respecto', 'Durante toda la pandemia, y especialmente desde el principio del fin del confinamiento y la entrada en las fases de desescalada, se han disparado las dudas en relación entre transporte público y coronavirus. ¿Qué servicios están disponibles? ¿Qué ocurre con los servicios de transporte entre provincias? ¿Y entre comunidades? ¿Hay espacios de transporte público que estén temporalmente cerrados a consecuencia de la pandemia? ¿Y si en mi provincia hay zonas en fases distintas? ¿Y con el coche? Es complicado, bastante complicado.\r\n\r\nCon el fin de facilitar las cosas, Google Maps va a empezar a mostrar información sobre avisos y alertas relacionados con los desplazamientos. La primera fase del despliegue de estas funciones, según informa hoy TechCrunch llegará, se supone que de manera inminente, a Argentina, Australia, Bélgica, Brasil, Colombia, Francia, India, México, Países Bajos, España, Tailandia, Reino Unido y EE.UU. La elección de los países se debe a que la empresa del buscador ya dispone de los canales de comunicación adecuados con las autoridades que recopilan y facilitan dicha información.\r\n\r\nAl ver las funciones incorporadas en los mapas que relacionan transporte público y coronavirus, podemos ver los diferentes modos de proceder que se han establecido en distintos países. Así, por ejemplo, la app podrá informar sobre obligatoriedad o no de llevar mascarilla en determinados espacios, dónde se han ubicado puntos de control para realizar chequeos a los ciudadanos, o información relacionada con los desplazamientos que tengan, como destino, centros de salud y hospitales.', '/news-images/Q4IqklXWzTV3BfioOsP5DmeKNrHAFSxZ.jpg', 1, 29, 1),
(105, '2020-06-13 03:49:27', 'Nuestros lectores hablan: el diseño de PS5 ya es definitivo, ¿te ha gustado?', 'Ayer descubrimos, por fin, el diseño de PS5, la consola de nueva generación Sony, y lo cierto es que, como suele ocurrir siempre con estas cosas, surgieron opiniones enfrentadas. Curiosamente la mayoría de esas opiniones se sitúan en dos extremos, es decir, o te gusta o la odias, solo una minoría se decantó una valoración intermedia.\r\n\r\nYa lo hemos comentado en otras ocasiones, pero es un buen momento para volver a profundizar sobre ello. El diseño de PS5 era una cuestión muy complicada por tres grandes razones:\r\n\r\nEstética: Sony no quería seguir los pasos de Microsoft con Xbox Series X, es decir, buscaba alejar el diseño de PS5 del estilo tipo chasis de PC compacto que utilizó el gigante de Redmond. Esto suponía un desafío importante por las dos razones que vamos a ver a continuación.\r\nDistribución de componentes: para integrar todos los componentes de la consola necesitas un chasis con un diseño eficiente, y esto puede complicar mucho el diseño final del mismo.\r\nCalor y refrigeración: es un tema fundamental. Estoy seguro de que muchos recordaréis los problemas que han tenido diferentes generaciones de consolas con el exceso de calor, y PS4 no fue una excepción. El chasis debe ser estético, permitir una buena distribución de componentes y dejar espacio para crear un buen flujo de aire y para conseguir una buena refrigeración del sistema.\r\nCumplir esos tres objetivos era muy difícil, pero en teoría Sony lo ha conseguido, y lo ha hecho con un diseño verdaderamente sorprendente. La compañía japonesa no ha explicado todavía al detalle el sistema de refrigeración de PS5, pero por lo que he podido ver en las primeras imágenes tenemos unas entradas de aire enormes el frontal que deberían facilitar un buen flujo de aire. Sin ver la parte trasera no puedo deciros nada más, por desgracia.', '/news-images/QmVKZnxo7jJCG98UWIi13NRzAPtglLbM.jpg', 1, 31, 1),
(106, '2020-06-13 03:51:33', 'Microsoft Releases June 2020 Security Patches For 129 Vulnerabilities', 'Como acostumbra a hacer el segundo martes de cada mes, Microsoft ha lanzado el clásico &#34;Patch Tuesday&#34;, su actualización acumulativa de seguridad para Windows 10 (aunque también llega a otros sistemas operativos anteriores, incluido Windows 7 con soporte añadido).\r\n\r\nLo que cambia esta vez es que Microsoft ha parcheado 129 vulnerabilidades, teniendo 11 de ellas la categoría de críticas. Estos números conforman lo que ya es el mayor actualización de seguridad de Microsoft en un solo mes. Recientemente, eso sí, ha habido actualizaciones con más vulnerabilidades críticas, como el de mayo, que llegó con 16 de estas. En marzo, por ejemplo, fueron 26.\r\n\r\nEs relevante señalar que Microsoft lleva cuatro meses consecutivos solucionando más de 110 vulnerabilidades.', '/news-images/3mVMQu0ZLfhF2sIDczGSx9TUnJYBlWKo.jpg', 1, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_states`
--

CREATE TABLE `news_states` (
  `state_id` int(11) NOT NULL,
  `state_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_states`
--

INSERT INTO `news_states` (`state_id`, `state_type`) VALUES
(1, 'public'),
(2, 'private'),
(3, 'not_public');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `ip_address` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating_value`, `new_id`, `ip_address`) VALUES
(15, 5, 93, '192.168.231'),
(18, 2, 93, '192.168.234'),
(20, 1, 93, '192.168.233'),
(22, 1, 84, '192.168.3.1'),
(23, 5, 84, '192.168.4.1'),
(24, 5, 84, '192.168.5.1'),
(25, 1, 84, '192.168.6.1'),
(26, 3, 84, '192.168.7.1'),
(27, 1, 90, '192.168.3.1'),
(28, 5, 90, '192.168.4.1'),
(29, 5, 90, '192.168.5.1'),
(30, 1, 90, '192.168.6.1'),
(31, 3, 90, '192.168.7.1'),
(32, 1, 89, '190.42.31.1'),
(33, 3, 89, '190.42.31.1'),
(34, 2, 89, '190.42.31.1'),
(35, 3, 89, '190.42.41.2'),
(36, 1, 91, '190.42.31.1'),
(37, 3, 91, '190.42.31.1'),
(38, 2, 91, '190.42.31.1'),
(39, 3, 91, '190.42.41.2'),
(40, 1, 92, '190.42.31.1'),
(41, 3, 92, '190.42.31.1'),
(42, 2, 92, '190.42.31.1'),
(43, 3, 92, '190.42.41.2'),
(44, 1, 93, '190.42.31.1'),
(45, 3, 93, '190.42.31.1'),
(46, 2, 93, '190.42.31.1'),
(47, 3, 93, '190.42.41.2'),
(56, 5, 96, '192.168.0.5'),
(57, 5, 96, '192.168.0.8'),
(58, 5, 106, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(120) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(126) DEFAULT NULL,
  `user_image` varchar(120) DEFAULT NULL,
  `user_description` varchar(2048) DEFAULT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_image`, `user_description`, `user_timestamp`, `role_id`) VALUES
(1, 'Thomas A. Anderson', 'neo@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '/profiles-images/426011af65ccbd525d5c741d0cbf4296.jpg', 'Este blog fue creado con la finalidad de publicar noticias actuales respecto a la informatica y el desarrollo de la tecnología, además de generar comentarios y debatir ideas entre los usuarios de esta comunidad, con el objetivo de compartir el conocimiento entre los usuarios y ayudar a nuestra comunidad a mejorar como profesionales dentro del mundo de la programación.\r\n\r\nUn punto fuerte de nuestra pagina, es la calificacion de las noticias, en donde en la barra del usuario podran ver las 5 mejores calificadas con sus links respectivos.\r\n\r\nOtro punto fuerte es que tiene una buena division de las categorias, las cuales te ayudaran a navegar a traves de la pagina de una buena forma.', '2020-05-20 05:33:02', 1),
(31, 'Duckman', 'duckman@gmail.com', '820466a89565d6288970a0a2d763c223', '/profiles-images/59ec6500d3933f3d32072b5992afcb68.jpg', 'Hola, soy un pato!', '2020-06-10 10:33:07', 2),
(37, 'Doge Muñoz', 'diego@gmail.com', '126cfbcd4d16ae6d25c9bfcae76d8ee4', '/profiles-images/a9c033f9b68a989437c64ca2bd228c5e.jpg', 'Omae wa mou shindeiru!', '2020-06-10 18:49:04', 2),
(38, 'Patricio Estrella', 'patricioestrella@gmail.com', '126cfbcd4d16ae6d25c9bfcae76d8ee4', '/profiles-images/f472fc19dcec51778358057e309abadb.jpg', 'Es decir que se han apoderado de lo que queríamos creer y nos hacen creer que creíamos que los pensamientos que hemos tenido son pensamientos que creemos que creíamos...', '2020-06-10 18:53:57', 2),
(39, 'Laslo Gutierrez', 'lazlo666@gmail.ccom', '126cfbcd4d16ae6d25c9bfcae76d8ee4', '/profiles-images/05702420689560dd31b6d143352e81fb.jpg', 'Wena los cabros soy el laslo :3', '2020-06-10 18:56:30', 2),
(40, 'Ankordururu', 'ankordururu@gmail.com', '126cfbcd4d16ae6d25c9bfcae76d8ee4', '/profiles-images/96a69b686d84440d9e13500307050ea1.jpg', 'Soy un michi michi miau miau', '2020-06-10 19:06:25', 2),
(41, 'Ricardo Muñoz', 'diefranrv@hotmail.com', 'f68fc7582ece5493c5986d6a91a63755', '/profiles-images/19b0c65fcf99250f7dd0c5393c67e139.jpeg', 'Holaaa', '2020-06-11 14:22:45', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_new` (`new_id`),
  ADD KEY `FK_user` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `FK_category` (`category_id`),
  ADD KEY `FK_author` (`author_id`),
  ADD KEY `new_state` (`state_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `news_states`
--
ALTER TABLE `news_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `ratings_ibfk_1` (`new_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `news_states`
--
ALTER TABLE `news_states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_new_id` FOREIGN KEY (`new_id`) REFERENCES `news` (`new_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `news_states` (`state_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`new_id`) REFERENCES `news` (`new_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
