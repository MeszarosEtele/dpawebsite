<div>
    <h1>kapcsolatfelvételi táblázat</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Név</th>
                <th scope="col">Email</th>
                <th scope="col">Üzenet</th>
                <th scope="col">Dátum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tablazatData as $tablazatRow) { ?>

                <tr>
                    <th scope="row"><?php echo $tablazatRow['azonosito']; ?></th>
                    <td><?php echo $tablazatRow['nev']; ?></td>
                    <td><?php echo $tablazatRow['email']; ?></td>
                    <td><?php echo $tablazatRow['uzenet']; ?></td>
                    <td><?php echo $tablazatRow['idobelyeg']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</div>