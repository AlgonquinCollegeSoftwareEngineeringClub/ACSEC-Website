<?php

function echoBanner($isInParent = false) {
    if ($isInParent)
        $navPrefix = '';
    else
        $navPrefix = '../';

    // Create User Bar.
    if (isset($_SESSION['MemberId'])) {
        echo '<a href="'. $navPrefix . 'member/?id=' . $_SESSION['MemberId'] . '" class="btn btn-primary">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a> ';
        echo '<a href="' . $navPrefix . 'global/signout.php" class="btn">Sign out</a>';
    }
    else {
        echo '<a href="' . $navPrefix . 'signin/" class="btn">Sign in</a> ';
        echo '<a href="' . $navPrefix . 'register/" class="btn">Register</a>';
    }

    // Create Navigation Bar.
    echo '<hr>';
    echo '<a href="' . $navPrefix . './" class="btn">Front Page</a> '; // Should direct to main page. Note sure how main page should self-direct.
    echo '<a href="' . $navPrefix . 'challenges/" class="btn">Challenges</a> ';
    echo '<a href="' . $navPrefix . 'projects/" class="btn">Projects</a> ';
    echo '<a href="' . $navPrefix . 'members/" class="btn">Members</a>';
    echo '<hr>';
}

// EOF
