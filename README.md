# QuickReviewer

A quick web user interface which allows multiple user to rapidly review images and assign them a value

![alt text](screenshot.png "screenshot")

##Use Case
We have a number of histology images which we would like a set of experts to categorize into one of 4 categories (none, low, medium, high).

This app will show them the image and the 4 associated buttons and record their result. 

Afterwards, one can look at the statistics of their results using the *res.php* and *res_comp.php* pages 

##Requirements
Apache, php, mysql

##Installation
1. Create new mysql database
2. Edit *bd_script.sql* to have image filenames, and run script in mysql
3. Edit *Constants.php* to specify database name, location, username, password, etc
4. Copy *app* directory to apache target directory
5. Copy images to *resources* directory
6. Thats it!


###### This project was entirely coded by German Corredor Prada and is hosted here with his permission