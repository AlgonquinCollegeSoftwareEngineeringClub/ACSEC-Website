<?php

// TODO: This file will be used on every navigable page to create a banner at
// the top that shows two main things.

// At the very top is the user bar.

// If signed in, there will be the user's name, which functions as a link to
// their member page, and also a sign out button.

// If signed out, there will be a link to the sign in page.

// Under the user bar, there is a navigation bar.
// The navigation bar will provide access to all the main pages, including:
// Front Page
// Challenge List
// (under construction) Member list
// (under construction) Project list

function echoBanner($isInParent = false) {
    if ($isInParent)
        $navPrefix = '';
    else
        $navPrefix = '../';

    // Create User Bar.
    if (isset($_SESSION['MemberId'])) {
        // TODO: Clicking on the user's name should bring them to their member
        // page.
        echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . ' ';
        echo '<a href="' . $navPrefix . 'global/signout.php">Sign out</a>';
    }
    else {
        echo 'not logged in ';
        echo '<a href="' . $navPrefix . 'signin/">Sign in</a> ';
        echo '<a href="' . $navPrefix . 'register/">Register</a>';
    }

    // Create Navigation Bar.
    echo '<hr>';
    echo '<a href="' . $navPrefix . './">Front Page</a> '; // Should direct to main page. Note sure how main page should self-direct.
    echo '<a href="' . $navPrefix . 'challenges/">Challenges</a> ';
    echo '<a href="' . $navPrefix . 'projects/">Projects</a> ';
    echo '<a href="' . $navPrefix . 'members/">Members</a>';
    echo '<hr>';
}
