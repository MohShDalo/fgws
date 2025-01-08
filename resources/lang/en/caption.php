<?php

return [
	'project_name'=>'',
	'cms'=>[
		'menu-item'=>[
			'title'=>'Menu list',
			'user-menu'=>[
				'title'=>'Users Managment',
				'index'=>'View Users',
				'add'=>'Add User',
				'view'=>'View User \':name\'',
				'edit'=>'Edit User \':name\'',
				'report'=>'Users Reports',
			],
			'freelancer-menu'=>[
				'title'=>'Freelancers Managment',
				'profile'=>'Profile Managment',
				'index'=>'View Freelancers',
				'add'=>'Add Freelancer',
				'view'=>'View Freelancer \':name\'',
				'view-mine'=>'View My profile',
				'edit'=>'Edit Freelancer \':name\'',
				'report'=>'Freelancers Reports',
			],
			'manger-menu'=>[
				'title'=>'Mangers Managment',
				'index'=>'View Mangers',
				'add'=>'Add Manger',
				'view'=>'View Manger \':name\'',
				'edit'=>'Edit Manger \':name\'',
				'report'=>'Mangers Reports',
			],
			'skill-menu'=>[
				'title'=>'Skills Managment',
				'index'=>'View Skills',
				'add'=>'Add Skill',
				'view'=>'View Skill \':name\'',
				'edit'=>'Edit Skill \':name\'',
				'report'=>'Skills Reports',
			],
			'certificate-menu'=>[
				'title'=>'Certificates Managment',
				'index'=>'View Certificates',
				'add'=>'Add Certificate',
				'view'=>'View Certificate \':name\'',
				'edit'=>'Edit Certificate \':name\'',
				'report'=>'Certificates Reports',
			],
			'education-menu'=>[
				'title'=>'Educations Managment',
				'index'=>'View Educations',
				'add'=>'Add Education',
				'view'=>'View Education \':name\'',
				'edit'=>'Edit Education \':name\'',
				'report'=>'Educations Reports',
			],
			'language-menu'=>[
				'title'=>'Languages Managment',
				'index'=>'View Languages',
				'add'=>'Add Language',
				'view'=>'View Language \':name\'',
				'edit'=>'Edit Language \':name\'',
				'report'=>'Languages Reports',
			],
			'experience-menu'=>[
				'title'=>'Experiences Managment',
				'index'=>'View Experiences',
				'add'=>'Add Experience',
				'view'=>'View Experience \':name\'',
				'edit'=>'Edit Experience \':name\'',
				'report'=>'Experiences Reports',
			],
			'portfolio-menu'=>[
				'title'=>'Portfolios Managment',
				'index'=>'View Portfolios',
				'add'=>'Add Portfolio',
				'view'=>'View Portfolio \':name\'',
				'edit'=>'Edit Portfolio \':name\'',
				'report'=>'Portfolios Reports',
			],
			'reference-menu'=>[
				'title'=>'References Managment',
				'index'=>'View References',
				'add'=>'Add Reference',
				'view'=>'View Reference \':name\'',
				'edit'=>'Edit Reference \':name\'',
				'report'=>'References Reports',
			],
			'post-menu'=>[
				'title'=>'Posts Managment',
				'index'=>'View Posts',
				'add'=>'Add Post',
				'view'=>'View Post \':name\'',
				'edit'=>'Edit Post \':name\'',
				'report'=>'Posts Reports',
			],
			'job-menu'=>[
				'title'=>'Jobs Managment',
				'index'=>'View Jobs',
				'add'=>'Add Job',
				'view'=>'View Job \':name\'',
				'edit'=>'Edit Job \':name\'',
				'report'=>'Jobs Reports',
			],
			'comment-menu'=>[
				'title'=>'Comments Managment',
				'index'=>'View Comments',
				'add'=>'Add Comment',
				'view'=>'View Comment \':name\'',
				'edit'=>'Edit Comment \':name\'',
				'report'=>'Comments Reports',
			],
			'offer-menu'=>[
				'title'=>'Offers Managment',
				'index'=>'View Offers',
				'add'=>'Add Offer',
				'view'=>'View Offer \':name\'',
				'edit'=>'Edit Offer \':name\'',
				'report'=>'Offers Reports',
			],
			'reaction-menu'=>[
				'title'=>'Reactions Managment',
				'index'=>'View Reactions',
				'add'=>'Add Reaction',
				'view'=>'View Reaction \':name\'',
				'edit'=>'Edit Reaction \':name\'',
				'report'=>'Reactions Reports',
			],
			'chat-menu'=>[
				'title'=>'Chats Managment',
				'index'=>'View Chats',
				'add'=>'Add Chat',
				'view'=>'View Chat \':name\'',
				'edit'=>'Edit Chat \':name\'',
				'report'=>'Chats Reports',
			],
			'message-menu'=>[
				'title'=>'Messages Managment',
				'index'=>'View Messages',
				'add'=>'Add Message',
				'view'=>'View Message \':name\'',
				'edit'=>'Edit Message \':name\'',
				'report'=>'Messages Reports',
			],
		],
		'fields'=>[
			'user'=>[
				'name'=>'Name',
				'image'=>'Image',
				'cover'=>'Cover',
				'email'=>'Email',
				'contact_number'=>'Contact Number',
				'birth_date'=>'Birth Date',
				'gender'=>'Gender',
				'marital_status'=>'Marital Status',
				'nationality'=>'Nationality',
				'city'=>'City',
				'country'=>'Country',
				'address_details'=>'Address Details',
				'roleable_type'=>'Roleable Type',
			],
			'freelancer'=>[
				'main_career'=>'Main Career',
				'place_of_birth'=>'Place Of Birth',
			],
			'manger'=>[
				'company_name'=>'Company Name',
				'company_objectives'=>'Company Objectives',
				'company_employees'=>'Company Employees',
			],
			'skill'=>[
				'title'=>'Title',
				'category'=>'Category',
				'show'=>'Show',
				'freelancer_id'=>'Freelancer',
			],
			'certificate'=>[
				'course_title'=>'Course Title',
				'hours'=>'Hours',
				'start_date'=>'Start Date',
				'end_date'=>'End Date',
				'organizer'=>'Organizer',
				'category'=>'Category',
				'file'=>'File',
				'show'=>'Show',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'education'=>[
				'title'=>'Title',
				'score'=>'Score',
				'show_score'=>'Show Score',
				'start_date'=>'Start Date',
				'end_date'=>'End Date',
				'organizer'=>'Organizer',
				'category'=>'Category',
				'special_rank'=>'Special Rank',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'language'=>[
				'language'=>'Language',
				'category'=>'Category',
				'general_score'=>'General Score',
				'speaking_score'=>'Speaking Score',
				'writing_score'=>'Writing Score',
				'listening_score'=>'Listening Score',
				'show_details'=>'Show Details',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'experience'=>[
				'postion'=>'Postion',
				'company_name'=>'Company Name',
				'company_address'=>'Company Address',
				'start_date'=>'Start Date',
				'end_date'=>'End Date',
				'category'=>'Category',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'portfolio'=>[
				'title'=>'Title',
				'release_date'=>'Release Date',
				'link'=>'Link',
				'category'=>'category',
				'mockup_image'=>'Mockup Image',
				'file'=>'File',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'reference'=>[
				'full_name'=>'Full Name',
				'contact_number'=>'Contact Number',
				'email'=>'Email',
				'postion'=>'Postion',
				'note'=>'Note',
				'freelancer_id'=>'Freelancer',
			],
			'post'=>[
				'content'=>'Content',
				'image'=>'Image',
				'owner_id'=>'Owner',
			],
			'job'=>[
				'content'=>'Content',
				'needed_postion'=>'Needed Postion',
				'max_price'=>'Max Price',
				'max_time'=>'Max Time',
				'expected_start_date'=>'Expected Start Date',
				'worker_id'=>'Worker',
				'owner_id'=>'Owner',
			],
			'comment'=>[
				'content'=>'Content',
				'created_by_id'=>'Created By',
				'post_id'=>'Post',
			],
			'offer'=>[
				'content'=>'Content',
				'price'=>'Price',
				'time'=>'Time',
				'status'=>'Status',
				'status_reason'=>'Status Reason',
				'owner_id'=>'Owner',
				'job_id'=>'Job',
			],
			'reaction'=>[
				'type'=>'Type',
				'created_by_id'=>'Created By',
				'post_id'=>'Post',
			],
			'chat'=>[
				'title'=>'Title',
				'first_member_id'=>'First Member',
				'second_member_id'=>'Second Member',
				'created_by_id'=>'Created By',
			],
			'message'=>[
				'content'=>'Message',
				'created_by_id'=>'Created By',
				'chat_id'=>'Chat',
			],
			'common'=>[
				'id'=>'#',
				'note'=>'Note\ :text',
				'created_at'=>'Create date',
				'updated_at'=>'Update date',
				'deleted_at'=>'Delete date',
				'some_common_labels_for_fields'=>'Text',
			]
		],
		'pages'=>[
			'login'=>[
				'password'=>'Password',
				'password_confirmation'=>'Password confirm',
				'login'=>'Login',
				'remember_me'=>'Remember me',
				'forgot_password'=>'Do you forget password?',
				'change_password'=>'Change password',
				'manage_account'=>'Account Manage',
				''=>''
			],
			'user'=>[
				'extra_label_inside_page'=>'Text',
			],
			'freelancer'=>[
				'extra_label_inside_page'=>'Text',
			],
			'manger'=>[
				'extra_label_inside_page'=>'Text',
			],
			'skill'=>[
				'extra_label_inside_page'=>'Text',
			],
			'certificate'=>[
				'extra_label_inside_page'=>'Text',
			],
			'education'=>[
				'extra_label_inside_page'=>'Text',
			],
			'language'=>[
				'extra_label_inside_page'=>'Text',
			],
			'experience'=>[
				'extra_label_inside_page'=>'Text',
			],
			'portfolio'=>[
				'extra_label_inside_page'=>'Text',
			],
			'reference'=>[
				'extra_label_inside_page'=>'Text',
			],
			'post'=>[
				'extra_label_inside_page'=>'Text',
			],
			'job'=>[
				'extra_label_inside_page'=>'Text',
			],
			'comment'=>[
				'extra_label_inside_page'=>'Text',
			],
			'offer'=>[
				'extra_label_inside_page'=>'Text',
			],
			'reaction'=>[
				'extra_label_inside_page'=>'Text',
			],
			'chat'=>[
				'extra_label_inside_page'=>'Text',
			],
			'message'=>[
				'extra_label_inside_page'=>'Text',
			],
		]
	],
	'home' =>[
        'last-jobs'=>'Last jobs',
        'no-posts'=>'No posts to view',
        'no-jobs'=>'No jobs to view',
        'post-title'=>':name, publish a post (:date)',
        'job-title'=>':name, request a :job (:date)',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
		'text_in_landing_page'=>'Text',
	],
	'labels'=>[
		'select-label'=>'Choose an item ...',
		'save'=>'Save',
		'reset'=>'Reset',
		'actions'=>'Actions',
		'update'=>'Update',
		'edit'=>'Edit',
		'delete'=>'Delete',
		'search'=>'Search',
		'logout'=>'Logout',
		'export-excel'=>'Export Excel',
		'import'=>'Import',
		'print'=>'Print PDF',
		'paginate'=>[
			'count'=>'Record(s) on page',
			''=>'',
		],
		'hint'=>[
			'comment'=>'Write your comment here ...',
			'offer'=>'Write your offer details here ...',
			'price'=>'Write your expected price in $ ...',
			'time'=>'Write your expected time in days ...',
			''=>'',
		],
		'send'=>'Send',
		''=>'',
		''=>'',
		''=>'',
		''=>'',
	]
];
