<b>Yii basic template</b> (after customize)
- url rewite
- multi language
- sign up / sign in with database

<b>Database structure</b><br>
<code>
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `last_access` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
</code>
