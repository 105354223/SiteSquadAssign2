<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A government agency enhancing its IT and digital services">
	<meta name="author" content="Julien Ambrose, Kashfia Rahman, Tamim Ahmed, Khaled Rafid">
	<title>SiteSquad Jobs</title>
	<link rel="stylesheet" href="styles/styles.css">

	<!-- Embedded CSS -->
	<style>
		aside {
   			width: 25%;
   			border: 2px solid #333;
   			padding: 10px;
		}
		.jobs-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			gap: 20px;
			margin: 20px 0;
		}
		.job-card {
			border: 1px solid #ddd;
			border-radius: 8px;
			padding: 20px;
			background: white;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			transition: transform 0.2s;
		}
		.job-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 4px 15px rgba(0,0,0,0.15);
		}
		.job-image {
			width: 100%;
			height: 150px;
			object-fit: cover;
			border-radius: 4px;
			margin-bottom: 15px;
		}
		.job-reference {
			background: #007bff;
			color: white;
			padding: 4px 8px;
			border-radius: 4px;
			font-size: 0.9em;
			display: inline-block;
			margin-bottom: 10px;
		}
		.job-title {
			font-size: 1.3em;
			font-weight: bold;
			margin: 10px 0;
			color: #333;
		}
		.job-details {
			margin: 10px 0;
		}
		.job-detail {
			margin: 5px 0;
			font-size: 0.95em;
		}
		.job-salary {
			color: #28a745;
			font-weight: bold;
		}
		.job-location, .job-type {
			color: #666;
		}
		.job-description {
			margin: 10px 0;
			font-size: 0.9em;
			line-height: 1.4;
			color: #555;
		}
		.job-closing {
			background: #ffc107;
			color: #856404;
			padding: 4px 8px;
			border-radius: 4px;
			font-size: 0.85em;
			display: inline-block;
			margin-top: 10px;
		}
		.job-expired {
			background: #dc3545;
			color: white;
			padding: 4px 8px;
			border-radius: 4px;
			font-size: 0.85em;
			display: inline-block;
			margin-top: 10px;
		}
		.apply-btn {
			display: inline-block;
			background: #007bff;
			color: white;
			padding: 8px 16px;
			text-decoration: none;
			border-radius: 4px;
			margin-top: 10px;
			font-weight: bold;
			transition: background 0.2s;
		}
		.apply-btn:hover {
			background: #0056b3;
		}
		.apply-btn-expired {
			background: #6c757d;
			cursor: not-allowed;
		}
		.apply-btn-expired:hover {
			background: #5a6268;
		}
		.section-title {
			margin-top: 30px;
			color: #333;
			border-bottom: 2px solid #007bff;
			padding-bottom: 10px;
		}
		.no-jobs {
			text-align: center;
			padding: 40px;
			background: #f8f9fa;
			border-radius: 8px;
			margin: 20px 0;
		}
	</style>
</head>

<body>
	<?php
    include 'Inc_Files/header.inc';
    ?>
	
	<main class="content">
		<h1>Explore our Available Positions</h1>
		<p style="text-align: center;">
			Join our dedicated team and contribute to enhancing digital services for citizens. Explore a variety of IT
			<br>
			and technology roles designed to drive innovation, strengthen security, and deliver smarter solutions <br>
			across government.
		</p>

		<!-- Available Jobs Grid Section -->
		<section>
			<h2 class="section-title">Available Positions</h2>
			
			<?php
// Database connection
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $password, $sql_db);

if (!$conn) {
    echo "<div class='no-jobs'><p>Unable to connect to the database. Please try again later.</p></div>";
} else {
    // Create Jobs table if it doesn't exist (empty table)
    $createJobsTable = "CREATE TABLE IF NOT EXISTS Jobs (
        job_reference VARCHAR(10) PRIMARY KEY, 
        job_title VARCHAR(50) NOT NULL,
        salary_range VARCHAR(50),
        description TEXT,
        requirements TEXT,
        location VARCHAR(100),
        work_type VARCHAR(50),
        posted_date DATE,
        closing_date DATE
    )";

    if ($conn->query($createJobsTable)) {
        // Fetch ALL jobs from the database
        $query = "SELECT job_reference, job_title, salary_range, description, requirements, location, work_type, closing_date 
                  FROM Jobs 
                  ORDER BY closing_date ASC";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<div class='jobs-grid'>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                // Map job titles to image files
                $imageMap = [
                    'Software Developer' => 'Software_developer.jpg',
                    'IT Security Analyst' => 'It_security.jpg',
                    'Systems Administrator' => 'Systems_administrator.jpg',
                    'Data Analyst' => 'Data_analyst.jpg',
                    'Project Manager' => 'Project_manager.jpg'
                ];
                
                $imageFile = $imageMap[$row['job_title']] ?? 'default_job.jpg';
                $imagePath = "images/{$imageFile}";
                
                // Check if job is still open
                $isExpired = (strtotime($row['closing_date']) < time());
                $statusClass = $isExpired ? 'job-expired' : 'job-closing';
                $statusText = $isExpired ? 'Closed: ' . $row['closing_date'] : 'Closes: ' . $row['closing_date'];
                
                echo "<div class='job-card'>";
                echo "<img src='{$imagePath}' alt='{$row['job_title']}' class='job-image' onerror=\"this.src='images/default_job.jpg'\">";
                echo "<div class='job-reference'>{$row['job_reference']}</div>";
                echo "<div class='job-title'>{$row['job_title']}</div>";
                echo "<div class='job-details'>";
                echo "<div class='job-detail job-salary'>{$row['salary_range']}</div>";
                echo "<div class='job-detail job-location'>{$row['location']}</div>";
                echo "<div class='job-detail job-type'>{$row['work_type']}</div>";
                echo "</div>";
                echo "<div class='job-description'>{$row['description']}</div>";
                echo "<div class='{$statusClass}'>{$statusText}</div>";
                echo "<br>";
                
                if ($isExpired) {
                    echo "<a href='#' class='apply-btn apply-btn-expired' onclick='return false;'>Position Closed</a>";
                } else {
                    echo "<a href='apply.php' class='apply-btn'>Apply Now</a>";
                }
                echo "</div>";
            }
            
            echo "</div>"; // Close jobs-grid
        } else {
            echo "<div class='no-jobs'>";
            echo "<h3>No Current Openings</h3>";
            echo "<p>There are no job openings available at the moment. Please check back later for new opportunities.</p>";
            echo "</div>";
        }
    } else {
        echo "<div class='no-jobs'><p>Error creating jobs table: " . $conn->error . "</p></div>";
    }
    
    mysqli_close($conn);
}
?>
		</section>
		
		<!-- Application Information Aside -->
		<aside style="background-color: lightblue; margin-top: 30px;">
			<h3>Application Information</h3>
			<p>
				<strong>Please note:</strong> To apply for any of the listed positions, you will need to provide
				the correct <strong>5-character job reference number</strong> (e.g., SSQ01, SSQ02).
			</p>
			<p>
				Applications must be submitted through the <a href="apply.php">Apply Now form</a>.
				For assistance, contact us at <a href="mailto:info@sitesquad.gov">info@sitesquad.gov</a>.
			</p>
		</aside>
		
		<h2><u><b>Working With Us</b></u></h2>
		<p>Our agency is dedicated to strengthening Australia's digital future by delivering secure, reliable,and
			citizen-focused services. We are seeking skilled professionals to help modernise IT systems, protect,
			critical
			information, and drive innovation across government.

			All listed positions are full-time,Melbourne-based (with flexible hybrid work options), and require
			applicants to
			hold
			Australian work rights. Some roles may also require the ability to obtain a baseline security clearance.

			Select a role above to view the full job description and application details.</p>
		<br>

		<h2><b><u>Career Growth Pathways</u></b></h2>
		<p>Whether you are starting as a graduate or joining as an experienced professional, we provide clear pathways for advancement. From entry-level IT roles to leadership opportunities, SiteSquad is committed to helping you achieve your career goals.</p>
         
		<img src="images/Jobpage.png" width="250" height="150" alt="Job page image"> 
		
	<h2><b><u>Did You Know?</u></b></h2>
	<p><b>➡️ A few surprising facts about our team and the work we do.</b></p>
<p>At SiteSquad, we take pride in the impact of our work but we also enjoy celebrating the lighter side of our journey. Did you know our team has written over 500,000 lines of code to power secure government services and protect more than 10 million citizen records every year? With a workforce representing 15+ cultural backgrounds, we thrive on diversity and fresh ideas, delivering projects at remarkable speed our fastest launch went live in just three weeks. Every day, our analysts process over 1TB of data, helping shape smarter, evidence based decisions, and our commitment to excellence has earned us recognition as a Top Digital Services Innovator for three consecutive years. And while innovation drives us forward, coffee certainly fuels us too — with over 1,200 cups consumed each month, our teams are always energised to keep building the future.</p><br>
<br>
		<p><b>Want to know more about us?</b> Visit <a href="about.php">About Us.</a></p>
	</main>

	<?php
    include 'Inc_Files/footer.inc';
    ?>
</body>
</html>