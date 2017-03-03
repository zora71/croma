GRANT USAGE ON *.* TO 'root-vodin'@'localhost';
DROP USER 'root-vodin'@'localhost';
GRANT USAGE ON *.* TO 'user-vodin'@'localhost';
DROP USER 'user-vodin'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'root-vodin'@'localhost' IDENTIFIED BY PASSWORD '*0DCB7A80FA191DD36CDE9C613EB6BBE5F0A3E32E';
GRANT SELECT, INSERT, UPDATE, DELETE ON `vodin`.* TO 'root-vodin'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'user-vodin'@'localhost' IDENTIFIED BY PASSWORD '*6E4EFC867FBBC0A5E6B6505F021F9A5C9C43C360';
GRANT SELECT, INSERT, UPDATE, DELETE ON `vodin`.* TO 'user-vodin'@'localhost';
