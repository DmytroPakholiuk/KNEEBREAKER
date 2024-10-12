<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About this project

So this is a test-task for one company. The overall task was to 
create an app that has "ACL" (Access Control List, a thing in Zend framework
for authorization). The task specified it to have a configuration file for the ACL
and have some sort of role inheritance, so I decided to code this in. It emulates the wat
that Zend Framework may have it done, though RBAC is usually implemented otherwise in Laravel.
I named it like that because the "ACL" also refers to some sort of knee injury.

## Installation

I have created an <code>install.sh</code> script that will do all the preparations for you.
On Linux, just run it with the root permissions (it needs them to insert a record to your /etc/hosts file).
<b>You might need to run it multiple times</b>, because sometimes the app doesn't migrate correctly for whatever reason
<br>
All subsequent starts of the project can be performed within the install.sh, or by running 
<code>docker-compose up -d</code>
<br>
The site will be available at kneebreaker.com:20080 (don't forget
to restart your browser after installation, before opening it: browsers cache the /etc/hosts file)
