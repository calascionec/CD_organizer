<?php
class CD
{
    private $artist;


    function __construct($band_name)
    {
        $this->artist = $band_name;
    }

    function setArtist($new_band_name)
    {
        $this->artist = $new_band_name;
    }

    function getArtist()
    {
        return $this->artist;
    }

    function save()
    {
        array_push($_SESSION['list_of_artists'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_artists'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_artists'] = array();
    }

    static function deleteLast()
    {
        array_pop($_SESSION['list_of_artists']);
    }
}
 ?>
