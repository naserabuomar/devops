USE dictionary;

CREATE TABLE words (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL,
    definition TEXT NOT NULL
);

INSERT INTO words (word, definition) VALUES
('apple', 'A fruit that grows on trees.'),
('banana', 'A long yellow fruit.'),
('cat', 'A small domesticated carnivorous mammal.'),
('dog', 'A domesticated carnivorous mammal that typically has a long snout and an acute sense of smell.'),
('elephant', 'A large mammal with a long trunk and large ears, native to Africa and Asia.'),
('fish', 'A limbless cold-blooded vertebrate animal with gills and fins, living wholly in water.'),
('giraffe', 'A large African mammal with a very long neck and forelegs, having a coat patterned with brown patches separated by lighter lines.');