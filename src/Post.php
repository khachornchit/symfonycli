<?php
/**
 * Class/file Post.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 9:45 AM
 */

namespace entities;

/**
 * @Entity
 * @Table(name="post")
 */
class Post
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="smallint")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $title;

    /**
     * @Column(type="text")
     */
    private $text;

    /**
     * @Column(type="datetime")
     */
    private $date;
}
