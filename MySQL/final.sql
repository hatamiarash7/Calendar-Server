USE zimiair_cl;

DROP TABLE IF EXISTS cl_events;

CREATE TABLE IF NOT EXISTS cl_events (
  id         INT(11)      NOT NULL             AUTO_INCREMENT,
  unique_id  VARCHAR(100) NOT NULL PRIMARY KEY,
  year       INT(4)       NOT NULL             DEFAULT -1,
  month      INT(2)       NOT NULL,
  day        INT(2)       NOT NULL,
  type       VARCHAR(50)  NOT NULL             DEFAULT 'NULL',
  title      TEXT,
  holiday    BOOLEAN      NOT NULL             DEFAULT FALSE,
  created_at VARCHAR(100) NOT NULL,
  updated_at VARCHAR(100) NULL,
  UNIQUE KEY unique_id (unique_id),
  UNIQUE KEY id (id)
)
  CHARACTER SET utf8
  COLLATE utf8_unicode_ci
  COMMENT 'Events Table';