<?php

namespace Database\Seeders;

use App\Models\Research;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $research = new Research([
            'title' => 'Automated System for Monitoring of Attendance and collection of fines for the College of Information and communications technology College of student council (CSC) Utilizig Biometric System (BASMA_F4C)',
            'abstract' => "The most common problem encounter by the officers of College of Information and Communication Technology is when  they conduct event with attendance that students required to attend, it is hard for them to receive or to produce accurate attendance because of some manipulation of student, so that when it comes to calculating fines the data are not exactly accurate so some student are complaining and decline to pay their fines. According to the proponents reducing or totally remove those issue can help the organization to do their task effective and effiency that the student will be no doubt of paying their fines and will continuously  trust them. To address the above problem the proponets proposed a system  which is the Automated System for Monitoring of Attendance and Collection of Fines. It is a LAN-based system which aims to stored data from the student. Since CSC is the one that manages other  school activities that the student required to attend, this will helps the organization to maximize the service by recording accurate data, such as the exact date and place of the school activities, registration of every student by scanning their selected finger to the biometric device to have their own identity and to avoid manipulation during having a attendance, so that the organization can produce accurate calculation of lines. In order to fully understand the system the proponents will give time to train on how they will do their task with the system, especially in using biometric device scanner for attendance. They will also provide  a user manual in case of any frequently asked questions.            ",
            'year' => '2018',
            'keywords' => ['Automated System', 'Monitoring', 'Attendance', 'Biometric System', 'CSC'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Farming Assistant Web Services (FAWS)',
            'abstract' => "Farming Assistant Web Services is developed to give a solution to the current problem encountered by the farmers in Catanduanes. There is no existing system here in Catanduanes regarding the transaction between the farmers and buyers. This proposed system will help the farmer and buyers to save money  as well as speed up the transaction of exchanging commodities between them. The farmers and the buyers were the focus on this study. The farmers is the one who will supply the product by using the system, but if the farmer is not yet registered to the system, he needs to register to become one of the suppliers. They buyer is the one who will buy the product of the farmer through the proposed system, the buyer also need  to register to the system to access the site. To have a greater profitability, the proponets proposed  an information system whereas this will speed up their transcation. Information System as an organized system for the collection, storage, organization and communication of information. More specifically, it is the study of complementary networks that people and organization use to collect, filter, process, create and distribute data. The farming Assistant Web Services is a web project to help farmers working with them motive of greater profitability. This innovative site allows a farmer and buyer to communicate. It provides an option of login to farmers  and communicates to respective buyers.            ",
            'year' => '2018',
            'keywords' => ['Farming Assistant', 'Web Services', 'FAWS'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Tau Gamma Phi/Tau Gamma Sigma Profiling and Attendance System',
            'abstract' => "Tau Gamma Phi is an organization, or a group that needs an automated system that will help the admin or user to easily  identify if this people are a bona-fide member of the group. In Catanduanes, Tau Gamma Phi has 23 chapters. Every year each chapter produces 5 new members. However, they have no database to save the profile of every member and no ID system to determine if the person has undergone the membership process in order to become a Triskelion. In this proposed system, the researchers developed a profiling system so that at any time there's a new member, they can just add the data of that person. The  main purpose of the proposed system was to help the organization record the profile and attendance of every member which can minimize the time, consumed in digging files and recording of attendance. This system has several features such as profiling that would help the organization input all the data of every member by chapter for them to recognize each member and attendance system that would be used whenever there's a  meeting in the council. This would certify that the member has attended the meeting on that specific date and time.            ",
            'year' => '2018',
            'keywords' => ['Tau Gamma Phi', 'Tau Gamma Sigma', 'Profiling', 'Attendance', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Faculty Academic Reports Monitoring System',
            'abstract' => "The researcher plan to develop a system that can check, monitor and rate the timlines of academic reports, which can help the users, that is the Faculty members, in organizing, monitoring and submitting the needed reports. With this proposed system, the proponets expect to give benefits to the users especially to the CICT Faculty.  The project helps the Faculty in monitoring the Academic Reports which reduce effort in manual checking and submitting, updating Faculty members for the submission, and serve as a back-up. They can easily biew the updates about the deadlines of the Academic Reports, upload or submit, view returned reports for revisions, re-upload for checking and generate reports. Administrator can check the reports with paint feature, add comments about the errors of information in the document, rate the quality and efficiency for the performance of the faculty members and can automate the rating for timeliness which makes the proposed system innovative. The system can also serve as a practice for the faaculty members in becoming efficient in achiving maximum productivity with minimum wasted effort or expense, being organized and effective in controlling time. The system can help the Administrator in observing the progress of each faculty members based on thier performance in submitting the required Academic Reports.            ",
            'year' => '2018',
            'keywords' => ['Faculty', 'Academic', 'Reports', 'Monitoring', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 5,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Attorney Group System',
            'abstract' => '',
            'year' => '2018',
            'keywords' => ['Attorney', 'Group', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 6,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Web-Based R&B Opitical Management System',
            'abstract' => "Web-Based R&B Optical Management System in developed to  give a solution to the current problem encountered by the R&B Optical clinic with their paper-based system. This proposed system will speed up their transaction especially for searching their records. The system will be needing a domain name and hosting for deployment and can be access by customers with the used of internet connection. The target beneficiary for the proposed system is the R&B Optical Clinic. The people that can access the system is the system administrator , head, employee, and patient. However, there are certain limitation whereas the customer can only request for an appointment, the employee can only input the data's and edit some errors and no users can delete the transaction. Given that the R&B Optical still uses that kind of system, they usually encounter this kind of proplems and as of now they are reaching out to use an information system where thier transactions can be easily done. Including the use of information system for documentation on recording files in the clinic, the production inside will be a great advantage with the business. The reason why the clinic is still not engage in any automated transaction is due to financial issues. Manual accounting with paper and pencil is much cheaper that a computerized system, which requires a machine and software. Other expenses associated  with accounting software include training and program maintenance. Expenses can add up fast with cost for printers, paper, ink and other supplies. These systems suffer from higher rate of inaccuracy, and they are much slower than computerized system. It can waste both money and time.            ",
            'year' => '2018',
            'keywords' => ['Web-Based', 'R&B', 'Optical', 'Management', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Online Fitness Management System',
            'abstract' => "Online Fitness Management System, significantly manage data information regularly and helps update records information including transactions of both the administrator  and members. This proposed Online Fitness Management System will be used by the administration and customers of Fitness Campaign Gym at San Isidro Village. It is engaged in providing service to the public both men and women of all ages. This gym provides fitness facilities and equipment to serve its customers who came excercise or workout. Our object is  to make the schedule web-based for fitness management business, another is to make the scheduling and inquiring less time consuming and more efficient, consumers more interested about finess program.To design and develop a well-structured website gym management system for Fitness Campaign Gym. Online Fitness Management will be used effectively after it has been developed. This system is very necessary for both men and women of all ages who are interested in fitness program and to those who do not have much time to go to the place where gym is but really wants to be a member. The imporntance of this project is that it can helps the organization and the users more convenient and easy to access. It is more accessible because the client can schedule thier time via online.We are expecting that the customer will be much more interested in the programs offered by the gym. It is being innovated because we saw the conflict of being manually done that's why we conducted a reseatch on how to solve the problem that their facing in their gym.            ",
            'year' => '2018',
            'keywords' => ['Online', 'Fitness', 'Management', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Point of Sale (POS) Integration System for Sea Breeze Restaurant',
            'abstract' => "As the internet technology has become essential for the human life, diversity of Point of Sale (POS) Integration system has been created to fulfill increasing customer demand. Nowadays, variety of existing manual process was replaced by a LAN-Based system due to the time consuming manual process and unsolvable limitations appeared. this research Point of Sale (POS) Integration contains ordering, inventory and point of sale is proposed for replacing existing manual process. This system will allowed user to choose their order using tablet as a menu carried by the waiter and authomated sales report for every transaction. The Point of Sale (POS)  Integration development has been growing due to the highly recommended from user in order to replace the existing or manual system. Using this system, it will help Sea Breeze Restaurant to reduce the processing time and lessen the paper works. It eases the task  of the employees and lessen human errors. POS Integration allows for much great accuracy in stocking and product management. POS Integration can establish the benefits that the business handling may have like time saving, error caused by human factors can be lessen.            ",
            'year' => '2018',
            'keywords' => ['Point of Sale', 'POS', 'Integration', 'System', 'Sea Breeze Restaurant'],
            'confirmed_by_id' => 3,
            'advisers_id' => 8,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'CSU Web Based Report Card for K to 12 Student',
            'abstract' => "This research project is about report card for the K to 12 students entitled 'CSU Web Based Report Card for K to 12 Student'. This project is done for the student and the teacher who are in this level and this project can help them lessen the works. The project conducted for the student of K to 12 senior high school who wants to monitor or view their grade. And also for the teachers who are inputting the grades of their studdents manually by writing it on a piece of paper. The problem that is faced by the organization is the consume so much time in finalizing the grades of their students. Even though they were using spread sheet and Microsoft word in computing the grades. They also using a manual proccess because they write the grades manually on traditional report card. Professors have to print the grading sheets in hard copy to be able to pass their finalize grade sheet into the registrar office. Passing the hard copy of grade sheet to the registrar office may add the time consumed by the professors because they have to wait for the registrar office to finalize or approved their grades sheet before they can release it to their students. There are so many thing that must be written on the report card susch as the names, sections and of course the different grades etc. It can cause the delay of releasing the cards beacause there are so many card of the students that must finished manully and it cannot be done on a short period of time. To provide solution to the problem encountered by the organization CSU Web Based Report Card for K to 12 is proposed.            ",
            'year' => '2018',
            'keywords' => ['CSU', 'Web Based', 'Report Card', 'K to 12', 'Student'],
            'confirmed_by_id' => 3,
            'advisers_id' => 8,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'MVL-OBS Monte Vierde Lodge Online Booking System',
            'abstract' => "The Monte Vierde Lodge Online Booking System was developed to help customers to book easily and fast. Methods and techniques that the developers are going to use in said project, was the registration of the customer, booking and then change/updated reservation for the customer area. For the admin or employee , the developers include also the log in of the admin for the viewing of the customers' data, booking information and list of guests that already checked out in the lodging house. And also, in this project, the developers have a limitation in which the online payment is excluded. The developers can manage and give more detailed and specific techniques to let the website more presentable and qualified as a basis for the future purposes. The website features user-friendly interface for its welcoming page wherein it displays the different kinds of rooms, services it offers and the frequently asked questions section so that the guests can conveniently book for the rooms and avail the services they want easily. It has different modules both in the client and admin side. The client side has Home, Services, Room Gallery, Booking, FAQs, Contact, Manage Bookings, and Send Feedbacks modules while the admin side has Guest List, Room Booking, Approved Bookings, Check-out Guests, Messages modules. The admin and client side are designed depending on the functionalities that is given to them but overall, it never fails to communicate to their guest because of the good features of the system like leading the business with good valuable sales, giving a good first impression to the guest with its pages, and many more.            ",
            'year' => '2018',
            'keywords' => ['MVL-OBS', 'Monte Vierde Lodge', 'Online Booking', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'CGP Birthing Home Scheduling System',
            'abstract' => "We all know that technology is a huge part of our daily life. You can't sleep without setting up an alarm. When you wake up, first thing you do is look for your phone to see updates and to know what time it is. Even though some people are againts the changes brought on by technology , it is still big help to our day today lives. On this study,the researchers focused on a technology improvement of a certain establishment. The researchers conducted a research to help Catandunganon's to have a better service from CGP Birthing Home In this study, researcher will promote innovative procedures that will make CGP Birthing Home more accessible and taking into account  the latest technology that we have in the island. CGP Birthing Home doesn't have yet an existing system or website, so the researchers proposed a system that can help them grow their business and at the same time make it easier for the patients to connect on thier lying in. Since we are all busy, this will be a way to save time through registering  their information on the website. The website that our team is promoing will make your  life better . You'll consume less time registering your account, you can authomatically sign in for your next log in, you can easily set your appointments, you can edit your profile and also you still have control to cancel your appointments and the system will notify you through your account. The management can freely add information of new patients, and physicians as well and both user can monitor and have the authority to update the information on the patient's profile. The management will give you accessible website that you can check the staff and services provided, as well as the prices of each service. Through this, patient's can also inform the facility on the other things they want to  be checked up, look for the available schedule of doctors, know when they can come to the clinic and know thier hospital bills. This innovation will provide a better service for Catandunganon's thinking of availing CGP Birthing Home services.",
            'year' => '2018',
            'keywords' => ['CGP', 'Birthing Home', 'Scheduling', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Bislig Elementary Management System (BEMS)',
            'abstract' => "Bislig Elementary Management System (BEMS) is a management system used to manage student data. It deals with all kinds of student details academic relates reports, batch details and other related information.  This study focused in the authomation of a student records and school supplies primarily to futher the effciency of data processing. It is designed to provide timely retrival of information and immediate access to records such as student information, school supplies. The software developmemt applied prototyping which enabled the developer to provide a system with overall functionality. A structure analysis technique known as data flow diagram (DFD) was used to present a graphical representation of data processes in the organization. Local Area Network (LAN) base server will be used for easier access.            ",
            'year' => '2018',
            'keywords' => ['Bislig Elementary', 'Management', 'System', 'BEMS'],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'CSU-GAD Profiling System',
            'abstract' => "This system was developed to help the GAD(Gender and Development) Office in managing and keeping records of every student and employee of Catanduanes State University. It is also a systematic approach in gathering data and information about the number of population of the students and employees of the said school. This will help eliminate the paper-based database of gathering information. It also a tool in keeping updated records of students and employees. Likewise, for faster retrieval of information as and when required. Profiling system focused mainly in infographic statistics of students and employees in bar graph form. Statistical graphs is an important tool. Graphical form of information is easier to analyze data. In addition, it has a feature that segregates gender of students and employees including LGBTQ(Lesbian, Gay, Bi-sexual, Transgender and Queer). Consequently, it is said that the GAD office only provides segregation of genders in Male and Female but because of the fair and equal rights, it is proposed that LGBTQ must be included in gender segregation.            ",
            'year' => '2018',
            'keywords' => ['CSU-GAD', 'Profiling', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'iChoose Voting System',
            'abstract' => "The proponents developed a system entitle iChoose Voting System. It is an electronic way of choosing a leader through web-driven applications which is the easiest and  most convenient way for the voter to vote during election period. iChoose Voting System will help the COMELEC Staff and candidates in conducting an election without encountering many difficulties and lessen thier paper works. It will eliminate the line-ups and any other procedures that the students were encounting every election period. It provides an efficient and effective way of election. As a result, the users may  save time and effort upon using this system. This system provides security and accessibility of every data entered in the database, it has two end users: the COMELECT serves as the administrator of the system and student as voters. The technologies that the team used to project have two concepts of division, in the hardware category, the project will use personal computers to facilitate the matter or purpose of the proposal during its designing and implementing period for the software.            ",
            'year' => '2018',
            'keywords' => ['iChoose', 'Voting', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'CSU Alumni Portal (CSU-ALUPORT)',
            'abstract' => "This proposed system was developed because of the problem that the alumni office is still manually processing the recording of alumni status. Which leads to having difficulty in conversation. To fulfil this propblem we proposed a web based system for the alumni to finish the problem and to make it easy for them to talk each other, easy to manage alumni's files and personal data, to know there status in life, and for the admin to easily update the alumni's present account. This proposed system can improve the availabilities of alumni to become a part of institution. The Catanduanes State University Alumni and Placement Services is the office assigned to keep the alumni records and their employment tracer. They are also posting job fairs or job vacancies to help other alumni of the university. With this problem, the developer came up with an idea of a web-based process. Since the existing system has encountered many problems like manual process in communication, the developer propose to create and implement the CSU Almuni Portal (CSU Alu-Port). This system can help those alumni to organize some events that they could attend to, such as alumni homecoming, training session, inviting and reminding alumni of upcoming events, arranging work practices, trace every batches to know his/her employment status and update their recent job or new job. This system can also share job opportunities, picture and any other things that can be shared. They can also chat either public or by their development, overlall less time management for them.            ",
            'year' => '2018',
            'keywords' => ['CSU Alumni Portal', 'CSU-ALUPORT'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Rural Impact Sourcing Events and Training Reservation System',
            'abstract' => "Rural Impact Sourcing Events and Training Reservation System is a web-based system that will help RIS Hub Center Streamline and elinimate problems the RIS Administrator encounter with the current process providing an upgraded reservation system. Accourding to the RIS Administrator, she is currently facing problems regarding with the easy, organized registrationand monitoring of customers who wants to undergo training. This is due to the inability and shortened time of the RIS Adminitrator to accomodate all interested customers with lots of work to do for the reason that the said organizationhas no reservation yet. The proposed system will develop a new way to provide a secure and efficient method of reservation. Both customer and management can save their time in terms of processing the business activities in RIS Hub Center. RIS Administrator's work will be lighter as well as the transaction between customers and management with easy monitoring and online registration in efficient way.The proposed system will surely benefit the RIS Hub Center, RIS Administrator and the customers as soon as it will implemented. RISEARTS will be capable of providing an efficient web-based reservation system wherein customers can reserve training slot as well providing a secure database management system. Customers can also view reservation process and can be used by any interested customers, and administrators facilitated by CSU-CICT RIS. The RIS Adminitrator will only be the one to manage the proposed system for posting of upcoming events and trainings, check uploaded scanned receipts for confirmation of reservation, add and update trainings,assign number of training slots and provide certificates. The customers can only create their account, view and reserve trainings, print certificates and upload captured image of receipt as proof that he/she has already paid for a specific training. The proposed system will undergo payment method through Land Bank of the Philippines(LBP). The proposed system delimits on cancellation of paid reservation of the customer, and selection of seat and the RIS administrator cannot directly confirm the uploaded copy of receipt unless it has not yet been checked in the RIS account that the specific customer had already paid.",
            'year' => '2018',
            'keywords' => ['Rural Impact Sourcing', 'Events', 'Training', 'Reservation', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Betterlife A Web Application For Couples For Christ, Youth For Family and Life ( CFC- YFL)',
            'abstract' => "The CFC-YFL Catanduanes Web Application aims to manage all sorts of data and information to ensure attainment of its goals and objectives where you can access anytime and anywhere even in mobile phones through online services. It will provide the emerging needs for accurate and relevant data and reliable information such sa bews and updates of upcoming events and online interaction to strengthen each YFL member's information plus the whole organization's mission and vision. This system with well-integrated procedures that can make much faster and more accurate than the manual system. And it leads to organizational changes that range from day-to-day operation and for easy access it provides for the end users. The proposed system covers the interface and database of the CFC-YFL web application and shall only provide the proper information of every member and event. It can only operate adding and upadating its database. The features of this newly  proposed system will include create, read, update process which will help in keeping and organizing the data for security and future use. In this systems proposal the better life will present some of the problems identified at the current system of Couples of Christ Youth for Family and Life Organization and suggest possible solution with description of their organizational, financial and procedural , cost and benefits. The team will then offer a recommendation based upon the analysis of the current system, a summary is included at the end of the proposal. Based on the current information systems, better life team recommending that Couples of Christ Youth for Family and Life  move forward with a solution that entails a system they can use for faster transaction.            ",
            'year' => '2018',
            'keywords' => ['Betterlife', 'Web Application', 'Couples For Christ', 'Youth For Family and Life', 'CFC-YFL'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Attend-tion A student attendance system using near field communication technology',
            'abstract' => "Recent technological advances have increased the availability, volume and capability of information management in today's world. The Attend-tion A Student Attendance System has been proposed to facilitate the attendance process and to make the changes in the learning environment more effective.It has developed to assist students in College of Information and Communication Technology in achieving an automatic attendance by the use of Near Field Communications (NFC) Technology and to provide faculties with an easily managed student attendance system. This project is useful for the faculty and student by providing them a useful, automatic attendance system. Professors will not have to make an attendance sheets and attendance system. Professors will not have to make an attendance sheets and student will not have to wait for any papers to sign anymore.The researchers are planning to utilize the powerful database management, data retrieval and data manipulation and will provide more ease for managing the data than manually maintaining in the documents. This project is useful for saving valuable time and reduces the huge paper work.            ",
            'year' => '2018',
            'keywords' => ['Attend-tion', 'Attendance', 'System', 'Near Field Communication', 'Technology'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Parish Record System (ST. John the Baptist Parish of Bato, Catanduanes)',
            'abstract' => "Parish Record System is developed to give a solution to current problem encountered by the St. John the Baptist Parish with their paper-based system. This proposed system will help their transaction especially when keeping their records secured. The proposed system is a standalone system. The target beneficiary for the proposed system is the St. John the Baptist Parish. The person that can access the system is the admin which is the parish secretary. Given that the Parish still use that kind of system, they usually encounter this kind of problems and as of now they are reaching out to use an information system where their transactions can be easily done. Including th used of informaton system for recording data of the parishioner in which it will become a great advantage to the secretary in keeping their record secured. The iam why the parish is not still involving in any automated transaction is due to financial issues. Manual recording using ledger and pen is much cheaper than a computerized system, which requires a machine and software, Expenses can add up fast with cost for printers, paper, ink and other supplies. These systems suffer from higher rate of inaccuracy, and they are much slower that computerized systems. It can waste both money and time.            ",
            'year' => '2018',
            'keywords' => ['Parish Record System', 'St. John the Baptist Parish', 'Bato', 'Catanduanes'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'ACCRED A File Management System for Catanduanes State University, Quality Assurance Services Office',
            'abstract' => "The AccreD File Management System is a web-based system which is capable of managing pdf documents in the storing and retrieval process. The primary aim of the AcceD File Management System is to help the Quality Assurance Office in managing all stored documents that are related to Accreditaion. One of the objectives of the system is to make the document transaction easier and  more efficient and to avoid redundant storing  and printing of documents that takes time and cost. The ACCRED File Management System has four core modules; the upload module which enables the clerk to upload PDF files into 10 different areas; The Download module, this enables the users or visitors of the system to download softcopy or print the document; the view modules, this enables users to view stored pdf before downloading. The generate module, the system generates timely reports about the stored documents in different areas. The developers of the system expect that after the successful development of the Accred File Management System it will be usable and applicable to the target beneficiary which is the Quality Assurance office (QAS). This research is important because this will make a big impact in the target office. The system is primarily designed to meet the needs of the QAS office. Furthermore the developer of the system will be responsible in the development, implementation and management of the system for futher improvements.            ",
            'year' => '2018',
            'keywords' => ['ACCRED', 'File Management System', 'Catanduanes State University', 'Quality Assurance Services Office'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Student iCare System',
            'abstract' => "The Student iCare Sytem was developed in order to help the school clinic to accomplish the task efficiently by the way of implementing this kind of new system to replace their old system. This system is capable of managing all data about the personal information of patient and inventory of machine which is the most important data in their clinic, that this data is considered as the references for creating reports and statement. The planning phase of this system is from gathering all the required informaton to determine the problem of the existing system and the next phase is the analysis wherein this part is responsible for creating solutions for the problems. This two phases is the most  crucial part of the development cycle because the next phases will depends on what are the instructions or procedure given from this first two phases, although the programming part is also one of most critical part it is still depend on the planning and analysis phases. The next phase is the programming where the coding for function begins and what will be the user interaction of the system for the user, designing the system for easier understanding of clients and admins, and also creating restriction for the different types of user for their specific access.The last phase is the maintenance of the system, at this phase the implementation is done and the beta testing is begin. It means the admin the client are given thet chances to access the system already for checking the system if the fuctions that will be expecting is running no bugs or error. When an error occur the programmer will debug the system as soon as possible and if the beta testing is done and no more error or modification the system will be now officially ready for transaction. The development of the system is not only the last part but the proponents are also required of creating a documentation of the system to be able to create the soul of the system that means all the ideas, information, and source codes of the system is written to avoid by the oned who did not create the system for their own benefits that this written work will be responsible for the rights of the developer or creator. The contents of this documentation are the problem context, objectives of the system, related literature/system that proves that this system is functional for specific tast that the first systems are replace by the new systems that makes innovations, and the programming language that to be used for developing the system, and the diagrams for explaining the flow of the data inside the system and also the flow of development process of the system. The last parts of this documentation are the source code of the system, reference, user's guide nad the vitae of every proponent of this research.",
            'year' => '2018',
            'keywords' => ['Student iCare System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 11,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Language Translator Application (L-Trans App)',
            'abstract' => "Language Translator Application (L-trans App) is a kind of mobile application which can translate Catanduangonon's dialect into Filipino, English and any other different languages in Catanduanes. The purpose of this mobile application is to provide an audio for pronunciation, convert text and speech and transfer the meaning of the original text into another language very carefully. The beneficiaries of this mobile application are the tourist and also the people who live in Catanduanes. For some reasons it helps the users to translate their language through text and speech translation into what they want to translate to able to understand by the people they are talking with. Our mobile application platform is simple, easy and gathering feedback from the users, user-friendly graphical user interface, scalable and can be use offline, regardless of time and place, provided that mobile device that will be used had enough power to run the application until user can obtain the needed word. L-trans app focuses on the development of mobile application that is to be used by Catandunganon's and the identified respondents of the tourist to translate the Catandunganons dialect into Filipino into English language. The mobile application will be specifically developed for smartphones and tablets having an Andriod 5.0 version (Lollipop) up to Andriod version 8.1 (Oreo). This mobile application will be effective because the user can use for personal languages translator or possess the proper language at particular places.Through this application in the future the developer can see that there is a lot of tourist that come here in Catanduanes and user will not be shy to speak in own language which is Catandunganon's because user have now  our apps that they can use to help theme to communicate in other  people.            ",
            'year' => '2018',
            'keywords' => ['Language Translator Application', 'L-Trans App'],
            'confirmed_by_id' => 3,
            'advisers_id' => 8,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Foodclick: Mobile-Based Canteen Food Ordering System',
            'abstract' => "The purpose of this project is to develop a mobile-based canteen food ordering system that can be used to alter the traditional ordering system that currently implemented in the canteens. It is a system that enable customer of food to place their order online at any time and any place inside the campus. The traditional system that using by the canteens is the traditional manual ordering system which means all works and procedurews is recorded through manpower manual. The reason to develop the system is due to the issues facing by the food industry. These issues are such as peak hour-long queue issues, increase of take away foods that visitors, speed majoy requisite of food preparation , limited promotion and advertising on current strategy, and quality control of food management issues. This system is designed  for canteens. The choose methodology for this project is throwaway prototyping methodology. This is because majority of the target user do not have experience in using mobile-based system in food ordering procedure as they implement traditional ordering sytem previously. Therefore, this methodology enables developer  to communicate with target user through using prototyping, which can let target user to review, evaluate, visualize and learn about the system before the actual implementation of the final system. Futhermore, the system is a mobile based which is in  Android operating system.  It is also the highlighted feature of the system which limited the ordering procedures to mobile based as portable and mobility is the current trend. Besides that, with this feature it also provides a degree of level of self service for targeted users' consumers, as they can place order themeselves through using the mobile application.            ",
            'year' => '2018',
            'keywords' => ['Foodclick', 'Mobile-Based', 'Canteen', 'Food Ordering', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'DSWD Online Financial Assistance Application',
            'abstract' => "Department of Social Welfare and development (DSWD) offers different financial assistance programs to Filipinos such as student assistance and medical assistance. The DSWD Virac, Catanduanes branch offer assistance program. Applicants will be able to apply to the DSWD program through the website . They only have to fill out the online application forma and attach  the pictures of the needed documents. The DSWD employees will verify  the information sent by  the applicants and the applicants will receive an SMS notification once their application has been approved together with the time and date of the interview that they have to do in person in the DSWD office. If the application has been disapproved, the applicants will also receive SMS notification regarding the disapproval together with the instructions on what to do next for their application to be approved. The system is also able to generate a pdf form of the online application.            ",
            'year' => '2019',
            'keywords' => ['DSWD', 'Online Financial Assistance', 'Application'],
            'confirmed_by_id' => 3,
            'advisers_id' => 12,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Handover: Hospital to hospital patient referral form transmitting System',
            'abstract' => "This system was developed to provide a computer network connection between hospitals that will be used to send transferring patient referral form electronically. This system will open a new way of communication between hospitals, create a digitized medical record and eliminate paper based based referral form that results some issues like prone to damage. With this system it will help the hospital by having time to prepare the necessary action for the patient's needs before the patient arrives using the referral form that they received as a basis. Hospital medical services would improve by achieving a less hassle transaction. This system will also serve as a basis for medical staff towards advanced modem technology in the medical field.            ",
            'year' => '2019',
            'keywords' => ['Handover', 'Hospital', 'Patient Referral', 'Form', 'Transmitting', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 12,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'I-TAP (CICT Faculty Class Monitoring  System via NFC)',
            'abstract' => "In the College of Information and Communication Technology both the studens and the professor's attendance are both taken. For the professors, a piece of paper is used for signing. The I-Tap (Faculty Class Monitoring System via NFC) is created to replace the traditional way of monitoring the professor's attendance which is the pen and paper. The system will implement the NFC (Near Field Technology) for the input data. This way it only needs one simple tap of the NFC card to the NFC scanner. The admin can monitor the faculty's attendance using a PC or a Anroid device which is connected to the internet. If the professor did not trap the registered card on a scheduled subject within the given time, the system will authomalically place a 'not met' status. The admin can set in the schedule if the profesor is on leave, travel or there is a holiday etc. A report in PDF form can be produce abouth the attendance for viewing  or report. With the system the data is safely stored for the future purposes. By using the system, it will reduce the consumption of paper. It will also save someone from the trouble of carrying the attendance sheet every scheduled room. The NFC scanner will placed and installed in every laboratory rooms in the CICT and NFC cards will be assigned and registered to the teaching staff in the beginning of the semester. A spare card will be given in case a card is lost or not working. The project team's objective is to have a fast and convenient way of getting the faculty class attendance. To generate an attendance report and avoid the reliance of other personnel in processing the class monitoring process. The system's limitation is that the problem caused by a power interruption is not controlled by the system also the whereabouts of the professor after tapping the NFC for the system for the attendance is will not be monitored and it is outside  the capabilities of the system.            ",
            'year' => '2019',
            'keywords' => ['I-TAP', 'CICT', 'Faculty Class Monitoring', 'System', 'NFC'],
            'confirmed_by_id' => 3,
            'advisers_id' => 12,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Online Web-Based Scholarship Application and recording system in LGU-Caramoran',
            'abstract' => "This system was developed to help the LGU-Caramoran Scholarship Program in managing the application and keeping records of every applicants of the Municipality of Caramoran. This will help eliminate paper-based that will save time and a timely and transparent  manner. With its application the user not spend more time and effort for the availability of the service. The need for employing this modernization will benefit an organization's operation that will cater a boundless avenue for storing and retrieving voluminous information without literary occupying space unlike the information stored in a form of books or any form of paper documents. In addition, the project intends to reduce the voluminous paperworks in an office which means less time to spend in searching for files and reduce the errors to the Local Government Unit and its Scholar and LGU-Admin/Executive Assistant I in order to make their work faster and convenient.            ",
            'year' => '2019',
            'keywords' => ['Online', 'Web-Based', 'Scholarship', 'Application', 'Recording', 'System', 'LGU-Caramoran'],
            'confirmed_by_id' => 3,
            'advisers_id' => 13,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Precious Bros Construction Profiling and Payroll Management System Using Barcode',
            'abstract' => "A General development in any situation that affects human lives is inevitable. All aspect of human lives had become at risk, from the way of living, food security, growth of bank's wealth management and business is part of the trend. It is important to know and uderstand trends so that can trade and transact business rather then be againts it. The proponets aim to develop a system to generate and monitor the information of all the employees profile and the management of payroll to speed up the time needed in recording and updating the data. This application was created using Precious Bros Construction Management System Using Barcode.            ",
            'year' => '2019',
            'keywords' => ['Precious Bros Construction', 'Profiling', 'Payroll Management', 'System', 'Barcode'],
            'confirmed_by_id' => 3,
            'advisers_id' => 16,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Natasha Sales Inventory System',
            'abstract' => "Natasha store is a well-know  store because of its unique goods and services that has been offered to the customers.The staff were able to build a good connection between them and the customer's so that they may able to establish an assurance that the customers will come back to satisfy again their needs. Behind of this positive attribute of the business, there is still a point wherein they lack of some trends in the industry, and one is the technology. Technology is an art, as well as a skill, that contains different techniques, methods and processes used in the production of goods and services to accomplish a certain objective of a business. The Natasha store is the focus of this feasibility study made by researchers. The purpose of this project is to provide a computerized and automated sales and inventory system for tracking inventory levels, order and sale of the natasha products that can be also used in the business in order to achieve development. Keeping in track of inventory stocks and sales will be the key of having a better system of their business compared to their direct competitors.            ",
            'year' => '2019',
            'keywords' => ['Natasha', 'Sales', 'Inventory', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'SFRIMS - Student and Faculty Research Information Management System',
            'abstract' => "Over time, information and communications technology (ICT) have shown uprecedented changes to the services and operations of modern research keeping. Today, carrying out research keeping task and services through information and communication technology (ICT) are established to complement all types of research office, but still unsubstantiated in the majority of school, office and other agencies that keeps research record. The Student and Faculty Research Management Information System provides organized tool in performing task and services in school, office and other research keeping agencies from basic to complementary. The administrator can add newly acquired the peroject documentation. Research can easily search projects title and quickly view the project content through the system. The administrator can monitor researcher who registered and entered the research office. Adding project documentation in the system is through Portable Data Format (PDF), and can be done by the system without manual operating.            ",
            'year' => '2019',
            'keywords' => ['SFRIMS', 'Student', 'Faculty', 'Research', 'Information', 'Management', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Pro Populo Virac Cathedral Record Management System',
            'abstract' => "We're living in a world in which computers and internet connections became a primary necessity to sustain human needs and satisfaction. Many organizations now are embracing the power of modern technologies to provide better services to their customers. Modern transactions were widely recognized and accepted throughout the nation, but in our province, there are still a handful of institutions and organizations which are taking the traditional way of keeping and generating their records, one example is our churches. We all knew that issuance and keeping of church records such as Baptismal, Confimation, Marriage,and Burial Certificates and scheduling of masses or special events sush as Baptism, First Communion, Confirmation, Weddings and Necro logical/Burial mass requires more time and effforts if it's manually done. Putting the data of parishioners in the computerized database will provide great advantages. With the computer-based record management every transaction on the said services will be beneficial considering that automation of services are the key features of the system. The recommended system will give safer storage of church records, fast retrieval of records, maintains reliability and accuracy, and faster tracking of data. The development of Pro Populo ( Virac Cathedral Record Management System ) will help abreast the continuous demand for quality and efficient service. The objectives of the proposed system is to automate the manually maintained existing system of the office particularly to every transaction related to their parishioners and mass or special events records. To save time and effort executing the transactions within the office.To design a secured module that could store, protect and manage records within the office and to minimize the space needed in managing records.            ",
            'year' => '2019',
            'keywords' => ['Pro Populo', 'Virac Cathedral', 'Record Management', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'CSU College Online Application System',
            'abstract' => "The greate emergence of computers give away to easier access of information that leads to increase production, efficiency and reliability. The increasing urbanity of communication technologies to be utilized in different actions and the necessity of automating everything from paper-and -pen-based, to absolute computer control. Catanduanes State University is an institution that passionately delivers excellent intruction, fosters cutting edge research, and encourage socially responsive technologies. A college admission or student admission refers to the process of applying for entrance examination to institution or university or higher education. The internet has increased the use of online application because data could be easily and readily accessed as well as documented. The proposed system is target on allowing admission decision to be made faster and more efficiently (paper-based) which is manually documented.            ",
            'year' => '2019',
            'keywords' => ['CSU College', 'Online Application', 'System'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Gatepass Management System with NFC (GPMS)',
            'abstract' => "The problem encountered by the Chief Administrative Office (CAO) that the proponets found are: applicants just go to the CAO and ask for the requirements. Then submit it then will proceed to the Cashiering Services Office (CSO) ffor payment to the gate pass sticker. However, the cashier will find for the formt that will be given by the CAO so the applicant will go back to CAO and ask for the form and proceed to the CSO the finally a receipt will be issued. And proceed to Security Office for the gate pass issuance. There is no monitoring fofr vehicles in the campus. The proponets proposed a system for reducing the process and monitoring the vehicles entering the campus. This would make a current system more effective and efficient. The proponets proposed a system called Gate Pass Management System with NFC. A system that will change the gate pass sticker to NFC card. The proposed system will reduce the paperwork. Once the applicant taps their card on the NFC scanner their information will display on the screen, only if the applicant registers their card. Futhermore, this is called 'Tap and Go!' system. In oder to fully understand the system, the proponents will train for personnel who will manage the system especially using the NFC hardware. In addition, the proponets create a user manual in cased there are frequently asked question.            ",
            'year' => '2020',
            'keywords' => ['Gatepass Management', 'System', 'NFC', 'GPMS'],
            'confirmed_by_id' => 3,
            'advisers_id' => 9,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Online Grade System: A case of College of Information and Communication Technology',
            'abstract' => "The project is about having an online grading system in Catanudanes State University instead of the traditional manner of grading and releasing students' progress report cards in printed form, commonly referred to as class cards. Therefore, the research came up with the development of an Online Grading System: A Case of CICT enables the students to view their grades online without going to the university which is quite hard at this time. Also, this enables the faculty to easily manage the grades of the students and generates printable grading sheets. The system will only need an internet connection and browser. The development approach employed in this study was rapid application development (RAD). This was based on a study by Chien (2020) that found that it was best for small-medium projects, web-based or mobile application and that it was suitable for a short development period. Using the ISO/IEC 9126 standard, which tackles some of the well-known human biases that can have a negative impact on the delivery and perception of a software development project, the system evaluation was focused on functionality and usability. The system's grand mean for students was 3.55, while the faculty's grand mean was 3.95, both of which where rated 'Excellent' for functionality. As for usability, the grand mean for students was 3.40, which was rated 'Very Satisfactory', while the faculty's rating was 3.75. which was rated 'Exellent'. As a recommendation for the future researchers, the researchers suggest that recreate the system using a popular framework so that it can be maintained properly.            ",
            'year' => '2021',
            'keywords' => ['Online Grade System', 'College of Information and Communication Technology'],
            'confirmed_by_id' => 3,
            'advisers_id' => 14,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Quick Response Code-Based Solution: Towards CICT Contactless Tracing Form',
            'abstract' => "The manual process of visitor check-in at the College of Information and Communacation Technology, with a goal of collecting details purposely for contact tracing, posed many risk and issues about health, privacy, and record management. Thus, the research aimed to design and develop a web-based contact tracing system that utilized QR code in accessing the contactless tracing form, to manage visitor logs, and to notify them of announcements relevant to contact tracing. A descriptive developmental  approach was used to justify the study and develop the proposed system. The system was developed using Modified Waterfall Model and evaluated using the ISO/IEC 9126-1 or the software quality model. There were 50 respondents it the study, consists of individuals who have different levels of knowledge and perception of QR code. Based on the results of the survey, the researchers found out that most of the respondent shows positive perception towards the QR code and its use. This factor was linked to the results of the evaluation wherein respondents, after using the system, were satisfied on its functionality and usability.            ",
            'year' => '2021',
            'keywords' => ['Quick Response Code-Based Solution', 'CICT', 'Contactless Tracing Form'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();

        $research = new Research([
            'title' => 'Catanduanes State University Student Online Store',
            'abstract' => "Student's Online Store (S.O.S) is developed to be implemented at the Federated College Student Council (FCSC) office for the benefit of CSU students in elementary, high school and college. The main process of this system is advertising unused school materials by posting it online and making deal to the interested buyers to have an income. The aim of this project is to build virtual communication between students regarding on how they will deal business with each other. The proposing team's main gaol is to provide best service and engage students to e-commerce.            ",
            'year' => '2023',
            'keywords' => ['Catanduanes State University', 'Student Online Store'],
            'confirmed_by_id' => 3,
            'advisers_id' => 15,
            'faculty_in_charge_id' => 5,
        ]);
        $research->save();
    }
}
