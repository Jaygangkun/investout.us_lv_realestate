<?php
/**
 * FolderItemResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  DocuSign\eSign
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DocuSign REST API
 *
 * The DocuSign REST API provides you with a powerful, convenient, and simple Web services API for interacting with DocuSign.
 *
 * OpenAPI spec version: v2.1
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\eSign\Model;

use \ArrayAccess;

/**
 * FolderItemResponse Class Doc Comment
 *
 * @category    Class
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class FolderItemResponse implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'folderItemResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'end_position' => 'string',
        'folder_items' => '\DocuSign\eSign\Model\FolderItemV2[]',
        'next_uri' => 'string',
        'previous_uri' => 'string',
        'result_set_size' => 'string',
        'start_position' => 'string',
        'total_rows' => 'string'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'end_position' => 'endPosition',
        'folder_items' => 'folderItems',
        'next_uri' => 'nextUri',
        'previous_uri' => 'previousUri',
        'result_set_size' => 'resultSetSize',
        'start_position' => 'startPosition',
        'total_rows' => 'totalRows'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'end_position' => 'setEndPosition',
        'folder_items' => 'setFolderItems',
        'next_uri' => 'setNextUri',
        'previous_uri' => 'setPreviousUri',
        'result_set_size' => 'setResultSetSize',
        'start_position' => 'setStartPosition',
        'total_rows' => 'setTotalRows'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'end_position' => 'getEndPosition',
        'folder_items' => 'getFolderItems',
        'next_uri' => 'getNextUri',
        'previous_uri' => 'getPreviousUri',
        'result_set_size' => 'getResultSetSize',
        'start_position' => 'getStartPosition',
        'total_rows' => 'getTotalRows'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['end_position'] = isset($data['end_position']) ? $data['end_position'] : null;
        $this->container['folder_items'] = isset($data['folder_items']) ? $data['folder_items'] : null;
        $this->container['next_uri'] = isset($data['next_uri']) ? $data['next_uri'] : null;
        $this->container['previous_uri'] = isset($data['previous_uri']) ? $data['previous_uri'] : null;
        $this->container['result_set_size'] = isset($data['result_set_size']) ? $data['result_set_size'] : null;
        $this->container['start_position'] = isset($data['start_position']) ? $data['start_position'] : null;
        $this->container['total_rows'] = isset($data['total_rows']) ? $data['total_rows'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets end_position
     * @return string
     */
    public function getEndPosition()
    {
        return $this->container['end_position'];
    }

    /**
     * Sets end_position
     * @param string $end_position The last position in the result set.
     * @return $this
     */
    public function setEndPosition($end_position)
    {
        $this->container['end_position'] = $end_position;

        return $this;
    }

    /**
     * Gets folder_items
     * @return \DocuSign\eSign\Model\FolderItemV2[]
     */
    public function getFolderItems()
    {
        return $this->container['folder_items'];
    }

    /**
     * Sets folder_items
     * @param \DocuSign\eSign\Model\FolderItemV2[] $folder_items A list of the envelopes in the specified folder or folders.
     * @return $this
     */
    public function setFolderItems($folder_items)
    {
        $this->container['folder_items'] = $folder_items;

        return $this;
    }

    /**
     * Gets next_uri
     * @return string
     */
    public function getNextUri()
    {
        return $this->container['next_uri'];
    }

    /**
     * Sets next_uri
     * @param string $next_uri The URI to the next chunk of records based on the search request. If the endPosition is the entire results of the search, this is null.
     * @return $this
     */
    public function setNextUri($next_uri)
    {
        $this->container['next_uri'] = $next_uri;

        return $this;
    }

    /**
     * Gets previous_uri
     * @return string
     */
    public function getPreviousUri()
    {
        return $this->container['previous_uri'];
    }

    /**
     * Sets previous_uri
     * @param string $previous_uri The postal code for the billing address.
     * @return $this
     */
    public function setPreviousUri($previous_uri)
    {
        $this->container['previous_uri'] = $previous_uri;

        return $this;
    }

    /**
     * Gets result_set_size
     * @return string
     */
    public function getResultSetSize()
    {
        return $this->container['result_set_size'];
    }

    /**
     * Sets result_set_size
     * @param string $result_set_size The number of results returned in this response.
     * @return $this
     */
    public function setResultSetSize($result_set_size)
    {
        $this->container['result_set_size'] = $result_set_size;

        return $this;
    }

    /**
     * Gets start_position
     * @return string
     */
    public function getStartPosition()
    {
        return $this->container['start_position'];
    }

    /**
     * Sets start_position
     * @param string $start_position Starting position of the current result set.
     * @return $this
     */
    public function setStartPosition($start_position)
    {
        $this->container['start_position'] = $start_position;

        return $this;
    }

    /**
     * Gets total_rows
     * @return string
     */
    public function getTotalRows()
    {
        return $this->container['total_rows'];
    }

    /**
     * Sets total_rows
     * @param string $total_rows 
     * @return $this
     */
    public function setTotalRows($total_rows)
    {
        $this->container['total_rows'] = $total_rows;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\DocuSign\eSign\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\DocuSign\eSign\ObjectSerializer::sanitizeForSerialization($this));
    }
}


