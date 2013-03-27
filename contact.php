
    <?php include_once 'header.php'; ?>
    
        <link rel="stylesheet" type="text/css" href="styles/jquery-ui-1.8.16.custom.css" />
        
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){


				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"ok": function() { 
							$(this).dialog("close"); 
						}
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				
			});
		</script>
		<style type="text/css">
				#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
				div#dialog{padding:0!important; margin: 0 auto!important;}
				div#dialog p{font-size:12px!important; padding:0px!important; margin:0!important;}
				span.ui-button-text{ font-size:12px!important;}
				span#ui-dialog-title-dialog{margin: auto!important;text-align: center!important;float: none!important;font-size:16px!important; font-family:"amaranth"!important;}
				.ui-dialog-buttonpane{margin:0!important; padding: 0!important;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
      .wrapper {overflow-x:hidden!important;}
      .header {display:none;}
      .gutter {opacity:0;filter:alpha(opacity=0);}
      
		</style>	

  </head>
  
  <body>
    <div class="wrapper">
      <div class="gutter"></div>
      <div class="header container_12">
        <div class="logo grid_4 prefix_4 suffix_4">
          <h1 style="text-indent:-9999px'"><a href="/">Chinese School</a></h1>
        </div>
      </div>
            <h3 style="display:none;"> contact us </h3>

      <div class="greenBorder"  style="display: table; height: 96%; #position: relative; overflow: hidden;margin:auto;">
    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;width:100%;">
      <div class="greenBorder" style=" #position: relative; #top: -50%">
            <form method="post" id="contact_form" action="mailform.php">
              <div>
                <strong> Your Name: </strong> 
                <input type="text" name="name" id="name" value="" />
              </div>
              <div>
                <strong> Your Email: </strong> 
                <input type="text" name="email" id="email" value="" />
              </div>
              <div>
                <strong> Your Phone Number: </strong> 
                <input type="text" name="phone" id="phone" value="" />
              </div>

              <?php $subject = "website contact form inquiry"; ?>

              <div>
                <strong>Message:</strong> 
                <textarea name="message" id="message" rows="10" cols="60"><?php echo "</tex" . "tarea>"; ?> <br />
              </div>
              <input type="hidden"  name="redirect" value="index.php"  >
              
                <div><a id="dialog_link" class="ui-state-default ui-corner-all" href="#" > submit </a>
              </div>
            </form>
            </div></div></div>

		<div id="dialog" title="Thanks for contacting me">
			<p>Thank you for submitting your questions/comments.  <br />I will be sure to respond as soon as possible.</p>
		</div>
			

<br />
          </div>

        </div>
      </div>

  </body>
</html>
