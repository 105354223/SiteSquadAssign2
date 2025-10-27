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

        <div class="hero-section">
          <h1>Improving Digital Servicing for Everyone</h1>
           <p class="hero-subtitle">SiteSquad is dedicated to modernizing government services through innovative IT solutions and digital platforms that serve citizens better.</p>
        </div>
               <div class="services-showcase">
                  <h2>Our Digital Service Platforms</h2>
              <div class="service-platforms">
                 <div class="platform">
            <!-- Image Source: Unsplash - Team Collaboration -->
               <img src="images/collaboration.jpg" alt="Team collaboration in digital services" class="platform-img">
            <div class="platform-content">
                  <h3>Career Opportunities Portal</h3>
                  <p>Discover exciting IT positions within government digital services. Browse current openings and find your perfect role in shaping the future of public service.</p>
                   <a href="jobs.php" class="platform-link">Explore Available Positions</a>
            </div>
        </div>
        
        <div class="platform">
            <!-- Image Source: Unsplash - Government Building -->
            <img src="images/building.jpg" alt="Government building and infrastructure" class="platform-img">
         <div class="platform-content">
                <h3>Online Application System</h3>
                <p>Submit your Expression of Interest through our secure digital portal. Streamlined process with real-time tracking and instant confirmation.</p>
                <a href="apply.php" class="platform-link">Start Your Application</a>
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
        
        <div class="team-collaboration">
            <!-- Free stock image - Source unknown -->
         <img src="images/side-img.jpg" alt="Our team collaborating on digital projects" class="collaboration-img">
          <div class="collaboration-content">
            <h3>Collaborative Digital Environment</h3>
            <p>Our team works together to create innovative solutions that serve citizens better. From concept to deployment, we prioritize user experience and technological excellence.</p>
            <p>Join professionals who are passionate about making a difference through technology and public service.</p>
       </div>
    </div>
             <h3><strong>Our Commitment</strong></h3>

             <p>We are committed to serving with transparency, accountability, and efficiency.
                Our focus is not only on creating opportunities but also on delivering services
                that strengthen trust between the government and the people it serves.</p>
                
        <div class="technology-innovation">
           <h3>Driving Digital Transformation</h3>
        <div class="innovation-grid">
        <div class="innovation-item">
            <h4>Modern Infrastructure</h4>
            <p>Leveraging scalable architecture and robust systems to deliver reliable government services to all citizens.</p>
        </div>
         <div class="innovation-item">
            <h4>Secure Systems</h4>
            <p>Implementing enterprise-grade security measures through collaborative efforts to protect citizen data and government assets.</p>
         </div>
          <div class="innovation-item">
            <h4>Accessible Design</h4>
            <p>Creating services that work seamlessly across all platforms, ensuring maximum accessibility for every citizen.</p>
          </div>
      </div>
    </div>
            <h3><strong>Join Us</strong></h3>
            <p>Looking to be part of something bigger? At SiteSquad, every role contributes to
                shaping the future of digital governance. Whether you are a student, a professional,
                or someone eager to contribute to public service, there's a place for you in our
                mission.

                Visit our <a href="jobs.html">Jobs</a> to explore current opportunities or head to
                <a href="apply.html">Apply Now</a> to start
                your application today
            </p>
            <p><b>Want to know more about us?</b> Visit <a href="about.html">About Us.</a></p>
        </section>
                    <img src="images/side-img.jpg" alt="Representative image of the website theme" class="sideImage">
    </main>

    <?php
    include 'Inc_Files/footer.inc';
    ?>

</body>

</html>