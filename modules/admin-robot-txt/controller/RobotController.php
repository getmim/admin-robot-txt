<?php
/**
 * RobotController
 * @package admin-robot-txt
 * @version 0.0.1
 */

namespace AdminRobotTxt\Controller;

use LibForm\Library\Form;
use Mim\Library\Fs;

class RobotController extends \Admin\Controller
{
    public function editAction(){
        if(!$this->user->isLogin())
            return $this->loginFirst(1);
        if(!$this->can_i->update_robot_txt)
            return $this->show404();

        $form = new Form('admin.robottxt.create');
        $params = [
            '_meta' => [
                'title' => 'Settings',
                'menus' => ['admin-setting']
            ],
            'form'  => $form,
            'success' => false
        ];

        $object = (object)[
            'value' => ''
        ];

        $robot_file = $this->config->adminRobotTxt->base;
        if(!$robot_file)
            $robot_file = BASEPATH;
        $robot_file.= '/robots.txt';
        $file_exists = is_file($robot_file);

        if($file_exists)
            $object->value = file_get_contents($robot_file);

        if(!($valid = $form->validate($object)) || !$form->csrfTest('noob'))
            return $this->resp('robot-txt/edit', $params);

        $value = $valid->value;
        if(!$value){
            if($file_exists)
                unlink($robot_file);
        }else{
            Fs::write($robot_file, $value);
        }

        $params['success'] = true;

        $this->resp('robottxt/edit', $params);
    }
}