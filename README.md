# Manufacturing Process Management (MPM) 

MPM can be use to any manufactoring plant/units to mantain their stocks/data even at intermittent levels. Levels are processes invovled to manufacture one unit/Item. It required configurations such as level involved, units (weight,height) etc. as per business needs. Go through below points to setup, configure and understand working.

## Prerequisites
* Operating system (Linux, Windows)
* Apache, PHP, Mysql (Or WAMP/LAMP server)
## Configure Database
* Login to Mysql and create one database named 'mpm' and Import file (mpm_1052015.sql) to your Database 'mpm'.
* Add database credentials in protected/config/main.php <br>
      <I>'connectionString' => 'mysql:host=127.0.0.1;dbname=mpm',<br>
			'username' => \<db-username\>,<br>
			'password' => \<db-password\>,<br>
			</I>

## Test the application
* Browse the index.php and check accessibilty
* If page is accesible, try to login into Application (Default Credentials). If login sucessfull, it means Database is configured correctly.

## Nomenclature
* Items - Raw Materials use at various level in processing to manufactor final product (Article)
* Article - Final output product
* Production Plan - It is the mechanishm to track output progress of articles. This progress is tracked in batches. Batches are created as per quatity of Articles.
* Processes - Different level that are involved in manufactoring of one Article

<br> To be continue...
