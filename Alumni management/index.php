<!-- Create the Home Page of the Project -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<nav>
<label class="logo"></label>
        <div class="left">
          <img src="download.png" alt="NBU" style="border: 1px solid black;" >
          <div>Department of Computer Science & Technology</div>
        </div>
  <ul class="nav-links">
     <li class="item"><a href="#">Home</a></li>
     <li class="item"><a href="">About Us</a></li>
     <li class="item"><a href="view_alumni1.php">Alumni</a></li>
     <li class="item"><a href="view_faculty_1.php">Faculty</a></li>
     <li class="item"><a href="view_student_1.php">Students</a></li>
     <li class="item"><a href="studenthome.php">Galary</a></li>
     <li class="item"><a href="#contact">Contact</a></li>
     <li><a href="login.php" class="btn btn-success">Admin Login</a></li>
     <!-- <li><a href="ragister.php" class="btn btn-success">Register</a></li> -->
  </ul>
</nav>

<div class="section1">
  <!-- <label class="img_text">Welcom to the Alumni Database of Department of Computer Science & Technology, NBU</label> -->
  <div class="slide">
  <img class="main_img" src="slide/download.jpg" alt="">
  </div>
  <div class="slide">
  <img class="main_img" src="slide/comp.jpg" alt="">
  </div>
  <div class="slide">
  <img class="main_img" src="slide/DSC_0199.jpg" alt="">
  </div>
  <div class="slide">
  <img class="main_img" src="slide/hall.jpg" alt="">
  </div>
  <div class="slide">
  <img class="main_img" src="slide/server.jpg" alt="">
  <!-- <div class="text">Server Room</div> -->
  </div>
  <div class="slide">
  <img class="main_img" src="slide/library.jpg" alt="">
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
</div>

<script src="index.js"></script>

<div class="container">
        <p>Welcom to the Alumni Database of Department of Computer Science & Technology, NBU</p>
    </div>
<div class="container1">
  <div class="row">
    <div class="col-md-4">
        <h1>Alumni today are the best source of jobs, donation & knowledge capital for your institute, so get them back by signing up for ALUMNI today!</h1>
    </div>
    <div class="col-md-8">
        <p>Alumni of a institute generally stay in touch with their immediate friends but find it hard to stay connected with other college mates. Contact between alumnni can be used to forge business connection and to gain references or insight in a new field. Alumni work can consist of alumni mentoring students, organizing alumni days, having training sessions during alumni days for alumni, inviting alumni to ive lectures, arranging work practices and proposing topicsof theses, raise funds for organizatons. It is important to carry out a good follow-up marketing of alumni events.</p>
    </div>

  </div>

</div>
<hr>
 <div class="sponsor">
		<div class="sdiv1" style="display: flex;">
			<div class="ugc" style=" box-shadow: 1px 2px 5px 4px rgb(6, 68, 68); margin: 8px;">
				<a title="" href="https://www.ugc.ac.in/" class="related_img" target="_blank">
				  <img src="UGC.jpg" height="80px" width="250px">
				</a>
			  </div>
			  <div class="naac" style="box-shadow: 1px 2px 5px 4px rgb(6, 68, 68);  margin: 8px;">
				<a title="" href="http://www.naac.gov.in/" class="related_img" target="_blank">
				  <img src="NAAC.png" height="80px" width="250px">
				</a>
			  </div>
			  <div style="box-shadow: 1px 2px 5px 4px rgb(6, 68, 68);  margin: 8px;">
				<a title="" href="https://banglaruchchashiksha.wb.gov.in/" class="related_img" target="_blank">
				  <img src="WBHED.jpg" height="80px" width="200px">
				</a>
			  </div>
		</div>
		<div class="sdiv2" style="display: flex;">
			<div style="box-shadow: 1px 2px 5px 4px rgb(6, 68, 68);  margin: 8px;">
				<a title="" href="https://www.aicte-india.org/" class="related_img" target="_blank">
				  <img src="AICTE.jpg" height="80px" width="200px">
				</a>
			  </div>
			  <div class="info" style="box-shadow: 1px 2px 5px 4px rgb(6, 68, 68);  margin: 8px;">
				<a title="" href="https://inflibnet.ac.in/" class="related_img" target="_blank">
				  <img src="Inflibnet.png" height="80px" width="200px">
				</a>
			  </div>
			  <div class="swayam" style="box-shadow: 1px 2px 5px 4px rgb(6, 68, 68); margin: 8px;">
				<a title="" href="https://swayam.gov.in/" class="related_img" target="_blank">
				  <img src="swayam.jpg" height="80px" width="200px">
				</a>
			  </div>
		</div>
	</div>

</hr>
<hr>
<session id="contact">
<div class="section2">
      <div class="foot-container">
        <div class="row">
          <div class="col-md-3">
            <h4>Location</h4>
            <ul>
              <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxforddepartment of computer science north bengal university&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" height="120" style="border:0; border-radius: 5px; box-shadow: 1px 2px 5px 4px rgb(9, 51, 51);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </ul>
          </div>
          <div class="col-md-3">
           <h4>Useful Links</h4>
           <ul>
            <li><a href="https://nbu.ac.in/std/placement.aspx" target="_blank">Placement Cell</a></li>
            <li><a href="https://nbu.ac.in/std/scholarships.aspx" target="_blank">Scholarships and Fellowships</a></li>
            <li><a href="https://nbu.ac.in/std/Hostels.aspx" target="_blank">hostels information</a></li>
            <li><a href="https://nbu.ac.in/qls/downloadCentre.aspx" target="_blank">Download Center</a></li>
            <li><a href="https://nbu.ac.in/qls/remoteAccess.aspx" target="_blank">Remote access</a></li>
           </ul>
         </div>
          <div class="col-md-3">
            <h4>Addresses</h4>
            <ul>
              <li><a href="#">Raja Rammohunpur</a></li>
              <li><a href="#">P.O. - N.B.U.</a></li>
              <li><a href="#"> District-Darjeeling</a></li>
              <li><a href="#"> PIN-734013</a></li>
              <li><a href="#"> West Bengal, India</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4>Get In Touch</h4>
            <ul>
              <li><a href="#"><i class="bx bxs-phone"></i> +91 9474390844 / 7908862377</a></li>
              <li><a href="#"><i class="bx bxs-envelope"></i> head@cstnbu.in</a></li>
              <li><a href="#">  <i class="bx bxs-printer"></i> +91 353 2776313 / 2699001</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <!-- <h4>follow us</h4> -->
            <div class="social-links">
              <a href="#"><i class="bx bxl-facebook-circle"></i></a>
              <a href="#"><i class="bx bxl-twitter"></i></a>
              <a href="#"><i class="bx bxl-youtube"></i></a>
              <a href="#"><i class="bx bx-image-alt"></i></a>
            </div>
          </div>
        </div>
      </div><br>
</div>
</session>
</hr>
    <footer>
        <div class="center">
          <p>copright &copy; Department of CST | Developed and maintain by
            <a href="https://www.linkedin.com/in/dipak-masanta-04713a223/" target="_blank">DIPAK MASANTA</a>
            2023,NBU
          </p>
            <!-- copright &copy; www.nbucst.com | Department of CST,NBU || All rights reserved! -->
        </div>
    </footer>

</body>
</html>