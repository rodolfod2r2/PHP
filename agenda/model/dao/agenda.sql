-- DATABASE agenda;

CREATE TABLE contato (
  id       INT(11),
  nome     VARCHAR(150),
  telefone VARCHAR(15),
  email    VARCHAR(150)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE contato
  ADD PRIMARY KEY (id);

ALTER TABLE contato
  MODIFY id INT(11) NOT NULL AUTO_INCREMENT,
  MODIFY nome VARCHAR(150) NOT NULL,
  MODIFY telefone VARCHAR(15) NOT NULL,
  MODIFY email VARCHAR(150) NOT NULL;

INSERT INTO contato (id, nome, telefone, email)
VALUES (NULL, 'Rodolfo Gonçalves', '(83) 98876-1253', 'rodolfod2r2@gmail.com');