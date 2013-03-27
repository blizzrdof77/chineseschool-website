<?php
/**
 * Generate an "Add to Page" Facebook dialog
 *
 * In January 2012 Facebook did away with individual application profile pages, thus the "Add to my page" link
 * This script should help us launch Facebook apps/tabs with ease
 *
 * Facebook depends on the script living in the same directory that's "owned" by the application. To make this suck less,
 * put (and modify, if necessary) the htaccess.txt file in the public_html directory of the client and rename it to ".htaccess"
 * - this will direct all requests ending in add-to-page to add-to-page.php
 */

$app_id = false;
if( isset($_GET['app']) && $_GET['app'] ){
  $id = preg_replace('/[^0-9]/', '', $_GET['app']);
  if( $id != '' ){
    $app_id = $id;
  }
  unset($id);
}

// Facebook will throw an error if the redirect URI isn't "owned" by the app/tab - screw it, we'll just direct ourselves to the app
$base_uri = dirname(sprintf('https://%s%s', $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI'])) . '/';
 
?><html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add to my Facebook page</title>
<style type="text/css">
  html, body{font-family:sans-serif; font-size:13px; line-height:18px; color:#333;}
  #container{width:520px; margin:0 auto; padding:0; overflow:hidden;}
  h1{margin-bottom:20px; font-size:18px;}
  p{margin-bottom:20px;}
  label{display:block; font-weight:bold;}
</style>
</head>
<body>
  
  <div id="container">
    <div id='fb-root'></div>
    <script src='//connect.facebook.net/en_US/all.js'></script>
    <h1>Add a facebook app/tab to a page</h1>
  <?php if( $app_id ): ?>
    
    <a href="#" onclick="addToPage(); return false;">Add this application to a Facebook page</a>
    
  <?php else: ?>
  
    <p>Before we can add the application we need the app's ID. This can be retrieved from the Facebook developers app.</p>
    <form method="get" action="?">
      <label for="app">Application ID</label>
      <input name="app" id="app" type="text" value="<?php echo $app_id; ?>" />
      <input type="submit" value="Submit" />
    </form>
    
  <?php endif; ?>

  </div>

<script> 
  FB.init({
    appId: '<?php echo $app_id; ?>',
    status: true,
    cookie: true
  });

  function addToPage() {
    FB.ui({
      method: 'pagetab',
      redirect_uri: '<?php echo $base_uri; ?>',
    });
  }
</script>
</body>
</html>