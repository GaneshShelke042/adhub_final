<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   

    table {
      width: 90%; /* Adjust the width as needed */
      margin: auto; /* Center the table */
      border-collapse: collapse;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      margin-top: 200px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #dedcdc;
      color: rgb(0, 0, 0);
    }

    .row-heading {
      font-weight: bold;
      color: #333;
    }

    input {
      width: 70%;
      box-sizing: border-box;
      padding: 8px;
      border: 1px solid #ddd;
      /* margin-top: 4px; */
      margin-bottom: 4px;
      /* display: inline-block; */
      text-align: center;
    }

    input[type="text"]:focus {
      outline: none;
      border: 1px solid #ededed;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
    button {
      width: 70%;
      box-sizing: border-box;
      padding: 8px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #45a049;
    }

        /* Positioning for the new button */
        .add-new-button {
          width: 100px;
            position: absolute;
            top: 10px;
            right: 10px;
            margin-right: 20px;
        }
  </style>
</head>
<body>
<section class="home-section" style="margin-top: -50%;">
     <!-- Button to trigger the popup -->
     <!-- <button class="add-new-button">
      <a href=""><i class="fas fa-plus"></i> Add New COMPETITOR</a> -->
  <!-- </button> -->
  <form >
    <table>
      <!-- Table header -->
      
      <thead >
        <tr>
          <th></th>
          <th></th>
          <th>DETAILS</th>
          <th>OWN BRAND
            <input type="text" placeholder="Enter text">
          </th>
          <th>COMPETITOR 1
            <input type="text" placeholder="Enter text">
          </th>
          <th>COMPETITOR 2
            <input type="text" placeholder="Enter text">
          </th>
          <th>COMPETITOR 3
            <input type="text" placeholder="Enter text">
          </th>
          <th>COMPETITOR 4
            <input type="text" placeholder="Enter text">
          </th>
          <!-- <th>Column 7</th> -->
        </tr>
      </thead>

      <!-- Table body with 9 rows -->
      <tbody>
        <!-- Row 1 to 9 -->
        <tr>
          <td class="row-heading">P.O.P Points of priority
            <button type="button">+ Add New </button>
          </td>
          <td><input type="text" name="box11"></td>
          <td><input type="text" name="box12" placeholder="Enter text"></td>
          <td><input type="text" name="box13" placeholder="Enter text"></td>
          <td><input type="text" name="box14" placeholder="Enter text"></td>
          <td><input type="text" name="box15" placeholder="Enter text"></td>
          <td><input type="text" name="box16" placeholder="Enter text"></td>
          <td><input type="text" name="box17" placeholder="Enter text"></td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
          <td class="row-heading">Perceived value P.O.P</td>
          <td><input type="text" name="box21"></td>
          <td><input type="text" name="box22" placeholder="Enter text"></td>
          <td><input type="text" name="box23" placeholder="Enter text"></td>
          <td><input type="text" name="box24" placeholder="Enter text"></td>
          <td><input type="text" name="box25" placeholder="Enter text"></td>
          <td><input type="text" name="box26" placeholder="Enter text"></td>
          <td><input type="text" name="box27" placeholder="Enter text"></td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
          <td class="row-heading">P.O.D point of Difference
            <button type="button">+ Add New </button>
          </td>
          <td><input type="text" name="box31"></td>
          <td><input type="text" name="box32" placeholder="Enter text"></td>
          <td><input type="text" name="box33" placeholder="Enter text"></td>
          <td><input type="text" name="box34" placeholder="Enter text"></td>
          <td><input type="text" name="box35" placeholder="Enter text"></td>
          <td><input type="text" name="box36" placeholder="Enter text"></td>
          <td><input type="text" name="box37" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">Perceived value P.O.D</td>
          <td><input type="text" name="box41"></td>
          <td><input type="text" name="box42" placeholder="Enter text"></td>
          <td><input type="text" name="box43" placeholder="Enter text"></td>
          <td><input type="text" name="box44" placeholder="Enter text"></td>
          <td><input type="text" name="box45" placeholder="Enter text"></td>
          <td><input type="text" name="box46" placeholder="Enter text"></td>
          <td><input type="text" name="box47" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">Reputation</td>
          <td><input type="text" name="box51"></td>
          <td><input type="text" name="box52" placeholder="Enter text"></td>
          <td><input type="text" name="box53" placeholder="Enter text"></td>
          <td><input type="text" name="box54" placeholder="Enter text"></td>
          <td><input type="text" name="box55" placeholder="Enter text"></td>
          <td><input type="text" name="box56" placeholder="Enter text"></td>
          <td><input type="text" name="box57" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">Cost</td>
          <td><input type="text" name="box61"></td>
          <td><input type="text" name="box62" placeholder="Enter text"></td>
          <td><input type="text" name="box63" placeholder="Enter text"></td>
          <td><input type="text" name="box64" placeholder="Enter text"></td>
          <td><input type="text" name="box65" placeholder="Enter text"></td>
          <td><input type="text" name="box66" placeholder="Enter text"></td>
          <td><input type="text" name="box67" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">P.O.P + P.O.D + Reputation</td>
          <td><input type="text" name="box71"></td>
          <td><input type="text" name="box72" placeholder="Enter text"></td>
          <td><input type="text" name="box73" placeholder="Enter text"></td>
          <td><input type="text" name="box74" placeholder="Enter text"></td>
          <td><input type="text" name="box75" placeholder="Enter text"></td>
          <td><input type="text" name="box76" placeholder="Enter text"></td>
          <td><input type="text" name="box77" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">Cost</td>
          <td><input type="text" name="box81"></td>
          <td><input type="text" name="box82" placeholder="Enter text"></td>
          <td><input type="text" name="box83" placeholder="Enter text"></td>
          <td><input type="text" name="box84" placeholder="Enter text"></td>
          <td><input type="text" name="box85" placeholder="Enter text"></td>
          <td><input type="text" name="box86" placeholder="Enter text"></td>
          <td><input type="text" name="box87" placeholder="Enter text"></td>
        </tr>
        <tr>
          <td class="row-heading">Number</td>
          <td><input type="text" name="box91"></td>
          <td><input type="text" name="box92" placeholder="Enter text"></td>
          <td><input type="text" name="box93" placeholder="Enter text"></td>
          <td><input type="text" name="box94" placeholder="Enter text"></td>
          <td><input type="text" name="box95" placeholder="Enter text"></td>
          <td><input type="text" name="box96" placeholder="Enter text"></td>
          <td><input type="text" name="box97" placeholder="Enter text"></td>
        </tr>
      </tbody>
    </table>

    <!-- Uncomment the following lines if you want to include the submit button -->
    <!-- <input type="submit" value="Submit"> -->
  </form>
</section>
</body>
</html>
