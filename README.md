# SENIOR SAYE0046 SLEE0041 HAMI0222
This document outlines all the features that can be tested on the website for assignment 2.

## Instructions for use
Please place this parent folder (web-solution) in your www/ directory located in your AMPPS files.
The website can then be accessed when AMPPS is running at `localhost/web-solution/index.php`
Before using the website please copy the text from `db.sql` and run the SQL statements in PHPmyAdmin.
Ensuring all the SQL executed successfuly, the website is now ready to use.

## Home Page
The search bar on the home page can be used to find an item that is listed for sale. It currently uses text matching to find items that contain the substring typed in the search bar but will not collect similar terms. 

## Sell
Any item you list in the sell page will appear on the home and browse page and will list you as the seller. The image for the item must be of jpg or jpeg format. Whilst the categories and condition of the item were never implemented in a refined search the information is still stored in the database.

## Product
If the product is an item you have listed for sale the add to cart button will not appear to prevent you from purchasing your own items.

## Cart
If you have an item in your cart with some quantity `x`, and you return to that items product page and add more quantity `y`. The cart will display quantity `x+y`. You will also be able to remove an item (the entire quantity of them) from your cart. 

## Persistent Elements
The quick actions bar can be used to change the website to dark mode and will persist in dark mode as you navigate the site until you set it back to light mode. Similarly, the font size will persist accross pages until you change it again. 