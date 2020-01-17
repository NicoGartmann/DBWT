DESCRIBE Mahlzeiten;

DESCRIBE Kategorien;

DESCRIBE Bilder;

DESCRIBE `hat_bilder`;

SELECT * FROM Mahlzeiten;

SELECT * FROM Kategorien;

DESCRIBE Zutaten;


SELECT Zutaten.Name 
FROM Mahlzeiten 
left JOIN `enthält_zutaten` ON `enthält_zutaten`.MID = Mahlzeiten.ID
left JOIN Zutaten ON Zutaten.ID = `enthält_zutaten`.ZID = Zutaten.ID 
WHERE Mahlzeiten.ID = 1;

SELECT * FROM `enthält_zutaten`
WHERE MID = 1;

SELECT Zutaten.Name
FROM Mahlzeiten
left JOIN `enthält_zutaten` ON `enthält_zutaten`.MID = Mahlzeiten.ID
left JOIN Zutaten ON Zutaten.ID = `enthält_zutaten`.ZID = Zutaten.ID
WHERE Mahlzeiten.ID = 1;

SELECT Zutaten.Name 
                         FROM Mahlzeiten
                         JOIN `enthält_zutaten` ON `enthält_zutaten`.MID = Mahlzeiten.ID
                         JOIN Zutaten ON Zutaten.ID = `enthält_zutaten`.ZID WHERE Mahlzeiten.ID = 1;
                         
                         

DESCRIBE Kommentare;

ALTER TABLE Kommentare 
MODIFY COLUMN Bewertung INT;

SELECT * FROM Kommentare;  

DELETE FROM Kommentare;

SELECT Benutzer.Nutzername FROM Benutzer 
JOIN Studenten ON StudID = Benutzer.Nummer