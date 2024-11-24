<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" href="Assets/logo.jpg" type="image/png">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
 <link rel="stylesheet" href="grp2.css">
 <title>Group 2</title>
 <script>
 function showAlert(event) {
  event.preventDefault();
  alert("Successfully sent");
  document.getElementById("contactFormElement").submit();

 }

 function confirmLogout(event) {
  event.preventDefault();
  const confirmation = confirm("Are you sure you want to log out?");
  if (confirmation) {
   window.location.href = 'logout.php';
  }
 }
 </script>
</head>

<body>
 <div class="header-container">
  <div class="logo">
   <img src="Assets/logo.jpg" alt="Logo" />
  </div>
  <div class="searchbar">
   <form action="grp2.php" method="GET">
    <input type="text" name="query" id="query" onkeyup="showResult(this.value)" placeholder="Name Search">
    <input type="submit" value="Search">
   </form>
  </div>
  <div class="navbar-links">
   <a href="#Team">Home</a>
   <a href="#teams">Team</a>
   <a href="#contact">Contact Us</a>
   <a href="#" class="logoutBtn" onclick="confirmLogout(event)">
    <i class="fas fa-sign-out-alt"></i> Logout
   </a>
  </div>
 </div>
 <div id="livesearch" class="search-results">
  <div class="search-results">
   <?php
      $results = [];
      if (isset($_GET['query'])) {
        $query = htmlspecialchars($_GET['query']);
        foreach ($teamMembers as $member) {
          if (stripos($member['name'], $query) !== false) {
            $results[] = $member;
          }
        }
        if (!empty($query)) {
          if (count($results) > 0) {
            echo "<h3>Search Results:</h3>";
            foreach ($results as $result) {
              echo "<p><strong>Existing Member:</strong> " . htmlspecialchars($result['name']) . "</p>";
              echo "<p>Role: " . htmlspecialchars($result['role']) . "</p>";
            }
          } else {
            echo "<p>Not Existing Member: '" . htmlspecialchars($query) . "'.</p>";
          }
        }
      }
    ?>
  </div>
 </div>
 <button onclick="confirmPrintTeamData()" class="team-data-btn">Team Data</button>
</body>

</html>