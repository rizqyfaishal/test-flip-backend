CREATE TABLE IF NOT EXISTS disbursements  (
	id INTEGER PRIMARY KEY,
	amount INTEGER,
	status VARCHAR(50),
	timestamp DATETIME,
	bank_code VARCHAR(50),
	account_number VARCHAR(15),
	beneficiary_name VARCHAR(50),
	remark VARCHAR(255),
	receipt VARCHAR(255),
	time_served DATETIME,
	fee DOUBLE
);
