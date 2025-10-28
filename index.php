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
        .sideImage {
            width: 250px;
            height: auto;
            border-radius: 10px;
            margin-top: 0;
        }
    </style>


</head>

<body>
    <!-- Company Header -->
    <?php
    include 'Inc_Files/header.inc';
    ?>

    <main class="flexContainer">
       <section class="flexContent">

        <div class="heroSection">
          <h1>Improving Digital Servicing for Everyone</h1>
           <p class="heroSubtitle">SiteSquad is dedicated to modernizing government services through innovative IT solutions and digital platforms that serve citizens better.</p>
        </div>
               <div class="servicesShowcase">
                  <h2>Our Digital Service Platforms</h2>
              <div class="servicePlatforms">
                 <div class="platform">
            <!-- Image Source: Unsplash - Team Collaboration -->
               <img src="images/collaboration.jpg" alt="Team collaboration in digital services" class="indexImg">
            <div class="platformContent">
                  <h3>Career Opportunities Portal</h3>
                  <p>Discover exciting IT positions within government digital services. Browse current openings and find your perfect role in shaping the future of public service.</p>
                   <a href="jobs.php" class="platform-link">Explore Available Positions</a>
            </div>
        </div>
        
        <div class="platform">
            <!-- Image Source: Unsplash - Government Building -->
            <img src="images/building.jpg" alt="Government building and infrastructure" class="indexImg">
         <div class="platformContent">
                <h3>Online Application System</h3>
                <p>Submit your Expression of Interest through our secure digital portal. Streamlined process with real-time tracking and instant confirmation.</p>
                <a href="apply.php" class="platformLink">Start Your Application</a>
            </div>
          </div>
        </div>
     </div>
            <h2><u><strong>Welcome to SiteSquad</strong></u></h2>
            <p>
                Welcome to our website, your gateway to exploring job opportunities,
                learning about our services, and getting to know our dedicated team.
                Whether you're looking to join our team, want to learn more about the
                services we offer, or just want to acquaint yourself with our
                organization's mission and values, our website serves as your starting
                point. Navigate through the different sections of our website to
                discover more.
            </p>
        
        <div class="teamCollaboration">
            <!-- Free stock image - Source unknown -->
         <img src="images/side-img.jpg" alt="Our team collaborating on digital projects" class="indexImg">
          <div class="collaborationContent">
            <h3>Collaborative Digital Environment</h3>
            <p>Our team works together to create innovative solutions that serve citizens better. From concept to deployment, we prioritize user experience and technological excellence.</p>
            <p>Join professionals who are passionate about making a difference through technology and public service.</p>
       </div>
    </div>
             <h3><strong>Our Commitment</strong></h3>

             <p>We are committed to serving with transparency, accountability, and efficiency.
                Our focus is not only on creating opportunities but also on delivering services
                that strengthen trust between the government and the people it serves.</p>

        <div class="technologyInnovation">
           <h3>Driving Digital Transformation</h3>
        <div class="innovationGrid">
        <div class="innovationItem">
            <h4>Modern Infrastructure</h4>
            <p>Leveraging scalable architecture and robust systems to deliver reliable government services to all citizens.</p>
        </div>
         <div class="innovationItem">
            <h4>Secure Systems</h4>
            <p>Implementing enterprise-grade security measures through collaborative efforts to protect citizen data and government assets.</p>
         </div>
          <div class="innovationItem">
            <h4>Accessible Design</h4>
            <p>Creating services that work seamlessly across all platforms, ensuring maximum accessibility for every citizen.</p>
          </div>
      </div>
    </div>
            <!-- Career Pathways Section - Matching Actual Job Roles -->
    <div class="careerPathways">
    <h3>Shape Your Career in Digital Government</h3>
    <div class="pathwayOptions">
        <div class="pathway">
            <h4>Software Development</h4>
            <p>Build applications that serve millions of citizens with cutting-edge technology stacks and collaborative development.</p>
            <a href="jobs.php" class="pathwayLink">View Developer Roles</a>
        </div>
        <div class="pathway">
            <h4>IT Security</h4>
            <p>Protect critical infrastructure and ensure data privacy across government systems through innovative security solutions.</p>
            <a href="jobs.php" class="pathwayLink">Explore Security Positions</a>
        </div>
        <div class="pathway">
            <h4>Systems Administration</h4>
            <p>Maintain and optimize government IT infrastructure to ensure reliable service delivery and system performance.</p>
            <a href="jobs.php" class="pathwayLink">Find Admin Opportunities</a>
        </div>
        <div class="pathway">
            <h4>Data Analytics</h4>
            <p>Transform government data into actionable insights that drive policy decisions and service improvements.</p>
            <a href="jobs.php" class="pathwayLink">Explore Analyst Roles</a>
        </div>
        <div class="pathway">
            <h4>Project Management</h4>
            <p>Lead digital transformation initiatives and coordinate cross-functional teams to deliver successful government projects.</p>
            <a href="jobs.php" class="pathwayLink">View Manager Positions</a>
          </div>
      </div>
   </div>
        <!-- Career Growth Section -->
       <div class="careerGrowth">
         <h2>Career Growth Pathways</h2>
         <p>Whether you are starting as a graduate or joining as an experienced professional, we provide clear pathways for advancement.
         <br> From entry-level IT roles to leadership opportunities, SiteSquad is committed to helping you achieve your career goals.</p>
  </div> 
   <div class="quickNav">
    <h3>Quick Access to Our Services</h3>
    <div class="navActions">
        <div class="navAction">
            <a href="jobs.php">
                <strong>Browse Opportunities</strong>
                <span>View all current government IT positions</span>
            </a>
        </div>
        <div class="navAction">
            <a href="apply.php">
                <strong>Start Application</strong>
                <span>Submit your Expression of Interest</span>
            </a>
        </div>
        <div class="navAction">
            <a href="about.php">
                <strong>Our Team</strong>
                <span>Meet the people behind our mission</span>
            </a>
         </div>
     </div>
  </div>
   </section>
    </main>

    <?php
    include 'Inc_Files/footer.inc';
    ?>

</body>

</html>