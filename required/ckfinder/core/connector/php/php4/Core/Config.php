                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             License Name
	 *
	 * @var string
	 * @access private
	 */
    var $_licenseName = "";
    /**
     * License Key
     *
     * @var string
     * @access private
     */
    var $_licenseKey = "";
    /**
     * Role session variable name
     *
     * @var string
     * @access private
     */
    var $_roleSessionVar = "CKFinder_UserRole";
    /**
     * Access Control Configuration
     *
     * @var CKFinder_Connector_Core_AccessControlConfig
     * @access private
     */
    var $_accessControlConfigCache;
    /**
     * ResourceType config cache
     *
     * @var array
     * @access private
     */
    var $_resourceTypeConfigCache = array();
    /**
     * Thumbnails config cache
     *
     * @var CKFinder_Connector_Core_ThumbnailsConfig
     * @access private
     */
    var $_thumbnailsConfigCache;
    /**
     * Images config cache
     *
     * @var CKFinder_Connector_Core_ImagesConfig
     * @access private
     */
    var $_imagesConfigCache;
    /**
     * Array with default resource types names
     *
     * @access private
     * @var array
     */
    var $_defaultResourceTypes = array();
    /**
     * Filesystem encoding
     *
     * @var string
     * @access private
     */
    var $_filesystemEncoding;
    /**
     * Check double extension
     *
     * @var boolean
     * @access private
     */