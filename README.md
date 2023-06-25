
## Email Marketing Service

Run project:
- `git clone git@github.com:OlehBendryk/email_marketing_assignment.git`
- `cd email_marketing_assignment`
- `docker-compose up --build`
  
<p>open a new terminal window and enter to the container </p>

- `docker exec -it email_marketing_assignment-email_marketing-1 bash`

stick this inside the container
- `composer install`
- `php artisan migrate:refresh --seed`
<p>now you have access to application http://email-marketing.localtest.me/ </p> 
Your login credentials:

- login/email: `admin@test.me`
- password: `password`

If you send emails without specifying a timestamp, the email sending job will be added to the queue for processing.

Run this command to handle email sending job - **if email sent you see in the table:email_sendings column status = 1(true)**

`php artisan queue:listen` or `php artisan queue:work`

If you have a timestamp, the email will saved with status = 0(false),
to send, open a new terminal window and enter to the container 
where you run cron command, which checks the status of the email and the time of sending
`php artisan check:email-status`

sent email can see in the storage/logs
*it should also be noted that variables `MAIL_MAILER=log` and `QUEUE_CONNECTION=database`


