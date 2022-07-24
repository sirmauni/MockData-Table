<table border="3">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>IP Address</th>
    <th>Genres</th>
    <th>Misc</tr>
  </tr>
  <tbody>
    <td contenteditable="true"><?php echo $data_item['id'];?></td>
    <td contenteditable="true"><?php echo $data_item['firstName'];?></td>
    <td contenteditable="true"><?php echo $data_item['lastName'];?></td>
    <td contenteditable="true"><?php echo $data_item['email'];?></td>
    <td contenteditable="true"><?php echo $data_item['gender'];?></td>
    <td contenteditable="true"><?php echo $data_item['ipAddress'];?></td>
    <td contenteditable="true"><?php echo $data_item['genres'];?></td>
    <td contenteditable="true"><?php echo $data_item['misc'];?></td>
  </tbody>
</table>
<button>Delete item</button>