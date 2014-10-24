lorem-ipsum-article-generator
=============================

Time read and write of XML files, SQLite, and MySQL

Use it on the command-line like so
--
```
$ php ./tests.php

1000 XML files written to disk in 0.09551 Seconds.
1000 SQLite entries written to database in 0.40668 Seconds.
1000 MySQL entries written to database in 0.71304 Seconds.

1000 XML files read from disk in 0.03608 Seconds.
1000 SQLite entries read from database in 0.01414 Seconds.
1000 MySQL entries read from database in 0.02673 Seconds.

$ php ./tests.php read

1000 XML files read from disk in 0.03553 Seconds.
1000 SQLite entries read from database in 0.01375 Seconds.
1000 MySQL entries read from database in 0.02726 Seconds.

$ php ./tests.php both 10000

10000 XML files written to disk in 0.98365 Seconds.
10000 SQLite entries written to database in 1.98698 Seconds.
10000 MySQL entries written to database in 13.25636 Seconds.

10000 XML files read from disk in 0.3756 Seconds.
10000 SQLite entries read from database in 0.13575 Seconds.
10000 MySQL entries read from database in 0.25194 Seconds.

$ php ./tests.php read

10000 XML files read from disk in 0.35475 Seconds.
10000 SQLite entries read from database in 0.14274 Seconds.
10000 MySQL entries read from database in 0.24294 Seconds.
```
