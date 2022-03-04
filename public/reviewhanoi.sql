INSERT INTO roles (`id`,`name`) 
VALUES 
(1,'admin'),
(2,'user');
INSERT INTO users (`id`,`name`,`dob`,`address`,`email`,`gender`,`password`,`avatar`,`role_id`) 
VALUES
(1,'','','','admin@gmail.com','','$2y$10$mWW5xVe4AsRiPnQyiT8PyOmFpSIw4MvIHjflv.Po6RHVzyj4z.Hc2','',1),
(2,'','','','user@gmail.com','','$2y$10$.zCw1RO2Kbz7TD1K8KTNsuJj3ct6uvkFu3I8BLufUF5CJBgUKn69.','',2)
