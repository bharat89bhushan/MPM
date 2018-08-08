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


<br> To be continue...
