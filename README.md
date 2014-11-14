lorem-ipsum-article-generator
=============================

Time read and write of XML files, JSON files, SQLite, and MySQL.
Each data format is filled with randomly generated Lorem Ipsum at an average length of 1000 words.

Use it on the command-line like so
--
```
$ php ./tests.php

1000 XML files written to disk in 0.03262 Seconds.
1000 JSON files written to disk in 0.11479 Seconds.
1000 SQLite entries written to database in 0.33435 Seconds.
1000 MySQL entries written to database in 0.67734 Seconds.

1000 XML files read from disk in 0.04212 Seconds.
1000 JSON files read from disk in 0.03795 Seconds.
1000 SQLite entries read from database in 0.01482 Seconds.
1000 MySQL entries read from database in 0.02801 Seconds.

$ php ./tests.php read

1000 XML files read from disk in 0.03704 Seconds.
1000 JSON files read from disk in 0.03668 Seconds.
1000 SQLite entries read from database in 0.01493 Seconds.
1000 MySQL entries read from database in 0.02712 Seconds.

$ php ./tests.php all 10000

10000 XML files written to disk in 0.34548 Seconds.
10000 JSON files written to disk in 1.32001 Seconds.
10000 SQLite entries written to database in 3.04257 Seconds.
10000 MySQL entries written to database in 14.77014 Seconds.

10000 XML files read from disk in 0.38788 Seconds.
10000 JSON files read from disk in 0.37899 Seconds.
10000 SQLite entries read from database in 0.14302 Seconds.
10000 MySQL entries read from database in 0.26231 Seconds.

$ php ./tests.php read

10000 XML files read from disk in 0.3664 Seconds.
10000 JSON files read from disk in 0.36275 Seconds.
10000 SQLite entries read from database in 0.14346 Seconds.
10000 MySQL entries read from database in 0.25806 Seconds.
```
