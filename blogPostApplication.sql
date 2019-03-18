-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 06 2019 г., 13:07
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blogPostApplication`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Игры', '2018-01-17 17:57:25', '2018-01-17 17:57:25'),
(3, 'Программы', '2018-01-17 17:57:33', '2018-01-17 17:57:33'),
(4, 'Обзоры', '2018-01-17 17:57:43', '2018-01-17 17:57:43');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `is_active`, `body`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '1', 'Монополия про воров и убийц у нас нас уже есть в реальной жизни, к сожалению.', '2018-01-17 18:17:10', '2018-01-17 18:18:05'),
(3, 2, 4, '1', 'Ну если епл не нрав, так почему же должно нравится нам?)', '2018-01-17 18:17:28', '2018-01-17 18:18:05'),
(4, 3, 4, '1', 'Мур', '2018-01-17 18:23:08', '2018-01-17 18:23:36');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_31_200428_create_roles_table', 1),
(4, '2017_12_31_232422_create_photos_table', 1),
(5, '2018_01_02_155543_create_categories_table', 1),
(6, '2018_01_03_130525_create_posts_table', 1),
(7, '2018_01_11_134333_create_comments_table', 1),
(8, '2018_01_11_202548_create_replies_table', 1),
(9, '2018_01_12_212112_add_column_is_active_to_replies', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(2, '1516217468orc_crest_by_ropa_to.jpg', '2018-01-17 17:31:08', '2018-01-17 17:31:08'),
(3, '1516217526art-by---unknown-artist---world-of-warcraft-tattoos------04122015141648.jpg', '2018-01-17 17:32:06', '2018-01-17 17:32:06'),
(4, '1516219259Xey5G6QQ4MeFHTFEruQUiR2SdQu05fLFOgPm.jpg', '2018-01-17 18:00:59', '2018-01-17 18:00:59'),
(5, '1516219581orc_crest_by_ropa_to.jpg', '2018-01-17 18:06:21', '2018-01-17 18:06:21'),
(7, '1516219942warcraft_3_-_roc_019-2560x1600.jpg', '2018-01-17 18:12:22', '2018-01-17 18:12:22');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `photo_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 4, 'Инсайды #1181: Qualcomm Snapdragon 670, Huawei P20, Xiaomi Mi7, аккумулятор в Samsung Galaxy S9', '<p>В новом выпуске Инсайдов:&nbsp;Snapdragon 670 сравняется по производительности&nbsp;со Snapdragon 820; в Huawei P20 действительно будет установлен вытянутый дисплей; Xiaomi представит главную новинку на MWC 2018; аккумуляторы в Samsung Galaxy S9 и S9 Plus не станут больше.</p>\r\n\r\n<p>Для сравнения, ранее Snapdragon 660&nbsp;в&nbsp;Xiaomi Mi Note 3&nbsp;набрал 5 483 очка. В Snapdragon 670 установлено четыре ядра&nbsp;Kryo 360 и четыре ядра&nbsp;Kryo 385 с максимальной тактовой частотой 2 и 1,6 ГГц соответственно. Помимо графического ускорителя&nbsp;Adreno 620&nbsp;здесь присутствует LTE-модем&nbsp;Snapdragon X16 Cat, который развивает скорость загрузки данных до 1 Гбит/с. В Geekbench&nbsp;Snapdragon 670 набрал 1 863 очка в одноядерном и 5 256 очков в многоядерном тесте.</p>\r\n\r\n<h2>В Huawei P20 действительно будет установлен вытянутый дисплей</h2>\r\n\r\n<p>На прошлой неделе стало известно, что грядущий флагман Huawei P20 оснастят дисплеем с&nbsp;соотношением сторон 18,7:9. Это значит, что Huawei P20 станет чуть шире&nbsp;Samsung Galaxy S8, но у́же&nbsp;iPhone X. На днях тестирование&nbsp;HTML5Test с аналогичным результатом прошёл смартфон&nbsp;Huawei ANE-LX1.</p>\r\n\r\n<p>Новинка будет соперничать с флагманами Samsung&nbsp;Galaxy S9 и&nbsp;Galaxy S9 Plus, которые тоже покажут&nbsp;в Барселоне. Mi7 сосредоточится на возможностях искусственного интеллекта и машинного обучения.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Аккумуляторы в Samsung Galaxy S9 и S9 Plus не станут больше</h2>\r\n\r\n<p>Бразильский телекоммуникационный регулятор&nbsp;ANATEL опубликовал информацию о ёмкости аккумуляторов в грядущих флагманах Samsung Galaxy S9 и Galaxy S9 Plus. Утверждается, что внутри новинок будут установлены батареи на 3 000 и 3 500 мАч соответственно.</p>\r\n\r\n<p>Мобильная платформа Qualcomm Snapdragon 845 предполагает, что смартфоны смогут заряжаться по технологии&nbsp;Quick Charge 4+, то есть заряд аккумулятора восстановится на 50% за 15 минут нахождения у розетки. В аппаратах&nbsp;с процессорами Exynos 9810 упор будет сделан на бережном энергопотреблении, которое уменьшится на 15% по сравнению с прошлогодней моделью.</p>\r\n\r\n<p>Источник:&nbsp;<a href="http://4pda.ru/" target="_blank">4pda.ru</a></p>', '2018-01-17 18:00:59', '2018-01-17 18:00:59'),
(3, 2, 3, 5, 'Определён самый популярный мессенджер у россиян', '<p>Исследователи&nbsp;Института современных медиа провели опрос среди жителей России с целью выяснить, какими сервисами обмена сообщениями они пользуются. По результатам ответов более 100 000 пользователей был определён самый популярный у россиян мессенджер.<img alt="" src="http://s.4pda.to/Xey5SwUevJ18z0JqaKhqLU6tDi8rz0WGQNaC6W.jpg" style="height:300px; margin-left:200px; margin-right:200px; width:400px" /></p>\r\n\r\n<p>Согласно исследованию,&nbsp;WhatsApp является самым популярным мессенджером в России: им пользуется 71% опрошенных москвичей и 59% пользователей по всей стране. На втором месте расположился&nbsp;Viber с 37% пользователей среди жителей столицы и 36%&nbsp;&mdash; по России в целом. Замыкает тройку лидеров мессенджер&nbsp;&laquo;ВКонтакте&raquo; с 27% и 32% соответственно.&nbsp;</p>', '2018-01-17 18:06:21', '2018-01-17 18:06:21'),
(4, 2, 2, 7, 'Обзор Antihero — «Монополия» про воров и убийц', '<p>Мы живём в эпоху смешения форматов. Знаменитые игровые серии вроде DOOM или Gears of War обзаводятся настольными адаптациями. Хиты из другого лагеря, Settlers of Catan или Ticket to Ride, перебираются в цифру. Разработчики давно не ограничивают себя чем-то одним, а геймеры с одинаковой радостью и раскидывают &laquo;картон&raquo;, и тыкают пальцами в экраны планшетов. Ну а на границе двух миров и вовсе зародилось нечто новое &mdash; уникальные произведения, созданные по настольным канонам, но слишком сложные для воплощения в картоне и пластике. К таковым относится и Antihero.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Наступает ночь, просыпается мафия</h2>\r\n\r\n<p>Герой игры &mdash; обыкновенный вор. Броди он по тёмным улочкам в одиночестве, Antihero оказалась бы похожей на Thief, а мы, вероятно, не стали бы писать эту статью. К счастью, всё куда интереснее &mdash; здесь нужно руководить преступной гильдией, обстряпывающей делишки в закоулках и подворотнях викторианского городка. В любом районе амбициозного рыцаря кинжала и отмычки будут поджидать конкуренты разной степени наглости. И для борьбы с каждым потребуется изрядно попотеть. Хочешь жить &mdash; умей вертеться.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="http://s.4pda.to/Xey5M6SLSgEmHz0V61AdRbC6Msnw5ikvXJuKD.jpg" style="height:300px; width:400px" /></p>', '2018-01-17 18:11:33', '2018-01-17 18:12:22');

-- --------------------------------------------------------

--
-- Структура таблицы `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `user_id`, `body`, `created_at`, `updated_at`, `is_active`) VALUES
(2, 2, 1, 'то симулятор!', '2018-01-17 18:18:46', '2018-01-17 18:19:08', 1),
(3, 3, 1, 'мур', '2018-01-17 18:19:00', '2018-01-17 18:19:13', 1),
(4, 3, 3, 'мур мур мур', '2018-01-17 18:22:57', '2018-01-17 18:23:43', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Author', NULL, NULL),
(3, 'Subscriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `photo_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `photo_id`, `is_active`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'pasharudenko@ukr.net', 'pasharudenko@ukr.net', '$2y$10$zy4.zN8veqdm/t.A3Q/Ly.tGTlkse7zj7ORz1paPiFm/huBxwfYfa', '8n1jRcQAzkl7SJdSEWb430PiL7nHuuH5xIaHGvov3S3vRdgyhTPE1XbA8Kjg', '2018-01-17 16:29:33', '2018-01-17 16:29:33'),
(2, 2, 2, 1, 'Alexander', 'alex@ukr.net', '$2y$10$HW45TeweGIBrMiVQnV45luTTe/3YYVuxJyUfaEzF4MJIVlTpPjtN6', 'snAyTQvO5VBzbRBsvSSxGvMZjJRjEWQhd9X0CmFkRw1xfawlL8m6AYUF1gln', '2018-01-17 17:31:08', '2018-01-17 17:31:08'),
(3, 3, 3, 1, 'Alex', 'alex@ukr.net123', '$2y$10$VMp/gEL8WJdQc7gOAPnJU.1Krug2bmGt2GZR9rRK6sWBCTvw8NQ2u', '3xEe2OPMfauDckgi5ZZUxqEqBWWD7BK7MSMxHZX5uLcH9mAlbJR2YJd6UqDT', '2018-01-17 17:32:06', '2018-01-17 17:32:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`);

--
-- Индексы таблицы `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_comment_id_index` (`comment_id`),
  ADD KEY `replies_user_id_index` (`user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_photo_id_index` (`photo_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
