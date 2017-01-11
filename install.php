<?php



class install
{
    private $database = [];

    public function run()
    {

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

            /*$db->query($sqlOne);
            $db->query($sqlTwo);
            $db->query($sqlThree);*/
            if( $db->query($sqlOne) &&
                $db->query($sqlTwo)&&
                $db->query($sqlThree) === TRUE)
            {
                // todo : Built automatic installer
            } else {

            }
        }
    }

    private function getHead()
    {
        return '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <title>Smart Lists | Initialisation</title>
                    <meta charset="utf-8"?
                </head>
                <body>
        ';
    }

    private function getFoot()
    {
        return '
            </body>
        </html>
        ';
    }
}

$app = new install();

$app->run();
