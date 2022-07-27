# OnlineDiscussionForum
This is "Online Discussion Forum" project using PHP and MySQL.
In this Multiple user can raise a query and multiple users can slove their particular query in different Programming language forums.
This project includes "admin panel" as well as "user panel" which makes 90% of the project dynamic.
# Screenshot
**Home Page

![image-000](https://user-images.githubusercontent.com/74658164/181384523-78ada5e3-51b9-4422-af52-2d1a723c6709.jpg)

**Forum Page**

![image-001](https://user-images.githubusercontent.com/74658164/181384658-13fc5572-4a75-4b45-9e4e-d6720579b062.jpg)

**Article Page**

![image-002](https://user-images.githubusercontent.com/74658164/181384802-52b906fa-67bb-4585-a130-88a54c7ff6df.jpg)

**About Page**

![image-003](https://user-images.githubusercontent.com/74658164/181384905-70a89f38-f070-4884-bf06-921f0b186eca.jpg)

**View Selected Forum Page**

When forum is empty (no queries posted by users yet )

When forum is not empty (queries posted by users)

**View Selected Question Page**

When no answers commented to a particular question

When Answers commented to a particular question




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

