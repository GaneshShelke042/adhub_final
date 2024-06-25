<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Language Selection</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  /* Custom CSS for checkboxes and form */
  .form-check-input {
    margin-top: 0.3rem; /* Adjust top margin for alignment */
  }
  .form-check-label {
    font-weight: normal; /* Prevent label text from appearing bold */
  }
  .container {
    width: 30%; /* Adjust container width as needed */
    margin-top: 2rem; /* Add top margin to the container */
  }
</style>
</head>
<body>
<section class="home-section" style="margin-top: -50%;">
<div class="container">
  <!-- <h2 class="text-center">Language Selection</h2> -->
  <form action="/submit" method="POST">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label">Select Language for Branding</label>
      <div class="col-sm-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="english" id="english" name="languages[]">
          <label class="form-check-label" for="english">English</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="marathi" id="marathi" name="languages[]">
          <label class="form-check-label" for="marathi">Marathi</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="hindi" id="hindi" name="languages[]">
          <label class="form-check-label" for="hindi">Hindi</label>
        </div>
        <!-- Add more languages as needed -->
      </div>
    </div>
    <div class="form-group d-flex justify-content-center">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
  </form>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
