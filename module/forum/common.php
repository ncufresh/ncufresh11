<?php
// Initialize AC framework
require_once('../../core/ac_boot.php');

/**
   * Definitions
    */
define('FORUM_TIMESTAMP', time());
define('FORUM_ERROR', '發生一個未知的錯誤！');
define('FORUM_ERROR_NOT_EXISTS', '查詢不存在，請勿隨意攻擊。');
define('FORUM_ERROR_NOT_LOGIN', '尚未登入！');
define('FORUM_ERROR_LIKED', '你喜歡這篇文章的心情我們已經收到了，不過讚數不會因此增加唷。');
define('FORUM_ERROR_TITLE_TOO_LITTLE', '你的標題字數太少！');
define('FORUM_ERROR_CONTENT_TOO_LITTLE', '你的內容字數太少！');
define('FORUM_ERROR_COMMIT_TOO_LITTLE', '你的評論字數太少！');
define('FORUM_ERROR_TITLE_TOO_MANY', '你的標題字數過多！');
define('FORUM_ERROR_CONTENT_TOO_MANY', '你的內容字數過多！');
define('FORUM_ERROR_COMMIT_TOO_MANY', '你的評論字數過多！');
define('FORUM_ERROR_HAVE_NO_PERMISSION', '你不能在這裡發表文章！');
define('FORUM_ERROR_HAVE_NO_CONTENTS', '你沒有填寫任何東西！');

/**
   * Set template
    */
$currtpl->add_js('jquery-ui-1.8.13.custom.min.js', true);
$currtpl->add_js('tiny_mce/tiny_mce.js', true);
$currtpl->add_js('forum.js');
$currtpl->assign('uid', forum_get_user_id());

// If the request is Ajax, turn off global template.
if ( forum_is_ajax() ) $currtpl->set_display(false);

/**
   * Gets request method.
    *
     * @return string of null
      */
function forum_get_method() {
        return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
}

/**
   * Determines whether the request method is GET.
    *
     * @return boolean
      */
function forum_is_get() {
        return forum_get_method() === 'GET';
}

/**
   * Determines whether the request method is POST.
    *
     * @return boolean
      */
function forum_is_post() {
        return forum_get_method() === 'POST';
}

/**
   * Determines whether the request method is PUT.
    *
     * @return boolean
      */
function forum_is_put() {
        return forum_get_method() === 'PUT';
}

/**
   * Determines whether the request method is DELETE.
    *
     * @return boolean
      */
function forum_is_delete() {
        return forum_get_method() === 'DELETE';
}

/**
   * Determines whether the request method is sent by Ajax.
    *
     * @return boolean
      */
function forum_is_ajax() {
        if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) return true;
            return false;
}

/**
   * Indicates the Ajax operation success.
    */
function forum_ajax_success() {
        echo 'SUCCESS';
            exit;
}

/**
   * Indicates the Ajax operation fail and display the message.
    *
     * @param string $message
      */
function forum_ajax_failure($message = null) {
        echo json_encode(array(
                            'message'   => ($message ?: FORUM_ERROR),
                                    'token'     => forum_token_generate()
                                        ));
            exit;
}
function forum_token_generate() {
        $token = substr(md5(uniqid(rand(), true)), rand(1, 24), 8);
            unset($_SESSION['forum_session_token']);
                $_SESSION['forum_session_token'] = $token;
                    return $_SESSION['forum_session_token'];
}

/**
   * Displays the token field.
    */
function forum_token_field() {
        echo '<input id="token" name="token" value="' . forum_token_generate() . '" type="hidden" />';
}

/**
   * Checks the token in the form.
    *
     * @return boolean
      */
function forum_token_check() {
        if ( isset($_POST['token']) && isset($_SESSION['forum_session_token']) && $_POST['token'] == $_SESSION['forum_session_token'] ) {
                    unset($_SESSION['forum_session_token']);
                            return true;
                                }
            unset($_SESSION['forum_session_token']);
                return false;
}

/**
   * Calculates the length of the string.
    *
     * @return integer
      */
function forum_strlen($str) {
        return mb_strwidth($str, 'UTF8');
}

/**
   * Create a node.
    *
     * @param array $node The node which would be inserted.
      * @param integer $parent_id The parent id.
       * @return integer The id of the inserted node or false if fails.
        */
function forum_create_node(array $node, $parent_id) {
        global $currdb;

            $parent_id = (int)$parent_id;

                // Gets the parent node.
                if ( $parent_id > 0 ) {
                            $query = $currdb->sql_query('
                                                SELECT *
                                                            FROM `forum_forums`
                                                                        WHERE `id` = ' . $parent_id . ' AND `visible` = 1
                                                                                    ;');
                                    // If the parent node is not existed, this function fails.
                                    if ( !$currdb->sql_num_rows($query) ) return false;

                                            $parent = $currdb->sql_fetch_assoc($query);

                                                    $left_id = $parent['right_id'];
                                                            $right_id = $parent['right_id'] + 1;
                                                                } else {
                                                                            // $parent_id <= 0 means that the node is on the top level.
                                                                            $parent_id = 0;
                                                                                    $left_id = 1;
                                                                                            $right_id = 2;
                                                                                                }

                    // Updates database by the left and right id of parent node.
                    if (
                                    !forum_database_update('forums', array(
                                                        'left_id'       => '`left_id` + 2'
                                                                ), array(
                                                                                'left_id'       => array('>=', $right_id)
                                                                                        ))
                                        ) return false;
                        if (
                                        !forum_database_update('forums', array(
                                                            'right_id'      => '`right_id` + 2'
                                                                    ), array(
                                                                                    'right_id'      => array('>=', $left_id)
                                                                                            ))
                                            ) return false;

                            // Inserts the node.
                            if (
                                            !forum_database_insert('forums', array(
                                                                'parent_id', 'left_id', 'right_id', 'name', 'description'
                                                                        ), array(
                                                                                        $parent_id, $left_id, $right_id, $node['name'], $node['description']
                                                                                                ))
                                                ) return false;

                                return $currdb->sql_insert_id();
}

/**
   * Remove a node.
    *
     * @param array $node The node which would be deleted.
      * @return boolean
       */
function forum_remove_node(array $node) {
        global $currdb;

            $span = (int)($node['right_id'] - $node['left_id'] + 1);

                // Deletes the node.
                if (
                                !forum_database_delete('forums', array(
                                                    'left_id'       => array('>=', $forum['left_id']),
                                                                'right_id'      => array('<=', $forum['right_id'])
                                                                        ))
                                    ) return false;

                    // Updates database.
                    if (
                                    !forum_database_update('forums', array(
                                                        'left_id'       => '`left_id` - ' . $span,
                                                                ), array(
                                                                                'left_id'       => array('>', $forum['right_id'])
                                                                                        ))
                                        ) return false;
                        if (
                                        !forum_database_update('forums', array(
                                                            'right_id'      => '`right_id` - ' . $span,
                                                                    ), array(
                                                                                    'right_id'      => array('>', $forum['right_id'])
                                                                                            ))
                                            ) return false;

                            return true;
}

/**
   * Get the path from $node to root.
    *
     * @param array $node
      * @return array
       */
function forum_get_path(array $node) {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE ( `left_id` <= ' . $node['left_id'] . ' AND `right_id` >= ' . $node['right_id'] . ' ) AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get child nodes by given $node.
    *
     * @param array $node
      * @return array
       */
function forum_get_child_nodes(array $node) {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE ( `parent_id` = ' . $node['id'] . ' ) AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get child tree by given $node.
    *
     * @param array $node
      * @return array
       */
function forum_get_child_tree(array $node) {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE ( `left_id` BETWEEN ' . $node['left_id'] . ' AND ' . $node['right_id'] . ' ) AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get sibling nodes by given $node.
    *
     * @param array $node
      * @return array
       */
function forum_get_silbing_nodes(array $node) {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE ( `parent_id` = ' . $node['parent_id'] . ' ) AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get all nodes.
    *
     * @return array
      */
function forum_get_all_nodes() {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE `left_id` > 0 AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get all roots.
    *
     * @return array
      */
function forum_get_all_roots() {
        global $currdb;

            $query = $currdb->sql_query('
                            SELECT *
                                    FROM `forum_forums`
                                            WHERE `parent_id` = 0 AND `visible` = 1
                                                    ORDER BY `left_id` ASC
                                                            ;');
                $forums = array();
                    while ( $forum = $currdb->sql_fetch_assoc($query) ) $forums[] = $forum;

                        return $forums;
}

/**
   * Get the number of child nodes.
    *
     * @param array $node
      * @return integer
       */
function forum_get_child_counts(array $node) {
        // Calculates by (right_id - left_id - 1) / 2
        return (int)(($node['right_id'] - $node['left_id'] - 1) / 2);
}

/**
   * Updates the categories of the forum.
    *
     * @param integer $fid
      * @return boolean
       */
function forum_update_categories($fid, $data) {
        global $currdb;

            $categories = array();
                if ( $data != '' ) {
                            foreach ( explode(', ', $data) as $category ) {
                                            list($key, $value) = explode('|', $category);
                                                        $categories[$key] = $value;
                                                                }
                                }

                    $query = $currdb->sql_query('
                                    SELECT `name`, `filename`
                                            FROM `forum_categories`
                                                    WHERE `forum_id` = ' . $fid . '
                                                            ;');
                        $source = array();
                            if ( $currdb->sql_num_rows($query) ) {
                                        while ( $category = $currdb->sql_fetch_assoc($query) ) {
                                                        $source[$category['name']] = $category['filename'];
                                                                }
                                            }

                                $inserts = array();
                                    $deletes = array();
                                        $updates = array();

                                            foreach ( array_keys($categories) as $name ) {
                                                        if ( in_array($name, array_keys($source)) ) {
                                                                        $updates[$name] = $categories[$name];
                                                                                } else {
                                                                                                $inserts[$name] = $categories[$name];
                                                                                                        }
                                                            }

                                                foreach ( array_keys($source) as $name ) {
                                                            if ( !in_array($name, array_keys($categories)) ) {
                                                                            $deletes[$name] = $source[$name];
                                                                                    }
                                                                }

                                                    foreach ( $inserts as $name => $filename ) {
                                                                if (
                                                                                    !forum_database_insert('categories', array(
                                                                                                            'forum_id', 'name', 'filename' 
                                                                                                                        ), array(
                                                                                                                                            $fid, $name, $filename
                                                                                                                                                        ))
                                                                                            ) return false;
                                                                    }

                                                        foreach ( $updates as $name => $filename ) {
                                                                    if (
                                                                                        !forum_database_update('categories', array(
                                                                                                                'name'      => $name,
                                                                                                                                'filename'  => $filename
                                                                                                                                            ), array(
                                                                                                                                                                'forum_id'  => $fid
                                                                                                                                                                            ))
                                                                                                ) return false;
                                                                        }

                                                            foreach ( $deletes as $name => $filename ) {
                                                                        if (
                                                                                            !forum_database_delete('categories', array(
                                                                                                                    'forum_id'  => $fid,
                                                                                                                                    'name'      => $name
                                                                                                                                                ))
                                                                                                    ) return false;
                                                                            }

                                                                return true;
}

/**
   * Gets intended nodes.
    *
     * @param array $nodes
      * @return array
       */
function forum_get_indented_nodes(array $node) {
        $queue = array();
            $indented = array();
                foreach ( forum_get_child_tree($node) as $forum ) {
                            if ( count($queue) > 0 ) {
                                            while ( $queue[count($queue) - 1] < $forum['right_id'] ) {
                                                                array_pop($queue);
                                                                            }
                                                    }

                                    $forum['depth'] = count($queue);

                                            $queue[] = $forum['right_id'];
                                                    $indented[] = $forum;
                                                        }
                    return $indented;
}

/**
   * Gets breadcrums.
    *
     * @param integer $id
      * @param string $type
       * @return array
        */
function forum_get_breadcrumbs($id, $type, $params = '') {
        global $currdb;

            $breadcrumbs = array();

                switch ( $type ) {
                            case 'forums' :
                                            $query = $currdb->sql_query('
                                                                    SELECT `id`, `parent_id`, `left_id`, `right_id`, `name`
                                                                                    FROM `forum_forums`
                                                                                                    WHERE `id` = ' . $id . ' AND `visible` = 1
                                                                                                                    ;');
                                                        $forum = $currdb->sql_fetch_assoc($query);

                                                                    foreach ( forum_get_path($forum) as $parent ) {
                                                                                        if ( $parent['id'] == 1 ) continue;
                                                                                                        $breadcrumbs[] = array(
                                                                                                                                    'name'  => $parent['name'],
                                                                                                                                                        'url'   => 'threads.php?fid=' . $parent['id'] . (empty($params) ? '' : '&' . $params)
                                                                                                                                                                        );
                                                                                                                    }
                                                                                break;
                                                                                        case 'threads' :
                                                                                            $query = $currdb->sql_query('
                                                                                                                    SELECT `id`, `title`, `forum_id`
                                                                                                                                    FROM `forum_threads`
                                                                                                                                                    WHERE `id` = ' . $id .' AND `visible` = 1
                                                                                                                                                                    ;');
                                                                                                        while ( $thread = $currdb->sql_fetch_assoc($query) ) {
                                                                                                                            $breadcrumbs[] = array(
                                                                                                                                                        'name'  => $thread['title'],
                                                                                                                                                                            'url'   => 'thread.php?fid=' . $thread['forum_id'] . '&tid=' . $thread['id']
                                                                                                                                                                                            );
                                                                                                                                            $fid = $thread['forum_id'];
                                                                                                                                                        }
                                                                                                                    $breadcrumbs = array_merge(forum_get_breadcrumbs($fid, 'forums'), $breadcrumbs);
                                                                                                                                break;
                                                                                                                                    }

                    return $breadcrumbs;
}

/**
   * Gets string of breadcrums for display.
    *
     * @param integer $id
      * @param string $type
       * @return string
        */
function forum_get_display_breadcrumbs($id, $type, $params = '') {
        $links = array();

            $links[] = '<a href="index.php">論壇專區</a>';

                foreach ( forum_get_breadcrumbs($id, $type, $params) as $link ) {
                            if ( is_string($link['url']) ) {
                                            $links[] = '<a href="' . $link['url'] . '">' . $link['name'] . '</a>';
                                                    } else {
                                                                    $links[] = $link['name'];
                                                                            }
                                }

                    return implode(' ＞ ', $links);
}

/**
   * Gets pagination.
    *
     * @param resource $query
      * @param integer $page
       * @param integer $size
        * @param string $url
         * @return array
          */
function forum_get_pagination($query, $page, $size, $url) {
        global $currdb;

            $count = $currdb->sql_fetch_assoc($query);
                $count = (int)$count['count'];
                    $pages = (int)ceil($count / $size);

                        if ( $pages < 1 ) $pages = 1;
                            if ( $page < 1 ) $page = 1;
                                if ( $page > $pages ) $page = $pages;
                                    if ( $page < $pages - 1 ) {
                                                $next = $page + 1;
                                                    } else {
                                                                $next = $pages;
                                                                    }
                                        if ( $page > 1 ) {
                                                    $prev = $page - 1;
                                                        } else {
                                                                    $prev = 1;
                                                                        }

                                            return array(
                                                            'size'      => $size,
                                                                    'count'     => $count,
                                                                            'page'      => $page,
                                                                                    'pages'     => $pages,
                                                                                            'next'      => $next,
                                                                                                    'prev'      => $prev,
                                                                                                            'url'       => $url
                                                                                                                );
}

function forum_get_picture($thread) {
        $filename = $thread['ptype'] . '-' . $thread['plevel'];
            return '../pet_game/templates/zh_tw/images/pets/120/' . md5(substr(md5($filename), 0, 15) . substr(md5($filename), 16, 16)) . '.png';
}

/**
   * Parses BBCode.
    *
     * @param string $text
      * @return string
       */
function forum_bbcode($text) {
        $text = str_replace(array(chr(13) . chr(10), chr(10) . chr(13), chr(10), chr(13)), chr(10), $text);

            $pattern = array(
                            '/\[b\](.*?)\[\/b\]/is',
                                    '/\[i\](.*?)\[\/i\]/is',
                                            '/\[u\](.*?)\[\/u\]/is',
                                                    '/\[color\=(.*?)\](.*?)\[\/color\]/is',
                                                            '/\[background\=(.*?)\](.*?)\[\/background\]/is',
                                                                    '/\[indent\](.*?)\[\/indent\]/is',
                                                                            '/\[url\](.*?)\[\/url\]/is',
                                                                                    '/\[url\=(.*?)\](.*?)\[\/url\]/is',
                                                                                            '/\[list\](.*?)\[\/list\]/is',
                                                                                                    '/\[list=([aAiI1])\](.*?)\[\/list\]/is',
                                                                                                            '/\[\*\]/is',
                                                                                                                    '/<li>.?<\/li>/is',
                                                                                                                            '/\[img\](.*?)\[\/img\]/is',
                                                                                                                                    '/\[img\=(.*?)\](.*?)\[\/img\]/is'
                                                                                                                                        );

                $replacement = array(
                                '<strong>$1</strong>',
                                        '<em>$1</em>',
                                                '<u>$1</u>',
                                                        '<span style="color: $1;">$2</span>',
                                                                '<span style="background-color: $1;">$2</span>',
                                                                        '<p style="margin-left: 30px;">$1</p>',
                                                                                '<a href="$1" title="$1">$1</a>',
                                                                                        '<a href="$1" title="$2">$2</a>',
                                                                                                '<ul><li>$1</li></ul>',
                                                                                                        '<ol type="$1"><li>$2</li></ol>',
                                                                                                                '</li><li>',
                                                                                                                        '',
                                                                                                                                '<img src="$1" tip="Image" title="Image" />',
                                                                                                                                        '<img src="$1" tip="$2" title="$2" />'
                                                                                                                                            );

                    return chr(10) . str_replace(chr(10), '<br />', preg_replace($pattern, $replacement, $text)) . chr(10);
}

/**
   * Gets categories of a forum.
    *
     * @param integer $fid
      * @return array
       */
function forum_get_categories($fid) {
        global $currdb;

            $categories = array();

                $query = $currdb->sql_query('
                                SELECT *
                                        FROM `forum_categories`
                                                WHERE `forum_id` = ' . $fid . '
                                                        ;');
                    while ( $category = $currdb->sql_fetch_assoc($query) ) {
                                $categories[] = $category;
                                    }

                        return $categories;
}

/**
   * Gets user id.
    *
     * @return integer
      */
function forum_get_user_id() {
        return isset($_SESSION['uid']) ? (int)$_SESSION['uid'] : 0;
}

/**
   * Determinds whether the user is admin.
    *
     * @return boolean
      */
function forum_is_admin($fid = 0) {
        global $currdb, $currmodule;

            return $currmodule->is_admin() || $currdb->sql_fetch_assoc($currdb->sql_query('
                                SELECT `admin_id`
                                        FROM `forum_forums`
                                                WHERE `id` = ' . $fid . ' AND `admin_id` = ' . (forum_get_user_id() ?: -1) . '
                                                        ;'));
}

/**
   * Guards the database.
    *
     * @param mixed $value
      * @return mixed
       */
function forum_sql_type_guard($value) {
        if ( preg_match('/`{1,}/', $value) ) {
                    return '(' . $value . ')';
                        }
            if ( is_string($value) ) {
                        return '"' . htmlspecialchars(mysql_real_escape_string($value)) . '"';
                            }
                if ( is_integer($value) ) {
                            return (integer)$value;
                                }
                    if ( is_float($value) ) {
                                return (float)$value;
                                    }
                        if ( is_double($value) ) {
                                    return (double)$value;
                                        }
                            if ( is_bool($value) ) {
                                        return (boolean)$value ? 1 : 0;
                                            }
                                return $value;
}

/**
   * Inserts a record.
    *
     * @param string $table
      * @param array $columns
       * @param array $values
        * @return boolean
         */
function forum_database_insert($table, array $columns, array $values) {
        global $currdb;

            $columns = implode(', ', array_map(function($value) {
                                return '`' . $value . '`';
                                    }, $columns));

                $values = implode(', ', array_map('forum_sql_type_guard', $values));

                    return $currdb->sql_query('INSERT INTO `forum_' . $table . '` ( ' . $columns . ' ) VALUES ( ' . $values . ' );');
}

/**
   * Updates records.
    *
     * @param string $table
      * @param array $sets
       * @param array $conditions
        * @param boolean $conjection
         * @return boolean
          */
function forum_database_update($table, array $sets, array $conditions, $conjection = true) {
        global $currdb;

            $sets = implode(', ', array_map(function($key, $value) {
                                return '`' . $key . '` = ' . forum_sql_type_guard($value);
                                    }, array_keys($sets), array_values($sets)));

                $conditions = implode($conjection ? ' AND ' : ' OR ', array_map(function($key, $value) {
                                    if ( is_array($value) ) {
                                                return '`' . $key . '` ' . array_shift($value) . ' ' . forum_sql_type_guard(array_shift($value)) . (count($value) ? ' AND ' . forum_sql_type_guard(array_shift($value)) : '');
                                                        }
                                                                return '`' . $key . '` = ' . forum_sql_type_guard($value);
                                                                    }, array_keys($conditions), array_values($conditions)));

                    return $currdb->sql_query('UPDATE `forum_' . $table . '` SET ' . $sets . ' WHERE ' . $conditions . ';');
}

/**
   * Deletes records (actually this function set field 'visivble' to false).
    *
     * @param string $table
      * @param array $conditions
       * @param boolean $conjection
        * @return boolean
         */
function forum_database_delete($table, array $conditions, $conjection = true) {
        global $currdb;

            $conditions = implode($conjection ? ' AND ' : ' OR ', array_map(function($key, $value) {
                                if ( is_array($value) ) {
                                            return '`' . $key . '` ' . array_shift($value) . ' ' . forum_sql_type_guard(array_shift($value));
                                                    }
                                                            return '`' . $key . '` = ' . forum_sql_type_guard($value);
                                                                }, array_keys($conditions), array_values($conditions)));

                // Prevent Lilo(a.k.a Kisa or 儀靜) to delete the record.
                // return $currdb->sql_query('DELETE FROM `forum_' . $table . '` WHERE ' . $conditions . ';');
                return $currdb->sql_query('UPDATE `forum_' . $table . '` SET `visible` = 0 WHERE ' . $conditions . ';');
}
