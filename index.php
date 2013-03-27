  <?php include_once 'header.php'; ?>    
  <script type="text/javascript" src="js/custom.js"> </script>
  <script src="js/adapt.min.js"></script>
</head>

<body>
  <a href="javascript:showDiv('password-form')" id="password" style=""> 
    <div id="main-image" onclick="javascript:showDiv('password-form')" class="kenny">
      <img class="range_test"  src="images/rock-on.png" alt="" />       
    </div>
  </a>
  <div class="wrapper">
    <div class="gutter"></div>
    <header class="header container_12">
      <div class="logo grid_4 prefix_4 suffix_4">
        <h1> <a href="/"> <img src="images/chinese_logo.png" alt="Chinese School" /> </a> </h1>
      </div>
      <h2 class="grid_12">We've so much yet to learn.</h2>
    </header>

    <script type="text/javascript">
      $(function() { $('#main-navigation a').shadowbox(); });
    </script>
    
    <div class="page bottom container_12">
      <nav>
        <ul id="main-navigation">
          <li class="music grid_2 prefix_3"><h3><a onclick='changeLink("song.php")' rel="shadowbox;background:url('./images/bg-body.png') repeat scroll 50% 0 #FFF;" href="song.php" id="link-music"><span class="asset" ><div class="rollover"></div></span> Song </a></h3></li>
          <li class="shows grid_2"><h3><a onclick='changeLink("shows.php")' href="shows.php" rel="shadowbox;background:url('./images/bg-body.png') repeat scroll 50% 0 #FFF;"><span class="asset" id="link-shows"><div class="rollover"></div></span> Shows </a></h3></li>
          <li class="contact grid_2 suffix_2"><h3><a onclick='changeLink("contact.php")' rel="shadowbox;" href="contact.php" id="link-contact"><span class="asset"><div class="rollover"></div></span> contact </a></h3></li>
          <li class="photos grid_2"  >
            <div id="photo-list">
                <?php
                    $files = array();
                    $i = 0;
                    if ($handle = opendir('images/photos/')) {
                      echo '<ul class="item">';
                      while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                          $files []= $file;
                          $i += 1;
                          sort($files);
                        }
                      }
                    $x = 1;
                    foreach($files as $f){
                      if ($f != "thumbs") {
                        echo "<li id='item-".$x. "' rel='shadowbox[such]'>
                                <a onclick='changeLink(\"/images/photos/\")'  href= \"images/photos/";
                                echo $f;
                                echo "\" rel='shadowbox[such]' id=\"link-photos\">";
                                echo "<span class='asset'><div class=\"rollover\"></div></span>Photo";
                              echo '</a>';
                            echo '</li>';
                        }
                        $x++;
                       }
                        echo '</ul> <br /><br />';
                      }
                ?>
            </div>
          </li>
          <li class="videos grid_2 "><h3><a onclick='changeLink("video.php")' id="link-videos" rel="shadowbox;" href="video.php"><span class="asset"><div class="rollover"></div></span> Video </a></h3></li>
        </ul>
      </nav>
    </div>

    <?php echo $downloadcontent; ?>
          
    <div class="banner">  
      <div class="contact">
        <a onclick='changeLink("contact.php")' rel="shadowbox;" href="contact.php">
          <img src="images/contact-graphic.png" alt="Contact Us" title="email us at chinesemusicschool@gmail.com"/>
        </a>
        <div>
        <a onclick='changeLink("contact.php")' rel="shadowbox;" href="contact.php" title="email us at chinesemusicschool@gmail.com" class="text">contact us</a>
        </div>
      </div>
    </div>
    
    <?php include_once 'footer.php'; ?>
