<?php
    $pet_types = array(
        0 => array(1 => '米老鼠', 2 => '馬鈴鼠', 3 => '滑鼠', 'sex' => 'boy', 'group' => 1),
        1 => array(1 => '巧虎', 2 => '跳跳虎', 3 => '手指虎', 'sex' => 'boy', 'group' => 2),
        2 => array(1 => '奶油獅', 2 => '阿基獅', 3 => '舞龍五獅', 'sex' => 'girl', 'group' => 2),
        3 => array(1 => '泡泡龍', 2 => '烏龍', 3 => '裕隆', 'sex' => 'girl', 'group' => 2),
        4 => array(1 => '阿蛇', 2 => '小青蛇', 3 => '貪食蛇', 'sex' => 'boy', 'group' => 2),
        5 => array(1 => '鐵馬', 2 => '草泥馬', 3 => '指鹿為馬', 'sex' => 'girl', 'group' => 1),
        6 => array(1 => '小太羊', 2 => '笑笑羊', 3 => '太平羊', 'sex' => 'girl', 'group' => 1),
        7 => array(1 => '醜布拉雞', 2 => '肯德雞', 3 => '電視雞', 'sex' => 'boy', 'group' => 1),
        8 => array(1 => '歐弟狗', 2 => '高飛狗', 3 => '史奴比', 'sex' => 'boy', 'group' => 1),
        9 => array(1 => '喬巴', 2 => '西米鹿', 3 => '不鹿', 'sex' => 'girl', 'group' => 2),
        10 => array(1 => '大頭象', 2 => '小飛象', 3 => '星象儀', 'sex' => 'girl', 'group' => 2),
    );
    $admin_pet_key_start = 10;
    
    
    $states = array(
        0 => array('name' => '很健康', 'life_cost' => 0, 'need' => array('nothing'), 'finish' => array()),
        1 => array('name' => '肚子餓了', 'life_cost' => 20, 'need' => array('eat'), 'finish' => array(
            array('state_id' => 2, 'probability' => 0.8), 
            array('state_id' => 3, 'probability' => 0.2)
            )),
        2 => array('name' => '太胖了', 'life_cost' => 15, 'need' => array('exercise'), 'finish' => array(
            array('state_id' => 4, 'probability' => 0.7), 
            array('state_id' => 3, 'probability' => 0.3)
            )),
        3 => array('name' => '生病受傷了', 'life_cost' => 10, 'need' => array('see_a_doctor', 'rest'), 'finish' => array()),
        4 => array('name' => '累了', 'life_cost' => 10, 'need' => array('see_a_doctor', 'rest'), 'finish' => array()),
        5 => array('name' => '死亡', 'life_cost' => 0, 'need' => array('reset'), 'finish' => array()),
    );
    $default_state_key = 0;
    $default_dead_state_key = 5;
    $actions = array(
        'eat' => array(
            //'aim_state' => array(1),
            0 => array('name' => '宵夜街', 'life_earn' => 8, 'life_id' => 1), 
            1 => array('name' => '後門', 'life_earn' => 8, 'life_id' => 2), 
            2 => array('name' => '夜市', 'life_earn' => 8, 'life_id' => 3),
            3 => array('name' => '大賣場', 'life_earn' => 8, 'life_id' => 4),
        ),
        'exercise' => array(
            //'aim_state' => array(2),
            0 => array('name' => '球場', 'life_earn' => 4, 'life_id' => 5), 
            1 => array('name' => '游泳池', 'life_earn' => 4, 'life_id' => 6), 
            2 => array('name' => '依仁堂', 'life_earn' => 4, 'life_id' => 7), 
            3 => array('name' => '操場', 'life_earn' => 4, 'life_id' => 8), 
            4 => array('name' => '溜冰場', 'life_earn' => 4, 'life_id' => 9), 
            5 => array('name' => '大草坪', 'life_earn' => 4, 'life_id' => 10),
        ),
        'see_a_doctor' => array(
            //'aim_state' => array(3, 4),
            0 => array('name' => '衛保組', 'life_earn' => 8, 'life_id' => 11),  
            1 => array('name' => '特約醫院', 'life_earn' => 8, 'life_id' => 12), 
        ),
        'rest' => array(
            //'aim_state' => array(3, 4),
            0 => array('name' => '男生宿舍', 'life_earn' => 8, 'life_id' => 13),  
            1 => array('name' => '女生宿舍', 'life_earn' => 8, 'life_id' => 14),  
        ),
    );
    
    $actions_aim_state = array(
        'eat' => array(1),
        'exercise' => array(2),
        'see_a_doctor' => array(3, 4),
        'rest' => array(3, 4),
    );
    

    
    $interations = array(
        'eat' => array(
            array('name' => '去宵夜街吃東西', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}都吃到便宜又好吃的食物，心滿意足: ) 兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => '{hl_user}的{hl_pet}把吃不完的食物都給了{ll_user}的{ll_pet}，害{ll_pet}吃太多肚子痛! {ll_pet}生命值{ll_life}，{hl_pet}生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
            
            array('name' => '一起逛中原夜市', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}一起買有名的地瓜球和小吃，吃爽爽心情好! 兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}拜託{ll_user}去幫他買東西，害{ll_user}和{ll_pet}在人擠人的中原夜市迷路了... {ll_pet}生命值{ll_life}；{hl_pet}順利回到學校，生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
        ),
        'exercise' => array(
            array('name' => '去中大湖游泳', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}在水中親密嬉戲，悠閒愜意、心情愉悅，兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => '{hl_user}的{hl_pet}游到一半假裝抽筋，用力拖著{ll_user}的{ll_pet}害它嗆到! {ll_pet}生命值{ll_life}，{hl_pet}生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
            array('name' => '在草地上打壘球', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}一起玩傳接球並練習揮棒姿勢，過了一個愜意的午後: ) 兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}的{hl_pet}甩棒飛出去擊中{ll_user}的{ll_pet}，害{ll_pet}頭上腫了一大包: ( {ll_pet}生命值{ll_life}；{hl_pet}敲出全壘打，生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
        ),
        'walk' => array(
            array('name' => '去圓環校徽看星星', 'same_group' => array(
                'info' => '天氣很好，{hl_user}的{hl_pet}和{ll_user}的{ll_pet}看到壯觀的獅子座流星雨，心花朵朵開: ) 兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}使用起雲劑讓{ll_user}和{ll_pet}的頭上下起狂風暴雨!{ll_pet}重感冒，生命值{ll_life}；{hl_pet}幸災樂禍，生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
            array('name' => '一起觀賞公共藝術-雲朵', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}兩人躺在冰冰涼涼的雲朵上聊天，身心舒暢! 兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}騙{ll_user}的{ll_pet}草地上的白色大便是一朵雲，趁牠靠近看時絆倒牠，害{ll_pet}沾得滿臉都是大便，生命值{ll_life}；{hl_pet}笑哈哈，生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
        ),
        'read' => array(
        
            array('name' => '揪團去系K準備期中考', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}考試互相cover，分數高高，兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}的{hl_pet}告訴{ll_user}的{ll_pet}錯誤的考試範圍，害牠考試爆光光: ( {ll_pet}生命值{ll_life}，{hl_pet}生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
            array('name' => '趕去圖書館佔位子', 'same_group' => array(
                'info' => '{hl_user}的{hl_pet}和{ll_user}的{ll_pet}騎腳踏車載對方衝去圖書館，成功佔到好位子讀書:D兩人生命值各{hl_life}',
                'hl_life' => +5,
                'll_life' => +5,
            ), 'diff_group' => array(
                'info' => ' {hl_user}的{hl_pet}假裝好心騎腳踏車載{ll_user}的{ll_pet}去，途中甩尾害{ll_pet}跌落百花川! {ll_pet}生命值{ll_life}；{hl_pet}到達圖書館，生命值{hl_life}',
                'hl_life' => +3,
                'll_life' => -3,
            )),
        ),
    );
    
    $en_ch_list = array(
        'eat' => '吃東西',
        'exercise' => '運動',
        'see_a_doctor' => '看醫生',
        'rest' => '休息',
        'walk' => '散步',
        'read' => '讀書',
    );
    
    class pet{
        protected $name;
        protected $type;
        protected $level;
        protected $state;//state_id => array(unlock, life_cost)
        protected $life;
        protected $sex;
        protected $group;
        protected $owner_id;
        protected $owner;//
        
        
        protected $max_life = 100;
        protected $max_level = 3;
        protected $min_life = 0;
        protected $min_level = 1;
        
        
        public function __construct($type = 0, $level = 1, $state = null, $life = 100, $uid = -1){
            global $pet_types, $states;
            $this -> name = $pet_types[$type][$level];
            $this -> type = $type;
            $this -> level = $level;
            $this -> state = ($state != null ? $this -> transformState($state) : $this -> initState());
            $this -> life = $life;
            $this -> sex = $pet_types[$type]['sex'];
            $this -> group = $pet_types[$type]['group'];
            $this -> owner_id = $uid;
            
            $this -> checkDefaultState();
        }
        
        public function initState(){
            global $states;
            
            $state = array();
            foreach($states as $key => $value){
                $state[$key] = array( 'unlock' => false, 'life_cost' => 0);
            }
            return $state;
        }
        public function transformState($state){
            if(is_string($state))
                return unserialize($state);
            elseif(is_array($state))
                return serialize($state);
            else
                return false;
        }
        
        public function getName(){
            return $this -> name;
        }
        
        public function getType(){
            return $this -> type;
        }
        
        public function getLevel(){
            return $this -> level;
        }
        
        public function getState(){
            return $this -> state;
        }
        
        public function getStateArray(){
            global $states;
            $state = array();
            foreach($this -> state as $key => $value){
                if($this -> state[$key]['unlock'] == true)
                    array_push($state, $key);
            }
            return $state;
        }
        
        public function getStateStringArray(){
            global $states, $default_state;
            $state = array();
            foreach($this -> state as $key => $value){
                if($this -> state[$key]['unlock'] == true){
                    array_push($state, $states[$key]['name']);
                }
            }
            return $state;
        }
        
        public function getStateStringArrayString(){
            return implode(', ', $this->getStateStringArray());
        }
        
        public function getStateSerialize(){
            return $this -> transformState($this -> state);
        }
        
        public function getOwnerId(){
            return $this -> owner_id;
        }
        
        public function getOwner(){
            return $this -> owner;
        }
        
        public function getLife(){
            return $this -> life;
        }
        
        public function getSex(){
            return $this -> sex;
        }
        
        public function getGroup(){
            return $this -> group;
        }
        
        public function getMaxLife(){
            return $this -> max_life;
        }
        
        public function isSameGroup(pet $other){
            return ($this -> getGroup() == $other -> getGroup());
        }
        
        public function isPetNeed($action){
            global $states;
            $state_array = $this -> getStateArray();
            foreach($state_array as $value){
                foreach($states[$value]['need'] as $value2){
                    if($value2 == $action){
                        return true;
                    }
                }
            }
            
            return false;
        }
        
        public function isDead(){
            global  $default_dead_state_key;
            $temp = $this -> getStateArray();
            $temp = isset($temp[0]) ? $temp[0] : null ;
            if(($this -> level == $this -> min_level && $this -> life == $this -> min_life) || $temp == $default_dead_state_key){
                return true;
            }
            return false;
        }
        
        public function levelUp(){
            global $pet_types;
            if($this -> level < $this -> max_level){
                $this -> level ++;
                $this -> name = $pet_types[$this -> type][$this -> level];
                return true;
            }
            else{
                return false;
            }
        }
        
        public function levelDown(){
            global $pet_types;
            if($this -> level > $this -> min_level){
                $this -> level--;
                $this -> name = $pet_types[$this -> type][$this -> level];
                return true;
            }
            else{
                return false;
            }
        }
        
        public function addLife($point){
            if($this -> life + $point > $this -> max_life){
                $this -> life = $this -> max_life;
            }else if($this -> life + $point < $this -> min_life){
                $this -> life = $this -> min_life;
            }
            else{
                $this -> life += $point;
            }
        }
        
                
        //判斷是否開啟或關閉預設狀態
        protected function checkDefaultState(){
            global  $default_state_key, $default_dead_state_key;
            if($this -> life == $this -> min_life ){
                $this -> _die();
            }
            elseif($this -> state[$default_state_key]['unlock'] == false){
            
                foreach($this -> state as $value){
                    if($value['unlock'] == true){
                        return true;
                    }
                }
                $this -> state[$default_state_key]['unlock'] = true;
            }
            else{
                foreach($this -> state as $key => $value){
                    if($value['unlock'] == true && $key != $default_state_key){
                        $this -> state[$default_state_key]['unlock'] = false;
                        return false;
                    }
                }
            }
        }
        
        public function unlockState($state){
            global $states;
            if($this -> isDead()) return false;
            if(empty($state)) return false;
            
            $this -> state[$state]['unlock'] = true;
            $this -> state[$state]['life_cost'] += $states[$state]['life_cost'];
            $this -> addLife(-$states[$state]['life_cost']);
            $this -> checkDefaultState();
            return true;
        }
        
        public function lockState($state){
            global $states;
            if($this -> isDead()) return false;
            if(empty($state)) return false;
            
            if($this -> state[$state]['unlock'] == true){
                $this -> state[$state]['unlock'] = false;
                $this -> state[$state]['life_cost'] = 0;
                
                //take a kind randomly when lock the state
                $box = array();
                foreach($states[$state]['finish'] as $array){
                    for($i = 0; $i < $array['probability']*10; $i++){
                        array_push($box, $array['state_id']);
                    }
                }
                if(!empty($box)){
                    shuffle($box);
                    $this -> unlockState($box[array_rand($box)]);
                }
                $this -> checkDefaultState();
                return true;
            }
            return false;
        }
        
        public function cleanAllState(){
            $this -> state = $this -> initState();
        }
        
        public function doAction($action, $id){
            global $actions, $actions_aim_state;
            if($this -> isDead()) return false;
            
            if($this -> isPetNeed($action)){
                $this -> addLife($actions[$action][$id]['life_earn']);
                foreach($actions_aim_state[$action] as $value){
                    $this -> state [ $value ]['life_cost'] -= $actions[$action][$id]['life_earn'];
                    if($this -> state [ $value ]['life_cost'] <= 0){
                        $this -> lockState( $value );
                    }
                }
            }
            return false;
        }
        
        public function interate(pet $other_pet, $type, $option, $toString = false){
            global $interations;
            if($other_pet -> isDead()) return false;
            $hl_pet = new pet();
            $ll_pet = new pet();
            $hl_life = 0;
            $ll_life = 0;
            $info = '';
            if($this -> isSameGroup($other_pet)){
                $hl_pet = $other_pet;
                $ll_pet = $this;
                $hl_life = $interations[$type][$option]['same_group']['hl_life'];
                $ll_life = $interations[$type][$option]['same_group']['ll_life'];
                $info = $interations[$type][$option]['same_group']['info'];
            }
            else{
                $hl_life = $interations[$type][$option]['diff_group']['hl_life'];
                $ll_life = $interations[$type][$option]['diff_group']['ll_life'];
                $info = $interations[$type][$option]['diff_group']['info'];
                if($other_pet -> getLevel() > $this -> getLevel()){
                    $hl_pet = $other_pet;
                    $ll_pet = $this;
                }
                elseif($other_pet -> getLevel() < $this -> getLevel()){
                    $hl_pet = $this;
                    $ll_pet = $other_pet;
                }
                else{
                    if($other_pet -> getLife() > $this -> getLife()){
                        $hl_pet = $other_pet;
                        $ll_pet = $this;
                    }
                    elseif($other_pet -> getLife() < $this -> getLife()){
                        $hl_pet = $this;
                        $ll_pet = $other_pet;
                    }
                    else{
                        $hl_pet = $this;
                        $ll_pet = $other_pet;
                        $hl_life = $interations[$type][$option]['same_group']['hl_life'];
                        $ll_life = $interations[$type][$option]['same_group']['ll_life'];
                        $info = $interations[$type][$option]['same_group']['info'];
                    }
                }
            }
            $search = array('{hl_user}', '{ll_user}', '{hl_pet}', '{ll_pet}', '{hl_life}' , '{ll_life}');
            $replace = array($hl_pet -> getOwner(), $ll_pet->getOwner(), $hl_pet -> getName(), $ll_pet -> getName(), $hl_life >= 0 ? ('+' . $hl_life) : $hl_life, $ll_life >= 0 ? ('+' . $ll_life) : $ll_life);
            
            if($toString == false){
                $hl_pet -> addLife($hl_life);
                $ll_pet -> addLife($ll_life);
            }
            
            $info = str_replace($search, $replace, $info);
        
            return $info;
        }
        
        public function _die(){
            global $pet_types, $states, $default_dead_state_key;
            if($this -> state[$default_dead_state_key]['unlock'] == false){
            
                if($this -> level > $this -> min_level){
                    $this -> levelDown();
                    $this -> life = $this -> max_life;
                }
                else{
                    $this -> cleanAllState();
                    $this -> life = 0;
                    $this -> state[$default_dead_state_key]['unlock'] = true;
                }
            }
        }
        function load($uid){
            global $currdb, $pet_types;
            
            $db_pet_src = $currdb -> sql_query("SELECT `pets`.*, `personal_data`.`nickname` FROM `pets` INNER JOIN `personal_data` ON (`pets`.`uid` = `personal_data`.`uid`) WHERE `pets`.`uid` = '$uid';");
            $result = $currdb -> sql_num_rows($db_pet_src);
            if($result == 1){
                $db_pet = $currdb -> sql_fetch_assoc($db_pet_src);
                $this -> name = $pet_types[$db_pet['type']][$db_pet['level']];
                $this -> type = $db_pet['type'];
                $this -> level = $db_pet['level'];
                $this -> state = $this -> transformState($db_pet['state']); 
                $this -> life = $db_pet['life'];
                $this -> sex = $pet_types[$db_pet['type']]['sex'];
                $this -> group = $pet_types[$db_pet['type']]['group'];
                $this -> owner_id = $db_pet['uid'];
                $this -> owner = $db_pet['nickname'];
                
                $this -> checkDefaultState();
                return true;
            }else{
                $this -> name = 'UNSET';
                $this -> type = -1;
                $this -> level = -1;
                $this -> state = $this -> initState();
                $this -> life = -1;
                $this -> sex = 'UNSET';
                $this -> group = -1;
                $this -> owner_id = -1;
                $this -> owner = 'UNSET';
                return false;
            }
        }
        
        function save($reborn = false){
            global $currdb;
            $uid = $this -> owner_id;
            $db_pet_src = $currdb -> sql_query("SELECT * FROM `pets` WHERE `uid` = '$uid';");
            $count = $currdb -> sql_num_rows($db_pet_src);
            if($count == 1){
                $db_pet = $currdb -> sql_fetch_assoc($db_pet_src);
                $login_times = $db_pet['login_times'];//
                $last_login_date = date('Y-m-d', $db_pet['last_login_date']);
                $yesterday = date('Y-m-d', strtotime('-1day',time()));
                $today = date('Y-m-d', time());
                $time = $db_pet['last_login_date'];
                
                //判斷是否為自己寵物
                if($_SESSION['uid'] == $uid){
                    
                    //如果是自己寵物則更新時間
                    $time = time();
                    
                    //判斷是否連續登入
                    if($last_login_date == $yesterday){
                        $this -> unlockState(1);
                        $login_times++;
                        if($login_times >= 5){
                            $this -> levelUp();
                            $login_times = 1;
                        }
                    }
                    elseif($last_login_date == $today){
                        //do nothing
                    }
                    else{
                        $days = (strtotime($today) - strtotime($last_login_date))/86400;
                        for($i=0; $i<$days ;$i++){
                            $this -> unlockState(1);
                        }
                        $login_times = 1;
                    }
                    
                    //假如重選寵物，登入次數歸一
                    if($reborn){
                        $login_times = 1;
                    }
                }
                
                $type = $this -> getType();
                $level = $this -> getLevel();
                $state = $this -> getStateSerialize();
                $life = $this -> getLife();
                
                $currdb -> sql_query("UPDATE `pets` SET `type` = '$type', `level` = '$level', `state` = '$state', `life` = '$life',`login_times` = '$login_times', `last_login_date` = '$time'  WHERE `uid` = '$uid'");
            }
            else{
                $uid = $this -> getOwnerId();
                $type = $this -> getType();
                $level = $this -> getLevel();
                $state = $this -> getStateSerialize();
                $life = $this -> getLife();
                $time = time();
                
                $currdb -> sql_query("INSERT INTO `pets` (`uid`, `type`, `level`, `state`, `life`, `last_login_date`) VALUES ('$uid', '$type', '$level', '$state', '$life', '$time');");
            
            }
        }
        
    }
    
    
    function map_is_after_a_day($uid, $life_id){
        global $currdb;
        $life_visited_time_src = $currdb -> sql_query("SELECT * FROM `life_visited_time` WHERE `life_id` = '$life_id' AND `uid` = '$uid';");
        //if never visit return true, otherwise check time
        if($currdb -> sql_num_rows($life_visited_time_src) == 0){
            return true;
        }
        else{
            $life_visited_time_array = $currdb -> sql_fetch_assoc($life_visited_time_src);
            $life_visited_time = $life_visited_time_array['time'];
            
            $today = time();
            $today_string = date('Y-m-d', $today);
            
            $last_login = $life_visited_time;
            $last_login_string = date('Y-m-d', $last_login);
            
            if($last_login_string != $today_string){
                return true;
            }
            else{
                return false;
            }
        }
    }
    
    function map_update_time($uid, $life_id){
        global $currdb;
        $life_visited_time_src = $currdb -> sql_query("SELECT * FROM `life_visited_time` WHERE `life_id` = '$life_id' AND `uid` = '$uid';");
        $time = time();
        
        //if there is no such data in the database, insert new row into it, otherwise update the row
        if($currdb -> sql_num_rows($life_visited_time_src) == 0){
            $currdb -> sql_query("INSERT INTO `life_visited_time` (`life_id`, `uid`, `time`) VALUES ('$life_id','$uid','$time');");
        }
        else{
            $currdb -> sql_query("UPDATE `life_visited_time` SET `time` ='$time' WHERE `life_id` = '$life_id' AND `uid` = '$uid';");
        }
    }
    
    function check_empty($var){
        return (isset($var) && $var != '');
    }
    
    function save_log($uid, $friend_id, $type, $option, $record){
        global $currdb;
        $time = time();
        $currdb -> sql_query("INSERT INTO `pets_interation_log` (`uid`, `friend_id`, `type`, `option`, `record`, `time`) VALUES ('$uid', '$friend_id', '$type', '$option', '$record','$time');");
    }
    
    function load_log($uid){
        global $currdb;
        $src = $currdb -> sql_query("SELECT `pets_interation_log`.*, `pets`.`type`, `pets`.`level` FROM `pets_interation_log` INNER JOIN `pets` ON (`pets_interation_log`.`uid` = `pets`.`uid`) WHERE `pets_interation_log`.`friend_id` = '$uid' ORDER BY `time` DESC;");
        
        $logs = array();
        while($log = $currdb -> sql_fetch_assoc($src)){
            $log['img_src'] = 'templates/zh_tw/images/pets/40/' . pet_pic_encode($log['type'], $log['level']);
            $log['time'] = date('Y-m-d H:i:s', $log['time']);
            $logs[] = $log;
        }
        
        return $logs;
    }
    
    function pet_pic_encode($type, $level){
        $filename = $type . '-' . $level;
        return md5(substr(md5($filename), 0, 15) . substr(md5($filename), 16, 16)) . '.png';
    }
    
    function is_normal_pet($key){
        global $admin_pet_key_start;
        if($key >= $admin_pet_key_start) return false;
        else return true;
    }
?>
