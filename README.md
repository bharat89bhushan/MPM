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
* Items - Raw Materials use at various level in processing to manufactor final product (e.g. Cloth, leather)
* Article - Final output product (e.g. Shoe)
* Production Plan - It is the mechanishm to track output progress of articles. This progress is tracked in batches. Batches are created as per quatity of Articles (e.g. Plan to produce 100 pairs of Shoe)
* Processes - Different level that are involved in manufactoring of one Article (e.g. cutting, molding)
* Parties - Parties could be any entity from which items(raw) is being purchased, Godowen stock (Article) is being sold or involved in intermittent processing of Articles (e.g. party X- from which we purchase cloth; party Y- do cutting for making shoe; party Z - purchase shoes from us)
* Issue Items - Transfer Items(raw products) to parties those are involved in intermittent processing of articles and these items are used in processing. (e.g. Give 10 m cloth to party X for cutting as per plan of 100 shoes)

<br> To be continue...
