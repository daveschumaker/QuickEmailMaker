<?php
  // Quick and Dirty Email Generator
  // Use this to parse list of emails and generate mailto links
  // by Dave Schumaker (@davely)

	$page_url = "make_email.php"; // Use this to set the name of the page and link to itself.
	$subject = "Congratulations from FOO! You've won a FOO!"; // simple and quick way to set subject line

	// Let's start building some emails and analyzing files, shall we?
	if ($_GET["m"] == "generate") {
		// Page is calling, let's go!
		//echo "GENERATE!";
		$email_list = file('emails.txt'); // Get list of emails as an array.
		$email_body = file_get_contents('body.txt');
		$email_body = nl2br($email_body); // Body of the email message that we'll use.

		if ($_GET["code"] == "true") {
			$code_list = file('codes.txt'); // Get list of codes as an array.
		}

		// print_r ($email_list); // Display email addresses for debugging info.
		//echo $email_body; // Display body of email for debugging info.
	}
?>

<html>
	<head>
		<title>Quick and Dirty Email Generator</title>
	</head>
	<body>
    <h1>Quick and Dirty Email Generator</h1>
    <p>Need to email a list of people to inform them that they've won something?
    Use this to parse email addresses from a text file and automatically create links.
    </p>
    <h2>Things needed</h2>
    <ol>
      <li><strong>emails.txt</strong> - list of emails with each address on a separate line</li>
      <li><strong>body.txt</strong> - body of email</li>
      <li><strong>subject.txt</strong> - 1 line containing the subject of the email. (Though right now this is simply a variable set at the beginning of the script)</li>
    	<li><strong>codes.txt (optional)</strong> - some giveaways might contain a unique code that each winner must use. add them on separate lines here</li>
		</ol>

		<h2>Options</h2>



		<p><a href="<?php echo $page_url; ?>?m=generate&code=false">Click this link to get started!</a>
		or <a href="<?php echo $page_url; ?>?m=generate&code=true">Create emails with unique codes!</a></p>

		<?php
		if ($_GET["m"] == "generate") {
			echo "<h2>Emails!</h2>\n";
			echo "<p>";

			for ($i = 0; $i < count($email_list); $i++) {

				if ($_GET["code"] == "true") {
					$this_email = str_replace("%code%", $code_list[$i], $email_body);
					$unique_code = "with unique code: " . $code_list[$i];
				} else {
					// If I'm a dummy and forgot to remove the '%code%' variable from the email,
					// strip it out right here so our email still works.
					$this_email = str_replace("%code%", "", $email_body);
					$unique_code = "";
					//$this_email = htmlspecialchars($email_body); // No unique code needed, just paste in standard email.
				}

				echo "<a href=\"mailto:$email_list[$i]?subject=$subject&body=$this_email\">Email $email_list[$i] $unique_code</a><br/>";
			}

		}
		?>
	</body>
</html>
