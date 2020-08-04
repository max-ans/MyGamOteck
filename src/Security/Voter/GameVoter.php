<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class GameVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['gameShow', 'edit', 'delete'])
            && $subject instanceof \App\Entity\Game;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'gameShow':
          
                // initialize empty arry for insert in him each users
                $userList = [];
                foreach ($subject->getUsers() as $users) {
                    $userList[] = $users;
                }

                // If user has in userList 
                if (in_array($user, $userList)   ){
                  return true;
                }
                
                
                break;
            case 'edit':
                $userList = [];
                foreach ($subject->getUsers() as $users) {
                    $userList[] = $users;
                }

                // If user has in userList 
                if (in_array($user, $userList)   ){
                  return true;
                }
               
                break;
            case 'delete':
                $userList = [];
                foreach ($subject->getUsers() as $users) {
                    $userList[] = $users;
                }

                // If user has in userList 
                if (in_array($user, $userList)   ){
                  return true;
                }


            break;
        }

        return false;
    }
}
