               <table id="ticketstable">
            <thead>
                <tr>
                    <th>Ticket #</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["date"]); ?> </td>
                <td><?php echo escape($row["firstname"]); ?></td>
                <td><?php echo escape($row["lastname"]); ?></td>
                <td><?php echo escape($row["status"]); ?> </td>                
              <td><a href="edit2.php?editid=<?php echo $row["id"]; ?>">Edit</a></td>
              <td><a herf="print.php?editid=<?php echo $row["id"]; ?>">Print</a></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>