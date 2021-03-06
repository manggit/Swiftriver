<?php
namespace Swiftriver\Core\DAL\DataContextInterfaces;
interface IContentDataContext {
    /**
     * Given a set of content items, this method will persist
     * them to the data store, if they already exists then this
     * method should update the values in the data store.
     *
     * @param \Swiftriver\Core\ObjectModel\Content[] $content
     */
    public static function SaveContent($content);

    /**
     * Given an array of content is's, this function will
     * fetch the content objects from the data store.
     *
     * @param string[] $ids
     * @return \Swiftriver\Core\ObjectModel\Content[]
     */
    public static function GetContent($ids, $orderby = null);
    
    /**
     * Given a status, pagesize, page start index and possibly
     * an order by calse, this method will return a page of content.
     * 
     * @param int $state
     * @param int $pagesize
     * @param int $pagestart
     * @param string $orderby
     * @return array("totalCount" => int, "contentItems" => Content[])
     */
    public static function GetPagedContentByState($state, $pagesize, $pagestart, $orderby = null);

    /**
     * Given the correct parameters, this method will reatun a page of content
     * in the correct state for whome the source of that content has a veracity
     * score in between the $minVeracity and $maxVeracity supplied.
     *
     * @param int $state
     * @param int $pagesize
     * @param int $pagestart
     * @param int $minVeracity 0 - 100
     * @param int $maxVeracity 0 - 100
     * @param string $orderby
     * @return array("totalCount" => int, "contentItems" => Content[])
     */
    public static function GetPagedContentByStateAndSourceVeracity($state, $pagesize, $pagestart, $minVeracity, $maxVeracity, $orderby = null);

    /**
     *
     * @param string $state - The state of the content
     * @param int $minVeracity - The minimum veracity of the source
     * @param int $maxVeracity - The maximum veracity of the source
     * @param string $type - The type of the source
     * @param string $subType - The subtype of the source
     * @param string $source - the ID of the source
     * @param int $pageSize - the number of results to show on the page
     * @param int $pageStart - the 0 based page start index
     * @param string $orderBy - the order by clause
     */
    public static function GetContentList(
            $state, $minVeracity, $maxVeracity, $type, $subType, $source,
            $pageSize, $pageStart, $orderBy);
    /**
     * Given an array of content items, this method removes them
     * from the data store.
     * @param \Swiftriver\Core\ObjectModel\Content[] $content
     */
    public static function DeleteContent($content);
}
?>