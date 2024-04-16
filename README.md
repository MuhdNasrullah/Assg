# Authentication student registration
## The functions of file
- **form.php**
   - Contain all the details about the student when they want to register their full information about their confidential information.
- **index.php**
   - Main pages where the student needs to log in their username and password first before they can proceed to the other pages and in these pages they cannot proceed to other pages without submitting their username and password. 
- **logout.php**
   - Once the student logs out from the system, the student cannot enter it back without entering their name and their password again since the system will erase their one-time session after they log out. 
- **registration.php**
   - Where the new student needs to register their data here and the data will go to the database to be kept there for authentication when the student wants to log in in login.php. 
- **styless.css**
   - This file contains the CSS which is the layout of the form, all the settings for the layout will be in here.
- **submit.php**
   - This will function to accept the data from the registration.php and enter it into the database also being used generally for others to enter their data to submit it to the database through this submit.php. 
