<?php

/**
 * Map between image objects (Jedarchive_Image) and database rows.
 * 
 * In other words, load save image data to/from the DB.
 * 
 * @author arne
 */
class Jedarchive_Image_Mapper
{
    /**
     * @var Jedarchive_Table
     */
    private $_imgTable = null;
    /**
     * @var Jedarchive_Table
     */
    private $_imgTagTable = null;
    
    public function __construct()
    {
        $this->_imgTable = new Jedarchive_Table('testimonial_image');
        $this->_imgTagTable = new Jedarchive_Table('testimonial_image_tag');
    }
    
    /**
     * Load all images related to a certain testimonial
     * 
     * @param int $testimonialId
     */
    public function loadByTestimonial($testimonialId)
    {
        $rows = $this->_imgTable->fetch('*', array('testimonial_id' => $testimonialId));
        $imgs = array();
        if (isset($rows) and count($rows) > 0) {
            foreach ($rows as $row) {
                $imgs[] = $this->_createFromRow($row);
            }
        }
        return $imgs;
    }
    
    /**
     * Create an Image object from data submitted through a form
     * 
     * @param array $data
     * @return Jedarchive_Image
     */
    public function fromFormData($data)
    {
        $img = new Jedarchive_Image();
        $img->setFilename($data['name']);
        $img->setExtension($data['ext']);
        $img->setDescription($data['description']);
        if (isset($data['lat'])) {
            $img->setLat($data['lat']);
        }
        if (isset($data['lng'])) {
            $img->setLat($data['lng']);
        }
        return $img;
    }
    
    public function save($img)
    {
        $data = $img->toArray();
        $tags = $data['tags'];
        unset($data['tags']);
        if ($data['id']) {
            $this->_imgTable->update($data);
            $this->_imgTagTable->delete(array('testimonial_image_id', $data['id']));
        } else {
            $id = $this->_imgTable->insert($data);
            $img->setId($id);
            $data['id'] = $id;
        }
        foreach ($tags as $tag) {
            $this->_imgTagTable->insert(array(
                'testimonial_image_id' => $data['id'],
                'tag' => $tag
            ));
        }
    }
    
    private function _createFromRow($data)
    {
        $img = new Jedarchive_Image();
        foreach ($data as $k => $v) {
            $setter = 'set' . camelize($k);
            $img->{$setter}($v);
        }
        $img->setTags($this->_loadTags($img->getId()));
        return $img;
    }
    
    private function _loadTags($id) 
    {
        $rows = $this->_imgTagTable->fetch('*', array('testimonial_image_id' => $id));
        $tags = array();
        if (isset($rows) and count($rows) > 0) {
            foreach ($rows as $row) {
                $tags[] = $row['tag'];
            }
        }
        return $tags;
    }
}