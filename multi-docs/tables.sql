

Users Table:
Organizations Table:
Jobs Table:
-- Applications Table: 
Resumes/CVs Table:
Skills Table:
Education Table:
Work Experience Table:
Notifications Table:
Reviews/Ratings Table:
Locations Table:
Categories/Tags Table:
Proffessional Certificates:
Language Table:
Availability Table:
Agreement Acknowledgment Table:
Comments Table:

-- Users Table: 
-- User_ID	INT	Primary key, unique identifier for the user
-- First_Name	VARCHAR(50)	First name of the user
-- Last_Name	VARCHAR(50)	Last name of the user
-- Email	VARCHAR(100)	Email address
-- Password	VARCHAR(100)	Password (hashed)
-- Date_of_Birth	DATE	Date of birth of the user
-- Gender	VARCHAR(10)	Gender of the user (optional)
-- Phone_Number	VARCHAR(20)	Phone number of the user (optional)
-- Address	VARCHAR(255)	Address of the user (optional)
-- Country	VARCHAR(50)	Country of residence of the user (optional)
-- PreferredIndustry VARCHAR(50)	Type or category of the industry (pull from job titles)
-- Has_Passport	BOOLEAN	Indicates whether the user has a passport
-- Has_Police_Clearance	BOOLEAN	Indicates whether the user has a police clearance certificate
-- Reference_Source	VARCHAR(100)	Source of the reference (e.g., colleague, friend, job portal)
-- Additional_Reference	VARCHAR(255)	Additional reference information (e.g., names of selected agents or others)

-- 1. Organizations Table: A -m 
-- $table->id('Org_ID');
-- $table->string('Org_Name', 100);
-- $table->string('Website', 255)->nullable();
-- $table->string('Country', 50)->nullable();
-- $table->text('Description')->nullable();
-- $table->date('Founded_Date')->nullable();
-- $table->timestamps();

-- 3. Jobs Table: U -m -c -r
-- $table->id('job_id');
-- $table->string('job_title', 100);
-- $table->foreignId('Org_ID')->constrained('Organizations')->onDelete('cascade')->onUpdate('cascade');
-- $table->text('description')->nullable(); 
-- $table->text('responsibilities')->nullable();
-- $table->text('requirements')->nullable();
-- $table->decimal('salary_range', 10, 2)->nullable();
-- $table->date('posted_date');
-- $table->date('deadline_date')->nullable();
-- $table->timestamps();

-- 2. Applications Table: 
-- $table->id('Application_ID');
-- $table->foreignId('Job_ID')->constrained('Jobs');
-- $table->foreignId('user_id')->constrained('users');
-- $table->dateTime('Application_Date');
-- $table->unsignedBigInteger('Resume_ID')->nullable();
-- $table->dateTime('Interview_Date')->nullable();
-- $table->text('Interview_Notes')->nullable();
-- $table->timestamps();

-- 1. Resumes/CVs Table: U
-- $table->id('resume_id');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('file_name', 255);
-- $table->string('file_path', 255);
-- $table->dateTime('upload_date');
-- $table->timestamps();

-- 2. Skills Table: U
-- $table->increments('Skill_ID');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('Skill_Name', 100);  
-- $table->text('Description')->nullable();  
-- $table->string('Skill_Level', 50);  
-- $table->timestamps();                      

-- 3. Education Table: U
-- $table->id('education_id');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('degree', 100)->nullable();
-- $table->string('field_of_study', 100)->nullable();
-- $table->string('institution', 100)->nullable();
-- $table->string('location', 100)->nullable();
-- $table->integer('graduation_year')->nullable();
-- $table->text('description')->nullable();
-- $table->timestamps();

-- 4. Work Experience Table: U 
-- $table->increments('Experience_ID');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('Company_Name', 100);
-- $table->string('Position', 100);
-- $table->date('Start_Date');
-- $table->date('End_Date')->nullable();
-- $table->text('Description');
-- $table->string('Location', 100);
-- $table->timestamps();

-- 5. Notifications Table: 
-- $table->increments('Notification_ID');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('Type', 50); 
-- $table->string('Subject', 255);
-- $table->text('Message');                   
-- $table->dateTime('Sent_Date'); 
-- $table->dateTime('Read_Date')->nullable(); 
-- $table->string('Status', 50);

-- 6. Proffessional Certificates: U
-- $table->increments('Certificate_ID');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('Certificate_Name', 100)->nullable();
-- $table->string('Issuing_Authority', 100)->nullable();
-- $table->date('Issue_Date')->nullable();
-- $table->date('Expiry_Date')->nullable();
-- $table->string('Description', 500)->nullable();
-- $table->timestamps();

-- 7. Language Table: U
-- $table->increments('Language_ID');
-- $table->foreignId('user_id')->constrained('users')s;
-- $table->string('Language', 50);
-- $table->string('Proficiency', 50);

-- 8. Availability Table: U
-- $table->increments('Availability_ID');
-- $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
-- $table->time('Start_Time');
-- $table->timestamps();

-- 9. Agreement Acknowledgment Table: U
-- $table->increments('Acknowledgment_ID');
-- $table->foreignId('user_id')->constrained('users');
-- $table->string('Agreement_Type', 100);
-- $table->text('Agreement_Content');
-- $table->timestamps();

-- 10. Comments Table: U
-- $table->increments('comment_id');
-- $table->foreignId('user_id')->constrained('users');
-- $table->text('comment_text');
-- $table->timestamps();

-- 11. Images Table: U
-- $table->increments('image_id');
-- $table->string('file_name');
-- $table->boolean('status')->default(1);
-- $table->string('storage_path');
-- $table->timestamps();

-- Job_categories Table: U
-- $table->bigIncrements('id');
-- $table->string('name');
-- $table->string('slug');
-- $table->timestamps();

-- job_job_categories Table: U -m -c -r
-- $table->bigIncrements('id');
-- $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade')->onUpdate('cascade');
-- $table->foreignId('id')->constrained('jobs_categories')->onDelete('cascade')->onUpdate('cascade');
-- $table->timestamps();

-- Organization_categories Table:
-- $table->bigIncrements('id');
-- $table->string('name');
-- $table->string('slug');
-- $table->timestamps();

-- organizations_org_categories Table: U -m -c -r
-- $table->bigIncrements('id');
-- $table->foreignId('Org_ID')->constrained('organizations')->onDelete('cascade')->onUpdate('cascade');
-- $table->foreignId('id')->constrained('Organization_categories')->onDelete('cascade')->onUpdate('cascade');
-- $table->timestamps();


-------------------------------------------------------------
-- this is the current best strategy for tracking progress --
-------------------------------------------------------------

Progress Table:
$table->id();
$table->foreignId('user_id')->constrained('users');
$table->string('action', 255);
$table->integer('progress_percentage');
$table->text('progress_details')->nullable();
$table->integer('previous_progress_percentage')->nullable();
$table->timestamps();

public function store(Request $request)
{
    // Process the users input (e.g., name and age)
    
    // Define progress tracking information
    $action = 'initial_information_added';
    $progressPercentage = 10; // Assuming an initial progress of 10%
    $progressDetails = 'User added their name and age';
    $previousProgressPercentage = 0; // Assuming no previous progress

    // Insert a new record into the progress tracking table
    ProgressTracking::create([
        'application_id' => $applicationId, // Assuming you have an application_id
        'user_id' => auth()->user()->id, // Assuming you're tracking the user who performed the action
        'action' => $action,
        'progress_percentage' => $progressPercentage,
        'progress_details' => $progressDetails,
        'previous_progress_percentage => $previousProgressPercentage,
    ]);

    // Continue with the rest of your controller logic
}
-------------------------------------------------------------
-- this is the current best strategy for tracking progress --
-------------------------------------------------------------




------------------------------------------------------------
------------------------------------------------------------
-- Admin side Admin side Admin side Admin side Admin side --
------------------------------------------------------------
------------------------------------------------------------

Admins Table:
-- $table->increments('id');
-- $table->uuid('uuid');
-- $table->string('username', 190)->unique();
-- $table->string('name')->nullable();
-- $table->string('avatar')->nullable();
-- $table->string('email')->unique();
-- $table->string('password', 60);
-- $table->boolean('is_admin')->default('0');
-- $table->string('remember_token', 100)->nullable();
-- $table->timestamps();

