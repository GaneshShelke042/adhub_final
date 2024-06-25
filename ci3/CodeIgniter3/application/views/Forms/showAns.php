<h1 style="text-align: center; ">Hello Ganesh</h1>

<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Ans</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row, you can dynamically generate rows using JavaScript -->

                    <?php if (!empty($ans)) {
                        foreach ($ans as $userData) { 
                         print_r($userData['client_id']);
                            if($userData['client_id'] == 49){ ?>
                            <tr>
                                <td><?php echo  $userData['id'] ?></td>
                                <td><?php echo  $userData['question'] ?></td>
                                </tr>
                            

<?php }
                         } }


else { ?>
<tr>
    <td colspan="5"> record not found</td>
</tr>

<?php } ?>
                </tbody>
</table>