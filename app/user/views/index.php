<form action="" method="get">
    <input type="text" name="keyword" value="<?php echo $keyword ?>">
    <input type="submit" value="搜索">
</form>

<p><a href="/user/manage">新建</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>账号</th>
        <th>姓名</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>操作</th>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user["id"]?></td>
            <td>
                <a href="/user/detail/<?php echo $user['id'] ?>" title="查看详情">
                    <?php echo $user['code'] ?>
                </a>
            </td>
            <td><?php echo $user["username"]?></td>
            <td><?php echo $user["email"]?></td>
            <td><?php echo $user["mobile"]?></td>
            <td>
                <a href="/user/manage/<?php echo $user['id'] ?>">编辑</a>
                <a href="/user/delete/<?php echo $user['id'] ?>">删除</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>