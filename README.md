# OnlineDiscussionForum
This is "Online Discussion Forum" project in PHP and MySQL.
In this Multiple user can raise a query and multiple users can slove their particular query in different Programming language forums.
This project includes "admin panel" as well which makes 80% of the project dynamic.

# How to run via Xampp Server? 
1)  Download the Code zip file.

2)  Click on "Extract Here" option to extract the downloaded zip file

3)  Change the folder name from "IDiscuss-main" to "IDiscuss"

4)  Extract the IDiscuss/admin/vendor/fontawesome-free/svgs.zip to IDiscuss/admin/vendor/fontawesome-free/svgs and IDiscuss/ckeditor.zip to IDiscuss/ckeditor

5)  Copy and Paste the "IDiscuss" folder in your "xampp/htdocs" folder

6)  Start Appache and MySQL from xampp control panel.
 
7)  Go to http://localhost/phpmyadmin/

8)  Import the database from "xampp/htdocs/IDiscuss/import db/online_discussion_forum".

9)  Go to http://localhost/ and click on IDiscuss

# Settings to configure Email Verfication via gmail

1) Open "xampp/php/php.ini" file
2) Find "mail function"
3) On line 1950, change **SMTP=localhost** to **SMTP=smtp.gmail.com**
4) On line 1097, chnage **smtp_port=25** to **smtp_port=587**
5) On Line 1101, change **;sendmail_from** = me@example.com" to **sendmail_from = YourEmail@gmail.com**
6) On line 1105, change **;sendmail_path** = to **sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"**

7) Open "xampp/sendmail/sendmail.ini" file
8) On Line 14, change **smtp_server=mail.mydomain.com** to **smtp_server=smtp.gmail.com**
9) On Line 18, change **smtp_port=25** to **smtp_port=587**
10) On Line 46, change **auth_username=** to **auth_username= YourEmail@gmail.com**
11) On Line 47, change **auth_password=** to **auth_password=YourAppPassword** (If you Don't have an app password, Generate new form your Gmail Account)
12) On Line 60, change **force_sender=** to **force_sender= YourEmail@gmail.com**

   **Thankyou!!**

