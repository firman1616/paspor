<table id="tablePaspor" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Negara</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($paspor as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->nama_depan. ' '. $row->nama_belakang ?></td>
            <td><?= $row->asal_negara ?></td>
            <td>
                <button type="button" class="btn btn-primary btn-sm print"  data-id="<?= $row->id ?>"><i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-warning btn-sm edit"  data-id="<?= $row->id ?>"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm hapus" data-id="<?= $row->id ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>