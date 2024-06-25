<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sample Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<section class="home-section" style="margin-top: -50%;">
<div class="container">
  <h2>Sample Form</h2>
  <form action="/submit" method="POST">
    <div class="form-group">
      <label for="OfferDetails">Offer Details</label>
      <input type="text" class="form-control"  required>
    </div>
    <div class="form-group">
      <label for="EnterSpecialRequirement">Enter Special Requirement</label>
      <input type="text" class="form-control" required>
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
