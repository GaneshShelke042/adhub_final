<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 20px; /* Adjust the border radius to make it more or less curved */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .form-header {
      text-align: left;
      color: #334151;
      font-weight: 500;
      font-size: 32px;
      text-indent: -1px;
      line-height: 1;
      position: relative;
      margin-bottom: 10px;
    }

    .form-subheader {
      text-align: left;
      color: #334151;
      font-weight: 500;
      /* font-size: 32px; */
      text-indent: -1px;
      line-height: 1;
      position: relative;
      margin-bottom: 20px;
    }

    input,
    textarea,
    select {
      margin-top: 8px;
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }

    .flex-container {
      display: flex;
      gap: 10px;
    }

    .button-container {
      text-align: center;
    }

    button {
      margin-top: 20px;
      padding: 10px;
      cursor: pointer;
      background-color: #5821e2;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    button.close {
      background-color: #d24b41;
    }

    .days-container {
      margin-top: 10px;
      display: none;
      width: 100%; /* Adjust the width */
    }

    .days-container.show {
      display: flex;
      flex-wrap: wrap;
    }

    .day {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 2px;
      cursor: pointer;
    }

    .day.selected {
      background-color: #5821e2;
      color: #fff;
    }

    .list-icon-container {
      margin-left: auto;
      background-color: #5821e2;
      color: #fff;
      border-radius: 4px;
      padding: 8px 12px;
      cursor: pointer;
    }

    .list-icon {
      margin-right: 5px;
    }

  </style>
</head>

<body>

  <form action="#" method="post" id="feedback-form">
    <div class="form-header">
      <span>Add New Calendar Type</span>
    </div>
    <div class="form-subheader">
      <label>Dashboard / Calendar Type / Add New Calendar Type</label>
    </div>

    <div class="list-icon-container">
      <a href="#"><i class="fas fa-list list-icon"></i>List</a>
    </div>

    <div class="flex-container">

      <div style="width: 50%;">
        <label for="brandName">Name:</label>
        <input type="text" id="name" name="name" placeholder="Name"  value="<?php echo set_value('name',$result['name']); ?>"  required>
      </div>

      <div style="width: 25%;">

        <label for="frequency">Frequency:</label>
        <select id="frequency" name="frequency">
        <option value="Select" <?php echo ($result['selected_days'] == 'Select') ? 'selected' : ''; ?>>Select</option>
          <option value="Weekdays" <?php echo ($result['selected_days'] == 'Weekdays') ? 'selected' : ''; ?>>Weekdays</option>
          <option value="Dates" <?php echo ($result['selected_days'] == 'Dates') ? 'selected' : ''; ?>>Dates</option>
        </select>

      </div>

      <div style="width: 25%;">
        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="1" <?php echo ($result['status'] == '1') ? 'selected' : ''; ?>>Active</option>
          <option value="0" <?php echo ($result['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>
        </select>
      </div>
    </div>

    <!-- Hidden input fields to store selected days -->
    <input type="hidden" id="selected_days" name="selected_days" value="<?php echo set_value('selected_days',$result['frequency']); ?>">

    <div style="width: 100%;" id="daysContainer" class="days-container">
      <!-- Days will be displayed here -->
    </div>

    <div class="button-container">
      <button type="submit">Submit</button>
      <button type="button" class="close">Close</button>
    </div>
  </form>

  <script>
      document.getElementById('frequency').addEventListener('change', function() {
      updateDaysContainer(this.value);
    });

    function updateDaysContainer(frequency) {
      var daysContainer = document.getElementById('daysContainer');
      daysContainer.innerHTML = ''; // Clear previous content

      if (frequency === 'Weekdays') {
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        days.forEach(function(day) {
          createDayElement(day);
        });
        daysContainer.classList.add('show');
      } else if (frequency === 'Dates') {
        for (var i = 1; i <= 31; i++) {
          createDayElement(i);
        }
        daysContainer.classList.add('show');
      } else {
        daysContainer.classList.remove('show');
      }
      selectInitialDays();
    }

    function createDayElement(day) {
      var div = document.createElement('div');
      div.textContent = day;
      div.classList.add('day');
      div.addEventListener('click', function() {
        if (this.classList.contains('selected')) {
          this.classList.remove('selected');
        } else {
          this.classList.add('selected');
        }
        updateSelectedDays();
      });
      document.getElementById('daysContainer').appendChild(div);
    }

    function updateSelectedDays() {
      var selectedDays = Array.from(document.querySelectorAll('.day.selected')).map(function(day) {
        return day.textContent;
      });
      document.getElementById('selected_days').value = selectedDays.join(',');
    }

    function selectInitialDays() {
      var selectedDays = document.getElementById('selected_days').value.split(',');
      selectedDays.forEach(function(day) {
        var dayElement = Array.from(document.querySelectorAll('.day')).find(function(el) {
          return el.textContent == day;
        });
        if (dayElement) {
          dayElement.classList.add('selected');
        }
      });
    }

    // Initialize the days container based on the initial frequency value
    window.onload = function() {
      var initialFrequency = document.getElementById('frequency').value;
      updateDaysContainer(initialFrequency);
    };
  </script>

</body>

</html>