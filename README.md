Sprint 1, Team 1
 
Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter

MET CS 637 Agile Software Development

### Links
* Team 1 [website](http://www.cs634-hur-01.designaspractice.com/) with sprint 1 work
* Team 1 [Trello](https://trello.com/b/CjFGS03b/cs634-group-1-team-1) board
* Sprint 1 [GitHub code repo](https://github.com/oxelson/CS634) containing all of the code for the website

### Where to find the sprint retrospective

The sprint retrospective is available in the [Team 1 Trello](https://trello.com/b/CjFGS03b/cs634-group-1-team-1) board (on the right side -- it has it's own column).

### Removal of items from Sprint 1 backlog

We removed two items from the Sprint 1 backlog:

1. The 'Classical Music Lover views song lyrics' card was removed from the sprints altogether (currently located in the 'Backlog Items Removed From Sprint 1' section of [Team 1's Trello](https://trello.com/b/CjFGS03b/cs634-group-1-team-1) board. The primary reason for this is that any of Tanya's lyrics are not actual words, but vocalizations. As a team fulfilling all roles (Product Owner, Development Team, Scrum Master, etc.), we decided that trying to implement this item would not provide any real value to the end result of the sprint,  Hence, it's removal was determined to not affect the overall sprint goal.

2. The 'Student purchases sheet music' item was moved to the sprint 2 backlog.  The team decided that the merits offered by this particular item were more in-line with the goals of sprint 2 (which is mostly devoted to the incorporation of student instruction into the website).

### Website sources & credits

The source file for the images, content, etc., used for the creation of Team 1's website is found on the [sources](http://www.cs634-hur-01.designaspractice.com/sources.php) page of the website.  (This file can also be accessed by clicking on the link of the same name located on the lower-left corner of each website page).

NOTE: The link for the image used on the subpages credited to 'Omar Khaled via Pexels' appears to be no longer functional.  The link remains in the sources page, but is not functional at this time.

### Website infrastructure and data

The website uses web storage (local storage) for its data in lieu of a backend database or data store.  Each page verifies the data is loaded.  Please be aware that any manipulation of the local storage dedicated for the site may influence the display/functionality of the website. 

### User authentication

We have a crude user authentication mechanism in place for the site.  We found it necessary to model this behavior to effectively meet the goals of some the user stories in the sprint that involve access control.

We have two user accounts set up by default (but you are welcome to create your own!):

1. Tanya's login as a site administrator:
  * login: tanya
  * password: tanya
  
2. A student login whose account will be more relevant for sprint 2:
  * login: student
  * password: student
  
Only Tanya's login/account has any significance with respect to accessing discography CRUD functionality.  

It is worth mentioning that we don't have any real access control for the site in place (no backend, no access control), but have 'mocked' some rudimentary visibility to certain types of content depending on the user authenticated.  As such, it please note that either authenticated user can access/perform account CRUD functionality; whereas only Tanya's account can access/perform the discography CRUD functionality.

### Which web forms are functional and which ones are not

1. The [Contact](http://www.cs634-hur-01.designaspractice.com/contact/) section of the website contains a couple of web forms that simulate contacting Tanya.  Clicking the submit button on both of these forms will only result in an alert message.

2. The [Account](http://www.cs634-hur-01.designaspractice.com/account/) section of the website contains various forms for webite account CRUD functionality and user authentication/logout.  *These forms are quazi-functional*, meaning they directly modify the account data in web storage and perform a rudimentary authentication of sorts.  

Please note that no legitimate input validation is being performed for these forms and the recaptcha is a stub and therefore is non-functional.  

Please also note you cannot remove tanya's account, but you *can* remove the student's account.  (To restore the original data, just clobber the local storage data and reload the website.)
