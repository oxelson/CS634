Sprint 1, Team 1
 
Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter

MET CS 637 Agile Software Development

### Where to find the sprint retrospective

The sprint retrospective is avaiable in the [Team 1 Trello](https://trello.com/b/CjFGS03b/cs634-group-1-team-1) board (on the right side -- it has it's own column).

### Removal of items from Sprint 1 backlog

We removed two items from the Sprint 1 backlog:

1. The 'Classical Music Lover views song lyrics' card was removed from the sprints altogether (currently located in the 'Backlog Items Removed From Sprint 1' section of [Team 1's Trello](https://trello.com/b/CjFGS03b/cs634-group-1-team-1) board. The primary reason for this is that any of Tanya's lyrics are not actual words, but vocalizations. As a team fullfilling all roles (Product Owner, Development Team, Scrum Master, etc.), we decided that trying to implement this item would not provide any real value to the end result of the sprint,  Hence, it's removal was determined to not affect the overall sprint goal.
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
  
Only Tanya's login/account has any significance with respect to accessing discography CRUD functionality.  (It is worth mentioning that we don't have access control for the site in place, but created the accounts 


    login information and what he can see  & where when authenticated as tanya or student
    what part of the site has functional forms and which ones are for show (e.g., discography CRUD)
