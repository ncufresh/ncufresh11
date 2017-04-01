<?php
// Include common functions
require_once('common.php');

$aid = forum_get_user_id();

if ( $aid <= 0 ) forum_ajax_failure(FORUM_ERROR_NOT_LOGIN);

switch ( isset($_GET['action']) ? $_GET['action'] : 'error' ) {
    case 'post' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $fid = (int)$_GET['fid'];

        if ( $fid == 4 && !forum_is_admin() ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_PERMISSION);

        if ( forum_is_post() ) {
            if ( forum_token_check() ) {
                $cid = (int)$_POST['cid'];
                $title = trim($_POST['title'], '\t\n\r 　');
                $content = trim($_POST['content'], '\t\n\r 　');

                if ( empty($title) || empty($content) || $title == '' || $content == '' ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_CONTENTS);
                if ( forum_strlen($title) < 2 ) forum_ajax_failure(FORUM_ERROR_TITLE_TOO_LITTLE);
                if ( forum_strlen($content) < 20 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_LITTLE);
                if ( forum_strlen($title) > 30 ) forum_ajax_failure(FORUM_ERROR_TITLE_TOO_MANY);
                if ( forum_strlen($content) > 50000 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_MANY);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_forums`
                    WHERE `id` = ' . $fid . ' AND `visible` = 1
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_categories`
                    WHERE `id` = ' . $cid .'
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                if (
                    forum_database_insert('threads', array(
                        'parent_id', 'forum_id', 'category_id', 'title', 'content', 'author_id', 'created', 'updated'
                    ), array(
                        0, $fid, $cid, $title, $content, $aid, FORUM_TIMESTAMP, FORUM_TIMESTAMP
                    ))
                ) {
                    forum_ajax_success();
                }
            }
            forum_ajax_failure();
        }

        $currtpl->assign('categories', forum_get_categories($fid));
        $currtpl->display('thread_add.html');
        break;
    case 'edit' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $eid = (int)$_GET['eid'];

        if ( forum_is_post() ) {
            if ( forum_token_check() ) {
                $cid = (int)$_POST['cid'];
                $title = trim($_POST['title'], '\t\n\r 　');
                $content = trim($_POST['content'], '\t\n\r 　');

                if ( empty($title) || empty($content) || $title == '' || $content == '' ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_CONTENTS);
                if ( forum_strlen($title) < 2 ) forum_ajax_failure(FORUM_ERROR_TITLE_TOO_LITTLE);
                if ( forum_strlen($content) < 20 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_LITTLE);
                if ( forum_strlen($title) > 30 ) forum_ajax_failure(FORUM_ERROR_TITLE_TOO_MANY);
                if ( forum_strlen($content) > 50000 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_MANY);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_thrades`
                    WHERE `id` = ' . $eid . ' AND `visible` = 1
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_categories`
                    WHERE `id` = ' . $cid .'
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                if (
                    forum_database_update('threads', array(
                        'category_id'   => $cid,
                        'title'         => $title,
                        'content'       => $content,
                        'updated'       => FORUM_TIMESTAMP,
                        'update_times'  => '`update_times` + 1'
                    ), array(
                        'id'            => $eid,
                        'author_id'     => $aid
                    ))
                ) {
                    forum_ajax_success();
                }
            }
            forum_ajax_failure();
        }

        $query = $currdb->sql_query('
            SELECT *
            FROM `forum_threads`
            WHERE `id` = ' . $eid . '
            ;');
        $thread = $currdb->sql_fetch_assoc($query);

        $currtpl->assign('eid', $eid);
        $currtpl->assign('thread', $thread);
        $currtpl->assign('categories', forum_get_categories($thread['forum_id']));
        $currtpl->display('thread_edit.html');
        break;
    case 'reply' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $tid = (int)$_GET['tid'];
        $fid = (int)$_GET['fid'];

        if ( $fid == 4 && !forum_is_admin() ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_PERMISSION);

        if ( forum_is_post() ) {
            if ( forum_token_check() ) {
                $content = trim($_POST['content'], '\t\n\r 　');

                if ( empty($content) || $content == '' ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_CONTENTS);
                if ( forum_strlen($content) < 20 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_LITTLE);
                if ( forum_strlen($content) > 50000 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_MANY);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_thrades`
                    WHERE `id` = ' . $tid . ' AND `forum_id` = ' . $fid . ' AND `visible` = 1
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                if (
                    forum_database_insert('threads', array(
                        'parent_id', 'forum_id', 'content', 'author_id', 'created', 'updated'
                    ), array(
                        $tid, $fid, $content, $aid, FORUM_TIMESTAMP, FORUM_TIMESTAMP
                    ))
                ) {
                    forum_database_update('threads', array(
                        'reply_times'   => '`reply_times` + 1',
                        'last_reply_id' => $currdb->sql_insert_id(),
                        'updated'       => FORUM_TIMESTAMP
                    ), array(
                        'id'            => $tid
                    ));

                    forum_ajax_success();
                }
            }
            forum_ajax_failure();
        }

        $currtpl->display('reply_add.html');
        break;
    case 'replyedit' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $eid = (int)$_GET['eid'];

        if ( forum_is_post() ) {
            if ( forum_token_check() ) {
                $content = trim($_POST['content'], '\t\n\r 　');

                if ( empty($content) || $content == '' ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_CONTENTS);
                if ( forum_strlen($content) < 20 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_LITTLE);
                if ( forum_strlen($content) > 50000 ) forum_ajax_failure(FORUM_ERROR_CONTENT_TOO_MANY);

                $query = $currdb->sql_query('
                    SELECT `id`
                    FROM `forum_threads`
                    WHERE `id` = ' . $eid . ' AND `visible` = 1
                    ;');
                if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

                if (
                    forum_database_update('threads', array(
                        'content'       => $content,
                        'updated'       => FORUM_TIMESTAMP,
                        'update_times'  => '`update_times` + 1'
                    ), array(
                        'id'            => $eid,
                        'author_id'     => $aid
                    ))
                ) {
                    forum_ajax_success();
                }
            }
            forum_ajax_failure();
        }

        $query = $currdb->sql_query('
            SELECT `content`
            FROM `forum_threads`
            WHERE `id` = ' . $eid . ' AND `visible` = 1
            ;');
        $reply = $currdb->sql_fetch_assoc($query);

        $currtpl->assign('reply', $reply);
        $currtpl->display('reply_edit.html');
        break;
    case 'commit' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $tid = (int)$_GET['tid'];

        if ( forum_is_post() ) {
            $content = trim($_POST['content'], '\t\n\r 　');

            if ( empty($content) || $content == '' ) forum_ajax_failure(FORUM_ERROR_HAVE_NO_CONTENTS);
            if ( forum_strlen($content) < 2 ) forum_ajax_failure(FORUM_ERROR_COMMIT_TOO_LITTLE);
            if ( forum_strlen($content) > 30 ) forum_ajax_failure(FORUM_ERROR_COMMIT_TOO_MANY);

            $query = $currdb->sql_query('
                SELECT `id`
                FROM `forum_threads`
                WHERE `id` = ' . $tid . ' AND `visible` = 1
                ;');
            if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

            if (
                forum_database_insert('commits', array(
                    'thread_id', 'content', 'author_id'
                ), array(
                    $tid, $content, $aid
                ))
            ) {
                forum_ajax_success();
            }
            forum_ajax_failure();
        }

        forum_ajax_failure();
        break;
    case 'delete' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $did = (int)$_GET['did'];

        $query = $currdb->sql_query('
            SELECT *
            FROM `forum_threads`
            WHERE ( `id` = ' . $did . ' OR `parent_id` = '. $did .' ) AND `visible` = 1
            ;');
        if ( $query && $currdb->sql_num_rows($query) ) {
            while ( $thread = $currdb->sql_fetch_assoc($query) ) {
                if (
                    !forum_database_delete('commits', array(
                        'thread_id'     => $thread['id']
                    ))
                ||
                    !forum_database_update('threads', array(
                        'updated'       => FORUM_TIMESTAMP,
                        'reply_times'   => '`reply_times` - 1'
                    ), array(
                        'id'            => $thread['parent_id']
                    ))
                ) {
                    forum_ajax_failure();
                }
            }
        } else {
            forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);
        }

        if (
            forum_database_delete('threads', array(
                'parent_id'         => $did,
                'id'                => $did
            ), false)
        ) {
            forum_ajax_success();
        }

        forum_ajax_failure();
        break;
    case 'deletecommit' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $did = (int)$_GET['did'];

        $query = $currdb->sql_query('
            SELECT `forum_commits`.`id`, `forum_threads`.`forum_id` AS `fid`
            FROM `forum_commits`, `forum_threads`
            WHERE `forum_commits`.`id` = ' . $did . ' AND `forum_threads`.`id` = `forum_commits`.`thread_id` AND `forum_commits`.`visible` = 1 AND `forum_threads`.`visible` = 1
            ;');
        if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

        $commit = $currdb->sql_fetch_assoc($query);
        if (
            forum_is_admin($commit['fid'])
        &&
            forum_database_delete('commits', array(
                'id'                => $did
            ))
        ) {
            forum_ajax_success();
        }

        forum_ajax_failure();
        break;
    case 'sticky' :
        $tid = (int)$_GET['tid'];
        $fid = (int)$_GET['fid'];

        if (
            forum_is_admin($fid)
        &&
            forum_database_update('threads', array(
                'sticky'        => 'CASE `sticky` WHEN 0 THEN 1 ELSE 0 END',
            ), array(
                'id'            => $tid,
                'visible'       => true
            ))
        ) {
            header('Location: thread.php?fid=' . $fid . '&tid=' . $tid);
        }

        forum_ajax_failure();
        break;
    case 'like' :
        if ( !forum_is_ajax() ) forum_ajax_failure();

        $tid = (int)$_GET['tid'];

        $query = $currdb->sql_query('
            SELECT `id`
            FROM `forum_threads`
            WHERE `id` = ' . $tid . ' AND `visible` = 1
            ;');
        if ( $query && !$currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_NOT_EXISTS);

        $query = $currdb->sql_query('
            SELECT *
            FROM `forum_likes`
            WHERE `member_id` = ' . $aid . ' AND `thread_id` = ' . $tid . '
        ;');

        if ( $query && $currdb->sql_num_rows($query) ) forum_ajax_failure(FORUM_ERROR_LIKED);

        if (
            forum_database_update('threads', array(
                'like'              => '`like` + 1'
            ), array(
                'id'                => $tid
            ))
        &&
            forum_database_insert('likes', array(
                'member_id', 'thread_id'
            ), array(
                $aid, $tid
            ))
        ) {
            forum_ajax_success();
        }

        forum_ajax_failure();
        break;
    case 'error' :
        forum_ajax_failure();
}


?>
