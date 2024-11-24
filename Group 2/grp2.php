<?php

session_start();
include('connect.php');

$username = isset($_COOKIE['userName']) ? $_COOKIE['userName'] : '';
if ($username) {
    echo "<script>alert('Welcome back, " . htmlspecialchars($username) . "!');</script>";
}

$teamMembers = [
    [
        'name' => 'Allen Jefferson C. Orcino',
        'role' => 'Assistant Leader',
        'course' => 'BSIT',
        'age' => 21,
        'gender' => 'Male',
        'contact' => '09811732889',
        'address' => '208 Molina St. Purok 6 Alabang Muntinlupa City',
        'image' => 'Assets/len.jpg',
        'github' => 'https://github.com/0rcino',
        'facebook' => 'https://www.facebook.com/allen.14.aj/',
        'linkedin' => 'https://www.linkedin.com/in/allenjefferson-orcino-b82924322/?trk=opento_sprofile_topcard',
        'coursera' => 'https://www.coursera.org/user/fba21b844e5e2a0e91abcb31449b73f1'
    ],
    [
        'name' => 'Jhonrey Kyle C. Lugon',
        'role' => 'Leader',
        'course' => 'BSIT',
        'age' => 22,
        'gender' => 'Male',
        'contact' => '09619669812',
        'address' => 'Baranggay Marcelo Green Village Parañaque City',
        'image' => 'Assets/kyle.jpg',
        'github' => 'https://github.com/Gekyume-31',
        'facebook' => 'https://www.facebook.com/jhonreylugon',
        'linkedin' => 'http://www.linkedin.com/in/jhonreykylelugon',
        'coursera' => 'https://www.coursera.org/learner/kyle'
    ],
    [
        'name' => 'Hannah Grace Traya',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 20,
        'gender' => 'Female',
        'contact' => '09510681571',
        'address' => 'Megsha Homeowners Tagle Compound, San Guillermo Street. Putatan, Muntinlupa City.',
        'image' => 'Assets/hannah.jpg',
        'github' => 'https://github.com/hana-tomoe',
        'facebook' => 'https://www.facebook.com/hana.gracia23',
        'linkedin' => 'https://www.linkedin.com/in/hannah-grace-traya-2a4944322',
        'coursera' => 'https://www.coursera.org/learner/hannah-grace-traya-8888'
    ],
    [
        'name' => 'Ian Adrian Porciuncula',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 21,
        'gender' => 'Male',
        'contact' => '09515695918',
        'address' => '200 Pedro Diaz St. Muntinlupa City',
        'image' => 'Assets/ian.png',
        'github' => 'https://github.com/Eyan09',
        'facebook' => 'https://www.facebook.com/Eyaaaaan7',
        'linkedin' => 'http://www.linkedin.com/in/ian-adriann-porciuncula-4126b9322',
        'coursera' => 'https://www.coursera.org/user/685d395df259e193d48f1b3eccdba104'
    ],
    [
        'name' => 'Lester Plandaño',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 20,
        'gender' => 'Male',
        'contact' => '09994531752',
        'address' => ' 19a hyacinth st south Greenheigts village Muntinlupa city',
        'image' => 'Assets/lester.jpg',
        'github' => 'https://github.com/LesterPlandano',
        'facebook' => 'https://www.facebook.com/Lester.Gggggg',
        'linkedin' => 'https://www.linkedin.com/in/lester-planda%C3%B1o-6b86bb322?trk=contact-info',
        'coursera' => 'https://www.coursera.org/user/fba21b844e5e2a0e91abcb31449b73f1'
    ],
    
];

if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);
    $results = [];

    foreach ($teamMembers as $member) {
        if (stripos($member['name'], $query) !== false) {
            $results[] = $member;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "your-email@example.com"; 
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        $successMessage = "Message sent successfully!";
    } else {
        $errorMessage = "There was an error sending your message.";
    }
}
?>
<?php
    include 'header.php';
?>
<div class="team" id="Team">
 <h1>Group 2 <a href="#teams"><span>Our Team</span></a></h1>
 <div class="slideshow-container">
  <div class="slide">
   <img src="Assets/slideshow1.png">
  </div>
  <div class="slide">
   <img src="Assets/slideshow2.png">
  </div>
  <div class="slide">
   <img src="Assets/slideshow3.png">
  </div>
  <div style="text-align:center;">
   <span class="dot"></span>
   <span class="dot"></span>
   <span class="dot"></span>
  </div>
 </div>
 <div class="time-container">
  <p id="realTime"><?php echo $greeting; ?>! Current Time: <?php echo $currentTime; ?></p>
 </div>
 <h1 style="margin-top: 30rem; color: rgb(125, 125, 235);" id="teams">My Team</h1>
 <div class="team_box">
  <?php foreach ($teamMembers as $member): ?>
  <div class="profile">
   <img src="<?php echo $member['image']; ?>">
   <div class="info">
    <h2 class="names"><?php echo $member['name']; ?></h2>
    <button class="info-btn"
     onclick="showInfo('info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>')">Info</button>
    <div id="info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>" class="info-container">
     <header>
      <h1>Information</h1>
     </header>
     <h2><?php echo $member['name']; ?></h2>
     <h4><?php echo $member['role']; ?></h4>
     <p>Course: <?php echo $member['course']; ?></p>
     <p>Age: <?php echo $member['age']; ?></p>
     <p>Gender: <?php echo $member ['gender']; ?></p>
     <p>Contact Number: <?php echo $member['contact']; ?></p>
     <p>Address: <?php echo $member['address']; ?></p>
     <button class="exit-btn"
      onclick="hideInfo('info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>')">Exit</button>
    </div>
    <div class="team_icon">
     <a class="fa-brands fa-github" href="<?php echo $member['github']; ?>" target="_blank"></a>
     <a class="fa-brands fa-facebook" href="<?php echo $member['facebook']; ?>" target="_blank"></a>
     <a class="fa-brands fa-linkedin" href="<?php echo $member['linkedin']; ?>" target="_blank"></a>
     <a class="fas fa-copyright" href="<?php echo $member['coursera']; ?>" target="_blank"></a>
    </div>
   </div>
  </div>
  <?php endforeach; ?>
 </div>
 <section class="contact" id="contact">
  <h2>Contact <span>Us</span></h2>
  <div class="contact-container">
   <img src="Assets/logo.jpg" alt="Contact Image" class="contact-image">

   <form id="contactFormElement" action="submit.php" method="post" onsubmit="return handleFormSubmit(event)">
    <div class="input-group">
     <div class="input-box">
      <input type="text" id="name" name="name" required placeholder="Full Name">
      <input type="email" id="email" name="email" required placeholder="Email"
       value="<?php echo isset($_COOKIE['userEmail']) ? htmlspecialchars($_COOKIE['userEmail']) : ''; ?>">
     </div>
    </div>
    <div class="input-box">
     <input id="number" name="number" type="number" placeholder="Phone Number">
     <input type="text" name="subject" placeholder="Subject">
    </div>
    <div class="input-group-2">
     <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
     <input type="submit" value="Send Message" class="btn3">
    </div>
   </form>
  </div>
 </section>
 <?php
    include 'footer.php';
?>