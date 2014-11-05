# Quick and Dirt PHP Email Generator

**tl;dr:** Quickly generate multiple emails that you can send from your favorite mail client using mailto links and parsing data from various text files. (email addresses, email template, and optional redemption codes)

## Background

Recently, I had to contact 50 readers by email for a giveaway that we were running on our site. We’ve run similar sorts of events before and it’s always a tedious experience. It involves something like this:

1. Get email address from the list of winners.
2. Write up some sort of email template.
3. Go through and copy paste template into new email, and then copy and past the email address from list of winners.
4. Oh, don’t forget to copy and paste the subject line: “Dude, you’ve won FOO! Nice work!”
5. Oh, this particular giveaway features a unique code for each winner. Make sure you copy and paste that, too!
6. After all this copy and pasting, send the email.
7. Repeat this process until you’ve gone through the list of winners. Look at a clock and realize this has taken all afternoon.

“Oh, man,” you think to yourself, “there’s got to be a better way.”

## The Better Way

There is! Just download this project to your favorite PHP compatible server (or run an app like MAMP on your machine) and open up the “make_email.php” script.

There are a few required files:

* emails.txt - This is the list of email addresses you wish to send emails to. Each email address should be on a new line. No commas or funny stuff separating them, please. I didn’t build in any sort of fancy error checking.
* body.txt - This is the meat and potatoes. This is the message you’re going to want to send over and over and over and over. Sweet! **One particularly important note:** If there is some sort of unique redemption code or URL that winners will need to go to, you can add in ‘%code%’ (without quotes) to your email. The script will then automatically fill in unique codes when it generates the email (should you choose that options).
* codes.txt - If you have a whole list of redemption codes or URLs, this is where you put them. Like emails, each code or URL needs to be on a separate line.

That’s it! You might be wondering how you set the subject line of the email. Right now, it’s a variable at the top of the script. Just change that and you’ll be good to go!

Once you have these text files filled out, run the script, choose whether you’re generating emails with or without redemption codes and then fire away!

You can now click through the list and start firing off emails like you’re your own spambot. Except you’re giving people legitimately cool things. And you’ll still be able to enjoy your afternoon.

Thanks for checking it out.

@davely



