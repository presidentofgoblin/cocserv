<?php



class install
{
    private $database = [];

    public function run()
    {
        if(isset($_POST['user'])){
            $this->connect();
        } else {
            echo '
            <html>
                <head>
                    <title>Install | Smart Lists</title>
                    </head>
                    <body>
                    <form method="POST" action="install.php">
                        <input type="text" name="host" id="host">
                        <label for="host">Host Name</label>
                    
                        <input type="text" name="user" id="user">
                        <label for="user">DB Username</label>
                    
                        <input type="password" name="pass" id="pass">
                        <label for="pass">DB Password</label>
                    
                        <input type="text" name="name" id="name">
                        <label for="name">DB Name</label>
                    
                        <input type="submit" value="Submit"> 
                    </form>
                </body>
            </html>
            ';
        }
    }

    /**
     *
     */
    private function connect()
    {
        if(isset($_POST['host'])) {
            $this->database['host'] = $_POST['host'];
            $this->database['user'] = $_POST['user'];
            $this->database['pass'] = $_POST['pass'];
            $this->database['name'] = $_POST['name'];

            $db = mysqli_connect(
                $this->database['host'],
                $this->database['user'],
                $this->database['pass'],
                $this->database['name']
            );

            if (!$db) {
                $this->showError('Couldn\'t connect to the database');
            }

            $sqlOne = "
            CREATE TABLE IF NOT EXISTS `ci_sessions` (
              `id` varchar(128) NOT NULL,
              `ip_address` varchar(45) NOT NULL,
              `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
              `data` blob NOT NULL,
              KEY `ci_sessions_timestamp` (`timestamp`)
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

            $sqlTwo = "
            CREATE TABLE IF NOT EXISTS `servers` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `owner` int(11) unsigned NOT NULL,
              `ownername` varchar(100) NOT NULL,
              `ip` int(25) unsigned NOT NULL,
              `port` int(5) unsigned NOT NULL,
              `name` varchar(100) NOT NULL,
              `description` varchar(500) NOT NULL,
              `votes` int(12) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

            $sqlThree = "
            
            CREATE TABLE IF NOT EXISTS `users` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `username` varchar(100) NOT NULL,
              `password` varchar(500) NOT NULL,
              `email` varchar(100) NOT NULL,
              `apikey` varchar(200) NOT NULL,
              `maxservers` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;";

            if( $db->query($sqlOne) &&
                $db->query($sqlTwo)&&
                $db->query($sqlThree) === TRUE)
            {
                echo 'Installed the script successfully. Wait two seconds please...';
                sleep(2.5);
                unlink(__FILE__);
            } else {
                die('THE SCRIPT DIDN\'T INSTALL DUE TO SOME UNKNOWN PROBLEM');
            }
        } else {
            $this->run();
        }
    }
}

$app = new install();

$app->run();
