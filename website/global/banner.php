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
<li class="navbar-item" data-toggle="modal" data-target="#signin-modal">
  <a class="nav-link" style="cursor:pointer;">Sign in</a>
</li>
<li class="navbar-item">
  <a class="nav-link" href="<?= $navPrefix ?>register/">Register</a>
</li>

<?php

    }

?>



<?php

}

function getSelfString() {
    if (isset($_GET['id'])) {
        $selfString = '?from=' . htmlentities($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING'];
    }
    else {
        $selfString = '?from=' . htmlentities($_SERVER['PHP_SELF']);
    }

    return $selfString;
}

function echoSignInModal($isInParent = false) {
    if (!isset($_SESSION['MemberId'])) {
        if ($isInParent)
            $navPrefix = '';
        else
            $navPrefix = '../';

?>

<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= $navPrefix ?>global/crud.php<?= getSelfString() ?>" method="post">
          <div class="form-group">
            <label for="email-input">Email address</label>
            <input type="email" id="email-input" class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password-input">Password</label>
            <input type="password" id="password-input" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-check" style="margin-bottom:10px;">
            <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme" value="">
            <label class="form-check-label" for="rememberme">Keep me signed in.</label>
          </div>
          <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Sign in</button>
      </div>
    </div>
  </div>
</div>

<?php

    }
}

// EOF
