-- Struttura Tabella Merce
CREATE TABLE Merce (
	ID_Merce varchar(10) PRIMARY KEY
);

INSERT INTO Merce (ID_Merce) VALUES
('M001'),
('M002'),
('M003');

-- Struttura Tabella Navi
CREATE TABLE Navi (
	Bandiera varchar(20) PRIMARY KEY,
    Nome_Capitano char(20) DEFAULT NULL
);

INSERT INTO Navi (Bandiera, Nome_Capitano) VALUES
('ITA001', 'Mario Rossi'),
('USA001', 'Whitebeard'),
('CH001', 'Steve');

-- Struttura Tabella Porti
CREATE TABLE Porti (
	ID_Porti varchar(20) PRIMARY KEY,
    Porto_Partenza char(20) DEFAULT NULL,
    Porto_Arrivo char(20) DEFAULT NULL
);

INSERT INTO Porti (ID_Porti, Porto_Partenza, Porto_Arrivo) VALUES
('PT001', 'Genova', 'New York'),
('PT002', 'Torino', 'Cina'),
('PT003', 'Los Angeles', 'Singapore');

-- Struttura Tabella Viaggi
CREATE TABLE Viaggi (
	Sigla varchar(20) PRIMARY KEY,
    Data_Partenza date DEFAULT NULL,
    Data_Arrivo date DEFAULT NULL
);

INSERT INTO Viaggi (Sigla, Data_Partenza, Data_Arrivo) VALUES
('S001', '2025-01-01', '2025-01-31'),
('S002', '2025-02-01', '2025-02-31'),
('S003', '2025-03-01', '2025-03-31');

-- Struttura Tabella Polizze di carico
CREATE TABLE Polizze_Di_Carico (
	Codice_Alfanumerico varchar(20) PRIMARY KEY,
    Tipo_Merce char(20) DEFAULT NULL,
    Tipo_Colli char(20) DEFAULT NULL,
    Numero_Colli int(10) DEFAULT NULL,
    Peso_Totale int(10) DEFAULT NULL
);

INSERT INTO Polizze_Di_Carico (Codice_Alfanumerico, Tipo_Merce, Tipo_Colli, Numero_Colli, Peso_Totale) VALUES
('PZC001', 'Alimentare', 'Scatole', '50', '500'),
('PZC002', 'Elettronica', 'Container', '10', '3000'),
('PZC003', 'Abbigliamento', 'Pallet', '25', '1200');

-- Struttura Tabella Cliente
CREATE TABLE Cliente (
	ID_Cliente varchar(10) PRIMARY KEY
);

INSERT INTO Cliente (ID_Cliente) VALUES
('C001'),
('C002'),
('C003');

-- Struttura Tabella Fornitore
CREATE TABLE Fornitore (
	ID_Fornitore varchar(10) PRIMARY KEY
);

INSERT INTO Fornitore (ID_Fornitore) VALUES
('F001'),
('F002'),
('F003');

CREATE TABLE Trasporto ( -- Tabella di support Merce N:M Navi
	ID_Merce varchar(20),
    Bandiera varchar(20),
    FOREIGN KEY (ID_Merce) REFERENCES merce(ID_Merce),
    FOREIGN KEY (Bandiera) REFERENCES navi(Bandiera)
);
 
 INSERT INTO Trasporto (ID_Merce, Bandiera) VALUES 
('M001', 'ITA001'),
('M002', 'USA001'),
('M003', 'CH001');

CREATE TABLE Associazione ( -- Tabella di supporto Navi N:M Porti
	ID_Porti varchar(20),
    Bandiera varchar(20),
    FOREIGN KEY (ID_Porti) REFERENCES porti(ID_Porti),
    FOREIGN KEY (Bandiera) REFERENCES navi(Bandiera)
);

INSERT INTO Associazione (ID_Porti, Bandiera) VALUES
('PT001', 'ITA001'),
('PT002', 'USA001'),
('PT003', 'CH001');

CREATE TABLE Effetuazione ( -- Tabella di supporto Navi N:M Viaggi
	Sigla varchar(20),
    Bandiera varchar(20),
    FOREIGN KEY (Sigla) REFERENCES viaggi(Sigla),
    FOREIGN KEY (Bandiera) REFERENCES navi(Bandiera)
);

INSERT INTO Effetuazione (Sigla, Bandiera) VALUES
('S001', 'ITA001'),
('S002', 'USA001'),
('S003', 'CH001');

CREATE TABLE Ritiro ( -- Tabella di supporto Merce N:M Cliente
	ID_Cliente varchar(20),
    ID_Merce varchar(20),
    FOREIGN KEY (ID_Cliente) REFERENCES client(ID_Cliente),
    FOREIGN KEY (ID_Merce) REFERENCES merce(ID_Merce)
);

INSERT INTO Ritiro (ID_Cliente, ID_Merce) VALUES
('C001', 'M001'),
('C002', 'M002'),
('C003', 'M003');

CREATE TABLE Spedizione ( -- Tabella di supporto Merce N:M Fornitore
	ID_Fornitore varchar(20),
    ID_Merce varchar(20),
    FOREIGN KEY (ID_Fornitore) REFERENCES fornitore(ID_Fornitore),
    FOREIGN KEY (ID_Merce) REFERENCES merce(ID_Merce)
);

INSERT INTO Spedizione (ID_Fornitore, ID_Merce) VALUES
('F001', 'M001'),
('F002', 'M002'),
('F003', 'M003');