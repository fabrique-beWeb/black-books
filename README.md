black_books
===========

A Symfony project created on March 10, 2017, 2:07 pm.

# Installation :  
## symfony project :  
- pull repo
- install dependencies via composer
- update .htaccess file from the root of projet with your own servername
- update config.yml with your own configuration
- update .htaccess file from the web folder so that the request redirect to app_dev.php instead of app.php (line 57)
- create database with symfony console
- import the dump file from sql folder to mysql
## more configuration :  
- update hosts file with that URL : www.black-books.uk  
- add virtualhost corresponding to the configuration you want to
## run the app :
- it works ;) !
# Explanation :  
## part 1 - Set the controller RESTfriendly :  
- ConsultingController  
Responding only of the GET verb. The second part of project needs this controller return a list of books AND a list of copies from selected book.  
- AdminController  
Return an administrator view containing one control to get all books from database. All requests use ajax to get resources in json format.  
We need, for the first part, a creation and an update for the copy of a book.  
## part 2 - Use js for manipulate DOM :  
The view, returned by the controller, offer an html template. Empty of datas. when the document is loaded, send an ajax request to get the list of books. Use JS to format datas corresponding of table structure ;).  
On a click on a book line, the script hide the previous table and show a new stucture with the copies of selected book.  
An UI user friendly needs to suggest few interactions to do an action. By the way ui offer to administrator the update of entities directly from the list.  

