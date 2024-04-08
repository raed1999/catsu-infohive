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
            'title' => 'Catanduanes State University Electronic Voting System(CSU-EVS)',
            'abstract' => 'The Electronic Voting System (EVS) was developed to facilitate the student election process in the Catanduanes State University due to the fact that manual counting of votes takes so much time. This covers all the election processes starting from registration of candidates name and position to the system after passing the screening test conducted by the Office of the Students Affairs (OSA) up to the printing of election results. This was designed and coded in Visual Studio 2010 which served as the front end...',
            'year' => '2013',
            'keywords' => ['Electronic', 'Voting', 'System', 'CSU'],
            'confirmed_by_id' => 3,
            'advisers_id' => 5,
            'faculty_in_charge_id' => 5,
        ]);

        $research->save();

        $research = new Research([
            'title' => 'CSU-MPC Point of Sale System',
            'abstract' => 'This study deals with the proposed system which is the CSU-MPC POINT OF SALE SYSTEM to be developed by the group which is intended for the use of CSU-MPC Canteen and Grocery. This proposed system is an automated process that will help the organization to manage their daily transaction. The proposed system aims to change their manual process in their daily transaction. Provide a non-time consuming way of selling goods and to avoid income loss in the said grocery and canteen...',
            'year' => '2013',
            'keywords' => ['CSU-MPC', 'POS', 'automated', 'process'],
            'confirmed_by_id' => 3,
            'advisers_id' => 6,
            'faculty_in_charge_id' => 6,
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Department of Information and Communication Technology Electronic File Information and Leave Application for Employee System',
            'abstract' => 'This study deals with our proposed system the Electronic File Information and Leave application for Employee System (eFILES). It is an electronic process that will help the organization manage and access the information about their employees. The purpose of this system is to reduce paper works and get rid of the time-consuming process of the manual way...',
            'year' => '2013',
            'keywords' => ['Electronic', 'File', 'Information'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 7,
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Department of Information and Communication Technology Online Faculty Profiling and Project, Exercises, Activities Retrieval-Submission System (DICT OFP_PEARSS)',
            'abstract' => 'Innovation are inevitable in ICT world. New systems are being proposed to ease the processes made for transaction in a company or organization. In accordance with this, the proponents propose a system, having the DICT Faculty and selected Students as the end users...',
            'year' => '2013',
            'keywords' => ['DICT', 'OFP_PEARSS', 'ICT', 'Faculty', 'Profiling', 'Project', 'Exercises', 'Activities', 'Retrieval-Submission', 'SDLC'],
            'confirmed_by_id' => 3,
            'advisers_id' => 4,
            'faculty_in_charge_id' => 4,
        ]);


        $research->save();

        $research = new Research([
            'title' => 'Institutional Accreditation Centre Accreditation File Keeping System (AFiKs)',
            'abstract' => 'The Catanduanes State University Institutional Accreditation Center is the office responsible in storing documents and files from the different offices of accreditation task force from different colleges/department. Managing and Sorting documents and files of the documents is one of the functions of the office...',
            'year' => '2013',
            'keywords' => ['Institutional', 'Accreditation', 'Centre', 'AFiKs', 'management', 'productivity'],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();

        $research = new Research([
            'title' => 'LTO Online License Application and Examination',
            'abstract' => 'As we go further in a more civilized society, so as the different technologies evolve, technologies that make our lives and tasks easier and comfortable...',
            'year' => '2013',
            'keywords' => ['LTO', 'Online', 'License', 'examination', 'SDLC '],
            'confirmed_by_id' => 3,
            'advisers_id' => 10,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Prosecution Cases Automated Recording System (PCARS)',
            'abstract' => 'The Prosecution Case Automated Record System (PCARS) aims to improve the process into a more convenient way of recording criminal cases from docketing/ recording of complaints...',
            'year' => '2013',
            'keywords' => ['Prosecution', 'Cases', 'Automated', 'Recording System', 'PCARS', 'criminal', 'cases', 'well-organized' ,'records', 'Waterfall'],
            'confirmed_by_id' => 3,
            'advisers_id' => 5,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Automated System for Monitoring of Attendance and Collection of Fines for the College of Information and Communications Technology College of Student Council (CSC) Utilizing Biometric System (BASMA_F4C)',
            'abstract' => 'The most common problem encountered by the officers of the College of Information and Communication Technology is when they conduct events with attendance that students are required to attend...',
            'year' => '2018',
            'keywords' => ['Automated','Monitoring'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Farming Assistant Web Services (FAWS)',
            'abstract' => 'Farming Assistant Web Services is developed to give a solution to the current problem encountered by the farmers in Catanduanes. There is no existing system here in Catanduanes regarding the transaction between the farmers and buyers...',
            'year' => '2018',
            'keywords' => ['Farming-Assistant', 'Web' ,'Services', 'farmers', 'buyers', 'transaction'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();

        $research = new Research([
            'title' => 'Tau Gamma Phi/Tau Gamma Sigma Profiling and Attendance System',
            'abstract' => 'Tau Gamma Phi is an organization, or a group that needs an automated system that will help the admin or user to easily identify if these people are bona-fide members of the group...',
            'year' => '2018',
            'keywords' => ['Tau-Gamma-Phi', 'Tau-Gamma-Sigma', 'profiling', 'attendance', 'Triskelion'],
            'confirmed_by_id' => 3,
            'advisers_id' => 7,
            'faculty_in_charge_id' => 10, // Leave this blank if there is no faculty in charge
        ]);

        $research->save();




    }
}
