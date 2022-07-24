<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://budgetvm.com/css/style.css">
    <script src="http://budgetvm.com/js/mockdata.js"></script>
  </head>
  <body>
    <h2 class="headerTitle"><?php echo $title ?></h2>
    <table id="mockDataTable" class="container-fluid table table-bordered table-hover table-responsive" border="3">
    <tbody class="">
      <tr id="tableHeaders">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>IP Address</th>
        <th>Genres</th>
        <th>Misc</th>
      </tr>
      <?php 
      foreach ($dataModel as $item): ?> 
      <tr>
        <td class="wrapper" contenteditable="false"><?php echo $item['id'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['firstName'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['lastName'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['email'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['gender'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['ipAddress'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['genres'];?></td>
        <td class="wrapper" contenteditable="true" oninput="UpdateItem(this);"><?php echo $item['misc'];?></td>
        <td><button class="btn btn-danger" onclick="DeleteItem(event, <?php echo $item['id'] ?>)">delete</button></td>
      </tr>
      <?php 
      endforeach; ?>
    </tbody>
  </table>
    <div class="controls">
      <button class="btn btn-danger" onclick="DeleteAllItems()">Delete All</button>
      <button class="btn btn-primary" onclick="InsertNewItem()">New Item</button>
    </div>
    <h6>Designed and Developed by Jamauni Taylor</h6>
  </body>
<html>

