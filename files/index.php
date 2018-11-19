<?php
  // Configuration
  $twttitle     = 'CrazeBot Static Tweet';   // Usually hidden page title
  $twtdir       = '/home/username/CrazeBot'; // CrazeBot Directory

  // Tweet Parameters
  $twttweet     = '';
  $twtpath      = explode('/',$_SERVER["PATH_INFO"]);
  $twtchan      = strtolower($twtpath[1]);
  $twtprefix    = 'https://twitter.com/intent/tweet?source=crazebot&text=';

  // Extract INI data
  $twtfile      = $twtdir . '/#' . $twtchan  . '.properties';
  $twtfileopen  = explode("\n", file_get_contents($twtfile));
  foreach($twtfileopen as $twtfileline)
  {
    if (substr($twtfileline, 0, 10) == 'siteTweet=') {
      // Set new destination
      $twttweet = urlencode(substr($twtfileline, 10));
    }
  }

  // Redirection
  $twtdest = $twtprefix . $twttweet;
  header("Location: " . $twtdest);
?>
<html><head>
<title><?=$twttitle?><?php echo ($twtchan ? ": " . $twtchan : ""); ?></title>
<meta http-equiv="Refresh" content="0;<?=$twtdest?>">
</head><body>
