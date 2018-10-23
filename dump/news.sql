-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2018 г., 15:47
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) NOT NULL,
  `article_date` varchar(255) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_short_text` varchar(500) NOT NULL,
  `article_full_text` varchar(5000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `login_id` int(11) NOT NULL,
  `count_of_likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `rubric`, `article_date`, `article_title`, `article_short_text`, `article_full_text`, `image`, `login_id`, `count_of_likes`) VALUES
(1, 'russia', '10.02.2018 16:27', 'Новость', 'Lorem1 ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus', 'sq1hSxrvKlnMyGiuoEz5.jpg', 1, 0),
(2, 'economics', '11.02.2018 14:22', 'Новость по экономике', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus', 'jbpoP0qauEyu1ftfD7O2.jpg', 1, 0),
(3, 'economics', '11.02.2018 14:50', 'Новость по экономике', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur,', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus', 'nNCekiSnO1CgS1RBgcr4.jpg', 1, 2),
(4, 'culture', '11.02.2018 14:58', 'Новость по культуре', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus', 'Ig3acn8yOxcRgfQRlLgu.jpg', 1, 1),
(5, 'russia', '11.02.2018 17:07', 'Новость', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus', 'EupAnBWIgB2zd3SgkWMN.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `count_of_likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `login_id`, `article_id`, `count_of_likes`) VALUES
(1, 1, 3, 1),
(2, 2, 4, 1),
(3, 2, 5, 1),
(4, 2, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_10_082155_create_articles-table', 1),
(4, '2018_02_10_084323_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@mail.ru', '$2y$10$6eeZv6ALYE7seEyeJXRohO/AH8JeQMmyGxt/KI7Sm/uhb3J7HCFSy', 'fyMmxBu4GwPo1BkXJtR3WIFUmbDbew8GsSNGwKJHeICY26k7YZ8yh18NJQkF', '2018-02-10 02:04:37', '2018-02-10 02:04:37'),
(2, 'user2', 'user2@mail.ru', '$2y$10$IJzBqKLaLZ.ybeBLIZaha.QvELU7kXfvfMbAx3UdPq7BO7CMCYE/K', 'LbUKoQwDLevIcbP8ToQc2pnPhtXoVI9hRiJfsTRxG6QNZVvHI3Gmfo1skpHA', '2018-02-11 06:34:42', '2018-02-11 06:34:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
