<table class=" table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Номер группы</th>
        <th scope="col">Баллов</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($vars as $student => $studentData): ?>
        <tr <?=($_SESSION['id'] == $studentData['id']) ? 'class="table-active"' : ''?>>
            <th scope="row"><?= $studentData['id'] ?></th>
            <td><?= $studentData['first_name'] ?></td>
            <td><?= $studentData['last_name'] ?></td>
            <td><?= $studentData['group_num'] ?></td>
            <td><?= $studentData['points'] ?>

                <?php if ($_SESSION['id'] == $studentData['id']): ?>

                    <a href="/cabinet/edit" style="margin: 30px; color: #fff;"><i
                                class="fas fa-user-edit"></i></a>
                    <a href="/cabinet/delete" style="color: #fff;"><i class="fas fa-user-minus"></i></a>

                <?php endif; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
