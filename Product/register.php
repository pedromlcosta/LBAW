 
  <?php
  include_once("templates/header.html");
  ?>
  
 <?php 
  include_once("nav.html");
 ?>
    <body style="
    padding-top: 70px;
">
  <div class="container">
 <form action="index.html" method="post" >
  <fieldset class="form-group">
    <label for="nameInput">FullName</label>
    <input type="text" class="form-control" id="nameInput" placeholder="Full Name" value="" required>
    
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="" required>

 <label for="selectCourse"> Pick Course</label>
    <select class="form-control" id="selectCourse" required>
      <option>Course1</option>
      <option>Course2</option>
      <option>Course3</option>
      <option>Course4</option>
      <option>Course5</option>
    </select>

    <label for="requestText">Request</label>
    <textarea class="form-control" id="requestText" rows="4" value="" required></textarea>
  </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 
  
  <?php
  include_once("templates/footer.html");
  ?>