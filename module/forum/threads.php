<?php
// Include common functions
require_once('common.php');

$size = 10;

$fid = (int)$_GET['fid'];
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$cid = isset($_GET['category']) ? (int)$_GET['category'] : 0;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
$style = 'blue';

if ( $fid == 5 ) header('Location: forums.php?fid=5');

switch ( $fid ) {
        case 1 :
                    echo FORUM_ERROR_NOT_EXISTS;
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

switch ( $sort ) {
        case 'latest' :
                    $sorting = 'updated';
                            break;
                                case 'replies' :
                                    $sorting = 'reply_times';
                                            break;
                                                case 'like' :
                                                    $sorting = 'like';
                                                            break;
                                                                case 'created' :
                                                                    $sorting = 'created';
                                                                            break;
                                                                                default :
                                                                                    echo FORUM_ERROR_NOT_EXISTS;
                                                                                            exit;
}

$query = $currdb->sql_query('
            SELECT COUNT(*) AS `count`
                FROM `forum_threads`
                    WHERE `forum_id` = ' . $fid . ' AND `parent_id` = 0 AND `visible` = 1 ' . ( $cid ? ('AND `category_id` = ' . $cid) : '' ) . '
                        ;');
$pagination = forum_get_pagination($query, $page, $size, '?fid=' . $fid . '&sort=' . $sort.'&category=' . $cid);

$query = $currdb->sql_query('
            SELECT *
                FROM `forum_categories`
                    WHERE `forum_id` = ' . $fid . '
                        ;');
$categories = array();
if ( $currdb->sql_num_rows($query) ) {
        while ( $category = $currdb->sql_fetch_assoc($query) ) {
                    $categories[] = $category;
                        }
}

// Get threads which belongs to the giving forum and not a reply.
$query = $currdb->sql_query('
            SELECT `forum_threads`.*, `forum_categories`.`id` AS `cid`, `forum_categories`.`filename` AS `cfilename`, `forum_categories`.`name` AS `cname`, `personal_data`.`uid` AS `aid`, `personal_data`.`nickname` AS `nickname`
                FROM `forum_threads`
                    LEFT JOIN `forum_categories`
                        ON `forum_threads`.`category_id` = `forum_categories`.`id` AND `forum_categories`.`forum_id` = ' . $fid . '
                            LEFT JOIN `personal_data`
                                ON `personal_data`.`uid` = `forum_threads`.`author_id`
                                    WHERE `forum_threads`.`forum_id` = ' . $fid . ' AND `forum_threads`.`parent_id` = 0 AND `forum_threads`.`visible` = 1 ' . ( $cid ? ('AND `forum_threads`.`category_id` = ' . $cid) : '' ) . '
                                        ORDER BY `forum_threads`.`sticky` DESC, `' . $sorting . '` DESC
                                            LIMIT ' . ($page - 1) * $size . ',' . $size . '
                                                ;');

$threads = array();
if ( $query ) {
        while ( $thread = $currdb->sql_fetch_assoc($query) ) {
                    if ( $thread['cname'] == '' ) $thread['cname'] = '未知';
                            if ( $thread['sticky'] ) {
                                            $thread['cname'] = '置頂';
                                                        $thread['cfilename'] = 'sticky';
                                                                }
                                    if ( forum_strlen($thread['nickname']) > 12 ) $thread['nickname'] = '------';
                                            $thread['cfilename'] = 'templates/zh_tw/images/words/' . $thread['cfilename'] . '.png';
                                                    $thread['date'] = date('m/d', $thread['updated']);
                                                            $thread['time'] = date('H:i', $thread['updated']);
                                                                    if ( $thread['reply_times'] >= 1000 ) $thread['reply_times'] = '<span>爆</span>';
                                                                            if ( $thread['like'] >= 1000 ) $thread['like'] = '<span>炸</span>';
                                                                                    $threads[] = $thread;
                                                                                        }
}

$currtpl->assign('fid', $fid);
$currtpl->assign('style', $style);
$currtpl->assign('threads', $threads);
$currtpl->assign('breadcrumbs', forum_get_display_breadcrumbs($fid, 'forums'));
$currtpl->assign('pagination', $pagination);
$currtpl->assign('categories', $categories);
$currtpl->assign('cid', ($fid == 4 ? 117 : $cid));
$currtpl->display('threads.html');
?>
