# XSS-CSRF
In this exercise, XSS and CSRF will be implemented

In form.php file line 18, the contect security policy is applied in meta tag to ensure that there is no interactions between different origins.

For XSS defense, the user input has been encoded (in serverside.php line 23-26) to convert any user input into the text. 

For CSRF defense, the antri-CSRF token has been implemented in login.php file. The csrf token will be randomly generated when the user log in, the function to generate csrf token and validate the token are included in function.php. If the csrf has been validated, the user will be directed to form.php. 
