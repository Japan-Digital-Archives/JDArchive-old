<?php

class Jedarchive_Image extends Jedarchive_Base 
{
    protected $_id;
    protected $_testimonial_id;
    protected $_description;
    protected $_filename;
    protected $_extension;
    protected $_lat;
    protected $_lng;
    protected $_tags;
    protected $_address;
    
    public function getId() {return $this->_id;}
    public function getTestimonialId() {return $this->_testimonial_id;}
    public function getDescription() {return $this->_description;}
    public function getFilename() {return $this->_filename;}
    public function getExtension() {return $this->_extension;}
    public function getLat() {return $this->_lat;}
    public function getLng() {return $this->_lng;}
    public function getTags() {return $this->_tags;}
    public function getAddress() {return $this->_address;}
    
    public function setId($id) {$this->_id = $id; return $this;}
    public function setTestimonialId($testimonial_id) {$this->_testimonial_id = $testimonial_id; return $this;}
    public function setDescription($description) {$this->_description = $description; return $this;}
    public function setFilename($filename) {$this->_filename = $filename; return $this;}
    public function setExtension($extension) {$this->_extension = $extension; return $this;}
    public function setLat($lat) {$this->_lat = $lat; return $this;}
    public function setLng($lng) {$this->_lng = $lng; return $this;}
    public function setTags($tags) {$this->_tags = $tags; return $this;}
    public function setAddress($address) {$this->_address = $address; return $this;}
    
    public function toArray($variant = '')
    {
        $data = array(
            'id' => $this->_id, 
            'testimonial_id' => $this->_testimonial_id, 
            'description' => $this->_description, 
            'filename' => $this->_filename, 
            'extension' => $this->_extension, 
            'lat' => $this->_lat, 
            'lng' => $this->_lng, 
            'tags' => $this->_tags, 
        	'address' => $this->_address, 
        );
        
        if ('js-prefill' == $variant) {
            $data['thumb'] = $this->getUrlPath('thumb');
            $data['full'] = $this->getUrlPath('full');
            $data['size'] = $this->getFileSize();
        }
        return $data;
    }

    public function getUrlPath($variant = 'full')
    {
        $basePath = $this->config()->images->upload_path;
        return implode('/', array($basePath, $variant, $this->_filename . '.jpg'));
    }
    
    public function getPath()
    {
        return implode('/', array(self::getUploadDir(), $this->_filename . '.jpg'));
    }
    
    public function getFileSize()
    {
        return filesize($this->getPath());
    }
    
    /**
     * @return true if the image file actually exists, false otherwise
     */
    public function fileExists()
    {
        $baseDir = self::getUploadDir();
        return file_exists($this->getPath());
    }
    
    public static function getUploadDir()
    {
        $uploadDir = Jedarchive_Config::instance()->images->upload_dir;
               
        if (!(strpos($uploadDir, '/') === 0)) {
            $uploadDir = APPLICATION_PATH . '/' . $uploadDir;
        }
 
        return $uploadDir;
    }
    
    public static function getUploadPath()
    {
        return Jedarchive_Config::instance()->images->upload_path;
    }
    
    //%w(id testimonial_id description filename extension lat lng tags).getset
}