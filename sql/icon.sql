CREATE TABLE icon (
    id INT PRIMARY KEY AUTO_INCREMENT,
    icon VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    colors VARCHAR(255) NOT NULL,
    link VARCHAR(255),
    connect VARCHAR(255),
    `show` VARCHAR(255) NOT NULL
);

INSERT INTO `icon` (`icon`, `type`, `colors`, `link`, `connect`, `show`)
VALUES
('Icon1', 'fab fa-twitter', 'white', 'true', 'true'),
('Icon2', 'fab fa-instagram', 'white', 'false', 'true'),
('Icon3', 'fa fa-home', 'white', 'true', 'false');
('Icon4', 'fab fa-youtube', 'white', 'true', 'false');
