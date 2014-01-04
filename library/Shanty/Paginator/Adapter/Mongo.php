<?php

namespace Shanty\Paginator\Adapter;

use Zend\Paginator\Adapter as PaginatorAdapter,
  Shanty\Mongo\Iterator\Cursor as Cursor;

/**
 * @category   Shanty
 * @package    Shanty\Paginator
 * @copyright  Shanty Tech Pty Ltd
 * @license    New BSD License
 * @author     Stefan Heckler
 */
class Mongo implements PaginatorAdapter
{
    /**
     * Cursor
     *
     * @var Shanty\Mongo\Iterator\Cursor
     */
    protected $_cursor = null;

    /**
     * Constructor.
     *
     * @param Shanty\Mongo\Iterator\Cursor $cursor
     */
    public function __construct(Cursor $cursor)
    {
        $this->_cursor = $cursor;
    }

    /**
     * Returns an cursor limited to items for a page.
     *
     * @param  integer $offset Page offset
     * @param  integer $itemCountPerPage Number of items per page
     * @return Shanty\Mongo\Iterator\Cursor
     */
	public function getItems($offset, $itemCountPerPage)
	{
		$cursor = $this->_cursor->skip($offset)->limit($itemCountPerPage);
		return $cursor;
	}

    /**
     * Returns the total number of rows in the cursor.
     *
     * @return integer
     */
    public function count()
    {
        return $this->_cursor->count();
    }
}
