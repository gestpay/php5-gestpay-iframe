# Gestpay iFrame example in PHP

This example focuses on how to completely customize the payment page the way you want - in Gestpay, we technically refer
 to this as the *iFrame solution*.

This example is realized in Php5+, to use the Soap capabilities of the language. If you use an older PHP version,
checkout [php4-gestpay-iframe](https://github.com/gestpay/php4-gestpay-iframe).

A detailed explanation of what's going on is in the
[Getting Started](http://docs.gestpay.it/gs/super-quick-start-guide.html) page. Refer to the paragraph *Using your
customized payment page* to understand the process of paying with this solution.

> **NOTE - to launch this example, the iFrame option must be enabled on your Gestpay account. Ask Gestpay support to
enable it**.

## What's in this repository 

| File | Description | 
| ---- |------------ | 
| `index.php` | This is the main entry point. Since it is only an example, it contains php instructions (executed on the server) along with html and javascript code (executed on the client). |
| `response.php` |  when the payment is completed, Gestpay will redirect to this file to show to the user the payment status. `response.php` will decrypt the encrypted string and then it will show the SOAP message received - in the form of an array. |
| `reset.css` and `iFrame.css` | because nobody likes ugly pages |
| `README.md` | this file |

## How to start 

1. open `index.php` and set the `$shopLogin` variable (row 9) with your Gestpay shop login. In the same file, you can
set the environment (*test* or *production*) via the variable `$testEnv`. (Default: `true`)
2. upload it to a php server with a public ip 
3. Connect to your [test merchant back-office](http://testecomm.sella.it) and log in 
4. In *Configuration* > *IP address*, insert the public IP of your server 
5. In the same page click on *Response Address* and insert:
	- URL for positive response: `<<your_server_address>>/response.php`
	- URL for negative response: `<<your_server_address>>/response.php`
	- URL Server to Server: `<<your_server_address>>/response.php` 
6. Pay with one of the cards present in *Notification* page.
7. Once you have payed, you'll be redirected by Gestpay to `response.php` to see the outcome ot the transaction.  

## Questions, Issues, etc.

For any questions, open an issue [here on Github](https://github.com/gestpay/php5-gestpay-iframe/issues). We will take
care of everything for you.