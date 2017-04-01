<?php
// Include common functions
require_once('common.php');

$size = 5;

$tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
$fid = isset($_GET['fid']) ? (int)$_GET['fid'] : 0;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$style = 'blue';
$nickname = '';
$uid = forum_get_user_id();

if ( $fid == 0 || $tid == 0 ) {
    echo FORUM_ERROR_NOT_EXISTS;
    exit;
}

switch ( $fid ) {
    case 1 :
        echo '請不要以非正當方式進入網站。';
        exit;
    case 2 :
        $style = 'blue';
        break;
    case 3 :
        $style = 'purple';
        break;
    case 4 :
        $style = 'red';
        break;
    default :
        $style = 'green';
        break;
}

if ( $uid > 0 ) {
    $query = $currdb->sql_query('
        SELECT *
        FROM `personal_data`
        WHERE `uid` = ' . $uid . '
        ;');
    $nickname = $currdb->sql_fetch_assoc($query);
    if ( $nickname ) $nickname = $nickname['nickname'];
}

$query = $currdb->sql_query('
    SELECT COUNT(*) AS `count`
    FROM `forum_threads`
    WHERE ( ( `id` = ' . $tid . ' AND `parent_id` = 0 ) OR ( `parent_id` = ' . $tid . ' ) ) AND `visible` = 1
    ;');
$pagination = forum_get_pagination($query, $page, $size, '?fid=' . $fid . '&tid=' . $tid);

$query = $currdb->sql_query('
    SELECT `forum_threads`.*, `personal_data`.`nickname` AS `nickname`, `ac_user`.`username` AS `username`, `personal_data`.`department` AS `department`, `pets`.`type` AS `ptype`, `pets`.`level` AS `plevel`
    FROM `forum_threads`
    LEFT JOIN `ac_user`
    ON `ac_user`.`uid` = `forum_threads`.`author_id`
    LEFT JOIN `personal_data`
    ON `personal_data`.`uid` = `forum_threads`.`author_id`
    LEFT JOIN `pets`
    ON `pets`.`uid` = `forum_threads`.`author_id`
    WHERE ( `forum_threads`.`forum_id` = ' . $fid . ' AND ( `forum_threads`.`id` = ' . $tid . ' AND `forum_threads`.`parent_id` = 0 ) OR ( `forum_threads`.`parent_id` = ' . $tid . ' ) ) AND `forum_threads`.`visible` = 1
    ORDER BY `forum_threads`.`parent_id` ASC, `forum_threads`.`created` ASC
    LIMIT ' . ($page - 1) * $size . ',' . $size . '
    ;');

$threads = array();
if ( $currdb->sql_num_rows($query) ) {
    for ( $i = ($page - 1) * $size ; $thread = $currdb->sql_fetch_assoc($query) ; ++$i ) {
        $thread['number'] = $i;
        $thread['commits'] = array();
        $q = $currdb->sql_query('
            SELECT `forum_commits`.*, `personal_data`.`nickname` AS `nickname`
            FROM `forum_commits`
            LEFT JOIN `personal_data`
            ON `personal_data`.`uid` = `forum_commits`.`author_id`
            WHERE `thread_id` = ' . $thread['id'] . ' AND `visible` = 1
            ;');
        while ( $commit = $currdb->sql_fetch_assoc($q)) {
            $commit['content'] = $commit['content'];
            $thread['commits'][] = $commit;
        }
        $thread['content'] = forum_bbcode($thread['content']);
        $thread['icon'] = forum_get_picture($thread);
        $thread['time'] = date('Y-m-d H:i:s', $thread['updated']);
        $threads[] = $thread;
    }
} else {
    echo FORUM_ERROR_NOT_EXISTS;
    exit;
}

$currtpl->assign('admin', forum_is_admin($fid));
if ( $threads[0]['parent_id'] == 0 ) {
    $currtpl->assign('thread', array_shift($threads));
}

$currtpl->assign('fid', $fid);
$currtpl->assign('tid', $tid);
$currtpl->assign('style', $style);
$currtpl->assign('replies', $threads);
$currtpl->assign('breadcrumbs', forum_get_display_breadcrumbs($tid, 'threads'));
$currtpl->assign('pagination', $pagination);
$currtpl->assign('nickname', $nickname);
$currtpl->display('thread.html');


?>
