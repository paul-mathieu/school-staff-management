# ApplicationWeb
Mini-projet du module <b>INFO642</b> à Polytech Annecy.

## Context
As part of our web technology project, we decided to choose the second subject that deals with the management of expert speakers in a school. These experts can intervene in a course following a student’s request from a professor.
We have created a web interface for interactions between teachers and students and a database to store all the useful information.


## Site design

### Web interface

For the interface, we used the layout proposed by Bootstrap and we used the school server to store the php and css files. All access is on the page: <a href="http://tp-epu.univ-savoie.fr/~mathieu9/school-staff-management/index.php">school-staff-management/index.php</a>.


Access to the general interface is done after entering a valid login and password in the popup that appears if no one is yet logged in. If a user does not yet have an account, they can create one using the popup next to it. He can then connect immediately after.

The home page is the same for each person who logs in. Users can just see their account status: Student, Teacher or Expert. On the right side there is a menu allowing access to different information: Home, User Information, Messaging, Contact the experts and Schedule.

The User Information tab contains all the account information, namely: profile picture and CV, login, password, name and surname, email and a choice of specialty if he is an expert. With the login, all this information can be modified by the user.

Messaging allows students and speakers to exchange all the information necessary for the course. If it is a student who is connected, he has access to a box allowing him to create a new request. Once this request is created, he can send messages to the teacher and the teacher can reply to him. By message, both students and the teachers concerned can suggest the intervention of an expert, but only the professor can speak directly to the expert. All concerned have access to all the messages in the request. For example, once a teacher addresses a teacher, that expert can see all of the messages.

To be able to better know an expert or simply to search for one, any user can have access to certain information from all the experts. The first two selection lists allow access to information from an expert whose name or login is known. The third list allows you to search for an expert according to his specialty. Once the list of experts by specialty has been loaded, it is possible to send an email directly to get in touch.

The last tab includes the timetable of professors and students of Savoie Mont Blanc University to be able to quickly set a date for a possible intervention.

### Data-base

To store all the data, we have set up an SQL database through phpMyadmin with the following structure:

When adding a new user to the database, it is the user table that will be populated first, as well as the access table which makes it possible to differentiate admin from other users. At the start, their status (profession) must be completed and each user can complete the information linked to their account later, via the platform. He may in particular:
• add a CV
• add a profile picture
• modify personal data

All students will be assigned at least one group that they can modify. Experts can have as much specialty as they want. Finally, students can create requests, for example a request for an expert intervention to better understand a course. These are intended for the professor responsible for the group concerned by the request, but other teachers may be included in the request if a student or professor addresses him. All the members of the request will have access to the content of the requests concerning them, in particular the messages exchanged between a student and a professor but also with a potential expert speaker who can be contacted and integrated into the request by the teacher in charge.

