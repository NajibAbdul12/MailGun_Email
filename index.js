var API_KEY = 'c5554ec6ac8d9e966ff6a7cecc1f7186-c4d287b4-f7bb7b9a';
var DOMAIN = 'sandbox2fb044b229904ed28016d2dcfc925bf7.mailgun.org';
var mailgun = require('mailgun-js')
	({apiKey: API_KEY, domain: DOMAIN});

sendMail = function(sender_email, receiver_email,
		email_subject, email_body){

const data = {
	"from": sender_email,
	"to": receiver_email,
	"subject": email_subject,
	"text": email_body
};

mailgun.messages().send(data, (error, body) => {
	if(error) console.log(error)
	else console.log(body);
});
}

var sender_email = 'mr.neji12@hotmail.co.uk'
var receiver_email = 'najibabdulkhadir@hotmail.com'
var email_subject = 'Mailgun Demo'
var email_body = 'Greetings from geeksforgeeks'

// User-defined function to send email
sendMail(sender_email, receiver_email,
			email_subject, email_body)
