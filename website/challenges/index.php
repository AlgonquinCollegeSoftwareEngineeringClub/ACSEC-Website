<?php

require_once '../global/database.php';
require_once '../global/banner.php';
require_once '../global/bootstrap.php';
require_once '../global/session.php';

startSessionFromCookie();

?>

<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Challenges</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <?php echoBanner(); ?>
    <h1>Challenges</h1>
    <ul>
      <?php
      // Get list of challenges.
      $db = Database::getConnection();
      $query = $db->prepare('SELECT * FROM Challenge ORDER BY ChallengeId DESC');
      $query->execute();
      foreach ($query as $row) {
        date_default_timezone_set('America/Toronto');
        $today = date("Y-m-d");

        // Don't show challenges that have been posted ahead of time.
        if ($row['DatePosted'] <= $today) {
          $challengeId = $row['ChallengeId'];
          $title = $row['Title'];
          $date = $row['DatePosted'];

          // Difficulties are stored in the database as integers from 1-3, so we must convert it into a more useful form. We'll set 1 as Easy and 3 as Hard.
          $difficulty = $row['Difficulty'];
          if ($difficulty == 1)
            $difficulty = 'Easy';
          else if ($difficulty == 2)
            $difficulty = 'Medium';
          else if ($difficulty == 3)
            $difficulty = 'Hard';

          // Count the number of members that have submitted a solution for this challenge.
          $submissionCountQuery = $db->prepare('SELECT * FROM Submission WHERE ChallengeId = ?');
          $submissionCountQuery->execute([$challengeId]);
          $submissionCount = $submissionCountQuery->rowCount();

          // Check whether this member has submitted a solution for this challenge already.
          $hasSubmitted = false;
          if (isset($_SESSION['MemberId'])) {
              $submittedQuery = $db->prepare('SELECT * FROM Submission WHERE ChallengeId = ? AND MemberId = ?');
              $submittedQuery->execute([$challengeId, $_SESSION['MemberId']]);
              $hasSubmitted = $submittedQuery->rowCount() > 0;
          }

          echo '<li>';
          echo '  <a href="../challenge/?id=' . $challengeId . '" class="challenge-link">';

          if ($hasSubmitted)
            echo '  <div class="challenge-item submitted">';
          else
            echo '  <div class="challenge-item">';

          echo '      <span class="challenge-number">' . $challengeId . '</span>';
          echo '      <span class="challenge-title">' . $title . '</span>';
          echo '      <span class="challenge-difficulty">' . $difficulty . '</span>';
          echo '      <span class="challenge-submissions">Submissions: ' . $submissionCount . '</span>';
          echo '      <span class="challenge-date">' . $date . '</span>';
          echo '    </div>';
          echo '  </a>';
          echo '</li>';
        }
      }
      ?>
    </ul>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
