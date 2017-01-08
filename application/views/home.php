<?php defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED')  ?>

<div class="row padding-list grey-text text-darken-2">
    <div class="col s12 m12 l10">
        <div class="card light-white">
            <div class="card-content">
                <center>
                    <span class="card-title">ALL SERVERS</span>
                </center>
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                    <li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li><li class="white">
                        <div class="collapsible-header"><i class="fa fa-signal green-text"></i>SMART CLASH | NO ROOT | APK | IPA</div>
                        <div class="collapsible-body"><p>Play the most imposrt and best type of game. The only server that is always online</p></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l2">
        <div class="card light-white">
            <div class="card-content">
                <span class="card-title">
                    <?php
                        if($this->session->loggedin == FALSE){
                            echo 'Howdy, Stranger!';
                        } else {
                            echo 'Howdy, ' . $this->session->username;
                        }
                    ?>
                </span>
                <p>
                    <?php
                        if($this->session->loggedin == FALSE){
                            echo 'Looks like you are new here. Sign in to get recognised or Sign Up to join the party.';
                        } else {
                            echo 'Add your server by clicking link below. Also, get your server listed first by becoming pro user!';
                        }
                    ?>
                </p>
            </div>
            <div class="card-action">
                <?php
                if($this->session->loggedin == FALSE){
                    echo "
                    <a href=\"base_url('auth/login')\">SignIn</a>
                    <a href=\"base_url('auth/register')\">SignUp</a>
                    ";
                } else {
                    echo '
                    <a href="base_url(\'servers/add\')">Add server</a>
                    <a href="base_url(\'user/manage\')">Manage Account</a>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card light-green white-text">
            <div class="card-content">
                <span class="card-title">
                    Awesome, now you can see the speed
                </span>
                <p>The page was dynamically generated in just {elapsed_time} seconds</p>
            </div>
        </div>
    </div>
</div>