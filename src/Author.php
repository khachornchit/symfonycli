<?php
/**
 * Class/file Author.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 9:43 AM
 */

namespace entities;

/**
 * @Entity
 * @Table(name="author")
 */
class Author
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
    private $first_name;

    /**
     * @Column(type="string")
     */
    private $last_name;
}
