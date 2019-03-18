<form  <?php if (isset($user['id'])) { ?>
    action="/user/update/<?php echo $user['id'] ?>"
<?php } else { ?>
    action="/user/add"
<?php } ?>
    method="post">
    <?php if (isset($user['id'])): ?>
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
    <?php endif; ?>
    <br>
    账号：<input type="text" name="code" value="<?php echo isset($user['code']) ? $user['code'] : '' ?>">
    <br>
    姓名：<input type="text" name="username" value="<?php echo isset($user['username']) ? $user['username'] : '' ?>">
    <br>
    邮箱：<input type="text" name="email" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>">
    <br>
    电话：<input type="text" name="mobile" value="<?php echo isset($user['mobile']) ? $user['mobile'] : '' ?>">
    <br>
    <input type="submit" value="提交">
</form>

<a class="big" href="/user/index">返回</a>