<?php
    $tittle = '01-CLASS';
    $description = 'Lorem';

    include 'template/header.php';

    echo " <section>";
    
    class PlayList {
        # Attrs
        public $artist;
        public $album;
        public $year;
        public $song;
        
        # Construct Method 
        public function __construct($artist, $album, $year, $song) {
            $this->artist = $artist;
            $this->album = $album;
            $this->year = $year;
            $this->song = $song;
        } 
    }

    $pl = new PlayList('Michael Jacson', 'Dangerous', 1991, 'Remember The Time');
    echo $pl->artist;
    echo $pl->album;
    echo $pl->year;
    echo $pl->song;

    include 'template/footer.php';
?>