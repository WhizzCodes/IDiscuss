# IDiscuss
This is an "Online Discussion Forum" named as "IDiscuss" created using "HTML, CSS, JavaScript, Bootstrap, PHP and MySQL".

The Main objective of this is Multiple user can raise query and multiple users can slove a particular query in different forums. This project includes "admin panel" as well as "user panel" which makes 90% of the project dynamic.

**Non-User Functions:**

-View Forums/Questions/Comments/Articels -Signup

**User Functions:**

-Login-Forgot Password-Edit Profile-Post Question/Answers/Article-Edit Question/Answers/Article-Delete Question/Answers/Article-Submit Testemonials-Logout

**Admin Functions:**

-Login

-Forgot Password

-Edit Profile

-Add New Admin

-Add/Edit Forums

-Delete Admin/Forums/Articles

-Remove/Add Testemonials after verifying

-View/Delete Contact us Inbox

-Logout

# Screenshots

https://github.com/WhizzCodes/IDiscuss/blob/main/Screenshot%20Full%20Implementation/PreetiGuin_Implementation_IDISCUSS.pdf

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
3) Change **SMTP=localhost** to **SMTP=smtp.gmail.com**
4) Chnage **smtp_port=25** to **smtp_port=587**
5) Change **sendmail_from** = me@example.com" to **sendmail_from = YourEmail@gmail.com**
6) Change **sendmail_path** = to **sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"**

7) Open "xampp/sendmail/sendmail.ini" file
8) Change **smtp_server=mail.mydomain.com** to **smtp_server=smtp.gmail.com**
9) Change **smtp_port=25** to **smtp_port=587**
10) Change **auth_username=** to **auth_username= YourEmail@gmail.com**
11) Change **auth_password=** to **auth_password=YourAppPassword** (If you Don't have an app password, Generate new form your Gmail Account)
12) Change **force_sender=** to **force_sender= YourEmail@gmail.com**

   **Thankyou!!**

