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
    <tr>
        <th scope="row"><?=$studentData['id']?></th>
        <td><?=$studentData['first_name']?></td>
        <td><?=$studentData['last_name']?></td>
        <td><?=$studentData['group_num']?></td>
        <td><?=$studentData['points']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
