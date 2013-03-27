
<?php include_once 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" href="styles/jplayer.css">
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"> </script>
<style type="text/css">
.wrapper {overflow:hidden;}
.header {display:none;}
.gutter {opacity:0;filter:alpha(opacity=0);}
h2 {font-size:36px;position: relative;top: -44px;font-weight: bold;}
body { background: rgba(255, 255, 255, 0.8); color: #4f504a; font: normal 16px/20px 'Helvetica Neue', Helvetica, Arial, sans-serif; text-align: center; height: 100%; margin: auto; float: none; text-align: center; position: relative; overflow: hidden;}
body, .wrapper {background: transparent;}

</style>
<script type="text/javascript" src="js/jquery-jplayer/jquery.jplayer.js"> </script>
<script type="text/javascript" src="js/ttw-music-player-min.js"> </script>
<script type="text/javascript">
      var myPlaylist = [
          {
              mp3:'audio/Mikey-J.mp3',
              oga:'audio/Mikey-J.ogg',
              title:'Mikey J',
              artist:'Chinese School',
              duration:'3:51'
          }
      ];
        $(document).ready(function(){
            var description = 'Sharing is fun. ';

            $('body .ie-sucks').ttwMusicPlayer(myPlaylist, {
                autoPlay:true, 
                // description:description,
                jPlayer:{
                    swfPath:'js/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>
</head>
<body>
  <div class="gutter">
  </div>
  <div class="header container_12">
    <div class="logo grid_4 prefix_4 suffix_4">
      <h1 style="text-indent:-9999px'">
        <a href="/">
        </a>
      </h1>
    </div>
  </div>
  <div class="greenBorder" style="#position: relative; overflow: visible;margin:auto;width:536px">
    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle; display: table-cell;">
      <div class="greenBorder" style="background: rgba(255, 255, 255, 0.88); #position: relative; #top: -50%; display: table-cell; width: auto; height: auto; padding: 0 16px; border: 1px solid #eee; border-radius: 2px; min-height: 250px;width:70%">
        <div class="ie-sucks-more">
          <div class="ie-sucks info"> </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
