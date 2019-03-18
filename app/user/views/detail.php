ID：<?php echo $user['id'] ?><br />
CODE：<?php echo isset($user['code']) ? $user['code'] : '' ?><br />
USERNAME：<?php echo isset($user['username']) ? $user['username'] : '' ?><br />
EMAIL：<?php echo isset($user['email']) ? $user['email'] : '' ?><br />
MOBILE：<?php echo isset($user['mobile']) ? $user['mobile'] : '' ?><br />
STATUS：<?php echo isset($user['status']) ? $user['status'] : '' ?><br />
CREAT_TIME：<?php echo isset($user['create_time']) ? $user['create_time'] : '' ?><br />
UPDATE_TIME：<?php echo isset($user['update_time']) ? $user['update_time'] : '' ?><br />

<br />
<a class="big" href="/user/index">返回</a>