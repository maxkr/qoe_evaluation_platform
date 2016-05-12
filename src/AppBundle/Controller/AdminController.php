<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 14.03.16
 * Time: 16:44
 */

namespace AppBundle\Controller;

use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;

class AdminController extends EasyAdminController
{
    public function createNewUsersEntity()
    {
        return $this->container->get('fos_user.user_manager')->createUser();
    }

    public function prePersistUsersEntity(User $user)
    {
        $this->container->get('fos_user.user_manager')->updateUser($user, false);
    }

    public function preUpdateUsersEntity(User $user)
    {
        $this->container->get('fos_user.user_manager')->updateUser($user, false);
    }
}