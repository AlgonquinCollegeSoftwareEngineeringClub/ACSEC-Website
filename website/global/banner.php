<?php

function echoBanner($onpage = 'none', $isInParent = false) {
    if ($isInParent)
        $navPrefix = '';
    else
        $navPrefix = '../';

?>

<nav class="navbar navbar-expand-lg navbar-dark justify-content-between" style="background-color: #026342;">
  <a class="navbar-brand" href="<?= $navPrefix ?>./">ACSEC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?php if ($onpage == "challenges") echo "active"; ?>">
        <a class="nav-link" href="<?= $navPrefix ?>challenges/">Challenges</a>
      </li>
      <li class="nav-item <?php if ($onpage == "projects") echo "active"; ?>">
        <a class="nav-link disabled" href="<?= $navPrefix ?>projects/">Projects</a>
      </li>
      <li class="nav-item <?php if ($onpage == "members") echo "active"; ?>">
        <a class="nav-link disabled" href="<?= $navPrefix ?>members/">Members</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php loginArea($navPrefix); ?>
    </ul>
  </div>
</nav>

<?php

}

function loginArea($navPrefix) {
    if (isset($_SESSION['MemberId'])) {

?>

<!-- This will appear in the top-right of the NavBar if the user is logged in. -->
<li class="navbar-item">
  <a class="nav-link" href="<?= $navPrefix ?>member/?id=<?= $_SESSION['MemberId'] ?>"><?= $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] ?></a>
</li>
<li class="navbar-item">
  <a class="nav-link" href="<?= $navPrefix ?>global/signout.php">Sign out</a>
</li>

<?php

    }
    else {

?>

<!-- This will appear in the top-right of the NavBar if the user is not logged in. -->
<li class="navbar-item">
  <a class="nav-link" href="<?= $navPrefix ?>signin/">Sign in</a>
</li>
<li class="navbar-item">
  <a class="nav-link" href="<?= $navPrefix ?>register/">Register</a>
</li>

<?php

    }

?>



<?php

}

// EOF
