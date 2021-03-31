-- Create a posts table

CREATE TABLE posts (
    post_id int NOT NULL AUTO_INCREMENT,
    title varchar(50),
    author_name varchar(50),
    content varchar(2000),
    PRIMARY KEY (post_id)
);



-- Create a comments table

CREATE TABLE comments (
    comment_id int NOT NULL AUTO_INCREMENT,
    commenter_name varchar(50),
    content varchar(1000),
    post_id int NOT NULL,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (post_id) REFERENCES posts(post_id)
);



-- Create a replies table

CREATE TABLE replies (
    reply_id int NOT NULL AUTO_INCREMENT,
    replier_name varchar(50),
    content varchar(1000),
    comment_id int NOT NULL,
    PRIMARY KEY (reply_id),
    FOREIGN KEY (comment_id) REFERENCES comments(comment_id)
);



-- Default posts to pull from DB

INSERT INTO posts (post_id, title, author_name, content) VALUES
(1, 'My First Post!', 'Ryan Megli', 'This is my very first blog post. I hope you all enjoy!'),
(2, 'What is your favorite book?', 'Ryan Megli', 'Tell me what your favorite book is. How did you hear about it? When did you first read it? What is the genre?'),
(3, 'What is your favorite season?', 'Ryan Megli', 'My favorite season is Summer, it is so warm and there are many fun activities to do outside. What is your favorite season and why?'),
(4, 'Do you have any hidden talents?', 'Ryan Megli', 'I like to learn about what other people like to do and their hiddent talents. I am double jointed in both elbows, and can solve most rubiks cubes. What talents do you have?');



-- Default comments to pull from DB

INSERT INTO comments (comment_id, commenter_name, content, post_id) VALUES
(1, 'Ryan Megli', 'My favorite book is Fablehaven. I was given it as a gift for my 12th birthday. I read it in a couple of days and could not wait for the rest of the series to come out!', 2),
(2, 'Joe Bob', 'I enjoy Winter the most. I am able to go to the mountains and ski and snowboard. Plus Christmas is then as well!', 3),
(3, 'Jane Doe', 'I can ride a unicycle while juggling and playing the harmonica.', 4);



-- Default replies to pull from DB

INSERT INTO replies (reply_id, replier_name, content, comment_id) VALUES
(1, 'Ryan Megli', 'That is an interesting talent! I am not able to do any one of those ' , 3),
(2, 'Jane Doe', 'I also love snowboarding and skiing! I wish I could go right now!', 2);