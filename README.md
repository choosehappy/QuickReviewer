# QuickReviewer

A quick web user interface which allows multiple user to rapidly review images and assign them a value

![alt text](screenshot.png "screenshot")

## Use Case
We have a number of histology images which we would like a set of experts to categorize into one of 4 categories (none, low, medium, high).

This app will show them the image and the 4 associated buttons and record their result. 

Afterwards, one can look at the statistics of their results using the *res.php* and *res_comp.php* pages 

## Requirements
Apache, php, mysql

## Installation
1. Create new mysql database
2. Edit *bd_script.sql* to have image filenames, and run script in mysql
3. Edit *Constants.php* to specify database name, location, username, password, etc
4. Copy *app* directory to apache target directory
5. Copy images to *resources* directory
6. Thats it!


## Citing

This work was developed for and used in this manuscript, please cite it!

    @article {Corredor1526,
	author = {Corredor, Germ{\'a}n and Wang, Xiangxue and Zhou, Yu and Lu, Cheng and Fu, Pingfu and Syrigos, Konstantinos and Rimm, David L. and Yang, Michael and Romero, Eduardo and Schalper, Kurt A. and Velcheti, Vamsidhar and Madabhushi, Anant},
	title = {Spatial Architecture and Arrangement of Tumor-Infiltrating Lymphocytes for Predicting Likelihood of Recurrence in Early-Stage Non{\textendash}Small Cell Lung Cancer},
	volume = {25},
	number = {5},
	pages = {1526--1534},
	year = {2019},
	doi = {10.1158/1078-0432.CCR-18-2013},
	publisher = {American Association for Cancer Research},
	issn = {1078-0432},
	URL = {https://clincancerres.aacrjournals.org/content/25/5/1526},
	eprint = {https://clincancerres.aacrjournals.org/content/25/5/1526.full.pdf},
	journal = {Clinical Cancer Research} }


###### This project was entirely coded by German Corredor Prada and is hosted here with his permission
