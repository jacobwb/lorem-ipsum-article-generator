lorem-ipsum-article-generator
=============================

Time read and write of XML files, SQLite, and MySQL

Use it on the command-line like so
--
```
# php ./tests.php

1000 XML files written to disk in 0.15202 Seconds.
1000 SQLite entries written to database in 145.69918 Seconds.
1000 MySQL entries written to database in 32.48621 Seconds.

1000 XML files read from disk in 0.03841 Seconds.
1000 SQLite entries read from database in 0.01819 Seconds.
1000 MySQL entries read from database in 0.06934 Seconds.

# php ./tests.php read

1000 XML files read from disk in 0.03585 Seconds.
1000 SQLite entries read from database in 0.01838 Seconds.
1000 MySQL entries read from database in 0.03287 Seconds.

# php ./tests.php write 10000

10000 XML files written to disk in 1.36543 Seconds.
10000 SQLite entries written to database in 1572.10947 Seconds.
10000 MySQL entries written to database in 311.04557 Seconds.

# php ./tests.php read

10000 XML files read from disk in 0.35744 Seconds.
10000 SQLite entries read from database in 0.1775 Seconds.
10000 MySQL entries read from database in 0.17975 Seconds.

```
