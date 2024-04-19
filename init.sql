Drop Table if exists Competition;

CREATE TABLE Competition (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255)
);

INSERT INTO Competition (Name) VALUES ( "CompPro303" )
