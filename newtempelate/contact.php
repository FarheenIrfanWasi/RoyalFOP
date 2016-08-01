<!DOCTYPE HTML>
<html>
	<head>
		<title>CSS3_skies</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro" rel="stylesheet" />
		<!--[if lte IE 8]><script src="html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<script src="skel.min.js">
		{
			prefix: 'css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			grid: { gutters: 30 },
			breakpoints: {
				wide: { range: '1200-', containers: 1140, grid: { gutters: 50 } },
				narrow: { range: '481-1199', containers: 960 },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
		<script>
			$(function() {

				// Note: make sure you call dropotron on the top level <ul>
				$('#main-nav > ul').dropotron({ 
					offsetY: -10 // Nudge up submenus by 10px to account for padding
				});

			});
		</script>
		<script>
			// DOM ready
			$(function() {
    
			// Create the dropdown base
			$("<select />").appendTo("nav");
   
			// Create default option "Go to..."
			$("<option />", {
				"selected": "selected",
				"value"   : "",
				"text"    : "Menu"
			}).appendTo("nav select");
   
			// Populate dropdown with menu items
			$("nav a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("nav select");
			});
   
			// To make dropdown actually work
			// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
			$("nav select").change(function() {
				window.location = $(this).find("option:selected").val();
			});
  
			});
		</script>	
	</head>
	<body>
		<div id="header_container">		
		    <div class="container">
			<!-- Header -->
				<div id="header" class="row">
					<div class="4u">
						<div class="transparent">
							<h1><a href="index.html">CSS3<span class="header_colour">_skies</span></a></h1>
							<h2>Simple. Contemporary. Website Template.</h2>
					    </div>
					</div>
					
					<nav id="main-nav" class="8u">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="examples.html">Examples</a></li>
							<li><a href="apage.html">A Page</a></li>
							<li><a href="anotherpage.html">Another Page</a></li>							
							<li>
								<a href="#">Example Drop Down</a>			
									<ul>
										<li><a href="#">Drop Down 1</a></li>
										<li><a href="#">Drop Down 2</a></li>
										<li>
											<a href="#">Drop Down 3</a>
												<ul>
													<li><a href="#">Sub Drop Down One</a></li>
													<li><a href="#">Sub Drop Down Two</a></li>
													<li><a href="#">Sub Drop Down Three</a></li>
													<li><a href="#">Sub Drop Down Four</a></li>
													<li><a href="#">Sub Drop Down Five</a></li>
												</ul>
										</li>
									</ul>
							</li>
							<li><a class="active" href="contact.php">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>	
        </div>		

		<div id="site_content">		
			<div class="container">			
				
			<!-- Features -->
				<div class="row">
					<section class="8u">
					
					<!-- Banner -->		
						<div id="banner">
							<a href="#"><img src="images/banner.png" alt="banner image" /></a>
						</div>
						
						<h1>Contact Us</h1>
						<p>Say hello, using this contact form.</p>
						<?php
							// Set-up these 3 parameters
							// 1. Enter the email address you would like the enquiry sent to
							// 2. Enter the subject of the email you will receive, when someone contacts you
							// 3. Enter the text that you would like the user to see once they submit the contact form
							$to = 'enter email address here';
							$subject = 'Enquiry from the website';
							$contact_submitted = 'Your message has been sent.';

							// Do not amend anything below here, unless you know PHP
							function email_is_valid($email) {
							  return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
							}
							if (!email_is_valid($to)) {
							  echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
							}
							if (isset($_POST['contact_submitted'])) {
								$return = "\r";
								$youremail = trim(htmlspecialchars($_POST['your_email']));
								$yourname = stripslashes(strip_tags($_POST['your_name']));
								$yourmessage = stripslashes(strip_tags($_POST['your_message']));
								$contact_name = "Name: ".$yourname;
								$message_text = "Message: ".$yourmessage;
								$user_answer = trim(htmlspecialchars($_POST['user_answer']));
								$answer = trim(htmlspecialchars($_POST['answer']));
								$message = $contact_name . $return . $message_text;
								$headers = "From: ".$youremail;
								if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
								  mail($to,$subject,$message,$headers);
								  $yourname = '';
								  $youremail = '';
								  $yourmessage = '';
								  echo '<p style="color: blue;">'.$contact_submitted.'</p>';
								}
								else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
							  }
							  $number_1 = rand(1, 9);
							  $number_2 = rand(1, 9);
							  $answer = substr(md5($number_1+$number_2),5,10);
						?>
						<form id="contact" action="contact.php" method="post">
						  <div class="form_settings">
							<p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
							<p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
							<p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
							<p style="line-height: 1.7em;">To help prevent spam, please enter the answer to this question:</p>
							<p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
							<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
						  </div>
						</form>
					</section>

					
					<section class="4u">
						<div id="sidebar">
							<section class="12u">
								<h3>Latest News</h3>
								<h4>New Website Launched</h4>
								<h5>February 1st, 2014</h5>
								<p>2014 sees the redesign of our website. <a href="#">Read more</a></p>
							</section>
							<section class="12u">
								<h3>Useful Links</h3>
								<ul>
									<li><a href="#">First Link</a></li>
									<li><a href="#">Another Link</a></li>
									<li><a href="#">And Another</a></li>
									<li><a href="#">Last One</a></li>
								</ul>
							</section>
							<section class="12u">
								<h3>More Useful Links</h3>
								<ul>
									<li><a href="#">First Link</a></li>
									<li><a href="#">Another Link</a></li>
									<li><a href="#">And Another</a></li>
									<li><a href="#">Last One</a></li>
								</ul>
							</section>
						</div>
					</section>
					
				</div>
		    </div>
		</div>		
		<div id="footer_container">
			<div class="container">			
			<!-- Footer -->
				<footer>
					<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
					<p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="apage.html">A Page</a> | <a href="anotherpage.html">Another Page</a> | <a href="contact.php">Contact Us</a></p>
					<p>Copyright &copy; CSS3_skies | <a href="http://skeljs.org/">skel.js</a> | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
				</footer>		
			</div>
        </div>		
	</body>
</html>
