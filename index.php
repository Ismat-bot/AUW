<?php
session_start();
function getInitials($firstName, $lastName) {
    $initials = "";
    if (!empty($firstName)) {
        $initials .= strtoupper($firstName[0]);
    }
    if (!empty($lastName)) {
        $initials .= strtoupper($lastName[0]);
    }
    return $initials;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AUW Homepage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="icon.jpg" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

  <!-- HEADER SECTION -->
  <header>
    <div class="top-bar">
      <div class="top-bar-right">

        <a href="alumnae.html">Alumnae</a>
        <span>|</span>
        <a href="library.html">AUW Library</a>
        <span>|</span>
        <a href="career.html">Career Opportunities</a>
        <span>|</span>
        <a href="contact.html">Contact</a>
        <span>|</span>
        <a href="emergency.html">Emergency Contacts</a>
        <span>|</span>
        <a href="subscribe.html">Subscribe</a>
        <span>|</span>
        <span class="search-icon">🔍</span>
      </div>
    </div>

    <!-- Bottom white nav -->
    <div class="main-nav">
      <div class="logo">
        <img src="auw-logo.png" alt="AUW Logo" />
      </div>

      <nav class="nav-links">
        <nav class="navbar">
          <ul class="menu">

            <!-- WHO WE ARE -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Who We Are</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Mission & Vision</a></li>
                  <li><a href="#">Statement of Integrity</a></li>
                  <li><a href="#">Accreditation & Recognition</a></li>
                  <li><a href="#">Governance</a></li>
                  <li><a href="#">AUW Management</a></li>
                  <li><a href="#">History</a></li>
                  <li><a href="#">Chittagong, Bangladesh</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="#">Financial Statements</a></li>
                </ul>

                <div class="right-images">
                  <div class="img-box">
                    <img src="image1.jpg" alt="Mission image" />
                    <span class="caption">MISSION &amp; VISION</span>
                  </div>
                  <div class="img-box">
                    <img src="image2.jpg" alt="History image" />
                    <span class="caption">HISTORY</span>
                  </div>
                </div>
              </div>
            </li>

            <!-- ADMISSIONS -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Admissions</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Who Can Apply</a></li>
                  <li><a href="#">How to Apply</a></li>
                  <li><a href="#">Tuition & Fees</a></li>
                  <li><a href="#">Scholarships & Aid</a></li>
                  <li><a href="#">Frequently Asked Questions</a></li>
                  <li><a href="#">About AUW (in Arabic)</a></li>
                </ul>
                <div class="right-images">
                  <div class="image-box" style="background-image:url('image3.jpg');">
                    <a href="#" class="image-btn">CONTACT ADMISSIONS</a>
                  </div>
                  <div class="image-box" style="background-image:url('image4.jpg');">
                    <a href="#" class="image-btn">APPLY</a>
                  </div>
                </div>
              </div>
            </li>

            <!-- ACADEMICS -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Academics</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Pre-Undergraduate Programs</a></li>
                  <li><a href="#">Undergraduate Programs</a></li>
                  <li><a href="#">Masters Programs</a></li>
                  <li><a href="#">Summer School</a></li>
                  <li><a href="#">Faculty</a></li>
                  <li><a href="#">Teaching Fellowship</a></li>
                  <li><a href="#">Research</a></li>
                  <li><a href="#">Center for Climate Change and Environmental Health</a></li>
                  <li><a href="#">Academic Support & Resources</a></li>
                  <li><a href="#">Academic Calendar & Bulletin</a></li>
                </ul>
                <div class="right-images">
                  <div class="image-box" style="background-image:url('image5.jpg');">
                    <a href="#" class="image-btn">ACADEMIC CALENDAR</a>
                  </div>
                  <div class="image-box" style="background-image:url('image6.jpg');">
                    <a href="#" class="image-btn">ACADEMIC SUPPORT</a>
                  </div>
                </div>
              </div>
            </li>

            <!-- STUDENT LIFE -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Student Life</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Our Students</a></li>
                  <li><a href="#">Our Traditions</a></li>
                  <li><a href="#">Student Activities</a></li>
                  <li><a href="#">Center of Leadership and Professional Development</a></li>
                  <li><a href="#">Housing & Dining</a></li>
                  <li><a href="#">Health & Wellness</a></li>
                  <li><a href="#">Mental Health Advisory Board</a></li>
                  <li><a href="#">Life in Chittagong</a></li>
                  <li><a href="#">Safety & Security</a></li>
                  <li><a href="#">AUW Anonymous Complaint Portal</a></li>
                </ul>
                <div class="right-images">
                  <div class="image-box" style="background-image:url('image7.jpg');">
                    <a href="#" class="image-btn">STUDENT ACTIVITIES</a>
                  </div>
                  <div class="image-box" style="background-image:url('image8.jpg');">
                    <a href="#" class="image-btn">APPLY</a>
                  </div>
                </div>
              </div>
            </li>

            <!-- CAMPUS CONSTRUCTION -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Campus Construction</a>
              <div class="dropdown-content"></div>
            </li>

            <!-- IMPACT -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Impact</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Alumnae</a></li>
                  <li><a href="#">Partners</a></li>
                  <li><a href="#">AUW Updates</a></li>
                  <li><a href="#">AUW in the News</a></li>
                </ul>
              </div>
            </li>

            <!-- AUW SUPPORT FOUNDATIONS -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">AUW Support Foundations</a>
              <div class="dropdown-content">
                <ul class="left-menu">
                  <li><a href="#">Denmark</a></li>
                  <li><a href="#">Hong Kong</a></li>
                  <li><a href="#">Japan</a></li>
                  <li><a href="#">UK</a></li>
                  <li><a href="#">US</a></li>
                </ul>
                <div class="right-buttons">
                  <a href="#" class="yellow-button">DONATE</a>
                  <a href="#" class="yellow-button">CONTACT</a>
                </div>
              </div>
            </li>

          </ul>
        </nav>

        <div class="nav-buttons">
          <a class="btn gray" href="apply.html">APPLY</a>
          <a class="btn gold" href="donate.html">DONATE</a>
          <a class="btn yellow" href="contact.html">CONTACT</a>
        </div>
      </nav>

      <!-- USER INFO with login status and initials -->
      <div class="user-info" style="float:right; margin-right:20px; font-weight:bold;">
        <?php if (isset($_SESSION['email'])): 
            $initials = getInitials($_SESSION['user_first_name'] ?? '', $_SESSION['user_last_name'] ?? '');
        ?>
          <span style="background:#6A1B9A; color:#fff; border-radius:50%; width:35px; height:35px; display:inline-block; text-align:center; line-height:35px; font-size:18px; margin-right:10px; font-family:sans-serif;">
            <?= htmlspecialchars($initials) ?>
          </span>
          Hello, <?= htmlspecialchars($_SESSION['user_first_name']) ?>
          | <a href="logout.php">Logout</a>
        <?php else: ?>
          Guest | <a href="login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-left">
      <h2>Empowering Women Through Education</h2>
      <p>Asian University for Women offers liberal arts and sciences education to the region's most talented women.</p>
    </div>
    <div class="hero-right">
      <img src="hero-img.jpeg" alt="AUW Campus" />
    </div>
  </div>

  <!-- AUW UPDATES SECTION -->
  <div class="auw-container">
    <div class="auw-left">
      <img src="updates-img.jpg" alt="AUW students" />
    </div>
    <div class="auw-right">
      <h2 class="auw-title">AUW UPDATES</h2>
      <hr class="auw-underline" />

      <div class="auw-item">
        <p>Inditex will fund the university education of 50 female textile industry workers in Bangladesh for five years</p>
        <a href="#">READ MORE →</a>
      </div>

      <div class="auw-item">
        <p>2024 Annual Report: A Year of Growth and Impact</p>
        <a href="#">READ MORE →</a>
      </div>

      <div class="auw-item">
        <p>Daedalus – Up Close: Asian University for Women</p>
        <a href="#">READ MORE →</a>
      </div>

      <div class="auw-item">
        <p>Asian University for Women honors Dr Paula A Johnson at 11th Commencement Ceremony in Chittagong</p>
        <a href="#">READ MORE →</a>
      </div>

      <div class="auw-item">
        <p>Asian University for Women honors Founding Chancellor, Cherie Blair as Doctor of Justice</p>
        <a href="#">READ MORE →</a>
      </div>

      <a href="#" class="auw-more-button">MORE NEWS STORIES</a>
    </div>
  </div>

  <!-- Footer Section -->
  <div class="footer-section">
    <p>
      Asian University for Women (AUW) adheres to the highest standards of integrity in all its affairs. Still, we recognize, mistakes are made, intentionally or otherwise. Without knowledge of any misdeeds that may have occurred, we are unable to take corrective action. We request the public to notify AUW of any real or suspected misdeed through this anonymous portal. A misdeed is a misdeed — it can be financial malfeasance; sexual harassment; policy or administrative dysfunctions. Regardless of the matter, help us improve AUW by bringing your concerns to our attention through the following anonymous portal: 
      <a href="https://apps.auw.edu.bd/erp/auw/r/auw-erp/anonymous-complaint" target="_blank">
        https://apps.auw.edu.bd/erp/auw/r/auw-erp/anonymous-complaint
      </a>
    </p>
  </div>

  <div class="footer-bar">
    <div class="footer-links">
      <a href="who-we-are.html">About</a>
      <span>|</span>
      <a href="apply.html">Apply</a>
      <span>|</span>
      <a href="career.html">Career Opportunities</a>
      <span>|</span>
      <a href="contact.html">Contact</a>
      <span>|</span>
      <a href="donate.html">Donate</a>
      <span>|</span>
      <a href="news.html">News</a>
      <span>|</span>
    </div>

    <div class="footer-socials">
      <i class="fab fa-facebook-square"></i>
      <i class="fab fa-twitter"></i>
      <i class="fab fa-youtube"></i>
      <i class="fab fa-linkedin"></i>
      <i class="fab fa-instagram"></i>
    </div>

    <img src="auw-logo.png" alt="AUW Logo" />
    <h3>ASIAN UNIVERSITY FOR WOMEN</h3>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2024, Asian University for Women. Trademark Notice. All Rights Reserved. <a href="#">Privacy</a></p>
    <p>This copyright is held jointly by the Trustees of the Asian University for Women and the Board of Directors of the Asian University for Women Support Foundation.</p>
    <p>
      Please mail all checks to 
      <a href="https://maps.google.com/?q=PO Box 380739, Cambridge, MA 02238, USA" target="_blank">
        PO Box 380739, Cambridge, MA 02238, USA
      </a>
    </p>
    <p><em>Yelling Mule – Boston Web Design | Ransomware Protection</em></p>
  </div>

  <script src="script.js"></script>
</body>
</html>
