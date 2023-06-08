## DATATYPES

strings: char varchar text
numbers: int bigint float
date: date

## CONSTRAINT

### Add a new constraint

ALTER TABLE name ADD CONSTRAINT name defintion;
ex: ALTER TABLE cars ADD CONSTRAINT PRIMARY KEY(id);

NOT NULL:
ALTER TABLE name ALTER COLUMN column_name SET NOT NULL;
