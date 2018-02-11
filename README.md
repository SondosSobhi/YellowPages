# YellowPages
-in project, i changed the path with virsual host to start as http://yellowpages/...
-in http://yellowpages/index/addCategory we find that we can add categories.
-in http://yellowpages/index/addCompany we can add new company by two steps, first add name, phone, city, area, second appear when click NEXT button to add categories and images.
-in http://yellowpages/home/main user can find all comanies that has been added with their names, phones, categories, cities and areas (but error with display images).
-in http://yellowpages/index/login admin can make login to move to main page with options to add, edit and delete then logout.

*each path is received directly go to index.php file then it is converted by FrontController.php file to be simulate controller and view(yellowpage/controller/view).
*each function in indexController.php and homeController.php work as separated controller that attach specific model with the specific view.

=some errors:
-companies in main page not display ten by ten, all companies displayed in same page.
-images of companies only saved but not displayed or can be updated.
