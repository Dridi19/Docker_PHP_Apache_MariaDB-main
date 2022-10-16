CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(20),
    password VARCHAR(20) NULL,
    CONSTRAINT pk_id PRIMARY KEY (id)
    )
    ENGINE=InnoDB ;

CREATE TABLE posts (
    title VARCHAR(20),
    content VARCHAR(20),
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT,
    CONSTRAINT pk_id PRIMARY KEY (id)
    )
    ENGINE=InnoDB ;
ALTER TABLE posts
ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(`id`);