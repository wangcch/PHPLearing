CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `username` varchar(30) NOT NULL COMMENT 'username',
  `password` varchar(32) NOT NULL COMMENT 'password',
  `email` varchar(30) NOT NULL COMMENT 'email',
  `token` varchar(50) NOT NULL COMMENT 'activation code',
  `token_exptime` int(10) NOT NULL COMMENT 'activation of the period of validity',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'state,0-inactive,1-activated',
  `regtime` int(10) NOT NULL COMMENT 'registration time'
) ENGINE=INNODB  DEFAULT CHARSET=utf8;