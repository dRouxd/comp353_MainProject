CREATE TABLE Person(
	personID INT NOT NULL,
    SSN_Passport VARCHAR(20) NOT NULL UNIQUE,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    DOB DATE NOT NULL,
    medicareCardNumber INT NOT NULL UNIQUE,
    mobileNumber VARCHAR(22)NOT NULL UNIQUE,
    email VARCHAR(40) UNIQUE,
    address VARCHAR(255) NOT NULL,
    postalCode VARCHAR(6) NOT NULL,
    citizenship VARCHAR(20) NOT NULL,
	age int(10),
    PRIMARY KEY(personID)
);

CREATE TABLE Vaccine(
    vaccineID INT NOT NULL,
    brand VARCHAR(50) NOT NULL,
    currentStatus varchar(10) default 'APPROVED',
    description varchar(255),
    PRIMARY KEY(vaccineID)
);

CREATE TABLE Age_Group (
    ageGroupNumber INT NOT NULL,
    lowerBound INT NOT NULL,
    upperBound INT NOT NULL,
    PRIMARY KEY(ageGroupNumber)
);

CREATE TABLE Province_Eligibility (
    province VARCHAR(50),
    ageGroupNumber INT DEFAULT 0,
    PRIMARY KEY(province),
    FOREIGN KEY (ageGroupNumber)
        REFERENCES Age_Group (ageGroupNumber)
);

CREATE TABLE Health_Worker(
    EID INT NOT NULL,
    PersonID INT NOT NULL,
    PRIMARY KEY(EID),
    FOREIGN KEY(PersonID) 
       REFERENCES Person(PersonID)
);

CREATE TABLE PostalCode_Info(
    postalCode VARCHAR(6) NOT NULL,
    city VARCHAR(255) NOT NULL,
    province VARCHAR(2),
    PRIMARY KEY(postalCode),
    FOREIGN KEY(postalCode)  REFERENCES Person(postalCode)
);

CREATE TABLE Infection(
    personID INT NOT NULL,
    infectionNumber INT NOT NULL,
    infectionDate DATE ,
    type VARCHAR(30) DEFAULT 'UNKNOWN',
    PRIMARY KEY(personID, infectionNumber),
    FOREIGN KEY(PersonID)  REFERENCES Person(PersonID)
);

CREATE TABLE Vaccine_Status_History(
    vaccineID INT NOT NULL,
    brand VARCHAR(50) NOT NULL,
    approvedDate DATE,
    endDate DATE,
    PRIMARY KEY(vaccineID, approvedDate),
    FOREIGN KEY(vaccineID)
        REFERENCES Vaccine(vaccineID)
);

CREATE TABLE Vaccination_Facility (
    facilityID INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL UNIQUE,
    province VARCHAR(50),
    website_url VARCHAR(255),
    type VARCHAR(25) DEFAULT 'Hospital',
    PRIMARY KEY(facilityID),
    FOREIGN KEY(province)
        REFERENCES Province_Eligibility(province)
);

CREATE TABLE Inventory (
    facilityID INT NOT NULL,
    vaccineID INT NOT NULL,
    availableDoses INT DEFAULT 0,
    PRIMARY KEY(facilityID, vaccineID),
    FOREIGN KEY(facilityID)
        REFERENCES Vaccination_Facility(facilityID),
    FOREIGN KEY(vaccineID)
        REFERENCES Vaccine(vaccineID)
);

CREATE TABLE Shipments(
    facilityID INT NOT NULL,
    vaccineID INT NOT NULL,
    receptionDate DATE,
    dosesReceived INT NOT NULL,
    PRIMARY KEY(facilityID, vaccineID, receptionDate),
    FOREIGN KEY (facilityID)
        REFERENCES Vaccination_Facility(facilityID),
    FOREIGN KEY (vaccineID)
        REFERENCES Vaccine(VaccineID)
);


CREATE TABLE History_Of_Employement(
    facilityID INT NOT NULL,
    EID INT NOT NULL,
    startDate DATE ,
    endDate DATE,
    PRIMARY KEY(facilityID, EID, startDate),
    FOREIGN KEY (facilityID)
        REFERENCES Vaccination_Facility(facilityID)
    FOREIGN KEY (EID)
        REFERENCES Health_Worker(EID)
);


CREATE TABLE Vaccination(
    vaccineID INT NOT NULL,
    personID INT NOT NULL,
    facilityID INT NOT NULL,
    EID INT NOT NULL,
    doseNumber INT DEFAULT 1,
    vaccinationDate DATE  ,
    PRIMARY KEY(personID, doseNumber),
    FOREIGN KEY (vaccineID)
        REFERENCES Vaccine(vaccineID),
    FOREIGN KEY (PersonID)
        REFERENCES Person(PersonID),
    FOREIGN KEY (facilityID)
        REFERENCES Vaccination_Facility(facilityID),
    FOREIGN KEY (EID)
        REFERENCES Health_Worker(EID)
);




