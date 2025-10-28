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
		<!--these are the picture for the icons and link to the individual job description.-->
		<div class="careersGrid">
			<div class="careerItem">
				<img src="images/Software_developer.jpg" alt="Software Developer" width="200" height="120">
				<a href="pages/software.html">Software Developer</a>
			</div>
			<div class="careerItem">
				<img src="images/It_security.jpg" alt="IT security Analyst" width="200" height="120">
				<a href="pages/security.html">IT Security Analyst</a>
			</div>
			<div class="careerItem">
				<img src="images/Systems_administrator.jpg" alt="Systems Administrator" width="200" height="120">
				<a href="#">Systems Administrator</a>
			</div>
			<div class="careerItem">
				<img src="images/Data_analyst.jpg" alt="Data Analyst" width="200" height="120">
				<a href="#">Data Analyst</a>
			</div>
			<div class="careerItem">
				<img src="images/Project_manager.jpg" alt="Project manager" width="200" height="120">
				<a href="#">Project Manager</a>
			</div>
		</div>
		<!-- inline CSS -->
		<aside style="background-color: lightblue">
			<h3>Application Information</h3>
			<p>
				<strong>Please note:</strong> To apply for any of the listed positions, you will need to provide
				the correct <strong>5-character job reference number</strong> (e.g., SSQ01, SSQ02).
			</p>
			<p>
				Applications must be submitted through the <a href="apply.html">Apply Now form</a>.
				For assistance, contact us at <a href="mailto:info@sitesquad.gov">info@sitesquad.gov</a>.
			</p>
		</aside>
		<h2><u><b>Working With Us</b></u></h2>
		<p>Our agency is dedicated to strengthening Australia’s digital future by delivering secure, reliable,and
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
		<p><b>Want to know more about us?</b> Visit <a href="about.html">About Us.</a></p>
	</main>

	<?php
    include 'Inc_Files/footer.inc';
    ?>
</body>

</html>