    <header>
        <nav>
            <!-- <a href="index.html"><img src="images/TheHiveLogo.svg" alt="The Hive Logo"></a> -->
            <a href=<?php echo URLROOT; ?>><img src="<?php echo URLROOT; ?>images/TheHiveLogo.svg" alt="The Hive Logo"></a>
            <ul>
                <?php 
                if (getSession('UserType') || getSession('UserID')) {
                $userType = getSession('UserType');
                $userID = getSession('UserID');
                    switch ($userType) {
                        case 'Archer':
                            echo '<li><a href=' . URLROOT . 'archer>My Archery</a></li>';
                            break;

                        case 'Recorder':
                            echo '<li><a href=' . URLROOT . 'recorder>Manage Recording</a></li>';
                            break;
                        
                        default:
                            echo '<li><a href=' . URLROOT . 'user>Set User</a></li>';
                            break;
                    }
                }
                echo '<li><a href=' . URLROOT . 'user>Set User</a></li>';
                ?>
            </ul>
            <hr>
        </nav>
    </header>
