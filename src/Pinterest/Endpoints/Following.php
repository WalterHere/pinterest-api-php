<?php 
/**
 * Copyright 2015 Dirk Groenen 
 *
 * (c) Dirk Groenen <dirk@bitlabs.nl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DirkGroenen\Pinterest\Endpoints;

use DirkGroenen\Pinterest\Models\User;
use DirkGroenen\Pinterest\Models\Collection;

class Users extends Endpoint {
    
   
    /**
     * Get the authenticated user's following users
     * 
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return Collection
     */
    public function getUsers( array $data = [] )
    {
        $users = $this->request->get( "me/following/users", $data );
        return new Collection( $this->master, $users, "User" );
    }

    /**
     * Get the authenticated user's following boards
     * 
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return Collection
     */
    public function getBoards( array $data = [] )
    {
        $boards = $this->request->get( "me/following/boards", $data );
        return new Collection( $this->master, $boards, "Board" );
    }

    /**
     * Get the authenticated user's following interest
     * 
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return Collection
     */
    public function getInterests( array $data = [] )
    {
        $interest = $this->request->get( "me/following/interest", $data );
        return new Collection( $this->master, $interest, "Model" );
    }

    /**
     * Follow a user
     *
     * @access public
     * @param  string $user
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function followUser( $user )
    {
        $user = $this->request->post( "me/following/users", array(
            "user"  => $user
        ) );
        return true;
    }

    /**
     * Unfollow a user
     *
     * @access public
     * @param  string $user
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function unfollowUser( $user )
    {
        $user = $this->request->delete( sprintf("me/following/users/%s", $user_id) );
        return true;
    }

    /**
     * Follow a board
     *
     * @access public
     * @param  string $board
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function followBoard( $board )
    {
        $user = $this->request->delete( "me/following/boards", array(
            "board"  => $board
        ) );
        return true;
    }

    /**
     * Unfollow a board
     *
     * @access public
     * @param  string $board_id
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function unfollowBoard( $board_id )
    {
        $user = $this->request->delete( sprintf("me/following/boards/%s", $board_id) );
        return true;
    }

    /**
     * Follow a board
     *
     * @access public
     * @param  string $interest
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function followInterest( $interest )
    {
        $user = $this->request->delete( "me/following/interests", array(
            "interest"  => $interest
        ) );
        return true;
    }

    /**
     * Unfollow an interest
     *
     * @access public
     * @param  string $interest_id
     * @throws Exceptions/PinterestExceptions
     * @return boolean
     */
    public function unfollowInterest( $interest_id )
    {
        $user = $this->request->delete( sprintf("me/following/interests/%s", $interest_id) );
        return true;
    }
}