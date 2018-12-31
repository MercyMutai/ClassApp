CREATE TABLE posts(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	slug VARCHAR(256) NOT NULL UNIQUE,
	title VARCHAR(256) NOT NULL UNIQUE,
	body TEXT,
	create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE posts ADD COLUMN user_id INT(2) NOT NULL DEFAULT 1 AFTER slug,
ADD FOREIGN KEY (user_id) REFERENCES users(id);

INSERT INTO posts(slug, user_id, title, body) VALUES ('YS_L!', 2, 'Seconding', 'I think this is a good idea and the beginning of change in Kisii Programming. I hope you shall keep up with that spirit of emphasizing on making learning easier. I would like to urge we computer scientist to give Azenga maximum cooperation for him to show us what he has in mind and how it is going to help us in becoming good programmers. Thank you and God bless ya all');
