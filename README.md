lorem-ipsum-article-generator
=============================

Time read and write of XML files, SQLite, and MySQL

Use it on the command-line like so
--
```
$ php ./tests.php 

1000 XML files written to disk in 0.13419 Seconds.
1000 SQLite entries written to database in 0.4026 Seconds.
1000 MySQL entries written to database in 0.72661 Seconds.

1000 XML files read from disk in 0.0374 Seconds.
1000 SQLite entries read from database in 0.01769 Seconds.
1000 MySQL entries read from database in 0.01782 Seconds.

$ php ./tests.php read

1000 XML files read from disk in 0.03563 Seconds.
1000 SQLite entries read from database in 0.01792 Seconds.
1000 MySQL entries read from database in 0.01898 Seconds.

$ php ./tests.php write 10000

10000 XML files written to disk in 1.35931 Seconds.
10000 SQLite entries written to database in 1.93949 Seconds.
10000 MySQL entries written to database in 14.61203 Seconds.

$ php ./tests.php read

10000 XML files read from disk in 0.37499 Seconds.
10000 SQLite entries read from database in 0.17399 Seconds.
10000 MySQL entries read from database in 0.17222 Seconds.

```
